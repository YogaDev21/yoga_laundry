<?php
include "../../koneksi.php";
$id = $_GET['id'];
$id_transaksi = $_POST['id_transaksi'];
$id_paket = $_POST['id_paket'];
$qty = $_POST['qty'];
$keterangan = $_POST['keterangan'];

$query = "INSERT INTO tb_detail_transaksi VALUES(NULL,'$id_transaksi','$id_paket', '$qty', '$keterangan')";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  echo "Gagal Tambah Data paket : " . mysqli_error($koneksi);
} else {
  header("Location:../view/control.php?page=view_detail_transaksi&id=$id");
  exit;
}
