<h2>Liste des derniers chapitres</h2>
<?php
foreach($posts as $key => $post)
{
?>
	<div class="news">
			<h3>
				<a href="index.php?action=post&amp;id=<?= $post->getId(); ?>"><?= htmlspecialchars_decode($post->getTitle()); ?></a>
				en date du <em><?= $post->GetCreationDate(); ?></em>
			</h3>
			<p>
				<?= substr(nl2br(htmlspecialchars_decode($post->getContent())), 0, 500); ?>...
				<br /><br /><em><a href="index.php?action=post&amp;id=<?= $post->getId(); ?>">Voir plus</a></em>
			</p>
	</div>
<?php
}
$nbPages = ceil($total / 5);
for ($i=1; $i<=$nbPages; $i++ )
{
?>
<a href='index.php?action=listPosts&amp;id=<?= $i ?>'><?=$i?></a>
<?php
	if ($i > 3) {
?>		
		<a href='index.php?action=listPosts&amp;id=<?= $nbPages ?>'>Dernière page </a>
<?php		
	}
}
?>

	
