<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>
 

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
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
    foreach ($comments as $key => $comment)
    {
    ?>
        <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getCommentDate() ?></p>
        <p><?= nl2br(htmlspecialchars($comment->getComment()));?></p><a href="index.php?action=Report&amp;id=<?= $comment->GetId(); ?>">Signaler commentaire </a>[<?=$comment->getReport();?>]

    <?php      
    }
    ?>

