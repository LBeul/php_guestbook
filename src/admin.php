<!--this page manages contents of the guestbook table-->

<!DOCTYPE html>
<html>
<head>
	<title>Admin-Verwaltung</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		include 'entryClass.php';

		if (!isset($_POST["submit"])) {

		echo "
			<h1>Willkommen in der Admin Seite des Gästebuches</h1>
			<p>Bitte geben Sie das Adminpasswort ein<p>

			<form method='POST'>
				<input type='password' name='password'/>
				<input type='submit' name='submit'/> 
			<form/>
			";
		} else {
			$password = $_POST['password'];
			
			//if wrong password
			if ($password != "root") {
				echo "Falsches Passwort";
			} else {

				//print all entries

				//database connection
				$dbConnection = mysqli_connect("localhost", "root", "", "bbs");

				$test = new Entry();
				$test->setFirstName("hahaah");

				echo $test->getFirstName();

				echo "Richtiges Passwort";
			}
		}

	?>
</body>
</html>