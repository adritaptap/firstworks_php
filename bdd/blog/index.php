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

		<h1>Fil des news</h1>

		<form action="messagerie_post.php" method="post" class="form-horizontal">
			<div class="form-group">
				<label for="titre">Titre
					<input type="text" name="titre" class="form-control"/>
				</label>
			</div>
			<div class="form-group">
				<label for="message">Message
					<input type="text-area" name="message" class="form-control"/>
				</label>
			</div>
			<div class="form-group">
				<label for="nom">Nom
					<input type="text" name="nom" class="form-control"/>
				</label>
			</div>
			<div class="form-group">
				<button type="submit" value="envoyer"  class="btn btn-sm btn-success text-uppercase"><span class="glyphicon glyphicon-share-alt"></span> Partage !</button>
			</div>
		</form>






		<div class="media-body news">



			<?php 
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', '', 
					array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}


			$request = $bdd->query('SELECT ID, titre, message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh %imin %ss\') AS date_creation_fr FROM blog ORDER BY ID DESC LIMIT 0 , 5');
			while ($donnees = $request->fetch()) {

				echo '<div class="well well-lg">
				<h4 class="media-heading text reviews">' . $donnees["titre"] . '</h4>
				<div class="media-date text reviews list-inline">' . $donnees["date_creation_fr"] . '</div>
				<p class="media-comment">' . $donnees["message"] . '</p>
				<a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Répondre</a>
				<a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="commentaires.php?blog=' . $donnees["ID"] . '"><span class="glyphicon glyphicon-comment"></span>commentaires</a>
				<a class="btn btn-success btn-circle text-uppercase" data-toggle="collapse" href="#"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a>            
			</div>';
		}

		$request->closeCursor();

		?>


	</div>

</div>


</body>
</html>