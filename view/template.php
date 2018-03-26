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

            .new_content {
                margin-bottom: 10px;
            }

            .new_button {
                width: 100%;
            }

            .glyphicon.glyphicon-arrow-down 
            {
                font-size: 60px;
            }

            @media (max-width: 992px) {
            .glyphicon.glyphicon-arrow-down {
                    display: none;
                }
            }

        </style>

        <script type="text/javascript">
            document.getElementById("myLink").href = document.URL;
        </script>
<!--
   Header
-->
<?php
include_once('view/header.php')
?>
    </head>
<!--
   Appel de la vue requise par le controller
-->
    <a name="Scroll"></a> 
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
