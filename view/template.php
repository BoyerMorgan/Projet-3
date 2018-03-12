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
<?php        
    if (isset($_SESSION['is_logged']) && $_SESSION['is_logged'] == true )
    {
?>        
    <a href="index.php?action=deconnexion"><button>Déconnexion</button></a><br />
    <a href="index.php?action=Administration"><button>Page d'administration</button></a>
<?php
    }
    else
    {
?>
    	<h3>Espace d'administration</h3>
    	<form action="index.php?action=connexion" method="post">
            <p>
              <input type="text" id="pseudo" name="pseudo" /> 
              <input type="password" id="pass" name="pass" />
              <input type="submit" value="Se connecter" />
            </p>
        </form>
<?php
}
?>     
    </p>
</html>