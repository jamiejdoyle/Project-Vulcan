<?php
if (php_sapi_name() == "cli") {
	require("../settings.inc.php");
	mysql_connect(mysqlip, mysqluser, mysqlpw) or die(mysql_error());
	mysql_select_db(mysqldb) or die(mysql_error());
	$query = "UPDATE signupSettings SET disabled=0 WHERE disabled=1";
	mysql_query($query) or die(mysql_error());
}
else {
	echo "Sorry, this script is only able to be executed from the console.";
}
?>