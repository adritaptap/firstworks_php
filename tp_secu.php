<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

    <title>Mon super site</title>

</head>



<body>
<pre>
<?php
print_r($_GET);
?>
</pre>
    <form action="cible_secu.php" method="POST" enctype="multipart/form-data">

     <div><label for="nom">Nom
        <input type="text" name="nom" id="nom"></label>
    </div> 
    <div><label for="prenom">prénom
        <input type="text" name="prenom" id="prenom"></label>
    </div> 
    <div><label for="password">mot de passe
        <input type="password" name="password" id="password"></label>
    </div> 

    <p><input type="submit" name="envoyer"></p>

</form>


<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>

</html>