<?php

require_once("model/Manager.php");

class ConnexionManager extends Manager
{
	
	public function Connexion($pseudo, $pass)
	{
		$int = 0;

		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, pass FROM user where pseudo = :pseudo');
		$req->execute(array(
			'pseudo' => $pseudo));

		$result = $req->fetch();
		
			if ($pass == $result['pass'])
			{
				return true;
			}
			else
			{
				return false;
			}
	}
}