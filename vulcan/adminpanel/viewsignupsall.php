<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
mysql_connect(mysqlip, mysqluser, mysqlpw) or die(mysql_error());
mysql_select_db(mysqldb) or die(mysql_error());

$query = "SELECT * FROM R1Signups";

$result = mysql_query($query) or die(mysql_error());
echo "R1<br>";
while($row = mysql_fetch_array($result)){
    echo "Name: " . $row['name'] . " HR: " . $row['hr'] . "<br>";
}

$query = "SELECT * FROM R2Signups";

$result = mysql_query($query) or die(mysql_error());
echo "R2<br>";
while($row = mysql_fetch_array($result)){
    echo "Name: " . $row['name'] . " HR: " . $row['hr'] . "<br>";
}

$query = "SELECT * FROM R3Signups";

$result = mysql_query($query) or die(mysql_error());
echo "R3<br>";
while($row = mysql_fetch_array($result)){
    echo "Name: " . $row['name'] . " HR: " . $row['hr'] . "<br>";
}

$query = "SELECT * FROM R4Signups";

$result = mysql_query($query) or die(mysql_error());
echo "R4<br>";
while($row = mysql_fetch_array($result)){
    echo "Name: " . $row['name'] . " HR: " . $row['hr'] . "<br>";
}

$query = "SELECT * FROM R6Signups";

$result = mysql_query($query) or die(mysql_error());
echo "R6<br>";
while($row = mysql_fetch_array($result)){
    echo "Name: " . $row['name'] . " HR: " . $row['hr'] . "<br>";
}

$query = "SELECT * FROM R7Signups";

$result = mysql_query($query) or die(mysql_error());
echo "R7<br>";
while($row = mysql_fetch_array($result)){
    echo "Name: " . $row['name'] . " HR: " . $row['hr'] . "<br>";
}
?>