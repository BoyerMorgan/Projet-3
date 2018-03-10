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
    	Espace d'administration
    	<form action="index.php?action=Administration" method="post">
            <p>
            <input type="text" name="Identifiant" />
            <input type="password" name="mot_de_passe" />
            <input type="submit" value="Valider" />
            </p>
        </form>
    </p>
</html>