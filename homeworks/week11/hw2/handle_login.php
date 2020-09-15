<?php
	session_start();
	require_once('conn.php');

	if (
		empty($_POST['username'])||
		empty($_POST['password'])) {
		header('Location: login.php?errcode=1');
		die(error);
	}

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "select * from yao__blog_users where username = ? and password = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ss', $username, $password);
	$resule = $stmt->execute();
	if (!$resule) {
		die($conn->error);
	}
	$resule = $stmt->get_result();
	$row = $resule->fetch_assoc();
	if ($password == $row['password']) {
		$_SESSION['username'] = $username;
		header('Location: index.php');
	} else {
		header('Location: login.php?errcode=2');
	}
?>