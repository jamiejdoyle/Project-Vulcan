<?php
ob_start();
require_once('recaptchalib.php');
require("settings.inc.php");
mysql_connect(mysqlip, mysqluser, mysqlpw) or die(mysql_error());
mysql_select_db(mysqldb) or die(mysql_error());
$privatekey = "6LfITskSAAAAACNwHk8dzt2LOmn-IH1ukTyvIoOU";
$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
$itstehname = $_POST['itstehname'];
$homeroom = $_POST['homeroom'];
$period = $_POST['period'];
$tehtable = $period . "Signups";
$tehcounterfile = $period . "Count.txt";
$tehcount = "$" . $period . "Count";
$hash = substr(md5(rand()), 0, 8);
$disabledcheckquery = "SELECT * FROM signupSettings";
$disabledcheckresult = mysql_query($disabledcheckquery);
while($row = mysql_fetch_assoc($disabledcheckresult)) {
	$disabled = $row['disabled'];
}
if (!$resp->is_valid)
{
die("Please retry the captcha.");
}
elseif ($itstehname == "")
{
die("Please enter your name and/or homeroom.");
}
elseif ($homeroom == "")
{
die("Please enter your name and/or homeroom.");
}
elseif ($tehcount >= maxsignupcount) {
die("The capacity for this period has been reached.");
}
elseif (isset($_COOKIE['signupomnom'])) {
die("ERROR Already signed up today from this user account!");
}
elseif ($disabled != 0) {
die("The library signups are currently disabled.");
}
else {
mysql_real_escape_string($itstehname);
mysql_real_escape_string($homeroom);
mysql_query("INSERT INTO $tehtable 
(name, hr) VALUES('$itstehname', '$homeroom' ) ") 
or die(mysql_error());  
$tehcount++;
mysql_query("UPDATE signupCounts SET count = '$tehcount' WHERE period = '$period'") or die(mysql_error());
setcookie("signupomnom", "yummeh", mktime(23, 59, 59, date("m"), date("d"), date("y")), "/");
echo "You've signed up successfully for " . $period . " tomorrow!<br>";
echo "<b>WRITE THIS ID DOWN!</b> If you need help in the library with your signup, you will need this.<br>";
echo "ID: ";
echo $hash;
echo "<br>";
mysql_query("INSERT INTO correctHashes
(hash) VALUES('$hash') ")
or die(mysql_error());
}
ob_end_flush();
?>