<?php

require_once(dirname(__DIR__) . '/autoload.php');

// require_once '../config/session.php';
// require_once '../config/database.php';

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
	$user_id = htmlspecialchars($_SESSION['id']);
	$file = $_FILES['picture'];

	if ($file['size'] <= 1000000) {
		$valid_ext = array('jpg', 'jpeg', 'gif', 'png');
		$check_ext = strtolower(substr(strrchr($file['name'], '.'), 1));

		if (in_array($check_ext, $valid_ext)) {
			$img_name = uniqid() . '_' . $file['name'];
			$upload_dir = '../../assets/uploads/';
			$upload_name = $upload_dir . $img_name;
			$move_result = move_uploaded_file($file['tmp_name'], $upload_name);

			if ($move_result) {

        $sth = $model->create();

				$sth->bindValue(':name', $name);
				$sth->bindValue(':year', $year);
				$sth->bindValue(':grapes', $grapes);
				$sth->bindValue(':country', $country);
				$sth->bindValue(':region', $region);
				$sth->bindValue(':description', $description);
				$sth->bindValue(':author', $user_id);
				$sth->bindValue(':picture', $img_name);

				$sth->execute();

        header('Location: ../../admin.php');
			} else {
				echo 'Empty';
			}
		} else {
			echo 'Mauvais format';
		}
	} else {
		echo 'Trop volumineux';
	}
}
