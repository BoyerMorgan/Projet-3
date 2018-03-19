<?php

require_once("model/Managers/Manager.php");
require_once("model/Models/PostModel.php");


class PostManager extends Manager {

	public function getFivePosts($current_page)
	{
		$db = $this->dbConnect();
		$posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate FROM posts ORDER BY creation_date DESC LIMIT '.(($current_page-1)*5).', '.(5*$current_page).'');

		//Hydratation
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

		//Hydratation
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
		$post = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate FROM posts WHERE id = :id');
		$post->bindValue(':id', $postId, PDO::PARAM_INT);
		$post->execute();

		$postModel = array();

		$postModel = new PostModel();
		$postModel->hydrate($post->fetch());
		$postModels[] = $postModel;

		return $postModels;
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
		$update = $db->prepare('UPDATE posts SET title = :title, content = :content  WHERE id = :id');
		$update->bindValue(':title', $title, PDO::PARAM_STR);
		$update->bindValue(':content', $content, PDO::PARAM_STR);
		$update->bindValue(':id', $id, PDO::PARAM_INT);

		$affectedLine = $update->execute();

		return $affectedLine;
	}

		public function PostContent($title, $content)
	{
		$db = $this->dbConnect();
		$post = $db->prepare('INSERT INTO posts(title, content, creation_Date) VALUES(?, ?, NOW())');
		$affectedLines = $post->execute(array($title, $content));

		return $affectedLines;
	}

		public function Delete($id)
	{
		$db = $this->dbConnect();
		$delete = $db->prepare('DELETE FROM posts WHERE id = :id' );
		$delete->bindValue(':id', $id, PDO::PARAM_STR);
		$affectedLine = $delete->execute();

		return $affectedLine;
	}
}	