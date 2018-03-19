<div class ="container">

	<h2 align="center">Bienvenue Jean sur votre espace d'administration</h2>
		<div class ="row">
			<div class ="col-sm-offset-1 col-sm-5 col-xs-12 new_content">
				<a href = "index.php?action=CreateNew"><button class="btn btn-primary btn-lg new_button">Créer un nouvel article</button></a>
			</div>
			<div class ="col-sm-offset-1 col-sm-5 col-xs-12">
				<a href="index.php"><button class="btn btn-primary btn-lg new_button">Retour à la liste des billets</button></a>
			</div>
		</div>

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
	<h3> Les commentaires suivant ont été signalé :</h3>
<?php 	
	foreach ($reports as $key => $report)
	{
?>
	<p>	
		<strong><?= htmlspecialchars_decode($report->getAuthor()) ?></strong> le <?= $report->getCommentDate() ?> - <strong>signalé <?= $report->getReport()?> fois :</strong><br />

			<blockquote>
				<?= nl2br(htmlspecialchars_decode($report->getComment())) ?>
				<a href="index.php?action=ValidateComment&amp;id=<?= $report->getId() ?>"><button class ="btn btn-secondary btn-sm">Valider commentaire</button></a>
				<a href="index.php?action=DeleteComment&amp;id=<?= $report->getId() ?>""><button class ="btn btn-secondary btn-sm">Supprimer commentaire</button></a>
			</blockquote>
		
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
	<div class="row" align="center">
		
	</div>
</div>
