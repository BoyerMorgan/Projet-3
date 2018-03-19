<?php

require_once("model/Managers/Manager.php");
require_once("model/Models/CommentModel.php");

class CommentManager extends Manager
{

	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare ('SELECT id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate FROM comments WHERE post_id = ? ORDER BY comment_date');
		$comments->execute(array($postId));

		//Hydratation
		$commentModel = array();
		while ($comment = $comments->fetch())
		{
			$commentModel = new CommentModel();
			$commentModel->hydrate($comment);
			$commentModels[] = $commentModel;
		}
		//Si commentModels est vide, aucun retour
		if (!empty($commentModels))
		{	return $commentModels; }
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
		$comment->bindValue(':id', $id, PDO::PARAM_INT);
		$affectedLine = $comment->execute();

		return $affectedLine;
	}

	public function getReports()
	{
		$db = $this->dbConnect();
		$reports = $db->query('SELECT id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate FROM comments WHERE report > 0');

		//Hydratation
		$reportModel = array();
		while ($report = $reports->fetch())
		{
			$reportModel = new CommentModel();
			$reportModel->hydrate($report);
			$reportsModel[] = $reportModel;
		}
		//Si reportsModel est vide - aucun retour
		if (!empty($reportsModel))
		{	return $reportsModel; }

	}

	public function ValidateComment($id)
	{
		$db = $this->dbConnect();
		$isvalid = $db->prepare('UPDATE comments SET report = :report WHERE id = :id');
		$isvalid->bindValue(':report', 0, PDO::PARAM_INT);
		$isvalid->bindValue(':id', $id, PDO::PARAM_INT);
		
		$affectedLine = $isvalid->execute();

		return $affectedLine;

	}

	public function DeleteComment($id)
	{
		$db = $this->dbConnect();
		$delete = $db->prepare('DELETE FROM comments WHERE id = :id' );
		$delete->bindValue(':id', $id, PDO::PARAM_INT);

		$affectedLine = $delete->execute();

		return $affectedLine;
	}

	public function GetPostId($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT post_id FROM comments WHERE id = :id');
		$req->bindValue(':id', $id, PDO::PARAM_INT);
		$req->execute();

		$postId = $req->fetch()['post_id'];

		return $postId;
	}
}