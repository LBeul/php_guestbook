<!-- This page manages contents of the guestbook table-->

<!DOCTYPE html>
<html>
<head>
	<title>Admin-Verwaltung</title>
	<meta charset="utf-8">
</head>
<body>
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

			// Execute 
			if (mysqli_query($dbConnection, $dbDeleteEntry)) {
				echo "Eintrag wurde erfolgreich gelöscht.";

				// Go back
				header("Location: admin.php");
			} else {
				// FIXME: Remove in production build!
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

				// Query
				$dbGroupByDate = "SELECT *
									FROM guestbookEntry 
									GROUP BY entryDate ;";
				
				$entriesByDate = mysqli_query($dbConnection, $dbGroupByDate);
				echo mysqli_error($dbConnection);

				while($data = mysqli_fetch_assoc($entriesByDate)) {	

					echo "<h2>".$data['entryDate']."</h2>";

					// // Temporarily store data 
					// $fullName = $data['firstName']." ".$data['lastName'];
					// $userEmail = $data['userEmail'];
					 $userKey = $data['userEntryKey'];

					echo "<div class='adminOverviewDiv' id='$userKey'>";

					// Print user info
					echo "<h1>$fullName</h1>";
					echo "<ul class='adminOverviewList'>
							<li>".bold("E-Mail").": <a href=mailto:$userEmail>$userEmail</a></li>
							<li>".bold("Key").": $userKey</li>
						</ul>";

					// Print all user's entries
					$dbSelectAllEntries = "SELECT * FROM guestbookEntry
											WHERE userEntryKey = '$userEntryKey' ;";



					// Get all entries
					$entries = mysqli_query($dbConnection, $dbSelectAllEntries);
					echo mysqli_error($dbConnection);

					// Open table
					echo "<table border class='adminOverviewTable'>";

					// Table head 
					echo "<tr>";
						echo toTd(bold("Eintrag"));
						echo toTd(bold("Datum"));
						echo toTd(bold("ID"));
						echo toTd(bold("Löschen"));
					echo "</tr>";

					// Print all entries
					while ($entry = mysqli_fetch_assoc($entries)) {

						// Temporarily store all variables
						$entryText = $entry['entry'];
						$entryDate = $entry['entryDate'];
						$entryID = $entry['ID'];

						// TODO: make it pretty :)
						// Maybe grid or sth
						echo "<tr>";
							echo toTd($entryText);
							echo toTd($entryDate);
							echo toTd($entryID);

							echo "<td>
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
				echo "<input type='submit' name='delete' value='Löschen' />
					</form>";
		} else {
			// Check which entries are to be deleted

			// SQL query
			$dbGetAllEntries = "SELECT ID FROM guestbookEntry ;";
		
			$allEntriesKeys = mysqli_query($dbConnection, $dbGetAllEntries);
			echo mysqli_error($dbConnection);

			while($entry = mysqli_fetch_assoc($allEntriesKeys)) {

				// Validate if checked
				if (isset($_POST[$entry['ID']]) && $_POST[$entry['ID']] == $entry['ID']) {

					// If so -> delete entry
					deleteEntry($entry['ID']);
				}
			}

	} 

		} else {
			echo "<h1> Falsches Passwort </h1>";
			echo "<a href='adminLogin.php'> Zurück zur Anmeldung </a>";
		}

	} else {
		echo "<h1> Nicht angemeldet </h1>";
		echo "<a href='adminLogin.php'> Zurück zur Anmeldung </a>";
	}

	mysqli_close($dbConnection);

	// logout and close page
	if(!isset($_POST['logout'])) {
		echo "	<form method='post' action=''>
					<input type='submit' name='logout' value='Abmelden' id='logoutButton'>
				</form>";
	} else {
		session_destroy();

	}

	?>


</body>
</html>