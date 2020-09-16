<?php

namespace models;

require_once (dirname(__DIR__) . '/config/database.php');
require_once (dirname(__DIR__) . '/config/session.php');
require_once (dirname(__DIR__) . '/config/config.php');

abstract class Model
{
  protected $pdo;

  public function __construct()
  {
    $this->pdo = getPdo();
    
    if (!empty($_SESSION['id'])) {
      $this->idSession = htmlspecialchars($_SESSION['id']);
    }
  }
}
