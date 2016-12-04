<!DOCTYPE html>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>cv_adrien</title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
	  </head>
	  <body>

<?php 

$noms = array('robert', 'michel', 'peter', 'vivanne');
$personne = array('age' => 28, 'prenom' => 'Adrien', 'nom' => 'Juhem');



if(in_array('michel', $noms)) {
	echo "<p>il y a un michel dans ta liste connard !</p>";
}

if (in_array('ps', $noms)) {
	echo "<p>il y a un ps !</p>";
}
else{
	echo "<p>Il n'y a pas de PS ici !</p>";;
}