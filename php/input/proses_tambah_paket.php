<?php
include "../../koneksi.php";

$nama_paket = $_POST['nama_paket'];
$jenis_paket = $_POST['jenis_paket'];
$harga = $_POST['harga'];
$id_outlet = $_POST['id_outlet'];

$query = "INSERT INTO tb_paket VALUES(NULL,'$id_outlet','$jenis_paket', '$nama_paket', '$harga')";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  echo "Gagal Tambah Data paket : " . mysqli_error($koneksi);
} else {
  header('Location:../view/control.php?page=view_paket');
  exit;
}
