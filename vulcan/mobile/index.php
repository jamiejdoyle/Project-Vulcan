<!DOCTYPE html>
<?php
ob_start();
require("../settings.inc.php");
mysql_connect(mysqlip, mysqluser, mysqlpw) or die(mysql_error());
mysql_select_db(mysqldb) or die(mysql_error());
$query = "SELECT * FROM signupSettings";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)) {
	$disabled = $row['disabled'];
}
if ($disabled != 0) {
	header("Location: ../disabled.php");
}
ob_end_flush();
?>
<html>
<head>
	<script src="jquery-1.7.1.min.js"></script>
	<script src="jquery.mobile-1.0.1.min.js"></script>
	<link rel="stylesheet" href="jquery.mobile-1.0.1.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
	#thecounts { text-align: center; }
	</style>
	<title>MLibSignup</title>
</head>
<body>
	<div data-role="page">
		<div data-role="header">
			<h1>Library Signup</h1>
		</div>
		<div data-role="content">
			<form data-ajax="false" id="signupform" action="../dosignup.php" method="post" data-transition="slide" data-directions="">
				<label for="itstehname">Name:</label><input type="text" name="itstehname"><br>
				<label for="homeroom">Homeroom:</label><input type="text" name="homeroom"><br>
				<label for="period">Period:</label><select name="period"><option>R1</option><option>R2</option><option>R3</option><option>R4</option><option>R6</option><option>R7</option></select><br>
				<br>
				<?php
				require_once('recaptchalib.php');
				$publickey = "6LfITskSAAAAALX5vdvLOQw5CFuEEhhrdftxlF5I";
				echo recaptcha_get_html($publickey);
				?><br>
				<div id="thecounts">
				<?php
				$R1Count = @file_get_contents("../R1Count.txt");
				$R2Count = @file_get_contents("../R2Count.txt");
				$R3Count = @file_get_contents("../R3Count.txt");
				$R4Count = @file_get_contents("../R4Count.txt");
				$R6Count = @file_get_contents("../R6Count.txt");
				$R7Count = @file_get_contents("../R7Count.txt");
				echo "Current signup counts per period:<br>";
				echo "R1: " . $R1Count . "<br>";
				echo "R2: " . $R2Count . "<br>";
				echo "R3: " . $R3Count . "<br>";
				echo "R4: " . $R4Count . "<br>";
				echo "R6: " . $R6Count . "<br>";
				echo "R7: " . $R7Count . "<br>";
				?><br>
				</div>
				<input id="submit" type="submit" value="Signup!">
			</form>
		</div>
</body>
</html>