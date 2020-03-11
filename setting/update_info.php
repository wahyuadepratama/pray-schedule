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
  $stmt = $GLOBALS['pdo']->prepare("UPDATE mosque SET name=:name, address=:address, phone=:phone, info=:info WHERE id=1");
  $stmt->execute(['name' => $_POST['name'], 'address' => $_POST['address'], 'phone' => $_POST['phone'], 'info' => $_POST['info']]);
  echo '<script>swal("Berhasil!", "Data masjid berhasil diperbaharui!", "success").then((value) => {
          window.location = "/pray/setting"
        });;</script>';
?>
