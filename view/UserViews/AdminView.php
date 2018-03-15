<h2>Bienvenue <?= $_SESSION['pseudo']?> sur votre espace d'administration</h2>

<a href = "index.php?action=CreateNew">Créer un nouvel article</a>

<h3>Voici les <?=$total?> articles que vous avez mis en ligne</h3>	

	<div class = "listNews">
<?php
foreach($posts as $key => $post)
{
?>
		<table border ="1" cellpadding="15">
			<tr>
				<th><?= htmlspecialchars_decode(substr($post->getTitle(), 0, 10)); ?></th><td><?= substr(nl2br(htmlspecialchars_decode($post->getContent())), 0, 50); ?>...</td>
					<td><a href="index.php?action=Modify&amp;id=<?= $post->getId(); ?>">Modifier</a></td>
					<td><a href="index.php?action=DeletePost&amp;id=<?= $post->getId(); ?>">Supprimer</a></td>
			</tr>
		</table>

<?php
}
?>
	</div>

<?php
if (!empty($reports))
{
?>
	<h3> Les commentaires suivant ont été signalé</h3>
<?php 	
	foreach ($reports as $key => $report)
	{
?>
		<p>Ce commentaire a été signalé <?= $report->getReport()?> fois : </p>
	<p>	
		<strong><?= htmlspecialchars_decode($report->getAuthor()) ?></strong> le <?= $report->getCommentDate() ?> :<br />
		<?= nl2br(htmlspecialchars_decode($report->getComment())) ?>
		<a href="index.php?action=ValidateComment&amp;id=<?= $report->getId() ?>">Valider commentaire</a>
		<a href="index.php?action=DeleteComment&amp;id=<?= $report->getId() ?>"">Supprimer commentaire</a>
	</p>

<?php
	}
}
else {
?> 
	<h3>Aucun commentaire n'a été signalé</h3>
<?php
}
?>	

	

<p><a href="index.php">Retour à la liste des billets</a></p>

