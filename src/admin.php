<!--this page manages contents of the guestbook table-->

<!DOCTYPE html>
<html>
<head>
	<title>Admin-Verwaltung</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		include 'entryClass.php';

		if (!isset($_POST["submit"])) {

		echo "
			<h1>Willkommen in der Admin Seite des Gästebuches</h1>
			<p>Bitte geben Sie das Adminpasswort ein<p>

			<form method='POST'>
				<input type='password' name='password'/>
				<input type='submit' name='submit'/> 
			<form/>
			";

		} else {
			$password = $_POST['password'];
			
			//if wrong password
			if ($password != "root") {
				echo "Falsches Passwort";
			} else {

				//this array stores all entries as objects 
				$allEntries = array();
				
				//database connection
				$dbConnection = mysqli_connect("localhost", "root", "", "bbs");
				$dbSelectAll = "SELECT * FROM guestbook;";

				//get data
				$entries = mysqli_query($dbConnection, $dbSelectAll);


				//table head
				echo "<table border>
						<tr>
							<td><b>Name<b></td>
							<td><b>Nachname<b></td>
							<td><b>Email<b></td>
							<td><b>Eintrag<b></td>
							<td><b>Datum<b></td>
							<td><b>Action<b></td>
						</tr>
				";

				while ($data = mysqli_fetch_assoc($entries)) {	

					//init object 
					$temp = new Entry();

					$temp->setFirstName($data['firstName']);
					$temp->setLastName($data['lastName']);
					$temp->setUserEmail($data['userEmail']);
					$temp->setUserEntry($data['userEntry']);
					$temp->setEntryDate($data['entryDate']);

					//print row
					$temp->printRow();

					echo $temp->generateKey();
					//put $temp into array
					array_push($allEntries, $temp);
				}

				//close table
				echo "</table>";
			}
		}

	?>
</body>
</html>