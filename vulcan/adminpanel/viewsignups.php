<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
$tehperiod = $_GET['period'];
$tehtable = $tehperiod . "Signups";
mysql_connect(mysqlip, mysqluser, mysqlpw) or die(mysql_error());
mysql_select_db(mysqldb) or die(mysql_error());

$query = "SELECT * FROM " . $tehtable;

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
    echo "Name: " . $row['name'] . " HR: " . $row['hr'] . "<br>";
}
?>