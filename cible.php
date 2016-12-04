<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8" />

	<title>Mon super site</title>

</head>



<body>

<p>Bonjour !</p>

<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo $_POST['prenom']; ?> !</p>

<p>Si tu veux changer de prénom, <a href="index.php">clique ici</a> pour revenir à la page formulaire.php.</p>

	<?php 

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
                        echo "L'envoi a bien été effectué !";
                }
        }
}


	echo'<p>Bonjour '. htmlspecialchars($_POST['prenom']). '</p>';

	if (isset($_POST['vegetarien'])) {
		echo '<p>Vous etes vegetarien.</p>';
	} 
	else {
		echo "<p>Vous n'etes pas vegetarien.</p>";
	}

echo'<p>Vous venez d\'ecrire : '. strip_tags($_POST['message']). '</p>';

	if ($_POST['frites'] == 'oui') {
		echo '<p>Vous aimez les frites.</p>';
	} 
	else {
		echo "<p>Vous n'aimez pas les frites.</p>";
	}



	?>


	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>

</html>