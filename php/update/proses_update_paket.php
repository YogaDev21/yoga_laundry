<?php
session_start();
include "../../koneksi.php";
$nama_paket = $_POST['nama_paket'];
$jenis_paket = $_POST['jenis_paket'];
$harga = $_POST['harga'];
$id_outlet = $_POST['id_outlet'];
$id = $_GET['id'];
if (empty($nama_paket) || empty($harga) || empty($id_outlet) || empty($jenis_paket)) {
  if (empty($nama_paket)) {
    echo "<script>alert('Data Nama Paket, Isi data!');
    location.href='../view/control.php?page=update_paket&id=$id'</script>";
  }
  if (empty($harga)) {
    echo "<script>alert('Data Harga Kosong, Isi data!');
    location.href='../view/control.php?page=update_paket&id=$id'</script>";
  }
  if (empty($id_outlet)) {
    echo "<script>alert('Data Id Outlet Kosong, Isi data!');
    location.href='../view/control.php?page=update_paket&id=$id'</script>";
  }
  if (empty($jenis_paket)) {
    echo "<script>alert('Data Jenis Paket Kosong, Isi data!');
    location.href='../view/control.php?page=update_paket&id=$id'</script>";
  }
} else {
  try {
    $query = "UPDATE tb_paket SET id=$id,id_outlet='$id_outlet',jenis='$jenis_paket',nama_paket='$nama_paket',harga='$harga' WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);
    if (!$hasil) {
      echo "Gagal Tambah Data paket : " . mysqli_error($koneksi);
    } else {
      $_SESSION['status'] = "Paket Berhasil Diperbarui";
      header('Location:../view/control.php?page=view_paket');
      exit;
    }
  } catch (mysqli_sql_exception $e) {
    $_SESSION['status'] = "Paket Gagal Diperbarui";
    echo "<script>
    alert('Terjadi kesalahan, coba lagi nanti.');
    window.history.back();
  </script>";
  }
}
