<?php
session_start();
require_once "dbcon.php";
if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Нэврэх нэр, нууц үгээ бөглөнө үү!');
}
if ($stmt = $con->prepare('SELECT id, password FROM member WHERE username = ?')) {

	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		if (password_verify($_POST['password'], $password)) {

			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			header('Location: content.php');
		} else {
			echo 'Нууц үг болон нэвтрэх нэр буруу байна!';
		}
	} else {
		echo 'Нууц үг болон нэвтрэх нэр буруу байна!';
	}
	$stmt->close();
}
?>