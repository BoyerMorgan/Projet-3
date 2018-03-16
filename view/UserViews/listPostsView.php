<div class ="container" id="ListPost">
	<h2 align="center">Liste des derniers chapitres</h2>
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
				<blockquote>
				<?= substr(nl2br(htmlspecialchars_decode($post->getContent())), 0, 500); ?>...
				<em><a href="index.php?action=post&amp;id=<?= $post->getId(); ?>">  Voir plus</a></em>
				</blockquote>
			</article>
		</div>
<?php
}
?>
</div><br />


<div class = container align="right">
	<ul class="pagination">
<?php	
$nbPages = ceil($total / 5);
for ($i=1; $i<=$nbPages; $i++ )
{
?>	
		<li><a href='index.php?action=listPosts&amp;id=<?= $i ?>'><?=$i?></a></li>
	
	
<?php
	if ($i > 3) {
?>		
		<a href='index.php?action=listPosts&amp;id=<?= $nbPages ?>'>Dernière page </a>
	
<?php		
	}
}
?>
	</ul>
</div>

	
