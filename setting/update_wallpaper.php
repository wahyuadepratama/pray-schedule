<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pray Schedule</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../bootstrap/js/sweetalert.js" charset="utf-8"></script>
  </head>
  <body>

  </body>
</html>

<?php

$jenis_gambar = $_FILES['image']['type'];

if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg"  || $jenis_gambar=="image/png")
    && ($_FILES["image"]["size"] <= 10000000)){

  unlink($_POST['old']);

  // $sourcename = $_FILES["image"]["name"];
  $name       = time();
  $filepath   = 'img/' .$name;
  move_uploaded_file($_FILES["image"]["tmp_name"], $filepath);

  require_once 'connection.php';
  $stmt = $GLOBALS['pdo']->prepare("UPDATE mosque SET wallpaper=:wal WHERE id=1");
  $stmt->execute(['wal' => $filepath]);
  echo '<script>swal("Berhasil!", "Wallpaper berhasil diperbaharui!", "success").then((value) => {
          window.location = "/pray/setting"
        });;</script>';
}
?>
