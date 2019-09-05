<!DOCTYPE html>
<html>
<head>
	<title>Gästebuch</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
	<?php

		if(!isset($_POST['submit']))
		{
			echo "
				<div class='container' id='form-wrapper'>
					<header>Willkommen im Gästebuch</header>
					<div id='description'>
						Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
						invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
						accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
						sanctus est Lorem ipsum dolor sit amet.
					</div>
					<form method='POST'>
						<input type='text' name='firstName' placeholder='Vorname'/>
						<input type='text' name='lastName' placeholder='Nachname'/>
						<input type='email' name='userEmail' placeholder='Mailadresse'/>
						<input 
							id='textarea'
							type='textarea' 
							name='gb_entry' 
							placeholder='Hinterlasse einen Gästebucheintrag'
						/>
						<input type='submit' name='submit'/>
					</form>
				</div>
			";
		}
		else
		{

			// Helper functions
			
			// Turns given string into table cell (<td>)
			function toTd($str) {
				return "<td>$str</td>";
			}

			// Bolds given string (<b>)
			function bold($str) {
				return "<b>$str</b>";
			}


			// Gather user input 
			$firstName =   $_POST['firstName'];
			$lastName =    $_POST['lastName'];
			$userEmail =    $_POST['userEmail'];
			$userEntry =   $_POST['gb_entry'];
			$currentTime = date('Y-m-d G:i:s');

			// Connect to database
			$dbConnection = mysqli_connect("localhost", "root", "", "bbs");

			// Define queries
			$dbSelectAll ="SELECT * FROM guestbook";

			$dbInsertUserInput = "INSERT INTO guestbook VALUES (
				'$firstName',
				'$lastName', 
				'$userEmail', 
				'$userEntry',
				'$currentTime'
			);";


			// Insert user input into database
			if(mysqli_query($dbConnection, $dbInsertUserInput)) 
			{
				echo "Ihr Eintrag wurde erfolgreich gespeichert";
			} 
			else 
			{
				echo "Ihr Eintrag wurde nicht erfolgreich gespeichert.";
				echo mysqli_error($dbConnection);
			}


			// Print all entries
			$allEntries = mysqli_query($dbConnection, $dbSelectAll);


			// Table header
			// TODO make it pretty :)
			echo "<table border>";
				echo "<tr>";
					echo toTd(bold("Name"));
					echo toTd(bold("Nachname"));
					echo toTd(bold("eMail"));
					echo toTd(bold("Eintrag"));
					echo toTd(bold("Wann"));
			echo "</tr>";

			while($data = mysqli_fetch_assoc($allEntries)) {
				echo "<tr>";

					echo toTd($data['firstName']);
					echo toTd($data['lastName']);

					// Temporarily store eMail
					$eMail = $data['userEmail'];
					echo toTd("<a href='mailto:$eMail'>Anschreiben</a>");
					echo toTd($data['userEntry']);
					echo toTd($data['entryDate']);

				echo "</tr>";
			}

			echo "</table>";
		}

	?>

	<!-- Make a pretty button out of it-->
	<div class='container'>
			<a href="./src/admin.php">Admin-Login</a>
	</div>
</body>
</html>