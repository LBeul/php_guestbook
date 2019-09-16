<!DOCTYPE html>
<html>
<head>
	<title>Verfasse deinen Feedbackbeitrag</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Hallo </h1>

	<?php

		session_start();

		$firstName = $_SESSION['firstName'];
		$lastName = $_SESSION['lastName'];
		$userKey = $_SESSION['userEntryKey'];
		

		echo $firstName; 
		echo $userKey; 
		echo $lastName; 


	?>
</body>
</html>