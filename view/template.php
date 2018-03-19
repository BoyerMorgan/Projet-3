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
<!--
   Header
-->
<?php
include_once('view/header.php')
?>
    </head>
      
    <body>
        
        <?= $content ?>
    </body>

<!--
   Pied de page 
-->
<?php
include_once('view/footer.php')
?>
</html>
