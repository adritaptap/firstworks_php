<!DOCTYPE html>
<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
 
// On s'amuse à créer quelques variables de session dans $_SESSION
$_SESSION['prenom'] = 'Adrien';
$_SESSION['nom'] = 'Juhem';
$_SESSION['age'] = 28;
?>
<?php 
setcookie('pseudo', 'Adri', time() + 365*24*3600, null, null, false, true); 
setcookie('pays', 'France', time() + 365*24*3600, null, null, false, true);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
 
    <p>
        Salut <?php echo $_SESSION['prenom']; ?> !<br />
        Tu es à l'accueil de mon site (index.php). Tu veux aller sur une autre page ?
    </p>
    
    <p>
        <a href="mapage.php">Lien vers mapage.php</a><br />
        <a href="monscript.php">Lien vers monscript.php</a><br />
        <a href="informations.php">Lien vers informations.php</a>
    </p>
 
    </body>
</html>