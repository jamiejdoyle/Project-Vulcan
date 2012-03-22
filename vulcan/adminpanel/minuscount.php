<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
$period = $_POST['periodfordecrease'];
$numforremoval = $_POST['numforremoval'];
$count = file_get_contents("../" . $period . "Count.txt");
$newcount = $count - $numforremoval;
file_put_contents("../" . $period . "Count.txt", $newcount);
echo "Count decreased.";
?>
<br><a href="index.php">Back to the Admin Panel</a>