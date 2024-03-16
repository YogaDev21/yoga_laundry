<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "db_laundry";
$koneksi = mysqli_connect($host, $username, $password, $db);

if (!$koneksi) {
  die("koneksi database gagal:" . mysqli_connect_error());
}
