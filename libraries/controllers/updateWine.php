<?php

require_once(dirname(__DIR__) . '/autoload.php');

$id = $_GET['id'];
$model = new \models\Wines();

if (
  !empty($_POST['name'])
  && !empty($_POST['year'])
  && !empty($_POST['grapes'])
  && !empty($_POST['country'])
  && !empty($_POST['region'])
  && !empty($_POST['description'])
) {

  $name = htmlspecialchars($_POST['name']);
  $year = htmlspecialchars($_POST['year']);
  $grapes = htmlspecialchars($_POST['grapes']);
  $country = htmlspecialchars($_POST['country']);
  $region = htmlspecialchars($_POST['region']);
  $description = htmlspecialchars($_POST['description']);

  $sth = $model->update($id);

  $sth->bindValue(':name', $name);
  $sth->bindValue(':year', $year);
  $sth->bindValue(':grapes', $grapes);
  $sth->bindValue(':country', $description);
  $sth->bindValue(':region', $region);
  $sth->bindValue(':description', $description);

  $sth->execute();

  header('Location: ../../admin.php');
};