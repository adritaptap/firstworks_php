<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

    <title>Mon super site</title>

</head>



<body>

    <form action="cible.php" method="POST" enctype="multipart/form-data">

        <p><label for="name"><input type="text" name="prenom" id="prenom"></label></p>
        <p><label for="vegetarien">Etes-vous vegetarien ?<input type="checkbox" name="vegetarien" id="vegetarien"></label></p>
<div>
        <textarea name="message" rows="8" cols="45">
            Votre message ici.
        </textarea>
</div>
<div>
       <label for="pays">D'ou venez vous ?</label>
       <select name="pays" id="pays">
    <option value="France">France</option>
    <option value="Suisse">Suisse</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Allemagne">Allemagne</option>
    </select>
</div>
<div>
    <p>Aimez-vous les frites ?</p>
<input type="radio" name="frites" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
<input type="radio" name="frites" value="non" id="non" /> <label for="non">Non</label>

</div>
<div>
        <p>
                Formulaire d'envoi de fichier :<br />
                <input type="file" name="monfichier" /><br />
        </p>
</div>
        <p><input type="submit" name="envoyer"></p>

    </form>
    

    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>

</html>