<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
mysql_connect(mysqlip, mysqluser, mysqlpw) or die(mysql_error());
mysql_select_db(mysqldb) or die(mysql_error());
$query = "UPDATE signupSettings SET disabled=0 WHERE disabled=1";
mysql_query($query) or die(mysql_error());
echo "Signups are now enabled.";
?>
<br>
<a href="index.php">Back to the Control Panel</a>