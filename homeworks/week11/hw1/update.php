<?php
  session_start();
  require_once("conn.php");
  require_once("utils.php");  

  // $id = $_GET['id'];

  $username = NULL;
  $nickname = NULL;
  if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $nickname = getUserFromUsername($username);
  }

  $stmt = $conn->prepare('select * from yao_comments where id=? and username=?');
  $stmt->bind_param('is', $_GET['id'], $username);
  $result = $stmt->execute();
  if (!$result) {
    die('Error:' . $conn->error);
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
	<header class="note">此留言板為練習用，請勿儲存個人資料</header>
	<div class="comments">
		<h1>編輯留言</h1>
		<form method="POST" action="handle_update.php">
			<textarea name="content" class="content" rows="6"><?php 
			if (!$row) {
				echo "無修改權限";
			} else {
				echo $row['content'];
			}
				?></textarea><br>
				<div style="text-align: center;">
					<input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
					<input type="submit" class="btn" name="submit" value="編輯">
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
</body>
</html>