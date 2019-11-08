<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		# Ex 4 :
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		# if (){
		$nameregex = '/^(?![a-zA-Z]*(\-|\s)?([a-zA-Z]*)?$).*$/';
		$pinregex = '/^(?!\d{16}$).*$/';
		$visaregex = '/^(?!^4\d*$).*$/';
		$masterregex = '/^(?!^5\d*$).*$/';
		if (empty($_POST["name"]) || empty($_POST["id"]) || empty($_POST["Course"]) || empty($_POST["grade"]) || empty($_POST["cardpin"]) || empty($_POST["Card"])) { ?>
			<!-- Ex 4 :
				Display the below error message :
				<h1>Sorry</h1>
				<p>You didn't fill out the form completely. Try again?</p>
			-->
			<h1>Sorry</h1>
			<p>You didn't fill out the completely. <a href="http://localhost/gradestore/gradestore.html">Try again?</a></p>
		<?php } else if(preg_match($nameregex, $_POST["name"])) {
			# Ex 5 :
			# Check if the name is composed of alphabets, dash(-), ora single white space.
			# } elseif () {
			?>
			<!-- Ex 5 :
				Display the below error message :
				<h1>Sorry</h1>
				<p>You didn't provide a valid name. Try again?</p>
			-->
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="http://localhost/gradestore/gradestore.html">Try again?</a></p>
		<?php
	} else if(preg_match($pinregex, $_POST["cardpin"])) {
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
		# } elseif () { ?>
		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		-->
		<h1>Sorry</h1>
		<p>You didn't provide a valid credit card number.<a href="http://localhost/gradestore/gradestore.html">Try again?</a></p>
		<?php
	} else if ((($_POST["Card"] == "Visa") && preg_match($visaregex, $_POST["cardpin"])) || (($_POST["Card"] == "MatserCard") && preg_match($masterregex, $POST["cardpin"]))) { ?>
		<h1>Sorry</h1>
		<p>You didn't provide a valid credit card number.<a href="http://localhost/gradestore/gradestore.html">Try again?</a></p>
		<?php print $_POST["Card"]; print $_POST["cardpin"];
	} else {
			$username = $_POST["name"];
			$id = $_POST["id"];
			$course = $_POST["Course"];
			$grade = $_POST["grade"];
			$credit = $_POST["cardpin"];
			$card = $_POST["Card"];
		?>

		<?php
		# if all the validation and check are passed
		# } else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->
		<ul>
			<li>Name: <?= $username ?></li>
			<li>ID: <?= $id ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?= $course ?></li>
			<li>Grade: <?= $grade ?></li>
			<li>Credit: <?= $credit ?> (<?= $card ?>)</li>
		</ul>

		<!-- Ex 3 :
			<p>Here are all the loosers who have submitted here:</p> -->
			<p>Here are all the loosers who have submitted here:</p>



			<!--
			/* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */ -->

			 <?php
	 			$filename = "loosers.txt";
	 			$texts = $username.";".$id.";".$credit.";".$card."/";
	 			$text = file_get_contents($filename);
	 			file_put_contents($filename, $text.$texts); ?>
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->

			 <?php
			 	 $text = file_get_contents($filename);
				 $texts = explode("/", $text);
				 for ($i = 0; $i < count($texts); $i++) { ?>
					 <p><?= $texts[$i] ?></p>
			 <?php } ?>

			 <!--
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
		 -->
	 <?php } ?>
	</body>
</html>
