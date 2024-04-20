<?php
session_start();
include "../../koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];
if (empty($nama) || empty($alamat) || empty($jenis_kelamin) || empty($tlp)) {
  if (empty($nama)) {
    echo "<script>alert('Data Nama Kosong, Isi data!');
    location.href='../view/control.php?page=add_member'</script>";
  }
  if (empty($alamat)) {
    echo "<script>alert('Data Alamat Kosong, Isi data!');
    location.href='../view/control.php?page=add_member'</script>";
  }
  if (empty($jenis_kelamin)) {
    echo "<script>alert('Data Jenis Kelamin Kosong, Isi data!');
    location.href='../view/control.php?page=add_member'</script>";
  }
  if (empty($tlp)) {
    echo "<script>alert('Data No Telp Kosong, Isi data!');
    location.href='../view/control.php?page=add_member'</script>";
  }
} else {
  try {
    $query = "INSERT INTO tb_member VALUES(NULL,'$nama', '$alamat', '$jenis_kelamin','$tlp')";
    $hasil = mysqli_query($koneksi, $query);
    if (!$hasil) {
      echo "Gagal Tambah Data member : " . mysqli_error($koneksi);
    } else {
      $_SESSION['status'] = "Member Berhasil Ditambahkan";
      header('Location:../view/control.php?page=view_member');
      exit;
    }
  } catch (mysqli_sql_exception $e) {
    $_SESSION['status'] = "Member Gagal Ditambahkan";
    echo "<script>
      alert('Terjadi kesalahan, coba lagi nanti.');
      window.history.back();
    </script>";
  }
}
