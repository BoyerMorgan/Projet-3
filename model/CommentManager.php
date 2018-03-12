<?php

require_once("model/Manager.php");

class CommentManager extends Manager{

	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare ('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date');
		$comments->execute(array($postId));

		return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));

		return $affectedLines;
	}

	public function Report ($id)
	{
		
	}

	public function getReports()
	{
		$db = $this->dbConnect();
		$reports = $db->query('SELECT id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE report > 0');
		
		return $reports;
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
}