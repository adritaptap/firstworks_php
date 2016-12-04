

<?php


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', 
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}


$req = $bdd->query('SELECT AVG(prix) AS prix_moyen, console FROM jeux_video WHERE possesseur="Patrick" GROUP BY console HAVING prix_moyen <= 10');
while ($donnees = $req->fetch()) {

	echo '<p>' . $donnees['prix_moyen'] . ' - ' . $donnees['console'] . '</p>';
};
$req -> closeCursor();
?>