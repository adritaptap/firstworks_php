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
		<p><a href="index.php" class="btn btn-default">Retour</a></p>
		<?php

		$numBlog = htmlspecialchars($_GET['numBlog']);

// Connexion à la base de données
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}

// Récupération de la News
		$req = $bdd->prepare('SELECT ID, titre, message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H h %i min %s s\') AS date_creation_fr FROM blog WHERE ID = :numBlog');

		$req->execute(array('numBlog' => $numBlog));
		$donnees = $req->fetch();
		if (isset($donnees['ID'])) {
			echo '<div class="well well-lg news">
			<h4 class="media-heading text reviews">' . $donnees["titre"] . '</h4>
			<div class="media-date text reviews list-inline">' . $donnees["date_creation_fr"] . '</div>
			<p class="media-comment">' . $donnees["message"] . '</p>     
		</div>';

		$req->closeCursor();
		?>
		<h1>Commentaires</h1>

		<form action="commentaires_post" method="post" class="form-horizontal">'
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
			<?php echo'<input type="hidden" name="id_blog" value="' . $numBlog . '"/>';  ?>
			<div class="form-group">
				<button type="submit" value="envoyer"  class="btn btn-sm btn-success text-uppercase"><span class="glyphicon glyphicon-share-alt"></span> Commenter !</button>
			</div>
		</form>





		<div class="media-body news">



			<?php

			$req = $bdd->prepare('SELECT auteur, message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM commentaire WHERE id_blog = :numBlog2 ORDER BY date_creation');

			$req->execute(array('numBlog2' => $numBlog));

			while ($donnees = $req->fetch()) {

				echo '<div class="well well-lg">
				<div class="media-date text reviews list-inline"><strong> ' . $donnees["auteur"] . ' </strong> ' . $donnees["date_creation_fr"] . '</div>
				<p class="media-comment">' . $donnees["message"] . '</p>           
			</div>';
		}

		$req->closeCursor();
	}
	else
	{
	echo "<h1>Erreur : Désolé mais ce commentaire n'existe pas !</h1>";
	}


	?>


</div>

</div>


</body>
</html> 