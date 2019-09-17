<!-- This page manages contents of the guestbook table-->

<!DOCTYPE html>
<html>
<head>
	<title>Admin-Verwaltung</title>
	<meta charset="utf-8">
</head>
<body>
	<?php

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


		// verify if logged in 
		session_start();
		if (isset($_SESSION['adminPassword'])) {

			$adminPassword = $_SESSION['adminPassword'];

			if ($adminPassword == "root") {

					if (!isset($_POST['delete'])) {

						// Open form
						echo "<form method='post' action=''>";
						
						// Database connection
						$dbConnection = mysqli_connect("localhost", "root", "", "bbs");

						// Query
						$dbSelectAllUsers = "SELECT *
												FROM guestbookUser ;";
						
						$users = mysqli_query($dbConnection, $dbSelectAllUsers);
						echo mysqli_error($dbConnection);

						while($data = mysqli_fetch_assoc($users)) {	

							// Temporarily store data 
							$fullName = $data['firstName']." ".$data['lastName'];
							$userEmail = $data['userEmail'];
							$userKey = $data['userEntryKey'];

							// Print user info
							echo "<h1>$fullName</h1>";
							echo "<ul>
									<li>".bold("E-Mail").": <a href=mailto:$userEmail>$userEmail</a></li>
									<li>".bold("Key").": $userKey</li>
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
				echo "bitte einloggen :)";
			}
		} else {
			echo "bitte einloggends :)";
		}

	mysqli_close($dbConnection);	

	?>
</body>
</html>