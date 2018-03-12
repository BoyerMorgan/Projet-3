<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnexionManager.php');

function listPosts()
{
	$postManager =new PostManager();
	$posts = $postManager->getFivePosts();
	$total = $postManager->count();

	require('view/listPostsView.php');
}

function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	require('view/postView.php');
}

function addComment($postId, $author, $comment)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComment($postId, $author, $comment);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function PageAdmin()	
{
	if (isset($_SESSION['is_logged']) && $_SESSION['is_logged'] == true )
	{	
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$posts = $postManager->getPosts();
		$total = $postManager->count();
		$reports = $commentManager->getReports();
		
		require('view/AdminView.php');
	}
	else require('view/ConnexionView.php');
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

function IsValid($id)
{
 	$commentManager = new CommentManager();

 	$isvalid = $commentManager->ValidateComment($id);

 	if ($isvalid === false) {
		
		throw new Exception('Impossible de valider le commentaire !');
	}
	else {
		header('Location: index.php?action=Administration');
	}
}

function DeleteComment($id)
{
	$commentManager = new CommentManager();

	$isvalid = $commentManager->Delete($id);

	if ($isvalid === false) {
		
		throw new Exception('Impossible de supprimer le commentaire !');
	}
	else {
		header('Location: index.php?action=Administration');
	}
}

function Report($id)
{
	$commentManager = new CommentManager();

	$report = $commentManager->Report($id);
	$postId = $commentManager->GetPostId($id);

	if ($report === false) {
		
		throw new Exception('Impossible de signaler le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}
