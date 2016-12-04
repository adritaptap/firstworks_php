<h1>Veuillez remplir les champs ci-dessous</h1>

<form action="jeux_video4.php" method="post">
	<p>
		<label for="nom">Nom du jeux
			<input type="text" name="nom" />
		</label>
		<label for="console">Type de console
			<input type="text" name="console" />
		</label>
		<label for="possesseur">Prénom du proprietaire
			<input type="text" name="possesseur" />
		</label>
		<label for="nbre_joueurs_max">Nombre de joureurs
			<input type="text" name="nbre_joueurs_max" />
		</label>
		<label for="prix">Prix en euros
			<input type="text" name="prix" />
		</label>
		<label for="commentaires">Commentaires
			<input type="text-area" name="commentaires" />
		</label>
		<input type="submit" value="Valider" />

	</p>
</form>



<?php
$nom = $_POST['nom']; 
$possesseur = $_POST['possesseur'];
$console = $_POST['console']; 
$prix = $_POST['prix']; 
$nbre_joueurs_max = $_POST['nbre_joueurs_max']; 
$commentaires = $_POST['commentaires'];


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', 
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}


$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
$req->execute(array(
	'nom' => $nom,
	'possesseur' => $possesseur,
	'console' => $console,
	'prix' => $prix,
	'nbre_joueurs_max' => $nbre_joueurs_max,
	'commentaires' => $commentaires
	));

echo 'Le jeu a bien été ajouté !';


?>