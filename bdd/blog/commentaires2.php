<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des blog</a></p>
 
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog_test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération du blog
$req = $bdd->prepare('SELECT id, titre, message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM blog WHERE id = ?');
$req->execute(array($_GET['blog']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['message']));
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT auteur, message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM commentaire WHERE id_blog = ? ORDER BY date_creation');
$req->execute(array($_GET['blog']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_creation_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['message'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
</body>
</html>