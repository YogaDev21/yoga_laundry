<?php
session_start();
include "../../koneksi.php";
$nama_outlet = $_POST['nama_outlet'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
$id = $_GET['id'];
if (empty($nama_outlet) || empty($alamat) || empty($tlp)) {
  if (empty($nama_outlet)) {
    echo "<script>alert('Data Nama outlet, Isi data!');
    location.href='../view/control.php?page=update_outlet&id=$id'</script>";
  }
  if (empty($alamat)) {
    echo "<script>alert('Data Alamat Kosong, Isi data!');
    location.href='../view/control.php?page=update_outlet&id=$id'</script>";
  }
  if (empty($tlp)) {
    echo "<script>alert('Data No Telp Kosong, Isi data!');
    location.href='../view/control.php?page=update_outlet&id=$id'</script>";
  }
} else {
  try {
    $query = "UPDATE tb_outlet SET id=$id,nama='$nama_outlet',alamat='$alamat',tlp='$tlp' WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);
    if (!$hasil) {
      echo "Gagal Tambah Data Outlet : " . mysqli_error($koneksi);
    } else {
      $_SESSION['status'] = "Outlet Berhasil Diperbarui";
      header('Location:../view/control.php?page=view_outlet');
      exit;
    }
  } catch (mysqli_sql_exception $e) {
    $_SESSION['status'] = "Outlet Gagal Diperbarui";
    echo "<script>
      alert('Terjadi kesalahan, coba lagi nanti.');
      window.history.back();
    </script>";
  }
}
