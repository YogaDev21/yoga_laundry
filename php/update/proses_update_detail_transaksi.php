<?php
include "../../koneksi.php";

$id_transaksi = $_POST['id_transaksi'];
$id_paket = $_POST['id_paket'];
$qty = $_POST['qty'];
$keterangan = $_POST['keterangan'];
$id = $_GET['id'];

$query = "UPDATE tb_detail_transaksi SET id=$id,id_transaksi='$id_transaksi',id_paket='$id_paket',qty=$qty,keterangan='$keterangan' WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  echo "Gagal Tambah Data paket : " . mysqli_error($koneksi);
} else {
  header('Location:../view/control.php?page=view_detail_transaksi');
  exit;
}
