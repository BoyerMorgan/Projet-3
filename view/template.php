<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link href="public/css/bootstrap.min.css" rel="stylesheet" />
        <title>Billet simple pour l'Alaska</title>
        <style type="text/css">
            img {
                width: 100%;
            }

            #ListPost {
             background-color:white; 
             padding-left: 50px;  
             padding-bottom: 20px; 
            }

            blockquote {
                font-size: 1.1em;
            }

            #auteurcommentaire, #commentaire {
                font-size: 16px;
            }

            .jumbotron {
                padding-top: 2px;
                padding-bottom: 0px;
                margin-top: 15px;
            }

        </style>
    </head>
      
    <body>
        <div class ="container-fluid">
            <div class="jumbotron">
            <header class ="page-header">
                    <img class="img-responsive img-rounded"src="public/images/Alaska.jpg" alt="Responsive image">
                <h1 align="center">Billet simple pour l'Alaska<br/><small class ="text-info">un livre de Jean Forteroche</small></h1>
            </header>
            </div>
         </div>
        <?= $content ?>
    </body>

<fieldset style= "margin-bottom: 15px">
    <br/>
<div class = "container" align="right">
<?php        
    if (isset($_SESSION['is_logged']) && $_SESSION['is_logged'] == true) { 
        if ((isset($_GET['action']) && $_GET['action'] != 'Administration') || !isset($_GET['action'])) {
?>          <section class ="row-sm-4">  
                <a href="index.php?action=deconnexion"><button class="btn btn-secondary">Déconnexion</button></a>
                <a href="index.php?action=Administration"><button class="btn btn-secondary">Page d'administration</button></a>
            </section>
<?php
        }
        else if  (isset($_GET['action']) && $_GET['action'] == 'Administration') {
?> 

     <a href="index.php?action=deconnexion"><button class="btn btn-secondary">Déconnexion</button></a><br />      
<?php   
        }     
    }
    else { 
?>
    	<legend>Espace d'administration</legend>
    	<form action="index.php?action=connexion" method="post">
           
                <div class ="form-inline">
                  <label for="text" class="control-label">
                        <small class="text-muted">Identifiant :</small>
                  </label>
                        <input class="form-control input-sm" type="text" id="pseudo" name="pseudo"/> 
                   <label for="password" class="control-label">
                        <small class="text-muted">Mot de passe :</small>
                   </label>
                        <input class="form-control input-sm" type="password" id="pass" name="pass" />
                  <input class="btn btn-primary btn-sm" type="submit" value="Se connecter" />
                </div>
           
        </form>
<?php
    }
?>      
        </fieldset> 
    </div>
</html>