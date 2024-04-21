<?php
session_start();
include "../../koneksi.php";
$id = $_GET["id"];
try {
  $query = "DELETE FROM tb_user WHERE id = $id";
  $push = mysqli_query($koneksi, $query);

  if ($push) {
    $_SESSION['status'] = "User Berhasil Dihapus";
    header('location: ../view/control.php?page=view_user');
  }
} catch (mysqli_sql_exception $e) {
  $_SESSION['status'] = "User Gagal Dihapus";
  echo "<script>
    alert('Terjadi kesalahan, coba lagi nanti.');
    window.history.back();
  </script>";
}
