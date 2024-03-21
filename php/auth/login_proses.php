<?php
session_start();
$user = $_POST['username'];
$password_login = $_POST['password'];

include "../../koneksi.php";
$login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$user'");
$query_lvluser = mysqli_fetch_assoc($login);

$cek = password_verify($password_login, $query_lvluser['password']);

if ($cek > 0) {
  $_SESSION['username'] = $user;
  $_SESSION['level_user'] = $query_lvluser['role'];
  header('Location:../view/control.php?page=dashboard');
} else {
  echo "<script>alert('Gagal Login');location.href='login.php'</script>";
}
