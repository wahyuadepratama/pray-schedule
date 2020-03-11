<?php
  require_once 'connection.php';
  $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM mosque");
  $stmt->execute();
  $data = $stmt->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pray Schedule</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../favicon.png" />
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col" action="update.php">
          <br>
          <h3> <i class="fas fa-users-cog"></i> Settings</h3>
          <br>

          <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-default" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-info-circle"></i> Informasi Masjid
                  </button>
                </h5>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <form action="update_info.php" method="post">
                    <div class="form-group">
                      <label>Nama Masjid</label>
                      <input type="text" class="form-control" name="name" value="<?= $data->name ?>">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" name="address" value="<?= $data->address ?>">
                    </div>
                    <div class="form-group">
                      <label>No. Handphone</label>
                      <input type="text" class="form-control" name="phone" value="<?= $data->phone ?>">
                    </div>
                    <div class="form-group">
                      <label>Running Info</label>
                      <textarea name="info" class="form-control" rows="8" cols="80"><?= $data->info ?></textarea>
                    </div>
                    <button type="submit" name="button" class="btn btn-sm btn-success form-control"> <i class="fas fa-download"></i> Save</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-default collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-clock"></i> Jadwal Shalat
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <form action="update_sch.php" method="post">
                    <div class="form-group">
                      <label>Waktu Imsyak</label>
                      <input type="time" class="form-control" name="imsyak" value="<?= $data->imsyak ?>" id="imsyak">
                    </div>
                    <div class="form-group">
                      <label>Waktu Subuh</label>
                      <input type="time" class="form-control" name="subuh" value="16:20" id="subuh">
                    </div>
                    <div class="form-group">
                      <label>Waktu Syuru'</label>
                      <input type="time" class="form-control" name="syuru" value="<?= $data->syuru ?>" id="syuru">
                    </div>
                    <div class="form-group">
                      <label>Waktu Dzuhur</label>
                      <input type="time" class="form-control" name="dzuhur" value="<?= $data->dzuhur ?>" id="dzuhur">
                    </div>
                    <div class="form-group">
                      <label>Waktu Ashar</label>
                      <input type="time" class="form-control" name="ashar" value="<?= $data->ashar ?>" id="ashar">
                    </div>
                    <div class="form-group">
                      <label>Waktu Maghrib</label>
                      <input type="time" class="form-control" name="maghrib" value="<?= $data->maghrib ?>" id="maghrib">
                    </div>
                    <div class="form-group">
                      <label>Waktu Isya</label>
                      <input type="time" class="form-control" name="isya" value="<?= $data->isya ?>" id="isya">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Awal Ramadhan Selanjutnya (Opsional)</label>
                      <input type="date" class="form-control" name="ramadhan" value="<?= $data->ramadhan ?>">
                    </div>
                    <button type="submit" class="btn btn-sm btn-success form-control" name="button" style="margin-bottom: 5px">
                      <i class="fas fa-download"></i> Save</button>
                    <button type="button" class="btn btn-sm btn-warning form-control" name="button" style="color: white" onclick="synchData()">
                      <i class="fas fa-sync"></i> Update Dari Internet</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-default collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fas fa-image"></i> Wallpaper
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  <form action="update_wallpaper.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Wallpaper (Dimensi 1:3 landscape)</label>
                      <input type="file" name="image" value="" class="form-control">
                      <input type="hidden" name="old" value="<?= $data->wallpaper ?>">
                    </div>
                    <button type="submit" name="button" class="btn btn-sm btn-success form-control"> <i class="fas fa-upload"></i> Change Wallpaper </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingGour">
                <h5 class="mb-0">
                  <button class="btn btn-default collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <i class="fas fa-volume-up"></i> Alarm Sound
                  </button>
                </h5>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">
                  <form action="update_tone.php" method="post">
                    <div class="form-group">
                      <label>Select Sound</label>
                      <select class="form-control" name="tone">
                        <option <?= ($data->tone == 'tone/adzan_1.mp3') ? 'selected' : '' ?> value="tone/adzan_1.mp3">Adzan 1</option>
                        <option <?= ($data->tone == 'tone/adzan_2.mp3') ? 'selected' : '' ?> value="tone/adzan_2.mp3">Adzan 2</option>
                        <option <?= ($data->tone == 'tone/adzan_3.mp3') ? 'selected' : '' ?> value="tone/adzan_3.mp3">Adzan 3</option>
                        <option <?= ($data->tone == 'tone/adzan_4.mp3') ? 'selected' : '' ?> value="tone/adzan_4.mp3">Adzan 4</option>
                        <option <?= ($data->tone == 'tone/adzan_5.mp3') ? 'selected' : '' ?> value="tone/adzan_5.mp3">Adzan 5</option>
                        <option <?= ($data->tone == 'tone/adzan_6.mp3') ? 'selected' : '' ?> value="tone/adzan_6.mp3">Adzan 6</option>
                        <option <?= ($data->tone == 'tone/adzan_7.mp3') ? 'selected' : '' ?> value="tone/adzan_7.mp3">Adzan 7</option>
                        <option <?= ($data->tone == 'tone/adzan_8.mp3') ? 'selected' : '' ?> value="tone/adzan_8.mp3">Adzan 8</option>
                        <option <?= ($data->tone == 'tone/beep_1.mp3') ? 'selected' : '' ?> value="tone/beep_1.mp3">Beep 1</option>
                        <option <?= ($data->tone == 'tone/beep_2.mp3') ? 'selected' : '' ?> value="tone/beep_2.mp3">Beep 2</option>
                        <option <?= ($data->tone == 'tone/beep_3.mp3') ? 'selected' : '' ?> value="tone/beep_3.mp3">Beep 3</option>
                        <option <?= ($data->tone == 'tone/beep_4.mp3') ? 'selected' : '' ?> value="tone/beep_4.mp3">Beep 4</option>
                      </select>
                    </div>
                    <button type="submit" name="button" class="btn btn-sm btn-success form-control"> <i class="fas fa-upload"></i> Change Sound </button>
                    <br><br><br>
                    <h4>Preview Sound</h4>
                    <div class="form-group">
                      <label>Adzan 1</label>
                      <audio controls class="form-control">
                        <source src="tone/adzan_1.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Adzan 2</label>
                      <audio controls class="form-control">
                        <source src="tone/adzan_2.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Adzan 3</label>
                      <audio controls class="form-control">
                        <source src="tone/adzan_3.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Adzan 4</label>
                      <audio controls class="form-control">
                        <source src="tone/adzan_4.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Adzan 5</label>
                      <audio controls class="form-control">
                        <source src="tone/adzan_5.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Adzan 6</label>
                      <audio controls class="form-control">
                        <source src="tone/adzan_6.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Adzan 7</label>
                      <audio controls class="form-control">
                        <source src="tone/adzan_7.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Adzan 8</label>
                      <audio controls class="form-control">
                        <source src="tone/adzan_8.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Beep 1</label>
                      <audio controls class="form-control">
                        <source src="tone/beep_1.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Beep 2</label>
                      <audio controls class="form-control">
                        <source src="tone/beep_2.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Beep 4</label>
                      <audio controls class="form-control">
                        <source src="tone/beep_3.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                    <div class="form-group">
                      <label>Beep 4</label>
                      <audio controls class="form-control">
                        <source src="tone/beep_4.mp3" type="audio/mpeg">
                      </audio>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <a href="/pray" class="btn btn-sm btn-danger" style="margin-top: 15px"> <i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </div>
    </div>
  </body>
  <script src="../bootstrap/js/jquery.min.js" charset="utf-8"></script>
  <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  <script src="../bootstrap/js/moment.js" charset="utf-8"></script>
  <script src="../bootstrap/js/sweetalert.js" charset="utf-8"></script>

  <script type="text/javascript">

  function synchData() {

    swal("Update..");
    jQuery(function($) {
     $.getJSON('https://muslimsalat.com/padang/daily.json?key=65ffb94b0e743e247fc3148fb1453e21&jsoncallback=?', function (times)
     {
       var raw_date = new Date();
       var month = raw_date.getMonth()+1;
       var today_date = raw_date.getUTCFullYear()+'-'+month+'-'+raw_date.getUTCDate();

       var imsak_time = moment(today_date + " " + times.items[0].fajr).subtract(10, 'minutes').format('H:m')
       $('#imsyak').val("0"+imsak_time);
       $('#subuh').val("0"+times.items[0].fajr.substring(0,4));
       $('#syuru').val("0"+times.items[0].shurooq.substring(0,4));
       $('#dzuhur').val(times.items[0].dhuhr.substring(0,5));

       var hour = parseInt(times.items[0].asr.substring(0,1)) + 12;
       var minute = times.items[0].asr.substring(2,4);
       $('#ashar').val(hour+':'+minute);

       var hour = parseInt(times.items[0].maghrib.substring(0,1)) + 12;
       var minute = times.items[0].maghrib.substring(2,4);
       $('#maghrib').val(hour+':'+minute);

       var hour = parseInt(times.items[0].isha.substring(0,1)) + 12;
       var minute = times.items[0].isha.substring(2,4);
       $('#isya').val(hour+':'+minute);

       swal("Great!", "Sinkronisasi Data Berhasil!", "success");
     })
     .fail(function() { swal("Gagal!", "Koneksi bermasalah!", "error"); })
    });
  }

  </script>
</html>
