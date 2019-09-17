<!DOCTYPE html>
<html>
<head>
	<title>Gästebuch</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
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
				<div class='container' id='form-wrapper'>
					<header>Willkommen im Gästebuch</header>
					<div id='description'>
						Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
						invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
						accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
						sanctus est Lorem ipsum dolor sit amet.
					</div>
					<form method='POST'>
						<input type='email' name='userEmail' placeholder='Mailadresse'/>
						<input type='password' name='userPassword' placeholder='Passwort'/>
						<input type='submit' name='login'/>
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
				echo " tja ";
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

	<!-- TODO: Make a pretty button out of it-->
	<div class='container'>
			<a href="./adminLogin.php">Admin-Login</a>
	</div>
</body>
</html>