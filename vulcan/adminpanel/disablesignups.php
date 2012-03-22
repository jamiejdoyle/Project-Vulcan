<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
chdir("..");
chdir("..");
rename(websitedirectoryname, websiteondirectoryname);
rename(websiteoffdirectoryname, websitedirectoryname);
echo "Library signups are now disabled.";
?>
<br>
<a href="index.php">Back to the Control Panel</a>