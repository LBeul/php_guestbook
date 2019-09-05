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
				<div class='container'>
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

			//helper functions

			//turns given string into table cell (<td>)
			function toTd($str) {
				return "<td>$str</td>";
			}

			//bolds given string (<b>)
			function bold($str) {
				return "<b>$str</b>";
			}


			//gather user input 
			$firstName =   $_POST['firstName'];
			$lastName =    $_POST['lastName'];
			$userEmail =    $_POST['userEmail'];
			$userEntry =   $_POST['gb_entry'];
			$currentTime = date('Y-m-d G:i:s');

			//connect to database
			$dbConnection = mysqli_connect("localhost", "root", "", "bbs");

			//define queries
			$dbSelectAll 		= 	"SELECT * 
							 	  	FROM guestbook;";

			$dbInsertUserInput 	= 	"INSERT INTO guestbook 
									VALUES (
									'$firstName', 
									'$lastName', 
									'$userEmail', 
									'$userEntry',
									'$currentTime'
									);";


			//insert user input into database
			if (mysqli_query($dbConnection, $dbInsertUserInput)) {
				echo "Ihr Eintrag wurde erfolgreich gespeichert";
			} else {
				echo "Ihr Eintrag wurde nicht erfolgreich gespeichert.";
				echo mysqli_error($dbConnection);
			}


			//print all eintries
			$allEntries = mysqli_query($dbConnection, $dbSelectAll);


			//table header
			//TODO make it pretty
			echo "<table border>";
				echo "<tr>";

					echo toTd(bold("Name"));
					echo toTd(bold("Nachname"));
					echo toTd(bold("eMail"));
					echo toTd(bold("Eintrag"));
					echo toTd(bold("Wann"));
			
			echo "</tr>";

			//database data
			while($data = mysqli_fetch_assoc($allEntries)) {
				echo "<tr>";

					echo toTd($data['firstName']);
					echo toTd($data['lastName']);
					echo toTd($data['userEmail']);
					echo toTd($data['userEntry']);
					echo toTd($data['entryDate']);

				echo "</tr>";
			}

			echo "</table>";
		}

	?>

	<!-- make a pretty button out of it-->
	<a href="/php_guestbook/src/admin.php">Admin</a>
</body>
</html>