<!-- Group# : 12
     File Name: listing-create.php
     Date: 2019-10-03
     Description: Deliverable 3  page for creating the real estate listings.
-->
<?php
/*
	$title = "";
	$file = "";
	$description = "";
	$date = "	Nov 11, 2019";
	$banner = "";
*/
require("./header.php");
?>


<?php
if ($user != "") {
	// When page loads
	if ($_SERVER["REQUEST_METHOD"] == "GET") {

		$error = '';

		$record_id = '';
		$id = "";
		$name = "";
		$gned = "";
		$itce = "";
		$netd = "";
		$oop = "";
		$syde = "";
		$sysa = "";
		$webd = "";
		$gpa = "";
		$comments = "";
	}
	//when user submits
	else if ($_SERVER["REQUEST_METHOD"] == "POST") {


		$error = '';

		$id = intval(trim($_POST["id"]));
		$name = trim($_POST["name"]);
		$gned = floatval(trim($_POST["gned"]));
		$itce = floatval(trim($_POST["itce"]));
		$netd = floatval(trim($_POST["netd"]));
		$oop = floatval(trim($_POST["oop"]));
		$syde = floatval(trim($_POST["syde"]));
		$sysa = floatval(trim($_POST["sysa"]));
		$webd = floatval(trim($_POST["webd"]));
		$gpa = "";
		$comments = trim($_POST["comments"]);;

		$sql2 = "SELECT record_id
		FROM records
		ORDER BY record_id DESC
		LIMIT 1";

		$result2 = pg_query($conn, $sql2);
		$lastRecordId = pg_fetch_assoc($result2);
		$record_id = intval($lastRecordId["record_id"]) + 1;

		//Check validity of new ID
		if (!isset($id) || $id == '') //Is the input empty?
		{
			$error .= "ID field cannot be empty <br/>";
		} elseif (!is_numeric($id)) //is the input numeric?
		{
			$error .= "<br/>Your input for ID must be numeric. You entered: " . $id .
				" \nPlease Try Again! Example: 123456789<br/>";
			$id = '';
		} elseif (num_digits($id) != 9) {
			$error .= "<br/>Your input for ID must be 9 digits long. You entered: " . $id .
				" \nPlease Try Again! Example: 123456789<br/>";
			$id = '';
		} elseif (is_student_id($id)) {
			$error .= "<br/>This Student ID (" . $id . ") already has a record in the Database, please enter a different one.";
		}


		if ($name == '' || $name == '') {
			$error .= "Name field cannot be empty <br/>";
		} elseif (strlen($name) > MAX_NAME_LENGTH) {
			$error .= "Name is too long! Please make sure it is less than " . MAX_NAME_LENGTH . " characters long<br/>";
		}

		//gned
		if ($gned ==0) {
			//Nothing should happen really
		}
		elseif (!isset($gned) || $gned == '') //Is the input empty?
		{
			$error .= "GNED field cannot be empty <br/>";
		} elseif (!is_numeric($gned)) //is the input numeric?
		{
			$error .= "<br/>Your input for GNED must be numeric. You entered: " . $gned .
				" \nPlease Try Again! Example: 88<br/>";
			$gned = '';
		} elseif ($gned < 0) {
			$error .= "<br/>Your input for GNED must bigger than 0. You entered: " . $gned .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$gned = '';
		} elseif ($gned > 100) {
			$error .= "<br/>Your input for GNED must less than 100. You entered: " . $gned .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$gned = '';
		} elseif (num_digits($gned) > 3) {
			$error .= "<br/>Your input for GNED must less than 3 digits long. You entered: " . $gned .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$gned = '';
		}

		//itce
		if ($itce ==0) {
			//Nothing should happen really
		}
		elseif (!isset($itce) || $itce == '') //Is the input empty?
		{
			$error .= "ITCE field cannot be empty <br/>";
		} elseif (!is_numeric($itce)) //is the input numeric?
		{
			$error .= "<br/>Your input for ITCE must be numeric. You entered: " . $itce .
				" \nPlease Try Again! Example: 88<br/>";
			$itce = '';
		} elseif ($itce < 0) {
			$error .= "<br/>Your input for ITCE must bigger than 0. You entered: " . $itce .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$itce = '';
		} elseif ($itce > 100) {
			$error .= "<br/>Your input for ITCE must less than 100. You entered: " . $itce .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$itce = '';
		} elseif (num_digits($itce) > 3) {
			$error .= "<br/>Your input for ITCE must less than 3 digits long. You entered: " . $itce .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$itce = '';
		}

		//netd
		if ($netd ==0) {
			//Nothing should happen really
		}
		elseif (!isset($netd) || $netd == '') //Is the input empty?
		{
			$error .= "NETD field cannot be empty <br/>";
		} elseif (!is_numeric($netd)) //is the input numeric?
		{
			$error .= "<br/>Your input for NETD must be numeric. You entered: " . $netd .
				" \nPlease Try Again! Example: 88<br/>";
			$netd = '';
		} elseif ($netd < 0) {
			$error .= "<br/>Your input for NETD must bigger than 0. You entered: " . $netd .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$netd = '';
		} elseif ($netd > 100) {
			$error .= "<br/>Your input for NETD must less than 100. You entered: " . $netd .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$netd = '';
		} elseif (num_digits($netd) > 3) {
			$error .= "<br/>Your input for NETD must less than 3 digits long. You entered: " . $netd .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$netd = '';
		}

		//oop
		if ($oop ==0) {
			//Nothing should happen really
		}
		elseif (!isset($oop) || $oop == '') //Is the input empty?
		{
			$error .= "OOP field cannot be empty <br/>";
		} elseif (!is_numeric($oop)) //is the input numeric?
		{
			$error .= "<br/>Your input for OOP must be numeric. You entered: " . $oop .
				" \nPlease Try Again! Example: 88<br/>";
			$oop = '';
		} elseif ($oop < 0) {
			$error .= "<br/>Your input for OOP must bigger than 0. You entered: " . $oop .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$oop = '';
		} elseif ($oop > 100) {
			$error .= "<br/>Your input for OOP must less than 100. You entered: " . $oop .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$oop = '';
		} elseif (num_digits($oop) > 3) {
			$error .= "<br/>Your input for OOP must less than 3 digits long. You entered: " . $oop .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$oop = '';
		}

		//syde
		if ($syde ==0) {
			//Nothing should happen really
		}
		elseif (!isset($syde) || $syde == '') //Is the input empty?
		{
			$error .= "SYDE field cannot be empty <br/>";
		} elseif (!is_numeric($syde)) //is the input numeric?
		{
			$error .= "<br/>Your input for SYDE must be numeric. You entered: " . $syde .
				" \nPlease Try Again! Example: 88<br/>";
			$syde = '';
		} elseif ($syde < 0) {
			$error .= "<br/>Your input for SYDE must bigger than 0. You entered: " . $syde .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$syde = '';
		} elseif ($syde > 100) {
			$error .= "<br/>Your input for SYDE must less than 100. You entered: " . $syde .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$syde = '';
		} elseif (num_digits($syde) > 3) {
			$error .= "<br/>Your input for SYDE must less than 3 digits long. You entered: " . $syde .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$syde = '';
		}

		//sysa
		if ($sysa ==0) {
			//Nothing should happen really
		}
		elseif (!isset($sysa) || $sysa == '') //Is the input empty?
		{
			$error .= "SYSA field cannot be empty <br/>";
		} elseif (!is_numeric($sysa)) //is the input numeric?
		{
			$error .= "<br/>Your input for SYSA must be numeric. You entered: " . $sysa .
				" \nPlease Try Again! Example: 88<br/>";
			$sysa = '';
		} elseif ($sysa < 0) {
			$error .= "<br/>Your input for SYSA must bigger than 0. You entered: " . $sysa .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$sysa = '';
		} elseif ($sysa > 100) {
			$error .= "<br/>Your input for SYSA must less than 100. You entered: " . $sysa .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$sysa = '';
		} elseif (num_digits($sysa) > 3) {
			$error .= "<br/>Your input for SYSA must less than 3 digits long. You entered: " . $sysa .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$sysa = '';
		}

		//webd
		if ($webd ==0) {
			//Nothing should happen really
		}
		elseif (!isset($webd) || $webd == '') //Is the input empty?
		{
			$error .= "WEBD field cannot be empty <br/>";
		} elseif (!is_numeric($webd)) //is the input numeric?
		{
			$error .= "<br/>Your input for WEBD must be numeric. You entered: " . $webd .
				" \nPlease Try Again! Example: 88<br/>";
			$webd = '';
		} elseif ($webd < 0) {
			$error .= "<br/>Your input for WEBD must bigger than 0. You entered: " . $webd .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$webd = '';
		} elseif ($webd > 100) {
			$error .= "<br/>Your input for WEBD must less than 100. You entered: " . $webd .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$webd = '';
		} elseif (num_digits($webd) > 3) {
			$error .= "<br/>Your input for WEBD must less than 3 digits long. You entered: " . $webd .
				" \nPlease Try Again! Example: 1 || 23 || 100<br/>";
			$webd = '';
		}

		//Comments
		if (strlen($comments) > 50) //Is the input empty?
		{
			$error .= " <br/>Your input for comments must be 50 characters or less, you entered " . strlen($comments);
		}

		//if no errors
		if ($error == '') {
			//GPA calculation
			$grades = array($gned, $itce, $netd, $oop, $syde, $sysa, $webd);
			$grades_letter = array($gned, $itce, $netd, $oop, $syde, $sysa, $webd);
			$grade_point = array($gned, $itce, $netd, $oop, $syde, $sysa, $webd);
			$pos = 0;
			foreach ($grades as $course) {
				switch (true) {
					case ($course < 49):
						$grades_letter[$pos] = "F";
						$grade_point[$pos] = 0;
						break;
					case ($course >= 49 && $course < 55):
						$grades_letter[$pos] = "D";
						$grade_point[$pos] = 1;
						break;
					case ($course >= 55 && $course < 60):
						$grades_letter[$pos] = "D+";
						$grade_point[$pos] = 1.5;
						break;
					case ($course >= 59 && $course < 65):
						$grades_letter[$pos] = "C";
						$grade_point[$pos] = 2;
						break;
					case ($course >= 65 && $course < 70):
						$grades_letter[$pos] = "C+";
						$grade_point[$pos] = 2.5;
						break;
					case ($course >= 70 && $course < 75):
						$grades_letter[$pos] = "B";
						$grade_point[$pos] = 3;
						break;
					case ($course >= 75 && $course < 80):
						$grades_letter[$pos] = "B+";
						$grade_point[$pos] = 3.5;
						break;
					case ($course >= 80 && $course < 85):
						$grades_letter[$pos] = "A-";
						$grade_point[$pos] = 4;
						break;

					case ($course >= 85 && $course < 90):
						$grades_letter[$pos] = "A";
						$grade_point[$pos] = 4.5;
						break;

					case ($course >= 90 && $course <= 100):
						$grades_letter[$pos] = "A+";
						$grade_point[$pos] = 5;
						break;

					default:
						$grades_letter[$pos] = "Something else happened";
						break;
				}
				$pos++;
			}
			//Calculate GPA
			$gpa = array_sum($grade_point) / count($grade_point);
			$gpa = round($gpa, 2);
			//do the insert statement
			$record_create = pg_execute("record_create", array($record_id, $id, $name, $gned, $itce, $netd, $oop, $syde, $sysa, $webd, $gpa, $comments));

			$final_output= "<p>A record was added to the database<p/>";
		} else {
			$final_output= "<h1>Errors were encountered</h1><hr/><br/> ";
		}
	};
} else {
	header("Location: index.php");

	ob_flush();
}

?>
	<div class="content">
		<center>
		<?php if (isset($final_output)) {echo $final_output;} ?>
			<h3 style="color:red"><?php echo $error; ?></h3>
			<form action="" method="POST">
				<div>
					<b>Student ID: </b>
					<input type="text" name="id" value="<?php echo $id; ?>" size=100>
				</div>

				<div>

					<br />
					<b>Student Name</b>
					<input type="text" name="name" value="<?php echo $name; ?>" size=100>
				</div>

				<div>
					<br />
					<b>GNED000:</b>
					<input type="text" name="gned" value="<?php echo $gned; ?>" size=100>
					<hr />
				</div>

				<div>
					<br />
					<b>ITCE3200:</b>
					<input type="text" name="itce" value="<?php echo $itce; ?>" size=100>


					<b>NETD3202:</b>
					<input type="text" name="netd" value="<?php echo $netd; ?>" size=100>
				</div>

				<div>
					<br />

					<b>OOP3200:</b>
					<input type="text" name="oop" value="<?php echo $oop; ?>" size=100>

					<b>SYDE3203:</b>
					<input type="text" name="syde" value="<?php echo $syde; ?>" size=100>

					<b>SYSA3204:</b>
					<input type="text" name="sysa" value="<?php echo $sysa; ?>" size=100>
				</div>

				<div>
					<br />
					<b>WEBD3201:</b>
					<input type="text" name="webd" value="<?php echo $webd; ?>" size=100>
					<hr />
				</div>

				<div>
					<br />

					<b>Comments:</b>
					<input type="text" name="comments" value="<?php echo $comments; ?>" size=100>
					<table align="center" cellspacing="15">

						<tr>
							<td>
								<!-- ACTION BUTTONS -->
								<p><input type="submit" name="create" value="Create Listing">
									<input type="reset" value="Clear Fields">
							</td>
						</tr>

					</table>
			</form>


			<h2></h2>
		</center>

	</div>
	<?php include 'footer.php'; ?>