<?php
	session_start();
	$_SESSION['registration_username'] = $_POST['registration_username'];
	$_SESSION['registration_password'] = $_POST['registration_password'];
?>

<!DOCTYPE html>
<html lang="en">

	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="login-page.css">
	<script defer src="login-page.js"></script>
	<style type="text/css">
		html {
			height: 100%;
		}

		body {
			height: 100%;
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
			display: grid;
			justify-items: center;
			align-items: center;
			background-color: #3a3a3a;
		}

		div {
			margin: 20px 0 0 20px;
		}

		label {
			display: inline-block;
			width: 150px;
			text-align: left;
			margin: 0 0 0 10px;
		}

		#main-holder {
			background-color: white;
			border-radius: 7px;
			box-shadow: 0px 0px 5px 2px black;
		}

		#register-header{
			margin: 1.5em 0 0 1.5em;
		}

		#submit-next-page {
			width: 20%;
			padding: 7px;
			border-radius: 3px;
			float: right;
			justify-content: flex-end;
			color: white;
			font-weight: bold;
			background-color: #3a3a3a;
			cursor: pointer;
			outline: none;
			margin: 1em 2em 1em 0em;
		}

	</style>
	</head>

	<body>
		<main id="main-holder">
		<p id="register-header"><b>Register</b></p>

		<form action="reg_push.php" method="post">
			<div>
				<label>Name</label>
				<input name="registration_name" type="text" placeholder="John Doe" required/>
			</div>
			<div>
				<label>Contact Number</label>
				<input name="registration_contact" type="tel" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" placeholder="0917-625-6897" required/>
			</div>
			<div>
				<label>Student ID</label>
				<input name="registration_Student_id" type="text" pattern="[2]{1}[0]{1}[0-9]{1}[0-9]{1}-[0-9]{4}" placeholder="2019-0000" required/>
			</div>
			<div>
				<label>Birthdate</label>
				<input name="registration_day" type="date" required/>
			</div>
			<div>
				<label>Year </label>
				<input name="registration_year" type="number" pattern="[0-9]{4}" placeholder="2000" required/>
			</div>
			<div>
				<label>Course</label><br><br>
				<input type="radio" id="BSIS" name="registration_course" value="BSIS" required><label for="BSIS">BSIS</label>
				<input type="radio" id="BSCS" name="registration_course" value="BSCS" required><label for="BSCS">BSCS</label><br>
				<input type="radio" id="BSIT" name="registration_course" value="BSIT" required><label for="BSIS">BSIT</label>
				<input type="radio" id="BSEMC" name="registration_course" value="BSEMC" required><label for="BSEMC">BSEMC</label><br>
			</div>
			
			<div>
				<label>Section </label><br><br>
				<input id="secA" name="registration_section" type="radio" value="A" required/><label for="secA">A</label>
				<input id="secC" name="registration_section" type="radio" value="C" required/><label for="secC">C</label><br>
				<input id="secB" name="registration_section" type="radio" value="B" required/><label for="secB">B</label>
			</div>

			<input type="submit" value="Next" id="submit-next-page">
		</form>


		</main>
	</body>

</html>