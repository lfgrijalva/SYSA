<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

	<link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./css/webd3201.css" />
	<!-- CHANGE THE HREF ABOVE TO webd2201.css AFTER YOU HAVE COPY AND PASTED THE CONTENTS OF style.css INTO IT -->
	<!--
	Author: YOUR NAME HERE
	Filename: YOUR_FILE_NAME_HERE.php this will be echo'ed using a PHP variable eventually
	Date: 0X February 20XX
	Description: This page is the CSS layout demo, this description will be replaced with a PHP variable
	-->
	<title>Student Grades</title><!-- THE <title> WILL COME FROM A PHP VARIABLE TOO -->
	<?php
	require("./includes/constants.php");
	require("./includes/db.php");
	require("./includes/functions.php");
	if (session_id() == "") {
		session_start();
	}
	ob_start();
	?>
</head>

<body>
	<div id="container">
		<div id="header">
			<img src="./images/styles/house_master-bgb.png" alt="YOUR SITE LOGO ALT" style="width:50px; height:50px;" />
			<h1>
				SYSA Project 2
			</h1>
		</div>
		<?php if (isset($_SESSION['message'])) {
			echo "<h2>" . $_SESSION['message'] . "</h2>";
			unset($_SESSION['message']);
		}; ?>
		<div id="sites" style="text-align:center">
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php
				$output = "";
				$conn = db_connect();

				if (isset($_SESSION['user'])) {

					$user = $_SESSION["user"];
				} else {
					$user = "";
				}

				if ($user == "") {
					$output .= "\n\t<li>\n\t\t<a href='login.php'>Sign In</a></li>";
				} else {
					$output .= "\n\t<li>\n\t\t<a href='logout.php'>Log out</a></li>";
					$output .= "\n\t<li>\n\t\t<a href='menu.php'>Menu</a></li>";
				}

				echo $output;
				?>

			</ul>
		</div>
		<div id="content-container">
			<div id="navigation" class="navigation">
				<div>
					<?php if ($user != "") {
						echo "					<div>
						<h3>Available options</h3>
					</div>
					<div>
							<div class=\"option\">
								<ul>
									<li><a href=\"menu.php\">Menu</a></li>
									<li><a href=\"display.php\">Display</a></li>
									<li><a href=\"record_create.php\">Record Create</a></li>
								</ul>
							</div>
					</div>";
					} else {
						echo "					<div>
						<h3>Nothing to show here</h3>
					</div>
					<div>
							<div class=\"option\">
								<ul>
									<li><a href=\"login.php\">Login</a></li>
								</ul>
							</div>
					</div>";
					} ?>
				</div>
			</div>