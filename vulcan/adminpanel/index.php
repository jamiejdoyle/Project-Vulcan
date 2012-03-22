<?php include("password_protect.php"); ?>
<html>
<head>
<title>Library Signup Control Panel</title>
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
<h2>Disable Signups</h2>
<form action="disablesignups.php" method="POST">
<input type="submit" value="Disable Signups">
</form>
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