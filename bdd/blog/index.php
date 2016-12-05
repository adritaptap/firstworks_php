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
			// requete pour recuperer le nombre de billets
			$request = $bdd->query('SELECT COUNT(*) AS nb_billets FROM blog');
			$donnees = $request->fetch();
			$totalMessage = $donnees['nb_billets'];
			$messageParPage = 3;
			$nbPage = ceil($totalMessage / $messageParPage);
			$page = $_GET['page'];

			if(isset($_GET['page'])) //POur rendre toute autre valeur egale a la page 1
			{
				$pageActuelle = intval($_GET['page']);
			}
			else 
			{
				$pageActuelle=1;   
			}

			$pageAffichee = ($pageActuelle - 1) * $nbPage;

			echo "<p>";
			for ( $i = 1; $i <= $nbPage; $i++){
				echo "<a class='btn btn-default' href='index.php?page=" . $i . "' />" . $i;

			}
			echo "</p>";
			// requete pour afficher les billets
			$request = $bdd->query('SELECT ID, titre, message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh %imin %ss\') AS date_creation_fr FROM blog ORDER BY ID DESC LIMIT ' . $pageAffichee . ', ' . $messageParPage . ' ');
			$request->execute(array('page' => $page));
			while ($donnees = $request->fetch()) {

				echo '<div class="well well-lg">
				<h4 class="media-heading text reviews">' . $donnees["titre"] . '</h4>
				<div class="media-date text reviews list-inline">' . $donnees["date_creation_fr"] . '</div>
				<p class="media-comment">' . $donnees["message"] . '</p>
				<a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Répondre</a>
				<a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="commentaires.php?numBlog=' . $donnees["ID"] . '"><span class="glyphicon glyphicon-comment"></span>commentaires</a>
				<a class="btn btn-success btn-circle text-uppercase" data-toggle="collapse" href="#"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a>            
			</div>';
		}

		for ( $i = 1; $i <= $nbPage; $i++){
			echo "<a href='index.php?page=" . $i . " class='btn btn-default'>";

		}


		$request->closeCursor();

		?>


	</div>

</div>


</body>
</html>