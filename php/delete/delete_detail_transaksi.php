<?php
include "../../koneksi.php";

$id = $_GET["id"];
$query = "DELETE FROM tb_detail_transaksi WHERE id = $id";
$push = mysqli_query($koneksi, $query);

if ($push) {
  header('location: ../view/control.php?page=view_transaksi');
}