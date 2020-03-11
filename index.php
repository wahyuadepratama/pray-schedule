<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pray Schedule</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.png" />
  </head>
  <body>
    <div class="container-fluid" style="max-height:100vh">
      <div class="row" style="background-image:url('img/background-art.png');background-repeat: repeat; background-size: contain">
        <div class="col date" style="background-image: linear-gradient(to right, rgba(5, 110, 62), rgba(255,0,0,0)); ">
          <div class="vertical-center2">
            <table>
              <tr>
                <td id="date_hijriah">-</td>
              </tr>
              <tr>
                <td class="time" id="date_masehi">-</td>
              </tr>
              <tr>
                <td id="countdown_ramadhan"></td>
              </tr>
            </table>
          </div>

        </div>
        <div class="col text-center mosque" style="padding: 15px">
          <h1 id="mosque_name">Masjid Al-Amanah</h1>
          <h3 id="mosque_address">Jala Utama II Blok j2 No.12 Mata Air <br>Padang Selatan</h3>
          <h3 id="mosque_phone">Telp. 0813721873182 </h3>
        </div>
        <div class="col " style="background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(5, 110, 62)); ">
          <div class="vertical-center float-right">
            <span class="time" id="time">11:00:20</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 p-0" >
          <div class="countdown" style="width: 100%;background-color: #056e3ea6;height:50px;border-radius:5px">
            <marquee style="color:white;font-size:200%" id="info"></marquee>
          </div>
          <div class="image-container">
              <img id="wallpaper" src="img/mecca3.jpg" width="100%">
          </div>
        </div>
      </div>
      <div class="row sch">
        <div class="col imsyak">
          <h4>Imsyak</h4>
          <h3 id="imsyak"></h3>
        </div>
        <div class="col shubuh">
          <h4>Shubuh</h4>
          <h3 id="subuh"></h3>
        </div>
        <div class="col shubuh">
          <h4>Syuru'</h4>
          <h3 id="syuru"></h3>
        </div>
        <div class="col dzuhur">
          <h4>dzuhur</h4>
          <h3 id="dzuhur"></h3>
        </div>
        <div class="col ashar">
          <h4>ashar</h4>
          <h3 id="ashar"></h3>
        </div>
        <div class="col">
          <h4>Maghrib</h4>
          <h3 id="maghrib"></h3>
        </div>
        <div class="col">
          <h4>isya</h4>
          <h3 id="isya"></h3>
        </div>
      </div>

    </div>
  </body>
</html>

<script src="bootstrap/js/jquery.min.js" charset="utf-8"></script>
<script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>

<script type="text/javascript">

  var ramadhanDate = 0;
  var imsyak_ = '';
  var subuh_ = '';
  var syuru_ = '';
  var dzuhur_ = '';
  var ashar_ = '';
  var maghrib_ = '';
  var isya_ = '';
  var tone = new Audio('setting/tone/beep_1.mp3');

  function doDate(){

    var str = '';
    var days = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    var months = new Array("Januari", "Februari", "Maret", "April", "Mai", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    var now = new Date();
    if ((now.getHours() == 6 && now.getMinutes() == 00 && now.getSeconds() < 2) ||
        (now.getHours() == 9 && now.getMinutes() == 00 && now.getSeconds() < 2) ||
        (now.getHours() == 12 && now.getMinutes() == 00 && now.getSeconds() < 2) ||
        (now.getHours() == 15 && now.getMinutes() == 00 && now.getSeconds() < 2) ||
        (now.getHours() == 18 && now.getMinutes() == 00 && now.getSeconds() < 2) ||
        (now.getHours() == 21 && now.getMinutes() == 00 && now.getSeconds() < 2) ) {
      window.location = "/pray";
    }

    str += days[now.getDay()] + ", " + now.getDate() + " " + months[now.getMonth()] + " " + now.getFullYear() + " " + now.getHours() +":" + now.getMinutes() + ":" + now.getSeconds();

    if (now.getHours() < 10) { var hour_ = '0'+now.getHours(); }else { var hour_ = now.getHours(); }
    if (now.getMinutes() < 10) { var minute_ = '0'+now.getMinutes(); }else { var minute_ = now.getMinutes(); }
    if (now.getSeconds() < 10) { var second_ = '0'+now.getSeconds(); }else { var second_ = now.getSeconds(); }

    document.getElementById("time").innerHTML = hour_ +":" + minute_ + ":" + second_;
    document.getElementById("date_masehi").innerHTML = now.getDate() + " " + months[now.getMonth()] + " " + now.getFullYear() + " M";
  }

  function noDelayDoDate() {
    doDate();
    setInterval(doDate,1000);
  }

  function fetch() {

    var date = new Intl.DateTimeFormat('id-TN-u-ca-islamic', {day: 'numeric', month: 'long',weekday: 'long',year : 'numeric'}).format(Date.now());
    var res = date.split(" ");
    $('#date_hijriah').html(date);

    var now = new Date();
    if (now.getHours() < 10) { var hour_ = '0'+now.getHours(); }else { var hour_ = now.getHours(); }
    if (now.getMinutes() < 10) { var minute_ = '0'+now.getMinutes(); }else { var minute_ = now.getMinutes(); }
    if (now.getSeconds() < 10) { var second_ = '0'+now.getSeconds(); }else { var second_ = now.getSeconds(); }

    jQuery(function($) {
     $.getJSON('fetch.php', function (data)
     {
       console.log('fetching..');
       $('#mosque_name').html(data.name);
       $('#mosque_address').html(data.address);
       $('#mosque_phone').html('Telp. '+data.phone);
       $('#wallpaper').attr('src', 'setting/'+data.wallpaper);
       $('#info').html(data.info);
       ramadhanDate = data.ramadhan;

       $('#imsyak').html(data.imsyak.substring(0,5));
       $('#subuh').html(data.subuh.substring(0,5));
       $('#syuru').html(data.syuru.substring(0,5));
       $('#dzuhur').html(data.dzuhur.substring(0,5));
       $('#ashar').html(data.ashar.substring(0,5));
       $('#maghrib').html(data.maghrib.substring(0,5));
       $('#isya').html(data.isya.substring(0,5));

       imsyak_ = data.imsyak.substring(0,5);
       subuh_ = data.subuh.substring(0,5);
       syuru_ = data.syuru.substring(0,5);
       dzuhur_ = data.dzuhur.substring(0,5);
       ashar_ = data.ashar.substring(0,5);
       maghrib_ = data.maghrib.substring(0,5);
       isya_ = data.isya.substring(0,5);
       tone = new Audio('setting/'+data.tone);

       if (imsyak_ == hour_+':'+minute_ || subuh_ == hour_+':'+minute_ || syuru_ == hour_+':'+minute_ ||
           dzuhur_ == hour_+':'+minute_ || ashar_ == hour_+':'+minute_ || maghrib_ == hour_+':'+minute_ ||
           isya_ == hour_+':'+minute_) {
         console.log('alarm aktif');
         tone.play();
       }
     })
    });
  }

  function noDelayFetch() {
    fetch();
    setInterval(fetch, 60000);
  }

  function countDownRamadhan() {
    var end = new Date(ramadhanDate);
    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    var now = new Date();
    var distance = end - now;
    var days = Math.floor(distance / _day);

    if (days <= 0) {
      document.getElementById('countdown_ramadhan').innerHTML = '';
    }else {
      document.getElementById('countdown_ramadhan').innerHTML = 'Ramadhan H-'+ days;
    }
  }

  function noDelayCountDownRamadhan() {
    countDownRamadhan();
    setInterval(countDownRamadhan, 5000);
  }

  noDelayDoDate();
  noDelayFetch();
  noDelayCountDownRamadhan();

</script>
