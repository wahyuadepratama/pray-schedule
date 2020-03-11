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
  $stmt = $GLOBALS['pdo']->prepare("UPDATE mosque SET imsyak=:imsyak, subuh=:subuh, syuru=:syuru, dzuhur=:dzuhur, ashar=:ashar, maghrib=:maghrib, isya=:isya, ramadhan=:ramadhan WHERE id=1");
  $stmt->execute(['imsyak' => $_POST['imsyak'],
                  'subuh' => $_POST['subuh'],
                  'syuru' => $_POST['syuru'],
                  'dzuhur' => $_POST['dzuhur'],
                  'ashar' => $_POST['ashar'],
                  'maghrib' => $_POST['maghrib'],
                  'isya' => $_POST['isya'],
                  'ramadhan' => $_POST['ramadhan']
                  ]);
  echo '<script>swal("Berhasil!", "Jadwal shalat berhasil diperbaharui!", "success").then((value) => {
          window.location = "/pray/setting"
        });;</script>';
?>
