<?php
session_start();
include "../../koneksi.php";
$id_transaksi = $_POST['id_transaksi'];
$id_paket = $_POST['id_paket'];
$qty = $_POST['qty'];
$keterangan = $_POST['keterangan'];
$id = $_GET['id'];
$id_transaksi = $_GET['id_transaksi'];
if (empty($id_transaksi) || empty($id_paket) || empty($qty) || empty($keterangan)) {
  if (empty($id_transaksi)) {
    echo "<script>alert('Data Id Transaksi Kosong, Isi data!');
    location.href='../view/control.php?page=view_detail_transaksi&id=$id_transaksi'</script>";
  }
  if (empty($id_paket)) {
    echo "<script>alert('Data Id Paket Kosong, Isi data!');
    location.href='../view/control.php?page=view_detail_transaksi&id=$id_transaksi'</script>";
  }
  if (empty($qty)) {
    echo "<script>alert('Data Qty Kosong, Isi data!');
    location.href='../view/control.php?page=view_detail_transaksi&id=$id_transaksi'</script>";
  }
  if (empty($keterangan)) {
    echo "<script>alert('Data Keterangan Kosong, Isi data!');
    location.href='../view/control.php?page=view_detail_transaksi&id=$id_transaksi'</script>";
  }
} else {
  try {
    $query = "UPDATE tb_detail_transaksi SET id=$id,id_transaksi='$id_transaksi',id_paket='$id_paket',qty=$qty,keterangan='$keterangan' WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);
    if (!$hasil) {
      echo "Gagal Tambah Data paket : " . mysqli_error($koneksi);
    } else {
      $_SESSION['status'] = "Detail Transaksi Berhasil Diperbarui";
      header("Location:../view/control.php?page=view_detail_transaksi&id=$id_transaksi");
      exit;
    }
  } catch (mysqli_sql_exception $e) {
    $_SESSION['status'] = "Detail Transaksi Gagal Diperbarui";
    echo "<script>
      alert('Terjadi kesalahan, coba lagi nanti.');
      window.history.back();
    </script>";
  }
}
