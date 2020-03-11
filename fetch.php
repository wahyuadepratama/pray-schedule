<?php
  require_once 'setting/connection.php';
  $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM mosque");
  $stmt->execute();
  $data = $stmt->fetch(PDO::FETCH_OBJ);

  echo json_encode($data);
