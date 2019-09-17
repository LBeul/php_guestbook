<!DOCTYPE html>
<html>
<head>
	<title>TeacherFeedback</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/form.css">
	<link rel="stylesheet" type="text/css" href="../css/error.css">
</head>
<body>

	<div class='container'>
		<h1 id='logo'>TeacherFeedback</h1>
	<?php
	
		// Clear session
		if (session_status() == PHP_SESSION_ACTIVE) {
			session_destroy();
		}

		// Connect to database
		$dbConnection = mysqli_connect("localhost", "root", "", "bbs");

		if(!isset($_POST['login']))
		{
			//TODO: Swap out Lorem Ipsum for sth useful :D
			echo "
					<div class='description'>
						Herzlich willkommen bei <strong>TeacherFeedback</strong>, der interaktiven 
						Feedback-Website für Lehrer und deren Schüler! Du möchtest deinem Lehrer gerne ein
						aufrichtiges Feedback geben, ohne direkt als Schleimer oder Streber dazustehen? -
						Dann bist du hier genau richtig! Hau' einfach in die Tasten und lass' deinen
						Lehrer wissen,wie du seinen Unterricht findest. Anmelden kannst du dich ganz
						einfach über deineMoodle Daten.
					</div>

					<form method='POST'>

						<label for='userEmail'>Email-Adresse</label>
						<input type='email' name='userEmail' required/>

						<label for='userPassword'>Passwort</label>
						<input type='password' name='userPassword' required/>

						<a class='admin-link' href='./adminLogin.php'>Admin-Login</a>

						<input type='submit' name='login' value='Log In'/>
					</form>
			";
		}
		else
		{

			// Helper functions
			
			// Turns given string into table cell (<td>)
			function toTd($str) {
				return "<td>$str</td>";
			}

			// Adds boldness to given string (<b>)
			function bold($str) {
				return "<b>$str</b>";
			}


			// Gather user input 
			$userEmail =   $_POST['userEmail'];
			$userPassword =   $_POST['userPassword'];

			// Setup query
			$dbGetUser = "SELECT userEntryKey, firstName, lastName
							FROM guestbookUser
							WHERE '$userEmail' = userEmail AND
									'$userPassword' = passwort
									LIMIT 1;" ;

			// Execute query
			$resDbGetUser = mysqli_query($dbConnection, $dbGetUser);

			
			// Check if user exists in the database
			if (mysqli_num_rows($resDbGetUser) == 0) {
				echo "
					<div class='error'>
						Scheint als wäre dein Passwort oder deine Email falsch!<br/>
						<a class='retry-link' href='./index.php'>Versuch's einfach noch einmal :)</a>
					</div>";
			} else {
				
				// Result as array 
				$arr = mysqli_fetch_array($resDbGetUser);

				// Store variables in session
				session_start();
				
				$_SESSION['firstName'] = $arr['firstName'];
				$_SESSION['lastName'] = $arr['lastName'];
				$_SESSION['userEntryKey'] = $arr['userEntryKey'];

				// Go to newEntry.php page
				header("Location: newEntry.php");

			}

		}
			mysqli_close($dbConnection);

	?>
	</div>
</body>
</html>