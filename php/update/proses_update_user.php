<?php
include "../../koneksi.php";

$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$pass_hash = password_hash($password, PASSWORD_DEFAULT);

$id_outlet = $_POST['id_outlet'];
$leveluser = $_POST['leveluser'];
$id = $_GET['id'];

$query = "UPDATE tb_user SET id=$id,nama='$nama_lengkap',username='$username',password='$pass_hash',id_outlet='$id_outlet',role='$leveluser' WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  echo "Gagal Tambah Data user : " . mysqli_error($koneksi);
} else {
  header('Location:../view/control.php?page=view_user');
  exit;
}
