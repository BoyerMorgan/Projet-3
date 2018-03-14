<?php
session_start();
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
		elseif ($_GET['action'] == 'connexion') {
			Verify($_POST['pseudo'], $_POST['pass']);
		}
		elseif ($_GET['action'] == 'Administration') {
			Pageadmin();
		}
		elseif ($_GET['action'] == 'Modify') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				ModifyPost($_GET['id']);
			}
		}
		else if ($_GET['action'] == 'CreateNew') {
			CreateNewPost();
		}
		else if ($_GET['action'] == 'CreateContent') {
			CreateContent($_POST['newtitle'], $_POST['newcontent']);
		}
		elseif ($_GET['action'] == 'UpdateContent') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				UpdatePost($_GET['id'], $_POST['new_content'], $_POST['new_title']);
			}
		}
		elseif ($_GET['action'] == 'Valider') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
					IsValid($_GET['id']);
				}
		}
		elseif ($_GET['action'] == 'Supprimer') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
					DeleteComment($_GET['id']);
				}
		}
		elseif ($_GET['action'] == 'deconnexion')
		{
			$_SESSION = array();
			session_destroy();
			listPosts();
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
		elseif ($_GET['action'] == 'Report') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				Report($_GET['id']);
			}
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

