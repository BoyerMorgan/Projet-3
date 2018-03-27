<?php
session_start();
require('controller/controller.php');

ob_start(); 
try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPosts') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				listPosts($_GET['id']);
			}
		}
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				post($_GET['id']);
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
		elseif ($_GET['action'] == 'DeletePost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				DeletePost($_GET['id']);
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
		elseif ($_GET['action'] == 'ValidateComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
					IsValid($_GET['id']);
				}
		}
		elseif ($_GET['action'] == 'DeleteComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
					DeleteComment($_GET['id']);
				}
		}
		elseif ($_GET['action'] == 'deconnexion')
		{
			$_SESSION = array();
			session_destroy();
			listPosts(1);
		}
		elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['author']) && (!empty($_POST['comment']))) {
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				else { $message='Erreur : Tous les champs doivent être remplis !'; error($message, $_GET['id']); }
			}
			else { $message= 'Erreur : aucun identifiant de billet envoyé'; error($message, 0); }
		}
		elseif ($_GET['action'] == 'Report') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				Report($_GET['id']);
			}
		}
	}
	else {
		listPosts(1);
	}
}
catch(Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}
$content = ob_get_clean();

require('view/template.php');	

