<?php

require_once(dirname(__DIR__) . '/autoload.php');


$model = new \models\Wines();

$sql = $model->list('');

echo json_encode($sql->fetchAll());
