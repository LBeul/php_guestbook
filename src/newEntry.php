<!DOCTYPE html>
<html>
<head>
	<title>Neues Feedback</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/error.css">
	<link rel="stylesheet" type="text/css" href="../css/entryEdit.css">
	<link rel="stylesheet" type="text/css" href="../css/success.css">
</head>
<body>
	<div class="container">
	<?php

		session_start();


		echo "<h1 id='logo'>TeacherFeedback</h1>";

		// If not logged in 
		if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName']) || !isset($_SESSION['userEntryKey'])) {
			echo "
				<div class='error'>
					Hoppla, bitte melde dich zuerst mit deinen Zugangsdaten an!<br/>
					<a class='retry-link' href='index.php'> Erneut anmelden </a>
				</div>";

		} else {

			$firstName = $_SESSION['firstName'];
			$lastName = $_SESSION['lastName'];
			$userKey = $_SESSION['userEntryKey'];

			echo "<h2>Hallo $firstName,</h2>";

			if (!isset($_POST['submit'])) {

				// Setup the formular
				echo "
					<form method='post' action=''>
						<p>
							bitte bedenke, dass grundsätzlich jedes Feedback subjektiv ist, da jeder Mensch anders 
							empfindet und Sachverhalte dementsprechend auch anders wahrnimmt. Bleib deshalb bitte 
							bei einer reinen Beschreibung deiner Wahrnehmungen und Verbesserungsvorschläge und 
							vermeide Ausdrücke wie \"Herr XYZ kann gar nicht erklären\" oder dergleichen. 
							Feedback sollte immer konstruktiv und gerne auch kritisch sein, jedoch niemals 
							demotivierend!
						<p>

						<h3>Wie lautet dein heutiges Feedback?</h3>
						<textarea name='gbEntry' required></textarea>
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
					echo "
					<div class='success'> <br/>
						Eintrag wurde erfolgreich gespeichert
						<a class='success-link' href='./index.php'>Zurück zum LogIn</a>
					</div>";
				}

				mysqli_close($dbConnection);

				// Delete session variables
				session_destroy();
			}
		}
	?>
	</div>
</body>
</html>