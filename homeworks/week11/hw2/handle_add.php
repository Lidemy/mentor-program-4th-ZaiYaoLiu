<?php
	session_start();
	require_once('conn.php');

	if (empty($_POST['title'])||empty($_POST['content'])) {
		header('Location: add.php?errcode=1');
		die();
	}

	$title = $_POST['title'];
	$content = $_POST['content'];

	$sql = "insert into yao__blog_comment(title, content) values(?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ss', $title, $content);
	$result = $stmt->execute();
	if (!$result) {
		die($conn->error);
	}

	header('Location: index.php')

?>