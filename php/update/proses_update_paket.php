<?php
include "../../koneksi.php";

$nama_paket = $_POST['nama_paket'];
$jenis_paket = $_POST['jenis_paket'];
$harga = $_POST['harga'];
$id_outlet = $_POST['id_outlet'];
$id = $_GET['id'];

$query = "UPDATE tb_paket SET id=$id,id_outlet='$id_outlet',jenis='$jenis_paket',nama_paket='$nama_paket',harga='$harga' WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  echo "Gagal Tambah Data paket : " . mysqli_error($koneksi);
} else {
  header('Location:../view/control.php?page=view_paket');
  exit;
}
