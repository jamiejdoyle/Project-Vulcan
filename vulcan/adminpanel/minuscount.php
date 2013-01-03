<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
$period = $_POST['periodforchange'];
$numofchange = $_POST['numofchange'];
$count = file_get_contents("../" . $period . "Count.txt");
$increaseordecrease = $_POST['increaseordecrease'];
if ($increaseordecrease == "Decrease") {
	$newcount = $count - $numofchange;
}
elseif ($increaseordecrease == "Increase") {
	$newcount = $count + $numofchange;
}
file_put_contents("../" . $period . "Count.txt", $newcount);
echo "Count modified.";
?>
<br><a href="index.php">Back to the Control Panel</a>