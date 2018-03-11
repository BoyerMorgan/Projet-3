<?php

require_once("model/Manager.php");


class PostManager extends Manager {

	public function getFivePosts()
	{
		$perPage = 5;
		$cPage = 1;
		$db = $this->dbConnect();
		$posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT '.(($cPage-1)*$perPage).', '.$perPage.'');

		return $posts;
	}

	public function getPosts()
	{
		$db = $this->dbConnect();
		$posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');

		return $posts;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function count()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT COUNT(id) AS total FROM posts');
		$total = $req->fetch();
		$number_lines = $total['total'];

		return $number_lines;
	}
}	