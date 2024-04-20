<?php
session_start();
include "../../koneksi.php";
$nama_outlet = $_POST['nama_outlet'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
if (empty($nama_outlet) || empty($alamat) || empty($tlp)) {
  if (empty($nama_outlet)) {
    echo "<script>alert('Data Nama Outlet Kosong, Isi data!');
    location.href='../view/control.php?page=add_outlet'</script>";
  }
  if (empty($alamat)) {
    echo "<script>alert('Data Alamat Outlet Kosong, Isi data!');
    location.href='../view/control.php?page=add_outlet'</script>";
  }
  if (empty($tlp)) {
    echo "<script>alert('Data Telp Outlet Kosong, Isi data!');
    location.href='../view/control.php?page=add_outlet'</script>";
  }
} else {
  try {
    $query = "INSERT INTO tb_outlet VALUES(NULL, '$nama_outlet', '$alamat', '$tlp')";
    $hasil = mysqli_query($koneksi, $query);
    if (!$hasil) {
      echo "Gagal Tambah Data Outlet : " . mysqli_error($koneksi);
    } else {
      $_SESSION['status'] = "Outlet Berhasil Ditambahkan";
      header('Location:../view/control.php?page=view_outlet');
      exit;
    }
  } catch (mysqli_sql_exception $e) {
    $_SESSION['status'] = "Outlet Gagal Ditambahkan";
    echo "<script>
      alert('Terjadi kesalahan, coba lagi nanti.');
      window.history.back();
    </script>";
  }
}
