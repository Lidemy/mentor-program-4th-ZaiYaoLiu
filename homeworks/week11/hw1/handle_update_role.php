<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');

  if (
    empty($_POST['role'])
  ) {
    header('Location: update_role.php?errCode=1&id='.$_POST['id']);
    die('資料不齊全');
  }

  $id = $_POST['id'];
  $role = $_POST['role'];

  $sql = "update yao_users set role=? where id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('si', $role, $id);
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header("Location: index.php");
?>