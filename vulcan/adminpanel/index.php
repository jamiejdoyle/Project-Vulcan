<?php include("password_protect.php"); ?>
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
ob_end_flush();
?>
<html>
<head>
<title>Library Signup Control Panel</title>
<form><input type="hidden" id="disabled" value="<?php echo $disabled; ?>"></form>
</head>
<body>
<h2>View Signups</h2>
<a href="viewsignupsall.php">View all signups</a><br>
<a href="viewsignups.php?period=R1">View signups for R1</a><br>
<a href="viewsignups.php?period=R2">View signups for R2</a><br>
<a href="viewsignups.php?period=R3">View signups for R3</a><br>
<a href="viewsignups.php?period=R4">View signups for R4</a><br>
<a href="viewsignups.php?period=R6">View signups for R6</a><br>
<a href="viewsignups.php?period=R7">View signups for R7</a>
<h2>Disable/Enable Signups</h2>
<form action="disablesignups.php" method="POST">
<input type="submit" id="disablebutton" value="Disable Signups">
</form>
<form action="enablesignups.php" method="POST">
<input type="submit" id="enablebutton" value="Enable Signups">
</form>
<script type="text/javascript">
var disabledvalue = document.getElementById('disabled').value;
var disablebutton = document.getElementById('disablebutton');
var enablebutton = document.getElementById('enablebutton');
if (disabledvalue == 1) { disablebutton.disabled = true; }
else if (disabledvalue == 0) { enablebutton.disabled = true; }
</script>
<h2>Clear Signups</h2>
<form action="clearsignups.php" method="POST">
<input type="submit" value="Clear Signups">
</form>
<h2>Decrease the Count By X For a Period</h2>
<form action="minuscount.php" method="POST">
<input type="text" name="numforremoval"><select name="periodfordecrease"><option>R1</option><option>R2</option><option>R3</option><option>R4</option><option>R5</option><option>R6</option><option>R7</option></select><input type="submit" value="Do it!"></form>
<h2>Check if a Hash is Valid</h2>
<form action="docheckin.php" method="POST">
<input type="text" name="hash"><input type="submit" value="Check"><br>
<b>Enter letters in the hash as lower case!</b>
</form>
<br>
<a href="password_protect.php?logout">Log out</a>
</body>
</html>