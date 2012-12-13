<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
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
mysql_query("UPDATE signupCounts SET count =  '0' WHERE signupCounts.count <> 0 LIMIT 6") or die(mysql_error());
echo "Signups cleared.";
?>
<br>
<a href="index.php">Back to the Control Panel</a>