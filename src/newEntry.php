<!DOCTYPE html>
<html>
<head>
	<title>Verfasse deinen Feedbackbeitrag</title>
	<meta charset="utf-8">
</head>
<body>
	<?php

		session_start();


		// if not logged in 
		if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName']) || !isset($_SESSION['userEntryKey'])) {
			echo "<h1>Bitte einloggen :)</h1>
					<a href='localhost/php_guestbook/src/index.php> Hier </a>";

		} else {

			$firstName = $_SESSION['firstName'];
			$lastName = $_SESSION['lastName'];
			$userKey = $_SESSION['userEntryKey'];

			echo "<h1>Hallo $firstName</h1>";

			if (!isset($_POST['submit'])) {

				// Setup the formular
				echo " <form method='post' action=''>
							<h1> Tippe dein Eintrag ein </h1>
							<input 
								id='textarea'
								type='textarea' 
								name='gbEntry' 
								placeholder='Hinterlasse einen Gästebucheintrag'
								required
							/>
							<input type='submit' name='submit'/>
						</form>";

			} else {

				// Database connection
				$dbConnection = mysqli_connect("localhost", "root", "", "bbs");


				// Gather data for insertion 
				$entry = $_POST['gbEntry'];
				$currentTime = date('Y-m-d G:i:s');
				$id = strval(round(microtime(true) * 1000));


				// Setup query
				$dbInsertEntry = "INSERT INTO guestbookentry 
									VALUES (
										'$entry', 
										'$userKey', 
										'$currentTime', 
										'$id' ) ;";

				if (mysqli_query($dbConnection, $dbInsertEntry)) {
					echo mysqli_error($dbConnection);
					echo "Eintrag wurde erfolgreich gespeichert";
				}

				mysqli_close($dbConnection);

				// Delete session variables
				session_destroy();
			}
		}
	?>
</body>
</html>