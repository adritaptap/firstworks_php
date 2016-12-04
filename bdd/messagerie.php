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
	<div class="background-image"></div>
	<h1>Messagerie</h1>

	<form action="messagerie_post.php" method="post" class="form-horizontal">
		<div class="form-group">
			<label for="nom">Pseudo
				<input type="text" name="nom" class="form-control"/>
			</label>
		</div>
		<div class="form-group">
			<label for="message">Message
				<input type="text-area" name="message" class="form-control"/>
			</label>
		</div>
		<div class="form-group">
			<button type="submit" alue="envoyer" class="btn btn-succes">Envoyer</button>
		</div>
	</form>

	<div class="message">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Pseudo</th>
					<th>Message</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
			
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


				$request = $bdd->query('SELECT * FROM messagerie ORDER BY ID DESC');
				while ($donnees = $request->fetch()) {
					echo '<tr><td><strong>' . $donnees["pseudo"] . ' :</strong></td><td> ' . $donnees["message"] . '</td><td> ' . $donnees["date_creation"] . '</td></tr>';
				}

				$request->closeCursor();

				?>
				
			</tbody>
		</table>
	</div>


</body>
</html>