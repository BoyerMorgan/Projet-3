<?php

require_once ("model/Models/Model.php");

class PostModel extends Model
{
	private $id,
			$title,
			$content,
			$creation_date;

	//GETTERS

	public function GetId()
	{
		return $this->id;
	}

	public function GetTitle()
	{
		return $this->title;
	}

		public function GetContent()
	{
		return $this->content;
	}


		public function GetCreationDate()
	{
		return $this->creation_date;
	}


	//SETTERS

	public function SetId($id)
	{
		$this->id = $id;
	}

	public function SetTitle($title)
	{
		$this->title = $title;
	}

	public function SetContent($content)
	{
		$this->content = $content;
	}


	public function SetCreationDate($creation_date)
	{
		$this->creation_date = $creation_date;
	}


}