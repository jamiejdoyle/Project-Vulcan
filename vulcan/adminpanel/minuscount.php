<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
mysql_connect(mysqlip, mysqluser, mysqlpw) or die(mysql_error());
mysql_select_db(mysqldb) or die(mysql_error());
$period = $_POST['periodfordecrease'];
$numforremoval = $_POST['numforremoval'];
$count = "$" . $period . "Count";
$newcount = $count - $numforremoval;
$updatequery = "UPDATE signupCounts SET count = '$newcount' WHERE period = '$period'";
mysql_query($updatequery) or die(mysql_error());
echo "Count decreased.";
?>
<br><a href="index.php">Back to the Admin Panel</a>