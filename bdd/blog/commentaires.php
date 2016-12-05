<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Messagerie</title>

	<link href="css/normalize.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">


</head>

<body>
	<div class="container">
		<?php

		$id_blog = $_GET['blog'];
// Connexion à la base de données
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}

// Récupération du billet
		$req = $bdd->prepare('SELECT ID, titre, message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh %imin %ss\') AS date_creation_fr FROM blog WHERE ID = :id_blog');

		$req->execute(array('id_blog' => $id_blog));
		$donnees = $req->fetch();

		echo '<div class="well well-lg news">
		<h4 class="media-heading text reviews">' . $donnees["titre"] . '</h4>
		<div class="media-date text reviews list-inline">' . $donnees["date_creation_fr"] . '</div>
		<p class="media-comment">' . $donnees["message"] . '</p>     
	</div>';

	
	?>
	<h1>Commentaires</h1>

<!-- 	<form action="messagerie_post2.php" method="post" class="form-horizontal">
		<div class="form-group">
			<label for="message">Message
				<input type="text" name="message" class="form-control"/>
			</label>
		</div>
		<div class="form-group">
			<label for="auteur">Nom
				<input type="text" name="auteur" class="form-control"/>
			</label>
		</div>
		<div class="form-group">
			<button type="submit" value="envoyer"  class="btn btn-sm btn-success text-uppercase"><span class="glyphicon glyphicon-share-alt"></span> Commenter !</button>
		</div>
	</form>
 -->





	<div class="media-body news">



		<?php

		$req->closeCursor();
		$id_blog = $_GET['blog'];
		$req = $bdd->query('SELECT ID, message, auteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh %imin %ss\') AS date_creation_fr FROM Commentaire WHERE id_blog  ORDER BY date_creation_fr');


		while ($donnees = $req->fetch()) {

			echo '<div class="well well-lg">
			<div class="media-date text reviews list-inline"><strong> ' . $donnees['auteur'] . ' </strong> ' . $donnees["date_creation_fr"] . '</div>
			<p class="media-comment">' . $donnees["message"] . '</p>           
		</div>';
	}

	$req->closeCursor();

	?>


</div>

</div>


</body>
</html>