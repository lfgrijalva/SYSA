<?php
$title = "Login";
include("header.php");

$output = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$blocked = "";
	$loginStatus = "";
	$sticky_user_id = "";
	$_SESSION['attempts'] = 0;
}
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$loginStatus = "";
	if (isset($_SESSION["blocked"])) {
		$blocked = $_SESSION["blocked"];
	} else {
		$blocked = "";
	}
	$username = trim($_POST["username"]);
	$password = hash(HASH_ALGO, trim($_POST["password"]));
	$securityCode = trim($_POST["securityCode"]);
	$sticky_user_id = $username;
	if ($username != $blocked) {
		if ($_SESSION['attempts'] < 3) {
			$_SESSION['attempts']++;
			$remaining = 3 - $_SESSION['attempts'];
			$loginStatus.= "Login failed! You have " . $remaining . " attempts remaining!<br/><br/>";
		}
		elseif ($_SESSION['attempts'] == 3) {
			$loginStatus.= "You have failed more than 3 attempts, username " . $username . " is now blocked from accessing, please enter a try with a different username.<br/><br/>";
			$_SESSION["blocked"] = $username;
			$_SESSION['attempts']=0;
		}
		if (!(is_user_id($username))) {
			$loginStatus .= "You do not have an account! Please register<br/><br/>";
		} elseif (!isset($password) || $password == '') {
			$loginStatus .= "You cannot leave the password field empty!<br/><br/>";
		} elseif (!isset($securityCode) || $securityCode == '') {
			$loginStatus .= "You cannot leave the security code field empty!<br/><br/>";
		} else {
			$result = pg_execute($conn, "user_login", array($username, $password, $securityCode));
			$records = pg_num_rows($result);
			$sticky_user_id = $username;
			if ($records == 0) {
				$loginStatus .= "Incorrect password and/or Security Code. Please try again.<br/><br/>";
			} else if ($records == 1) {
				$loginStatus .= "You've logged in.";
				$_SESSION["user"] = $username;
				header("Location: menu.php");
				ob_flush();
			}
		}
	}
	else {
		$loginStatus.="Sorry you were blocked from too many attempts. Please try with a different username";
	}
}
?>
<div class="content">
	<h1><?php echo $loginStatus; ?></h1>
<div class="side-by-side-menu">
	<div class="left-side-menu">
		<h3>Username:</h3>
		<h3>Password:</h3>
		<h3>Security Code:</h3>
	</div>
	<div class="right-side-menu">
		<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
			<br>
			<input type="text" name="username" value=<?php echo $sticky_user_id; ?>><br><br>
			<input type="password" name="password"><br><br>
			<input type="password" name="securityCode"><br><br>
			<input type="submit" value="Submit">
		</form>
	</div>
</div>
<hr>
<p>Don't have an account? <a href="register.php">Register</a></p>
</div>
<?php
include("footer.php");
?>