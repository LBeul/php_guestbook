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
						<input type='email' name='userMail' placeholder='Mailadresse'/>
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
			echo "works";
		}

	?>
</body>
</html>