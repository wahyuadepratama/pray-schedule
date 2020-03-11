<?php

error_reporting(E_ALL); // ubah jadi 0 utk off dan E_ALL untuk on
ini_set('display_errors', 0); // ubah jadi 0 utk off
date_default_timezone_set("Asia/Jakarta");

$database = "pray";
$username = "root";
$password = "";

$GLOBALS['pdo'] = new PDO("mysql:host=127.0.0.1;dbname=". $database .";port=3306", $username, $password);
