<?php
foreach($post as $key => $req) {
?>

<div class = "container">
    <div class="row">
        <h2 align ="center">
             <?= htmlspecialchars_decode($req->getTitle()) ?>
                <br/><small class ="text-muted">le <?= $req->getCreationDate(); ?></small>
        </h2>
    </div>
    <div class = "row">
            <p>
        <?= nl2br(htmlspecialchars_decode($req->getContent())); ?>
            </p>     
    </div>  
</div>
<?php
}
?>

<div class = "container">
    <div class = "row" align="right">
            <br />
            <a href="index.php"><button class="btn btn-primary">Retour à la liste des billets</button></a>
    </div>
    <legend>
        <div class ="row" id="Commentaires">
            <h3>Commentaires</h3>
        </div>
            <form action="index.php?action=addComment&amp;id=<?= $req->getId() ?>" method="post">
                <div class ="form-group">
                    <label id="auteurcommentaire" for="author" class="control-label">Auteur</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div class ="form-group">
                    <label id="commentaire" for="comment" class="control-label">Commentaire</label><br />
                    <textarea class ="form-control "id="comment" name="comment"></textarea>
                </div>
                <div class ="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span>Envoyer</button>
                </div>
            </form>
    </legend>

    <fieldset>
    <?php
if (!empty($comments))
{ 
    foreach ($comments as $key => $comment)
    {
    ?>
        <p>
        <strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getCommentDate() ?>
        </p>
        <p>
            <blockquote><?= nl2br(htmlspecialchars($comment->getComment()));?></blockquote>
        </p>
        <a href="index.php?action=Report&amp;id=<?= $comment->getId() ?>">
            <button class="btn btn-secondary">Signaler commentaire</button>
        </a> 
            <strong>[<?=$comment->getReport();?>]</strong><br /><br />

    <?php      
    }
}
else {
?>
<p>Aucun commentaire pour cet article</p>

<?php
}
    ?>
    </fieldset>
</div>

