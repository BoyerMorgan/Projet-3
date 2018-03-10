<?php
require('controller/controller.php');

ob_start(); 
try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPosts') {
			listPosts();
		}
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				post();
			}
			else {
				echo 'Erreur : aucun identifiant de billet envoyé';
			}
		}
		elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['author']) && (!empty($_POST['comment']))) {
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				else { echo 'Erreur : Tous les champs doivent être remplis !'; }
			}
			else { echo 'Erreur : aucun identifiant de billet envoyé'; }
		}
	}
	else {
		listPosts();
	}
}
catch(Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}
$content = ob_get_clean();

require('view/template.php');	

