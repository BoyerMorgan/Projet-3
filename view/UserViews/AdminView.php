<div class ="container">

<h2>Bienvenue <?= $_SESSION['pseudo']?> sur votre espace d'administration</h2>

<a href = "index.php?action=CreateNew"><button class="btn btn-primary">Créer un nouvel article</button></a>

<h3>Voici les <?=$total?> articles que vous avez mis en ligne :</h3>	

	<section class = "col-sm_8 table-responsive">
		<table class ="table table-bordered table-striped table-condensed">
<?php
foreach($posts as $key => $post)
{
?>
		
			<tr>
				<th scope="col-md-5" align="center"><?= htmlspecialchars_decode(substr($post->getTitle(), 0, 10)); ?></th>
				<td><?= substr(nl2br(htmlspecialchars_decode($post->getContent())), 0, 50); ?>...</td>
					<td align="center"><a href="index.php?action=Modify&amp;id=<?= $post->getId(); ?>"><button class="btn btn-primary">Modifier</button></a></td>
					<td align="center"><a href="index.php?action=DeletePost&amp;id=<?= $post->getId(); ?>"><button class="btn btn-primary">Supprimer</button></a></td>
			</tr>
		

<?php
}
?>
		</table>
	</section>

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
		<a href="index.php?action=ValidateComment&amp;id=<?= $report->getId() ?>"><button class ="btn btn-secondary">Valider commentaire</button></a>
		<a href="index.php?action=DeleteComment&amp;id=<?= $report->getId() ?>""><button class ="btn btn-secondary">Supprimer commentaire</button></a>
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
</div>
