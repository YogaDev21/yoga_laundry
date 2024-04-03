<?php
include "../../koneksi.php";

$nama_lengkap = $_POST['nama_lengkap'];
$username_rgst = $_POST['username'];
$password_rgst = $_POST['password'];
$pass_hash = password_hash($password_rgst, PASSWORD_DEFAULT);
$id_outlet = $_POST['id_outlet'];
$leveluser = $_POST['leveluser'];

$query_username = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_user WHERE username='$username_rgst'");
$cek_username = mysqli_fetch_row($query_username);

if ($cek_username['0'] != 0) {
  echo "<script>
    alert('Username sudah ada, silahkan menggunakan username yang lain');
    window.location.href='register.php'
  </script>";
} else {
  $query = "INSERT INTO tb_user VALUES(NULL,'$nama_lengkap', '$username_rgst', '$pass_hash', '$id_outlet','$leveluser')";
  $hasil = mysqli_query($koneksi, $query);
  if (!$hasil) {
    echo "Gagal Register : " . mysqli_error($koneksi);
  } else {
    header('Location:../auth/login.php');
    exit;
  }
}
