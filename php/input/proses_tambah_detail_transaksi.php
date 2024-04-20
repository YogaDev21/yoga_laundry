<?php
session_start();
include "../../koneksi.php";
$id = $_GET['id'];
$id_transaksi = $_POST['id_transaksi'];
$id_paket = $_POST['id_paket'];
$qty = $_POST['qty'];
$keterangan = $_POST['keterangan'];
if (empty($id_transaksi) || empty($id_paket) || empty($qty) || empty($keterangan)) {
  if (empty($id_transaksi)) {
    echo "<script>alert('Data Id Transaksi Kosong, Isi data!');
    location.href='../view/control.php?page=add_detail_transaksi&id=$id'</script>";
  }
  if (empty($id_paket)) {
    echo "<script>alert('Data Id Paket Kosong, Isi data!');
    location.href='../view/control.php?page=add_detail_transaksi&id=$id'</script>";
  }
  if (empty($qty)) {
    echo "<script>alert('Data Qty Kosong, Isi data!');
    location.href='../view/control.php?page=add_detail_transaksi&id=$id'</script>";
  }
  if (empty($keterangan)) {
    echo "<script>alert('Data Keterangan Kosong, Isi data!');
    location.href='../view/control.php?page=add_detail_transaksi&id=$id'</script>";
  }
} else {
  try {
    $query = "INSERT INTO tb_detail_transaksi VALUES(NULL,'$id_transaksi','$id_paket', '$qty', '$keterangan')";
    $hasil = mysqli_query($koneksi, $query);
    if (!$hasil) {
      echo "Gagal Tambah Data paket : " . mysqli_error($koneksi);
    } else {
      $_SESSION['status'] = "Detail Transaksi Berhasil Ditambahkan";
      header("Location:../view/control.php?page=view_detail_transaksi&id=$id_transaksi");
      exit;
    }
  } catch (mysqli_sql_exception $e) {
    $_SESSION['status'] = "Detail Transaksi Gagal Ditambahkan";
    echo "<script>
      alert('Terjadi kesalahan, coba lagi nanti.');
      window.history.back();
    </script>";
  }
}
