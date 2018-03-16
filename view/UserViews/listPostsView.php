<div class ="container" id="ListPost">
	<h2>Liste des derniers chapitres</h2>
<?php
foreach($posts as $key => $post)
{
?>
 		<div class ="row">
			<h3>
				<a href="index.php?action=post&amp;id=<?= $post->getId(); ?>"><?= htmlspecialchars_decode($post->getTitle()); ?></a>
					<small class ="text-muted">en date du <?= $post->GetCreationDate(); ?></small>
			</h3>
				
			
			<article class ="col-lg-12">
				<?= substr(nl2br(htmlspecialchars_decode($post->getContent())), 0, 500); ?>...
				<em><a href="index.php?action=post&amp;id=<?= $post->getId(); ?>">  Voir plus</a></em>
			</article>
		</div>
<?php
}
?>
</div><br />


<div class = container align="right">
<?php	
$nbPages = ceil($total / 5);
for ($i=1; $i<=$nbPages; $i++ )
{
?>
		<a href='index.php?action=listPosts&amp;id=<?= $i ?>'><button class="btn btn-secondary"><?=$i?></button></a>
	
<?php
	if ($i > 3) {
?>		
		<a href='index.php?action=listPosts&amp;id=<?= $nbPages ?>'>Dernière page </a>
	
<?php		
	}
}
?>
</div>

	
