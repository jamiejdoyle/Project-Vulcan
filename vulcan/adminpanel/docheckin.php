<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
mysql_connect(mysqlip, mysqluser, mysqlpw) or die(mysql_error());
mysql_select_db(mysqldb) or die(mysql_error());
$enteredHash = $_POST['hash'];
$checkHash = mysql_query("SELECT hash from correctHashes WHERE hash = '$enteredHash'");
if ( mysql_num_rows($checkHash) > 0 )
{
	echo 'The ID is valid!';
}
else {
	echo "The ID is not valid.";
}
?>
<br>
<a href="index.php">Return to the control panel</a>