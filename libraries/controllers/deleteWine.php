<?php

require_once(dirname(__DIR__) . '/autoload.php');

$id = htmlspecialchars($_GET['id']);


$model = new \models\Wines();
$model->delete($id);

header('Location: ../../admin.php');

?>