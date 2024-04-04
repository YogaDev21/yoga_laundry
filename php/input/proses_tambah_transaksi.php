<?php
session_start();
include "../../koneksi.php";
function generate_invoice_number()
{
  $random_number = str_pad(mt_rand(1, 99999), 5);
  $invoice_number = "INV"   . $random_number;
  return $invoice_number;
}
$generated_invoice_number = generate_invoice_number();
$kode_invoice = $generated_invoice_number;
$id_member = $_POST['id_member'];
$tgl = date('Y-m-d H:i:s');
$batas_waktu = date('Y-m-d H:i:s');
$tgl_bayar = date('Y-m-d H:i:s');
$biaya_tambahan = $_POST['biaya_tambahan'];
$diskon = 0;
$pajak = 0;
$status = "baru";
$dibayar = $_POST['dibayar'];

$username = $_SESSION['username'];
$query = "SELECT u.id AS user_id, o.id AS outlet_id
          FROM tb_user AS u
          INNER JOIN tb_outlet AS o ON u.id_outlet = o.id
          WHERE u.username = '$username'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
  echo "Error fetching user and outlet information: " . mysqli_error($koneksi);
} else {
  $user_outlet_row = mysqli_fetch_assoc($result);
  $id_user = $user_outlet_row['user_id'];
  $id_outlet = $user_outlet_row['outlet_id'];
  $cariTransaksi = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_member FROM tb_transaksi WHERE id_member='$id_member'"));
  if ($cariTransaksi % 3 === 0 && $cariTransaksi != 0) {
    $diskon = 0.1;
  } else {
    $diskon = 0;
  }
  $query = "INSERT INTO tb_transaksi VALUES(NULL,'$id_outlet','$kode_invoice', '$id_member', '$tgl','$batas_waktu','$tgl_bayar','$biaya_tambahan','$diskon','$pajak','$status','$dibayar','$id_user')";
  $hasil = mysqli_query($koneksi, $query);

  if (!$hasil) {
    echo "Gagal Tambah Data transaksi : " . mysqli_error($koneksi);
  } else {
    header('Location:../view/control.php?page=view_transaksi');
    exit;
  }
}
