<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
chdir("..");
unlink("R1Count.txt");
unlink("R2Count.txt");
unlink("R3Count.txt");
unlink("R4Count.txt");
unlink("R5Count.txt");
unlink("R6Count.txt");
unlink("R7Count.txt");
$R1Count = fopen("R1Count.txt", "a+");
fwrite($R1Count, "0");
$R2Count = fopen("R2Count.txt", "a+");
fwrite($R2Count, "0");
$R3Count = fopen("R3Count.txt", "a+");
fwrite($R3Count, "0");
$R4Count = fopen("R4Count.txt", "a+");
fwrite($R4Count, "0");
$R5Count = fopen("R5Count.txt", "a+");
fwrite($R5Count, "0");
$R6Count = fopen("R6Count.txt", "a+");
fwrite($R6Count, "0");
$R7Count = fopen("R7Count.txt", "a+");
fwrite($R7Count, "0");
mysql_connect(mysqlip, mysqluser, mysqlpw) or die(mysql_error());
mysql_select_db(mysqldb) or die(mysql_error());
mysql_query("TRUNCATE TABLE R1Signups");
mysql_query("TRUNCATE TABLE R2Signups");
mysql_query("TRUNCATE TABLE R3Signups");
mysql_query("TRUNCATE TABLE R4Signups");
mysql_query("TRUNCATE TABLE R5Signups");
mysql_query("TRUNCATE TABLE R6Signups");
mysql_query("TRUNCATE TABLE R7Signups");
mysql_query("TRUNCATE TABLE correctHashes");
echo "Signups cleared.";
?>
<br>
<a href="index.php">Return to the Control Panel</a>