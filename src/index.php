<!DOCTYPE html>
<html>
<head>
	<title>Gästebuch</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
	<?php

		// Connect to database
		$dbConnection = mysqli_connect("localhost", "root", "", "bbs");

		if(!isset($_POST['submit']))
		{
			//TODO: Swap out Lorem Ipsum for sth useful :D
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
							name='gbEntry' 
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

			// Adds boldness to given string (<b>)
			function bold($str) {
				return "<b>$str</b>";
			}


			// Gather user input 
			$firstName =   $_POST['firstName'];
			$lastName =    $_POST['lastName'];
			$userEmail =   $_POST['userEmail'];
			$userEntry =   $_POST['gbEntry'];
			$currentTime = date('Y-m-d G:i:s');


			// Setup query
			$dbGetUser = "SELECT *
							FROM guestbookUser
							WHERE '$firstName' = firstName AND
									'$lastName' = lastName AND
									'$userEmail' = userEmail ;" ;

			// Execute query
			$resDbGetUser = mysqli_query($dbConnection, $dbGetUser);

			
			// Check if user exists in the database
			if (mysqli_num_rows($resDbGetUser) == 0) {
				echo " tja ";
			} else {
				echo "hallo du ";
			}


			// Insert user input into database
			if(mysqli_query($dbConnection, $dbInsertUserInput)) 
			{
				echo "Ihr Eintrag wurde erfolgreich gespeichert";
			} 
			else 
			{
				echo "Ihr Eintrag wurde nicht erfolgreich gespeichert.";
				// FIXME: Remove in production build!
				echo mysqli_error($dbConnection);
			}
		}
			mysqli_close($dbConnection);

	?>

	<!-- TODO: Make a pretty button out of it-->
	<div class='container'>
			<a href="./adminLogin.php">Admin-Login</a>
	</div>
</body>
</html>