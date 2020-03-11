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
  require_once 'connection.php';
  $stmt = $GLOBALS['pdo']->prepare("UPDATE mosque SET tone=:tone WHERE id=1");
  $stmt->execute(['tone' => $_POST['tone']]);
  echo '<script>swal("Berhasil!", "Data alarm berhasil diperbaharui!", "success").then((value) => {
          window.location = "/pray/setting"
        });;</script>';
?>
