<?php
session_start();
include "../../koneksi.php";
$id = $_GET["id"];
try {
  $query = "DELETE FROM tb_outlet WHERE id = $id";
  $push = mysqli_query($koneksi, $query);

  if ($push) {
    $_SESSION['status'] = "Outlet Berhasil Dihapus";
    header('location: ../view/control.php?page=view_outlet');
  }
} catch (mysqli_sql_exception $e) {
  $_SESSION['status'] = "Outlet Gagal Dihapus";
  echo "<script>
    alert('Terjadi kesalahan, coba lagi nanti.');
    window.history.back();
  </script>";
}
