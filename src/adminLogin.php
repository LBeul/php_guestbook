<!DOCTYPE html>
<html>
<head>
	<title>Admin-Verwaltung</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		if(!isset($_POST["submit"])) {

			echo "
				<h1>Willkommen in der Admin Seite des Gästebuches</h1>
				<p>Bitte geben Sie das Adminpasswort ein<p>

			<form method='POST'>
					<input type='password' name='password'/>
					<input type='submit' name='submit'/> 
			<form/>";

		} else {
			$password = $_POST['password'];
			
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