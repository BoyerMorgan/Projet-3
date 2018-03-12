<h2>Bienvenue <?= $_SESSION['pseudo']?> sur votre espace d'administration</h2>

<h3>Voici les <?=$total?> articles que vous avez mis en ligne</h3>	

	<div class = "listNews">
<?php
while ($data = $posts->fetch())
{
?>
		<table border ="1" cellpadding="15">
			<tr>
				<th><?= htmlspecialchars($data['title']); ?></th><td><?= substr(nl2br(htmlspecialchars($data['content'])), 0, 50); ?>...</td>
					<td><a href="index.php?action=Modify&amp;id=<?= $data['id']; ?>">Modifier</a></td>
			</tr>
		</table>

<?php
}

while ($comment = $report->fetch())
{
?>
	<p>Ce commentaire a été signalé <?= $comment['report']?> fois : </p>
<p>	
	<strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> :<br />
	<?= nl2br(htmlspecialchars($comment['comment'])) ?>
	<a href="index.php?action=Valider&amp;id=<?= $comment['id']; ?>">Valider commentaire</a>
	<a href="index.php?action=Supprimer&amp;id=<?= $comment['id']; ?>"">Supprimer commentaire</a>
</p>

<?php
}
$posts->closeCursor();
?>		
	</div>

<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

