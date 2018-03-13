<h2>Bienvenue <?= $_SESSION['pseudo']?> sur votre espace d'administration</h2>

<h3>Voici les <?=$total?> articles que vous avez mis en ligne</h3>	

	<div class = "listNews">
<?php
foreach($posts as $key => $post)
{
?>
		<table border ="1" cellpadding="15">
			<tr>
				<th><?= htmlspecialchars($post->getTitle()); ?></th><td><?= substr(nl2br(htmlspecialchars($post->getContent())), 0, 50); ?>...</td>
					<td><a href="index.php?action=Modify&amp;id=<?= $post->getId(); ?>">Modifier</a></td>
			</tr>
		</table>

<?php
}
if (!empty($reports))
{
	foreach ($reports as $key => $report)
	{
?>
		<p>Ce commentaire a été signalé <?= $report->getReport()?> fois : </p>
	<p>	
		<strong><?= htmlspecialchars($report->getAuthor()) ?></strong> le <?= $report->getCommentDate() ?> :<br />
		<?= nl2br(htmlspecialchars($report->getComment())) ?>
		<a href="index.php?action=Valider&amp;id=<?= $report->getId() ?>">Valider commentaire</a>
		<a href="index.php?action=Supprimer&amp;id=<?= $report->getId() ?>"">Supprimer commentaire</a>
	</p>

<?php
	}
}
?>		
	</div>

<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

