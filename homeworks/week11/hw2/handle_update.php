<?php
	session_start();
	require_once('conn.php');

	if (empty($_POST['title'])||empty($_POST['content'])) {
		die("資料不完整");
	}

	$id = $_POST['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];

	$sql = 'update yao__blog_comment set title=?, content=? where id=? ';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ssi', $title, $content, $id);
	$result = $stmt->execute();
	if (!$result) {
		die($conn->error);
	}

	header("Location: index.php");

?>