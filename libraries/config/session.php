<?php

/**
 * Fournit token de connexion et déconnecte l'utilisateur
 */
require_once 'config.php';

session_start();

if (isset($_GET['logout'])) {
	session_destroy();
	header('Location:' . URLROOT . '/index.php');
}

?>