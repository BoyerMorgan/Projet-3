<?php

require_once("model/Manager.php");
require_once("model/CommentModel.php");

class CommentManager extends Manager
{

	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare ('SELECT id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date');
		$comments->execute(array($postId));

		//Hydratation
		$commentModel = array();
		while ($comment = $comments->fetch())
		{
			$commentModel = new CommentModel();
			$commentModel->hydrate($comment);
			$commentModels[] = $commentModel;
		}

		if (!empty($commentModels))
		{
		return $commentModels;
		}
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));

		return $affectedLines;
	}

	public function Report($id)
	{
		$db = $this->dbConnect();
		$comment = $db->prepare('UPDATE comments SET report=report+1 WHERE id =:id ');
		$affectedLine = $comment->execute(array('id' => $id));

		return $affectedLine;
	}

	public function getReports()
	{
		$db = $this->dbConnect();
		$reports = $db->query('SELECT id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE report > 0');

		//Hydratation
		$reportModel = array();
		while ($report = $reports->fetch())
		{
			$reportModel = new CommentModel();
			$reportModel->hydrate($report);
			$reportsModel[] = $reportModel;
		}
		
		return $reportsModel;
	}

	public function ValidateComment($id)
	{
		$db = $this->dbConnect();
		$isvalid = $db->prepare('UPDATE comments SET report = :report WHERE id = :id');
		$affectedLine = $isvalid->execute(array(
			'id' => $id,	
			'report' => 0
		));

		return $affectedLine;

	}

	public function Delete($id)
	{
		$db = $this->dbConnect();
		$delete = $db->prepare('DELETE FROM comments WHERE id = :id' );
		$affectedLine = $delete->execute(array('id' => $id));

		return $affectedLine;
	}

	public function GetPostId($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT post_id FROM comments WHERE id = :id');
		$req->execute(array('id' => $id));
		$postId = $req->fetch()['post_id'];

		return $postId;
	}
}