<!-- This page manages contents of the guestbook table-->

<!DOCTYPE html>
<html>
<head>
	<title>Admin-Verwaltung</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		include 'entryClass.php';

		if(!isset($_POST["submit"])) 
		{

			echo "
				<h1>Willkommen in der Admin Seite des Gästebuches</h1>
				<p>Bitte geben Sie das Adminpasswort ein<p>

			<form method='POST'>
					<input type='password' name='password'/>
					<input type='submit' name='submit'/> 
			<form/>";

		} 
		else 
		{
			$password = $_POST['password'];
			
			// If password is wrong
			if($password != "root") 
			{
				echo "Falsches Passwort";
			}
			else 
			{
				// This array stores all entries as objects 
				$allEntries = array();
				
				// Database connection
				$dbConnection = mysqli_connect("localhost", "root", "", "bbs");

				// Querry
				$dbSelectAllUsers = "SELECT 
										guestbookuser.firstName AS firstName,
										guestbookUser.lastName AS lastName,
										guestbookUser.userEmail AS userEmail,
										guestbookUser.userEntryKey AS entryKey,
										guestbookUser.password AS userPassword
										FROM guestbookUser ;";
				
				$users = mysqli_query($dbConnection, $dbSelectAllUsers);
				echo mysqli_error($dbConnection);

				while($data = mysqli_fetch_assoc($users)) {	

					// Temporarily store data 
					$fullName = $data['firstName']." ".$data['lastName'];
					$userEmail = $data['userEmail'];
					$userKey = $data['entryKey'];
					$userPassword = $data['userPassword'];

					// Print user info
					echo "<h1>$fullName</h1>";
					echo "<ul>
							<li><b>E-mail</b>: <a href=mailto:$userEmail>$userEmail</a></li>
							<li><b>Key</b>: $userKey</li>
							<li><b>Schlüssel</b>: $userPassword</li>
						</ul>";

					// Print all user's entries

					$dbSelectAllEntries = "SELECT * FROM guestbookEntry
											WHERE userEntryKey = '$userKey' ;";



					// Get all entries
					$entries = mysqli_query($dbConnection, $dbSelectAllEntries);
					echo mysqli_error($dbConnection);

					// Open table
					echo "<div>
						<table border>";

					while ($entry = mysqli_fetch_assoc($entries)) {
						// Temporarily store all variables
						$entryText = $entry['entry'];
						$entryDate = $entry['entryDate'];
						$entryID = $entry['ID'];

						// TODO make it pretty :)
						// Maybe grid or smth
						echo "<tr>
								<td>$entryText</td>
								<td>$entryDate</td>
								<td><b>$entryID</b></td>
							</tr>";
					}
					// Close table
					echo "
							</table>
						</div>";
				}
			}
		}

	?>
</body>
</html>