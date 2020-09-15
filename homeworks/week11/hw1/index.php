<?php
  session_start();
  require_once("conn.php");
  require_once("utils.php");

  $username = NULL;
  $nickname = NULL;
  if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $nickname = getUserFromUsername($username);
  }

  $page = 1;
  if (!empty($_GET['page'])) {
    $page = intval($_GET['page']);
  }

  $items_per_page = 5;
  $offset = ($page - 1) * $items_per_page;  

  $stmt = $conn->prepare(    
  	'select '.
      'C.id as id, C.content as content, '.
      'C.created_at as created_at, U.nickname as nickname, U.username as username '.
    'from yao_comments as C ' .
    'left join yao_users as U on C.username = U.username '.
    'where C.is_delete IS NULL '.
    'order by C.id desc '.
    'limit ? offset ? '
  );
  $stmt->bind_param('ii', $items_per_page, $offset);
  echo $mysqli->error; 
  $result = $stmt->execute();
  if (!$result) {
    die('Error:' . $conn->error);
  }  
  $result = $stmt->get_result();

  $role_stmt = $conn->prepare('select * from yao_users where username=?');
  $role_stmt->bind_param('s', $username);
  $role_result = $role_stmt->execute();
  if (!$role_result) {
    die('Error:' . $conn->error);
  }  
  $role_result = $role_stmt->get_result();
  $role_row = $role_result->fetch_assoc();
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
        <?php if ($role_row["role"] === 3) { ?>
        <button class="btn" onclick="window.location.href='update_role.php'">權限修改</button>        	
        <?php } ?>
      <?php } ?> 
			<h1>留言板</h1>
			<?php if (!$username) { ?>
				<h1>請登入後留言</h1>
  		<?php } else { ?>			
				<div class="comments__input">
					<h2>帳號:	<?php echo escape($username) ?></h2>
					<h2>暱稱:	<?php echo escape($nickname["nickname"]) ?></h2>
					<button class="btn update">修改暱稱</button>
					<form method="POST" action="update_user.php" class="hide change__nickname">
						<div>
							新的暱稱:<input type="text" name="nickname">
							<input class="btn" type="submit">
						</div>
					</form>
									
					<form method="POST" action="add_comments.php">
						<!-- 性別: <input type="radio" name="sex" value="1">男 <input type="radio" name="sex" value="2">女<br> -->
						<textarea name="content" class="content" rows="6"  placeholder="請輸入您的留言..."></textarea><br>
						<?php if ($username && $role_row['role'] > 1) { ?>
							<div style="text-align: center;">
								<input type="submit" class="btn" name="submit" value="新增">
								<input type="reset" class="btn" name="submit" value="重置">
							</div> 
						<?php } ?>
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
							<div class="card__name">
								<?php echo escape($row['nickname']); ?>
								(@<?php echo escape($row['username']); ?>)
								<?php 
										if ($username && ($row['username'] === $username || $role_row['role'] === 3)) {
								 ?>
									<a href="update.php?id=<?php echo $row['id'] ?>">編輯</a>
									<a href="handle_delete.php?id=<?php echo $row['id'] ?>">刪除</a>
								<?php 
										}
								 ?>
							</div>
							<div class="card__time"><?php echo escape($row['created_at']); ?></div>
						</div>			
						<div class="card__contents"><?php echo escape($row['content']); ?></div>
					</div>
				</div>		
			<?php
				  }
			?>
		<?php
      $stmt = $conn->prepare(
        'select count(id) as count from yao_comments where is_delete IS NULL'
      );
      $result = $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      $count = $row['count'];
      $total_page = ceil($count / $items_per_page);
    ?>
    <div class="page-info">
      <span>總共有 <?php echo $count ?> 筆留言，頁數：</span>
      <span><?php echo $page ?> / <?php echo $total_page ?></span>
    </div>
    <div class="paginator">
      <?php if ($page != 1) { ?> 
        <a href="index.php?page=1">首頁</a>
        <a href="index.php?page=<?php echo $page - 1 ?>">上一頁</a>
      <?php } ?>
      <?php if ($page != $total_page) { ?>
        <a href="index.php?page=<?php echo $page + 1 ?>">下一頁</a>
        <a href="index.php?page=<?php echo $total_page ?>">最後一頁</a> 
      <?php } ?>		
		</div>
	</main>
	<script type="text/javascript">
		document.querySelector(".update").addEventListener("click", function () {
			document.querySelector(".change__nickname").classList.toggle("hide");
		})
	</script>
</body>
</html>