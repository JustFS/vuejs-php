<?php

// require_once 'libraries/config/config.php';
// require_once 'libraries/config/session.php';
require_once('libraries/autoload.php');

$login = new \controllers\Login();
$login->userLog();

// call template
require_once 'libraries/utils.php';
render('libraries/views/admin', 'Admin');

?>