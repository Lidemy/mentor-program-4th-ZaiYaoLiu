<?php
	session_start();
	require_once('conn.php');
	require_once('utils.php');

	$username = NULL;
	if (!empty($_SESSION['username'])) {
		$username = $_SESSION['username'];
	};
	
	$id = $_POST["id"];

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
		<div >
			<button class="navbar__login" onclick="window.location.href='login.php'">Log In</button>
		</div>
	</div>

	<div class="content">
		<div class="flex">
			<div class="content__title"><?php echo escape($row['title']) ?></div>
			<div>
				<button class="handle__btn" onclick="window.location.href='index.php'">返回</button>
			<?php if ($username) { ?>
				<form method="POST" action="update.php">
					<input type="hidden" name="id" value="<?php echo $row["id"] ?>">
					<button class="handle__btn">編輯</button>
				</form>
				<form method="POST" action="delete.php">
					<input type="hidden" name="id" value="<?php echo $row["id"] ?>">
					<button class="handle__btn">刪除</button>
				</form>				
			<?php } ?>
			</div>
		</div>		
		<div class="content__date"><?php echo escape($row['created_at']) ?></div>
		<div class="content__info"><?php echo escape($row['content']) ?></div>
	</div>
	
</body>
</html>