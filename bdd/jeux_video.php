<?php 
if (isset($_GET['console'])) {
	# code...

	$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
	$request = $bdd->prepare('SELECT * FROM jeux_video WHERE console= ? ORDER BY prix DESC');
	$request->execute(array($_GET['console']));
	while ($donnees = $request->fetch()) {
		echo '<p>' . $donnees["nom"] . ' - ' . $donnees["console"] . ' - ' . $donnees["prix"] . ' euros</p>';

	}
} 
else {
	echo '<h1>Je ne connais pas cette console</h1>';
}
?>