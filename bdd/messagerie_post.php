<?php
// Effectuer ici la requête qui insère le message

$nom = strip_tags($_POST['nom']); 
$message = htmlspecialchars($_POST['message']);

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', 
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}


$req = $bdd->prepare('INSERT INTO messagerie(pseudo, message) VALUES(:nom, :message)');
$req->execute(array(
	'nom' => $nom,
	'message' => $message
	));


// Puis rediriger vers minichat.php comme ceci :
header('Location: messagerie.php');

?>