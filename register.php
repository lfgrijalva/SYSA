<!-- Group# : 12
     File Name: register.php
     Date: 2019-10-03
     Description: This is the registration
-->
<?php
require("./header.php");
if(isset($_SESSION['user']))
{
	header("Location: index.php");
	ob_flush();
}
else
{
	

	$title = "Register";
	$idLogin = "";
	$passLogin = "";
	$securityCode="";
	
?>
	<div class="content">
    <?php
    //define(MAX_ITERATIONS,100);

    if($_SERVER["REQUEST_METHOD"] == "GET")
	{
        $idLogin = "";
		$passLogin = "";
		$securityCode="";
    }
	else if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		//the page got here from submitting the form, let's try to process
		$idLogin = trim($_POST["idlog"]); //the name of the input box on the form, white-space removed
		$passLogin = trim($_POST["passlog"]);
		$securityCode = trim($_POST["securityCode"]);
		
		$conn = db_connect();

		if(!isset($idLogin) || $idLogin == "")
		{
			$idLogin = "";
			$error .= "You must enter a Login ID in order to register. Please Try Again!<br>";
		}
		else if(strlen($idLogin) < MIN_ID_LENGTH)
		{
			$error .= "A user id must be at least ". MIN_ID_LENGTH ." characters, \"".$idLogin."\" is not long enough.<br>";
		}	
		else if(strlen($idLogin) > MAX_ID_LENGTH)
		{
			$error .= "A user id must be less than ". MAX_ID_LENGTH ." characters, \"".$idLogin."\" is too long.<br>";
		}
		else
		{
			$sql = "SELECT user_id FROM users WHERE user_id = '$idLogin';";
			$result = pg_query($conn, $sql);
			$records = pg_num_rows($result);
			if((is_user_id($idLogin)))
			{
				$error .= "The user id \"".$idLogin."\" already exists, Please try to register with a different id!<br>";
				$idLogin = "";
					
			}
		}

		if(!isset($passLogin) || $passLogin == "")
		{
            //means the user did not enter anything
            $error .= "You must enter your password in order to register.\nPlease Try Again!<br/>";
        }
		else if(strlen($passLogin) < MIN_PW_LENGTH)
		{
			$error .= "A user password must be at least ". MIN_PW_LENGTH ." characters.<br/>";
		}
		else if(strlen($passLogin) > MAX_PW_LENGTH)
		{
			$error .= "A user password must be less than ". MAX_PW_LENGTH ." characters.<br/>";
		}

		if (!isset($securityCode) || $securityCode == "") {
			$securityCode = "";
			$error .= "You must enter a correct primary phone number in order to register.\nPlease Try Again!<br/>";
		}
		elseif (!is_numeric($securityCode)) {
			$securityCode = "";
			$error .= "You must enter a correct primary phone number in order to register, you entered a letter.\nPlease Try Again!<br/>";
		}
		elseif (strlen($securityCode)>PHONE_EXT_LENGTH) {
			$securityCode = "";
			$error .= "You must enter a correct primary phone number in order to register, you entered more than 14 digits.\nPlease Try Again!<br/>";
		}

        if($error == "")
		{
			$passLogin = hash(HASH_ALGO, $passLogin);
			$sql = pg_execute($conn, "user_register", array($idLogin, $passLogin, $securityCode));

			header("Location: login.php");
			ob_flush();
		}

    }
	?>
  <center>

	<hr/>
		<a class="ex2" href="./register.php"
		title="Clear Page"><h3>Clear Page</h3></a>

	<hr/>

    <h3><?php echo $error; ?></h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<div class="right-side-menu">
			<form>
				<br>
				<input type="text" name="idlog" value="<?php echo $idLogin; ?>" size=20><br><br>
				<input type="password" name="passlog" value="" size=20><br><br>
				<input type="password" name="securityCode" size=20><br><br>
				
			</form>
		</div>
	</div>


    </form>

    <hr/>
</center>
</div>
<?php
}
				
?>

<?php include 'footer.php'; ?>
