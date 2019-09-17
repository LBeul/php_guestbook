<!DOCTYPE html>
<html>
<head>
	<title>TF Admin LogIn</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		// Clear session
		if (session_status() == PHP_SESSION_ACTIVE) {
			session_destroy();
		}
	
		if(!isset($_POST["submit"])) {

			echo "
				<h1>Willkommen in der Admin Seite des Gästebuches</h1>
				<p>Bitte geben Sie das Adminpasswort ein<p>

			<form method='POST'>
					<input type='password' name='password'/>
					<input type='submit' name='submit'/> 
			<form/>";

		} else {
			
			// store password in session
			session_start();
			
			$password = $_POST['password'];
			$_SESSION['adminPassword'] = $password;


			// If password is wrong
			if($password != "root") {
				echo "<h1>Falsches Passwort</h1>";
				echo"<a href='./adminLogin.php'>Zurück zum Admin Login</a>";
			} else {
				header("Location: admin.php");
			}
		}

		?>
</body>
</html>