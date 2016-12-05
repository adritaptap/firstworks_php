<?php
// Effectuer ici la requête qui insère le message

$titre = strip_tags($_POST['titre']); 
$message = htmlspecialchars($_POST['message']);
$auteur = strip_tags($_POST['auteur']); 

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', '', 
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}


$req = $bdd->prepare('INSERT INTO blog(titre, message, auteur) VALUES(:titre, :message, :auteur)');
$req->execute(array(
	'titre' => $titre,
	'message' => $message,
	'auteur' => $auteur
	));


// Puis rediriger vers minichat.php comme ceci :
header('Location: index.php');

?>