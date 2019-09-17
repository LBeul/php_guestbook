<!-- This page manages contents of the guestbook table-->

<!DOCTYPE html>
<html>
<head>
	<title>TF Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/table.css">
	<link rel="stylesheet" type="text/css" href="../css/error.css">
</head>
<body>
	<div class='container'>
		<h1 id='logo'>TeacherFeedback</h1>
	<?php

		// Open session
		session_start();

		// Database connection
		$dbConnection = mysqli_connect("localhost", "root", "", "bbs");

		// HELPER FUNCTIONS

		// Turns given string into table cell (<td>)
		function toTd($str) {
			return "<td>$str</td>";
		}

		// Turns given string into table header cell (<th>)
		function toTh($str) {
			return "<th>$str</th>";
		}

		// Adds boldness to given string (<b>)
		function bold($str) {
			return "<b>$str</b>";
		}

		// Button function to keep clear code 
		function deleteEntry($id) {

			// Connect to database
			$dbConnection = mysqli_connect("localhost", "root", "", "bbs");

			// Delete query 
			$dbDeleteEntry = "DELETE FROM guestbookEntry 
								WHERE guestbookEntry.ID = $id ;";

			// Execute deletion process
			if (mysqli_query($dbConnection, $dbDeleteEntry)) {
				echo "Eintrag wurde erfolgreich gelöscht.";

				// Go back
				header("Location: admin.php");
			} else {
				// FIXME: Remove error logging in production build!
				echo mysql_error($dbConnection);
			}
		}

	// if password entered
	if (isset($_SESSION['adminPassword'])) {
		$adminPassword = $_SESSION['adminPassword'];

		// if password is right
		if ($adminPassword == "root") {
			if (!isset($_POST['delete'])) {

				// Open form
				echo "<form method='post' action=''>";
				
				// Database connection
				$dbConnection = mysqli_connect("localhost", "root", "", "bbs");

				// Query all users
				$dbSelectAllUsers = "SELECT * FROM guestbookUser ;";
				
				$users = mysqli_query($dbConnection, $dbSelectAllUsers);
				echo mysqli_error($dbConnection);

				// Loop through assoc array containing the user data
				while($data = mysqli_fetch_assoc($users)) {	

					// Temporarily store data 
					$fullName = $data['firstName']." ".$data['lastName'];
					$userEmail = $data['userEmail'];
					$userKey = $data['userEntryKey'];

					// Wrap each user's data into div
					echo "<div class='adminOverviewDiv' id='$userKey'>";

					// Print user info
					echo "
						<h2>$fullName</h2>
						<p>".bold("E-Mail").": <a href=mailto:$userEmail>$userEmail</a></p>
						<p>".bold("Key").": $userKey</p>";

					// Print user's entries
					$dbSelectAllEntries = "SELECT * FROM guestbookEntry WHERE userEntryKey = '$userKey' 
						ORDER BY entryDate ;";

					// Get all entries
					$entries = mysqli_query($dbConnection, $dbSelectAllEntries);
					echo mysqli_error($dbConnection);

					// Initialize table
					echo "<table>";

					// Generate table head 
					echo "<thead>";
						echo "<tr>";
							echo toTh(bold("Eintrag"));
							echo toTh(bold("Datum"));
							echo toTh(bold("ID"));
							echo toTh(bold("Löschen"));
						echo "</tr>";
					echo "</thead>";

					// Loop through entries array
					while ($entry = mysqli_fetch_assoc($entries)) {

						// Temporarily store all variables
						$entryText = $entry['entry'];
						$entryDate = $entry['entryDate'];
						$entryID = $entry['ID'];

						// Display varibales in table
						echo "<tr>";
							echo toTd($entryText);
							echo toTd($entryDate);
							echo toTd($entryID);
							echo "
								<td>
									<input type='checkbox' name=$entryID value=$entryID />
								</td>";

						echo "</tr>";
					}

					// Close table
					echo "
							</table>
						</div>";
				}

				// Delete button
				echo "<input class='delete-btn' type='submit' name='delete' value='Ausgewählte Einträge löschen' />";

			echo "</form>";
		} else {
			// Check which entries are to be deleted

			// SQL query
			$dbGetAllEntries = "SELECT ID FROM guestbookEntry ;";

			// Query the data and listen for errors
			$allEntriesKeys = mysqli_query($dbConnection, $dbGetAllEntries);
			echo mysqli_error($dbConnection);

			// Loop through all entries looking for those marked to be deleted
			while($entry = mysqli_fetch_assoc($allEntriesKeys)) {

				// Validate if "delete" checked
				if (isset($_POST[$entry['ID']]) && $_POST[$entry['ID']] == $entry['ID']) {

					// If so -> delete entry
					deleteEntry($entry['ID']);
				}
			}

		} 

		// Display logout button if isn't logged out yet
		if(!isset($_POST['logout'])) {
			echo "	
				<form method='post' action=''>
						<input type='submit' name='logout' value='Abmelden' class='logout-btn'>
				</form>";
		} else {
			session_destroy();
			header("Location: index.php");
		}


		} else {
			echo "
			<div class='error'>
				<p> Falsches Passwort </p>
				<a class='retry-link' href='adminLogin.php'> Zurück zur Anmeldung </a>
			</div>";
		}

	} else {
		echo "
		<div class='error'>
			<p>Du bist leider nicht angemeldet!</p>
			<a class='retry-link' href='adminLogin.php'> Zur Anmeldung </a>
		</div>";
	}

	// Close db connection
	mysqli_close($dbConnection);


	?>
</div>

</body>
</html>