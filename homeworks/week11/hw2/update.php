<?php
	session_start();
	require_once('conn.php');


	$username = $_SESSION['username'];
	$id = $_POST['id'];
	$stmt = $conn->prepare('select * from yao__blog_comment where id=? order by id desc');
	$stmt->bind_param('i', $id);
	$result = $stmt->execute();
	if (!$result) {
		die();
	}
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css" />
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>
	<div class="navbar">
		<div class="navbar__title" onclick="window.location.href='index.php'">BLOG</div>
	</div>
	<div class="content">
		<form method="POST" action="handle_update.php">
			<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
			<label>標題:<input type="text" name="title" value="<?php echo $row['title'] ?>"></label><br>
			<textarea rows="20" name="content" placeholder="請輸入內容..."><?php echo $row['content'] ?></textarea>
			<input type="submit" class="handle__btn">	
			<input type="reset" class="handle__btn" value="重置">
		</form>
	</div>
</body>
</html>