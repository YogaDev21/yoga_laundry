<?php
session_start();
include "../../koneksi.php";
$id = $_GET["id"];
try {
  $query = "DELETE FROM tb_paket WHERE id = $id";
  $push = mysqli_query($koneksi, $query);
  if ($push) {
    $_SESSION['status'] = "Paket Berhasil Dihapus";
    header('location: ../view/control.php?page=view_paket');
  }
} catch (mysqli_sql_exception $e) {
  $_SESSION['status'] = "Paket Gagal Dihapus";
  echo "<script>
    alert('Terjadi kesalahan, coba lagi nanti.');
    window.history.back();
  </script>";
}
