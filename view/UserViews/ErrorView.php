<div class ="container">
	<div class ="row">
		<strong><p><?= $message ?></p></strong>
	</div>

	<div class = "row">
	    <br />
	    <p><a href="index.php"><button class="btn btn-primary">Retour à la liste des billets</button></a></p>
	
<?php
if ($id > 0)
{
?>
	    <p><a href="index.php?action=post&amp;id=<?= $id ?>"><button class="btn btn-primary">Retour au billet visité</button></a></p>
<?php
}
?>
	</div>
</div>