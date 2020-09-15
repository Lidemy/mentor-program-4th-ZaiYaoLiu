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
	<div class="content__login">
		<span class="content__title">Register</span>
		<form method="POST" action="handle_register.php">
			<label>暱稱:<input type="text" name="nickname"></label><br>
			<label>帳號:<input type="text" name="username"></label><br>
			<label>密碼:<input type="password" name="password"></label>
			<button type="submit" class="login__btn">SIGN IN</button>
			<?php 
				if (!empty($_GET['errcode'])) {
					$errcode = $_GET['errcode'];
					if ($errcode == 1) { 					
			?>
				<div class="error">資料不完整</div>
			<?php
				} else if ($errcode == 2) {
			 ?>
				<div class="error">帳號已存在</div>
			<?php 
					}
				} 
			?>	
		</form>		
	</div>

</body>
</html>