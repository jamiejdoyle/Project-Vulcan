<?php include("password_protect.php"); ?>
<?php
require("../settings.inc.php");
chdir("..");
chdir("..");
rename(websitedirectoryname, websiteoffdirectoryname);
rename(websiteondirectoryname, websitedirectoryname);
echo "Library signups are now disabled.";
?>
<br>
<a href="index.php">Back to the Control Panel</a>