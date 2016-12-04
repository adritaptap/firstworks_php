<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8" />

	<title>Mon super site</title>

</head>



<body>

<?php

	echo'<p>Bonjour '. htmlspecialchars($_POST['prenom']) . ' ' . htmlspecialchars($_POST['nom']) . '</p>';

	if ($_POST['password'] == 'kangourou') {
		echo "<h1>Voici les codes d'accès :</h1>

        <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>   

        

        <p>

        Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />

        La NASA vous remercie de votre visite.

        </p>";
	}
	
	else {
		echo "<p>Acces refusé !<p>";
	}



	?>


	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>

</html>