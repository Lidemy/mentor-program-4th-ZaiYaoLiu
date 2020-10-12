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
		<form method="POST" action="handle_add.php">
			<label>標題:<input type="text" name="title"></label><br>
			<textarea rows="20" name="content"></textarea>
			<input type="submit" class="handle__btn">
		</form>
		<?php
			if (!empty($_GET['errcode'])) {
				$errcode = $_GET['errcode'];
				if ($errcode == 1) {
		?>
			<div class="error">資料不完整</div>
		<?php			
				}
			}
		?>			
	</div>

</body>
</html>