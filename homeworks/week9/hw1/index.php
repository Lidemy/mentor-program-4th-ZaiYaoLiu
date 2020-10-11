<?php
  session_start();
  require_once("conn.php");
  require_once("utils.php");  

  $username = NULL;
  if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
  }

  $result = $conn->query("select * from yao_comments order by id desc");
  if (!$result) {
    die('Error:' . $conn->error);
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css" />
  <link rel="stylesheet" href="style.css">	
	<title>留言板</title>
</head>
<body>
	<header class="note">此留言板為練習用，請勿儲存個人資料</header>
	<main>

		<div class="comments">
			<?php if (!$username) { ?>
				<div style="text-align: center;">
					<button class="btn" onclick="window.location.href='register.php';">註冊</button>
					<button class="btn" onclick="window.location.href='login.php'">登入</button>
				</div>
      <?php } else { ?>
        <button class="btn" onclick="window.location.href='handle_logout.php'">登出</button>
      <?php } ?>  


			<h1>留言板</h1>


			<?php if (!$username) { ?>
				<h1>請登入後留言</h1>
  		<?php } else { ?>			
				<div class="comments__input">
					<form method="POST" action="add_comments.php">
						<h2>帳號:	<?php echo $username ?></h2>
						<?php
							$results = $conn->query("select * from yao_users order by id desc");
							$rows = $results->fetch_assoc()
						?>
						<h2>暱稱:	<?php echo $rows["nickname"] ?></h2>
						<!-- 性別: <input type="radio" name="sex" value="1">男 <input type="radio" name="sex" value="2">女<br> -->
						<textarea name="content" class="content" rows="6"  placeholder="請輸入您的留言..."></textarea><br>
							<div style="text-align: center;">
								<input type="submit" class="btn" name="submit" value="新增">
								<input type="reset" class="btn" name="submit" value="重置">
							</div> 
						<?php
		        if (!empty($_GET['errCode'])) {
		          $code = $_GET['errCode'];
		          $msg = 'Error';
		          if ($code === '1') {
		            $msg = '資料不齊全';
		          }
		          echo '<h2 class="error">錯誤：' . $msg . '</h2>';
		        }
		      ?>				
				</form>
			</div>
			<?php } ?> 


			<?php
				  while ($row = $result->fetch_assoc()) {
			?>
					<div class="comments__card">
					<div class="card__avatar"></div>
					<div>
						<div class="card__info">
							<div class="card__name"><?php echo $row['nickname']; ?></div>
							<div class="card__time"><?php echo $row['created_at']; ?></div>
						</div>			
						<div class="card__contents"><?php echo $row['content']; ?></div>
					</div>
				</div>		
			<?php
				  }
			?>
	
		</div>
	</main>
</body>
</html>