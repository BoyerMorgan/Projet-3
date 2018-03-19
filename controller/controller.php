<?php
require_once('model/Managers/PostManager.php');
require_once('model/Managers/CommentManager.php');
require_once('model/Managers/ConnexionManager.php');

/*
* Fonctions d'affichage
*/
function listPosts($idpage)
{
	$postManager =new PostManager();
	$posts = $postManager->getFivePosts($idpage);
	$total = $postManager->count();

	require('view/UserViews/listPostsView.php');
}

function post()
{
	try {
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	}

	catch(Exception $e) {
		exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());		
	}

	require('view/UserViews/postView.php');
}

/*
* Fonctions agissant sur les commentaires
*/
function addComment($postId, $author, $comment)
{
	try {
		$commentManager = new CommentManager();
		$affectedLines = $commentManager->postComment($postId, $author, $comment);
	}

	catch(Exception $e) {
		exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());		
	}

		header('Location: index.php?action=post&id=' . $postId);
}

function Report($id)
{
	try {
		$commentManager = new CommentManager();
		$report = $commentManager->Report($id);
		$postId = $commentManager->GetPostId($id);
	}

	catch(Exception $e) {
		exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());		
	}

	header('Location: index.php?action=post&id=' . $postId);
	
}

function IsValid($id)
{
	try {
 	$commentManager = new CommentManager();
 	$isvalid = $commentManager->ValidateComment($id);
 	}

	catch(Exception $e) {
		exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());		
	}

	header('Location: index.php?action=Administration');
}

function DeleteComment($id)
{
	try {
		$commentManager = new CommentManager();
		$isvalid = $commentManager->DeleteComment($id);
	}

	catch(Exception $e) {
		exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());		
	}

		header('Location: index.php?action=Administration');
}


/*
* Fonctions agissant sur le contenu des articles
*/

function DeletePost($id)
{
	try {
	$PostManager = new postManager();
	$isvalid = $PostManager->Delete($id);
	}

	catch(Exception $e) {
		exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());		
	}

	header('Location: index.php?action=Administration');
}

function ModifyPost($postid)
{
	$postManager = new PostManager();
	$post = $postManager->getPost($postid);
	require('view/UserViews/BackendView.php');
}

function UpdatePost($id, $content, $title)
{
	try {
		$postManager = new PostManager();
		$post = $postManager->UpdateContent($id, $content, $title);
	}

	//if ($post === false) {
		
		//throw new Exception('Impossible de modifier l\'article');
	catch(Exception $e) {
		exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());		
	}

	//}
	//else {
	header('Location: index.php?action=Modify&id=' . $id);
	//}

}

function CreateNewPost()
{
	require('view/UserViews/BackendView.php');
}

function CreateContent($title, $content)
{
	try {
		$postManager = new PostManager();
		$affectedLine = $postManager->PostContent($title, $content);
	}

	catch(Exception $e) {
		exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());		
	}

	header('Location: index.php?action=Administration');
}

/*
* Fonctions d'accès à la page d'administration
*/

function PageAdmin()	
{
	if (isset($_SESSION['is_logged']) && $_SESSION['is_logged'] == true )
	{	
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$posts = $postManager->getPosts();
		$total = $postManager->count();
		$reports = $commentManager->getReports();
		
		require('view/UserViews/AdminView.php');
	}
	else require('view/UserViews/ConnexionView.php');
}

function Verify($pseudo, $pass)
{
	$connexionManager = new ConnexionManager();
	$result = $connexionManager->Connexion($pseudo, $pass);
	if ($result == false)
	{
		$_SESSION['is_logged'] = false;
		echo 'Mauvais identifiant ou mot de passe ';

	}
	else
	{
		$_SESSION['pseudo'] = $pseudo;
		$_SESSION['is_logged'] = true;
		header('Location: index.php?action=Administration');
	}
}





