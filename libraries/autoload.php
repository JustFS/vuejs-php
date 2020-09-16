<?php

// evite de répéter tous les requie_once pour des classes
spl_autoload_register(function($className)
{
  $className = str_replace("\\", "/", $className);

  require_once(__DIR__ . "/$className.php");

});



