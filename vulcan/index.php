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
    <title>Library Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px;
      }
    </style>

    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<script type="text/javascript">
	$(document).ready(function(){
		$("#faq").hide();
		$("#contact").hide();
	});
	var currentpage = "home";
	function openPage(page) {
		if (page == currentpage) {
			return;
		}
		else {
			$("#" + currentpage).hide();
			$("#" + page).show();
			$("#" + currentpage + "li").removeClass("active");
			currentpage = page;
			$("#" + page + "li").addClass("active");
		}
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
          <a class="brand" href="javascript:openPage('home');">Library Signup</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li id="homeli" class="active"><a href="javascript:openPage('home');">Home</a></li>
              <li id="faqli"><a href="javascript:openPage('faq');">FAQ</a></li>
              <li id="contactli"><a href="javascript:openPage('contact');">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    	<div id="home">
		<div id="mehtitle"><h1>Library Signup</h1></div>
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
		$R1Count = @file_get_contents("R1Count.txt");
		$R2Count = @file_get_contents("R2Count.txt");
		$R3Count = @file_get_contents("R3Count.txt");
		$R4Count = @file_get_contents("R4Count.txt");
		$R6Count = @file_get_contents("R6Count.txt");
		$R7Count = @file_get_contents("R7Count.txt");
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
		</div>
		
		<div id="faq">
			This will be added... at some unknown time. Sorry! For now, just use the methods of contact on the <a href="javascript:openPage('contact');">"Contact" page</a> to ask questions.
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