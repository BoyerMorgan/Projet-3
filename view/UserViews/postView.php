<p><a href="index.php">Retour à la liste des billets</a></p>
 

    <div class="singlePost">
        <h3>
            <?= htmlspecialchars_decode($post['title']) ?>,
                 le <?= $post['creation_date_fr'] ?>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars_decode($post['content'])) ?>
        </p>
    </div>

    <h2>Commentaires</h2>

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

    <?php
if (!empty($comments))
{ 
    foreach ($comments as $key => $comment)
    {
    ?>
        <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getCommentDate() ?></p>
        <p><?= nl2br(htmlspecialchars($comment->getComment()));?></p><a href="index.php?action=Report&amp;id=<?= $comment->getId() ?>">Signaler commentaire </a>[<?=$comment->getReport();?>]

    <?php      
    }
}
    ?>

