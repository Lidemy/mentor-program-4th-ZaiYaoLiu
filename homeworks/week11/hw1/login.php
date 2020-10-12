<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css" />
  <link rel="stylesheet" href="style.css">	
	<title>登入</title>
</head>
<body>
	<header class="note">此留言板為練習用，請勿儲存個人資料</header>
	<main>

		<div class="comments">
			<div style="text-align: center;">
				<button class="btn" onclick="window.location.href='index.php'">留言板</button>
				<button class="btn" onclick="window.location.href='register.php'">註冊</button>
			</div>			
			<h1>登入</h1>		
			<div class="comments__input">
				<form method="POST" action="handle_login.php">
					<!-- 姓名:<input type="text" name="nickname">	<br> -->
					<!-- 性別: <input type="radio" name="sex" value="1">男 <input type="radio" name="sex" value="2">女<br> -->
					帳號:<input type="text" name="username">	<br>
					密碼:<input type="password" name="password">	<br>
					<div>
						<input type="submit" class="btn" name="submit" value="登入">
						<input type="reset" class="btn" name="submit" value="重置">
						<?php
			        if (!empty($_GET['errCode'])) {
			          $code = $_GET['errCode'];
			          $msg = 'Error';
			          if ($code === '1') {
			            $msg = '資料不齊全';
			          } else if ($code === '2') {
			            $msg = '帳號或是密碼輸入錯誤';
			          }
			          echo '<h2 class="error">錯誤：' . $msg . '</h2>';
			        } 
			      ?>
					</div>
				</form>
			</div>
			
	
		</div>
	</main>
</body>
</html>