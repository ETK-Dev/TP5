<?php
	session_start();
	if(!isset($_SESSION['valid']))
		{
		header('Location: index.php');
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Captchas valide</title>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<header>
			<div>
				<h1 class="h1ses">Code valide avec succes !</h1>
			</div>
			<div id="logout">
				<a href="destroy_session.php">Deconnexion</a>
			</div>
		</header>
	</div>
</body>
</html>