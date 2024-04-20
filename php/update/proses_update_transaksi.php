<?php
session_start();
include "../../koneksi.php";
$id = $_GET['id'];
$id_outlet = $_POST['id_outlet'];
$kode_invoice = $_POST['kode_invoice'];
$id_member = $_POST['id_member'];
$tgl = $_POST['tgl'];
$batas_waktu = $_POST['batas_waktu'];
$tgl_bayar = $_POST['tgl_bayar'];
$biaya_tambahan = $_POST['biaya_tambahan'];
$diskon = $_POST['diskon'];
$pajak = $_POST['pajak'];
$status = $_POST['status'];
$dibayar = $_POST['dibayar'];
$id_user = $_POST['id_user'];

try {
  $query = "UPDATE tb_transaksi SET id=$id,id_outlet='$id_outlet',kode_invoice='$kode_invoice',id_member='$id_member',tgl='$tgl',batas_waktu='$batas_waktu',tgl_bayar='$tgl_bayar',biaya_tambahan='$biaya_tambahan',diskon='$diskon',pajak='$pajak',status='$status',dibayar='$dibayar',id_user='$id_user' WHERE id='$id'";
  $hasil = mysqli_query($koneksi, $query);
  if (!$hasil) {
    echo "Gagal Tambah Data paket : " . mysqli_error($koneksi);
  } else {
    $_SESSION['status'] = "Transaksi Berhasil Diperbarui";
    header('Location:../view/control.php?page=view_transaksi');
    exit;
  }
} catch (mysqli_sql_exception $e) {
  $_SESSION['status'] = "Transaksi Gagal Diperbarui";
  echo "<script>
    alert('Terjadi kesalahan, coba lagi nanti.');
    window.history.back();
  </script>";
}
