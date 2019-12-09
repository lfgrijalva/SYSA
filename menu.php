<?php
$title = "Contact us";
include("./header.php");

if (!$user == "") {
    // When page load
} else {
    header("Location: index.php");

    ob_flush();
}

?>		

<div class="content">
		<h1>Welcome, <?php echo $_SESSION['user']?>!</h1>
		<p>Options:</p>
		<ul>
			<li><a href="./record_create.php"> Student Grade Sheets </a></li>
			<li><a href="./display.php"> Display Module</a></li>
			<li><a href="./logout.php"> Logout </a></li>
		</ul>
	</div>

<?php
include("./footer.php");
?>		