<?php

// Effectuer ici la requête qui insère le message
$id_blog = htmlspecialchars($_POST['id_blog']);
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


$req = $bdd->prepare('INSERT INTO commentaire(message, auteur, id_blog) VALUES(:message, :auteur, :id_blog)');
$req->execute(array(
	'message' => $message,
	'auteur' => $auteur,
	'id_blog' => $id_blog
	));


// Puis rediriger vers minichat.php comme ceci :
header('Location: commentaires.php?numBlog=' . $id_blog );

?>