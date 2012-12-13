<!--
These signups were built using the magical Bootstrap from Twitter, and jQuery. The code was written by Max Tamer-Mahoney, originally for Boston Latin School.
To complain about how bad my code is, please email me at max@mxtm.me

This file was modified from the original file from Twitter's Bootstrap. This notice is here to comply with Bootstrap's Apache License.
-->
<?php
ob_start();
require("settings.inc.php");
mysql_connect(mysqlip, mysqluser, mysqlpw) or die(mysql_error());
mysql_select_db(mysqldb) or die(mysql_error());
$query = "SELECT * FROM signupSettings";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)) {
	$disabled = $row['disabled'];
}
if ($disabled != 0) {
	header("Location: disabled.php");
}
ob_end_flush();
?>
<!DOCTYPE html>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Online Library Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery.js"></script>
    <!-- styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<script type="text/javascript">
	$(document).ready(function(){
		$("#faq").hide();
		$("#contact").hide();
	});
	var currentpage = "home";
	function openHome() {
		if (currentpage == "faq") { $("#faq").fadeOut("slow"); setTimeout('$("#form").fadeIn("slow");', 450); setTimeout('$("#mehtitle").fadeIn("slow");', 450); $("#faqli").removeClass("active"); }
		else if (currentpage == "contact") { $("#contact").fadeOut("slow"); setTimeout('$("#form").fadeIn("slow");', 450); setTimeout('$("#mehtitle").fadeIn("slow");', 450); $("#contactli").removeClass("active"); }
		currentpage = "home";
		$("#homeli").addClass("active");
	}
	function openFAQ() {
		if (currentpage == "home") { $("#form").fadeOut("slow"); $("#mehtitle").fadeOut("slow"); setTimeout('$("#faq").fadeIn("slow");', 450); $("#homeli").removeClass("active"); }
		else if (currentpage == "contact") { $("#contact").fadeOut("slow"); setTimeout('$("#faq").fadeIn("slow");', 450); $("#contactli").removeClass("active"); }
		currentpage = "faq";
		$("#faqli").addClass("active");
	}
	function openContact() {
		if (currentpage == "home") { $("#form").fadeOut("slow"); $("#mehtitle").fadeOut("slow"); setTimeout('$("#contact").fadeIn("slow");', 450); $("#homeli").removeClass("active"); }
		else if (currentpage == "faq") { $("#faq").fadeOut("slow"); setTimeout('$("#contact").fadeIn("slow");', 450); $("#faqli").removeClass("active"); }
		currentpage = "contact";
		$("#contactli").addClass("active");
	}
	if (screen.width <= 699) {
		document.location = "mobile";
	}
	</script>

  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="javascript:openHome();">Online Library Signup</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li id="homeli" class="active"><a href="javascript:openHome();">Home</a></li>
              <li id="faqli"><a href="javascript:openFAQ();">FAQ</a></li>
              <li id="contactli"><a href="javascript:openContact();">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
		<div id="mehtitle"><h1>Online Library Signup</h1></div>
      	<div id="form">
		<form action="dosignup.php" method="POST">
		Name: <input type="text" name="itstehname"><br>
		Homeroom: <input type="text" name="homeroom"><br>
		Period: <select name="period"><option>R1</option><option>R2</option><option>R3</option><option>R4</option><option>R6</option><option>R7</option></select><br>
		<br><center>
		<?php
		require_once('recaptchalib.php');
		$publickey = "6LfITskSAAAAALX5vdvLOQw5CFuEEhhrdftxlF5I";
		echo recaptcha_get_html($publickey);
		?></center><br>
		<div id="thecounts">
		<?php
		$countsresult = mysql_query("SELECT * FROM signupCounts") or die(mysql_error());
		$row = mysql_fetch_array($countsresult);
		$R1Count = $row['count'];
		$R2Count = $row['count'];
		$R3Count = $row['count'];
		$R4Count = $row['count'];
		$R6Count = $row['count'];
		$R7Count = $row['count'];
		echo "Current signup counts per period:<br>";
		echo "R1: " . $R1Count . "<br>";
		echo "R2: " . $R2Count . "<br>";
		echo "R3: " . $R3Count . "<br>";
		echo "R4: " . $R4Count . "<br>";
		echo "R6: " . $R6Count . "<br>";
		echo "R7: " . $R7Count . "<br>";
		?><br>
		</div>
		<input id="submit" type="submit" class="btn btn-primary btn-medium" value="Signup!">
		</form>
		</div>
		
		<div id="faq">
			This will be added... soon. Sorry for the delays!
		</div>
		<div id="contact">
			For assistance with signing up, or anything else at all, contact me by:<br>
			Email: <a href="mailto:max@mxtm.me">max@mxtm.me</a><br>
			Twitter: <a href="http://twitter.com/mtamermahoney">@mtamermahoney</a><br>
			Website: <a href="http://mxtm.me">mxtm.me</a><br>
		</div>
		
		<hr>
		
		<footer>
			<p>Created by <a href="http://mxtm.me">Max Tamer-Mahoney</a></p>
			<p>This website is <a href="http://github.com/mxtm/Project-Vulcan">open source</a>.</p>
			<p>Thanks to Twitter for the amazing <a href="http://twitter.github.com/bootstrap/">Bootstrap</a>!</p>
    </div> <!-- /container -->

  </body>
</html>