<?php
include "../../koneksi.php";

$nama_outlet = $_POST['nama_outlet'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
$id = $_GET['id'];

$query = "UPDATE tb_outlet SET id=$id,nama='$nama_outlet',alamat='$alamat',tlp='$tlp' WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  echo "Gagal Tambah Data Outlet : " . mysqli_error($koneksi);
} else {
  header('Location:../view/control.php?page=view_outlet');
  exit;
}
