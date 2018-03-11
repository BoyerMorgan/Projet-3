<?php
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
    <h1>Billet simple pour l'Alaska !</h1>
        
    <body>
        <?= $content ?>
    </body>
    <p>
    	<h3>Espace d'administration</h3>
    	<form action="index.php?action=connexion" method="post">
            <p>
              <input type="text" id="pseudo" name="pseudo" /> 
              <input type="password" id="pass" name="pass" />
              <input type="submit" value="Se connecter" />
            </p>
        </form>
    </p>
</html>