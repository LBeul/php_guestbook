<!DOCTYPE html>
<html>
<head>
	<title>TF Lehrer LogIn</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/adminForm.css">
	<link rel="stylesheet" type="text/css" href="../css/error.css">
</head>
<body>
	<div class="container">
		<h1 id='logo'>TeacherFeedback</h1>

	<?php
		// Clear session
		if (session_status() == PHP_SESSION_ACTIVE) {
			session_destroy();
		}
	
		if(!isset($_POST["submit"])) {

			echo "
				<h2>Willkommen auf der Lehrer-Seite!</h2>
				<p>
					Sind Sie schon gespannt, was Ihre Schüler so über Sie denken? In wenigen Sekunden
					wird dieses Geheimnis gelüftet - geben Sie lediglich Ihr Passwort ein, um die Liste
					der Feedback-Einträge zu erhalten.
				</p>
				<form method='POST'>
					<label for='password'>Passwort</label>
					<input type='password' name='password' required/>
					<input type='submit' name='submit' value='Einloggen'/> 
				<form/>";

		} else {
			
			// store password in session
			session_start();
			
			$password = $_POST['password'];
			$_SESSION['adminPassword'] = $password;


			// If password is wrong
			if($password != "root") {
				echo "
				<div class='error'>
					Hoppla, das war leider ein falsches Passwort!<br/>
					<a class='retry-link' href='./adminLogin.php'>Zurück zum Admin Login</a>
				</div>";
			} else {
				header("Location: admin.php");
			}
		}

		?>
	</div>
</body>
</html>