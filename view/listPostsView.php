<h2>Liste des derniers chapitres</h2>
<?php
while ($data = $posts->fetch())
{
?>
	<div class="news">
			<h3>
				<?= htmlspecialchars($data['title']); ?>
				en date du <em><?= $data['creation_date_fr']; ?></em>
			</h3>

			<p>
				<?= substr(nl2br(htmlspecialchars($data['content'])), 0, 500); ?>...
				<em><a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Voir plus</a></em>
			</p>
	</div>
<?php
}
$posts->closeCursor();
?>

	
