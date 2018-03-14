<?php

require_once("model/Manager.php");
require_once("model/PostModel.php");


class PostManager extends Manager {

	public function getFivePosts()
	{
		$perPage = 5;
		$cPage = 1;
		$db = $this->dbConnect();
		$posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate FROM posts ORDER BY creation_date DESC LIMIT '.(($cPage-1)*$perPage).', '.$perPage.'');

		$postModel = array();
		while ($post = $posts->fetch())
		{
			$postModel = new PostModel();
			$postModel->hydrate($post);
			$postModels[] = $postModel; 
		}
		return $postModels;
	}

	public function getPosts()
	{
		$db = $this->dbConnect();
		$posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate FROM posts ORDER BY creation_date DESC');

		$postModel = array();
		while ($post = $posts->fetch())
		{
			$postModel = new PostModel();
			$postModel->hydrate($post);
			$postModels[] = $postModel; 
		}
		return $postModels;

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

	public function UpdateContent($id, $content, $title)
	{
		$db = $this->dbConnect();
		$update = $db->prepare('UPDATE posts SET title = :title, content = :content,  WHERE id = :id');
		$update->bindValue(':title', $title, PDO::PARAM_STR);
		$update->bindValue(':content', $content, PDO::PARAM_STR);
		$update->bindValue(':id', $id, PDO::PARAM_INT);

		$affectedLine = $update->execute();

		return $affectedLine;
	}

		public function postContent($title, $content)
	{
		$db = $this->dbConnect();
		$post = $db->prepare('INSERT INTO posts(title, content, creation_Date) VALUES(?, ?, NOW())');
		$affectedLines = $post->execute(array($title, $content));

		return $affectedLines;
	}
}	