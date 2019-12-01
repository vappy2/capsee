<?php
// we call our file with MySQL connection
require_once('model/connexionBddphp');
// create a new Object


class User{
	private $_pseudo;
	private $_password;

//constructeur

	function __construct($pseudo, $password)
	{
		$this->set_das($pseudo);
		$this->set_password($password);
	}


	//accesseurs
	public function set_pseudo($pseudo) {
		$this->_pseudo = $pseudo;
	}
	public function get_das() {
		return $this->_pseudo;
	}

	public function set_password($password) {
		$this->_password = $password;
	}

	// filter the information from Login form.
	function filter($str){
		//convert case to lower
		$str = strtolower($str);
		//remove special characters
		$str = preg_replace('/[^a-zA-Z0-9]/i',' ', $str);
		//remove white space characters from both side
		$str = trim($str);
		return $str;
	}

	// the function for checking date
	function check_user($pseudo,$password){

			$db = new Connection;
			$das = $this -> filter($das);
			$user = $db -> prepare("SELECT idUtilisateur FROM utilisateur WHERE pseudo=:pseudo");
			$user -> execute(array(
				'pseudo' => $pseudo
			));
			if($user -> rowCount() > 0){
				return true;
			}
			else {
				return false;
			}
			return null;
		}
	}
