<?php

namespace controllers;

require_once dirname(__DIR__) . './autoload.php';

class Login
{
	protected $login;

	public function __construct()
	{
		$this->login = new \models\Login();
	}

	public function userLog()
	{
		if (isset($_POST['submit-login'])) {
			$email = htmlspecialchars($_POST['email']);
			$password = htmlspecialchars($_POST['password']);

			$sql = $this->login->signIn($email);

			if ($user = $sql->fetch()) {
				$db_id = $user['user_id'];
				$db_email = $user['email'];
				$db_pass = $user['password'];

				// password verifiy en cas de step up
				if ($password === $db_pass) {
					$_SESSION['id'] = $db_id;
					$_SESSION['email'] = $db_email;

					// echo "<div class='blue'>Vous êtes connecté</div>";
					// header('Location: login.php');
				} else {
					echo "<div class='red'>Identifiants non reconnus.</div>";
				}
			} else {
				echo "<div class='red'>Identifiants inconnus.</div>";
			}
		} 
	}
};
