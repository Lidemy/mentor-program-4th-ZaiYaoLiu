<?php
	session_start();
  require_once("utils.php");  
	require_once('conn.php');

	$stmt = $conn->prepare('select * from yao_users');
	$result = $stmt->execute();
	if (!$result) {
		die();
	}
	$result = $stmt->get_result();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>
	<header class="note">此留言板為練習用，請勿儲存個人資料</header>
	<div class="comments">
		<?php while ($row = $result->fetch_assoc()) { ?>
			<div class="name">使用者帳號:  <?php echo escape($row['username']); ?></div>
			<form method="POST" action="handle_update_role.php?" class="paginator">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
				<label>管理員<input type="radio" name="role" value="3"></label>
				<label>一般使用者<input type="radio" name="role" value="2"></label>
				<label>遭停權使用者<input type="radio" name="role" value="1"></label>	
				<input type="submit" name="">		
			</form>
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
	</div>

</body>
</html>