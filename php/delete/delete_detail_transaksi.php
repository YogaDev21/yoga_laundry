<?php
session_start();
include "../../koneksi.php";
if (@$_SESSION['level_user'] === "owner") {
  echo "<script>
    alert('Owner tidak dapat menambah data detail transaksi');
    window.history.back();
  </script>";
  exit;
}
$id = $_GET["id"];
try {
  $query = "DELETE FROM tb_detail_transaksi WHERE id = $id";
  $push = mysqli_query($koneksi, $query);
  if ($push) {
    $_SESSION['status'] = "Detail Transaksi Berhasil Dihapus";
    header('location: ../view/control.php?page=view_transaksi');
  }
} catch (mysqli_sql_exception $e) {
  $_SESSION['status'] = "Detail Transaksi Gagal Dihapus";
  echo "<script>
    alert('Terjadi kesalahan, coba lagi nanti.');
    window.history.back();
  </script>";
}
