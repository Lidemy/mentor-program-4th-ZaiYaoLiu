<?php
	session_start();
	require_once('conn.php');
	require_once('utils.php');

	$username = NULL;
	if (!empty($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}
	$stmt = $conn->prepare('select * from yao__blog_comment where is_delete IS NULL order by id desc');
	$result = $stmt->execute();
  if (!$result) {
    die('Error:' . $conn->error);
  }
  $result = $stmt->get_result();
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
			<?php
				if ($username) {
			?>
				<button class="navbar__login" onclick="window.location.href='add.php'">ADD</button>
				<button class="navbar__login" onclick="window.location.href='logout.php'">LogOut</button>
			<?php
				} else {
			?>
				<button class="navbar__login" onclick="window.location.href='login.php'">LogIn</button>
			<?php
				}
			?>
			
		</div>
	</div>

	
		<?php
			if ($username) {
				while ($row = $result->fetch_assoc()) {
		?>
						<div class="content flex">							
							<div class="content__title"><?php echo escape($row['title']) ?></div>
							<div class="content__date"><?php echo escape($row['created_at']) ?></div>
							<form method="POST" action="info.php">
								<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
								<input type="submit" class="handle__btn" value="OPEN">
							</form>													
						</div>

		<?php
				} 
			} else {

					for ($i = 0; $i < 5; $i++) {
					$row = $result->fetch_assoc();					
		?>
					<div class="content flex">							
						<div class="content__title"><?php echo escape($row['title']) ?></div>
						<div class="content__date"><?php echo escape($row['created_at']) ?></div>
						<form method="POST" action="info.php">
							<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
							<input type="submit" class="handle__btn" value="OPEN">
						</form>													
					</div>					
		<?php				
					}
			}
		?>


</body>
</html>