<?php
require_once ("model/Model.php");

class CommentModel extends Model
{
	private $id,
			$post_id,
			$author,
			$comment,
			$comment_date,
			$report;

	//GETTERS

	public function GetId()
	{
		return $this->id;
	}

	public function GetPostId()
	{
		return $this->post_id;
	}

		public function GetAuthor()
	{
		return $this->author;
	}

	public function GetComment()
	{
		return $this->comment;
	}

		public function GetCommentDate()
	{
		return $this->comment_date;
	}

		public function GetReport()
	{
		return $this->report;
	}

	//SETTERS

	public function SetId($id)
	{
		$this->id = $id;
	}

	public function SetPostId($postId)
	{
		$this->postId = $postId;
	}

	public function SetAuthor($author)
	{
		$this->author = $author;
	}

	public function SetComment($comment)
	{
		$this->comment = $comment;
	}

	public function SetCommentDate($comment_date)
	{
		$this->comment_date = $comment_date;
	}

	public function SetReport($report)
	{
		$this->report = $report;
	}	
}