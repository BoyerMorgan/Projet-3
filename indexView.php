<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Billet simple pour l'Alaska</title>
	<link href="..." rel="stylesheet" />
	</head>

	<body>
		<h1>Billet simple pour l'Alaska !</h1>
		<p>Derniers chapitres en date :</p>

		<?php
		while ($data = $posts->fetch())
		{
		?>
			<div class="news">
				<h3>
					<?= htmlspecialchars($data['title']); ?>
					<em>le <?= $data['creation_date_fr']; ?></em>
				</h3>

					<p>
					
						<?= nl2br(htmlspecialchars($data['content'])); ?>
						<br />
							<em><a href="post?id=<?= $data['id']; ?>">Commentaires</a></em>
					</p>
				</div>
		<?php
		}
		$posts->closeCursor();
		?>
	</body>
</html>