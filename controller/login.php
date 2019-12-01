<?php
require($path."model/loginClass.php");

//instanciation les variables pseudo et password
$das = $_POST["pseudo"]; //strtoupper
$password = $_POST["password"];

if (!empty($das) && !empty($password)) {
  //instancie une nouvelle authentification puis on fait la connexion

		//On instancie le nouvel utilisateur
		$User = new User($pseudo, $password);
		//on vérifie
		if($User->check_user($pseudo,$password)) {
			echo "";
      session_name('session_capsee');
      session_start();
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['connect'] = true;
		}
		else {
      echo '<p class="text-danger"> Votre pseudo ou votre mot de passe est incorrect </p>';
    }
  }
