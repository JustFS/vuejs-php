<?php

namespace models;

require_once 'Model.php';

class Login extends Model
{
  function signIn(string $email)
  {
    $sql = $this->pdo->query("SELECT * FROM users WHERE email = '$email'");
    
    return $sql;
  }
}