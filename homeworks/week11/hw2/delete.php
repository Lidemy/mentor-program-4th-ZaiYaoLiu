<?php
	session_start();
	require_once('conn.php');

	if (empty($_POST['id'])) {
		die();
	}

	$id = $_POST['id'];

	$sql = 'update yao__blog_comment set is_delete=1 where id=? ';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $id);
	$result = $stmt->execute();
	if (!$result) {
		die($conn->error);
	}

	header("Location: index.php");

?>