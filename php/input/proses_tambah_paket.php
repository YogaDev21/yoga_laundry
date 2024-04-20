<?php
session_start();
include "../../koneksi.php";
$nama_paket = $_POST['nama_paket'];
$jenis_paket = $_POST['jenis_paket'];
$harga = $_POST['harga'];
$id_outlet = $_POST['id_outlet'];
if (empty($nama_paket) || empty($jenis_paket) || empty($harga) || empty($id_outlet)) {
  if (empty($nama_paket)) {
    echo "<script>alert('Data Nama Paket Kosong, Isi data!');
    location.href='../view/control.php?page=add_paket'</script>";
  }
  if (empty($jenis_paket)) {
    echo "<script>alert('Data Jenis Paket Kosong, Isi data!');
    location.href='../view/control.php?page=add_paket'</script>";
  }
  if (empty($harga)) {
    echo "<script>alert('Data Harga Paket Kosong, Isi data!');
    location.href='../view/control.php?page=add_paket'</script>";
  }
  if (empty($id_outlet)) {
    echo "<script>alert('Data Id Outlet Kosong, Isi data!');
    location.href='../view/control.php?page=add_paket'</script>";
  }
} else {
  try {
    $query = "INSERT INTO tb_paket VALUES(NULL,'$id_outlet','$jenis_paket', '$nama_paket', '$harga')";
    $hasil = mysqli_query($koneksi, $query);
    if (!$hasil) {
      echo "Gagal Tambah Data paket : " . mysqli_error($koneksi);
    } else {
      $_SESSION['status'] = "Paket Berhasil Ditambahkan";
      header('Location:../view/control.php?page=view_paket');
      exit;
    }
  } catch (mysqli_sql_exception $e) {
    $_SESSION['status'] = "Paket Gagal Ditambahkan";
    echo "<script>
      alert('Terjadi kesalahan, coba lagi nanti.');
      window.history.back();
    </script>";
  }
}
