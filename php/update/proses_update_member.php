<?php
session_start();
include "../../koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];
$id = $_GET['id'];
if (empty($nama) || empty($alamat) || empty($jenis_kelamin) || empty($tlp)) {
  if (empty($nama)) {
    echo "<script>alert('Data Nama Kosong, Isi data!');
    location.href='../view/control.php?page=update_member&id=$id'</script>";
  }
  if (empty($alamat)) {
    echo "<script>alert('Data Alamat Kosong, Isi data!');
    location.href='../view/control.php?page=update_member&id=$id'</script>";
  }
  if (empty($jenis_kelamin)) {
    echo "<script>alert('Data Jenis Kelamin Kosong, Isi data!');
    location.href='../view/control.php?page=update_member&id=$id'</script>";
  }
  if (empty($tlp)) {
    echo "<script>alert('Data No Telp Kosong, Isi data!');
    location.href='../view/control.php?page=update_member&id=$id'</script>";
  }
} else {

  try {
    $query = "UPDATE tb_member SET id=$id,nama='$nama',alamat='$alamat',jenis_kelamin='$jenis_kelamin',tlp='$tlp' WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);
    if (!$hasil) {
      echo "Gagal Tambah Data member : " . mysqli_error($koneksi);
    } else {
      $_SESSION['status'] = "Member Berhasil Diperbarui";
      header('Location:../view/control.php?page=view_member');
      exit;
    }
  } catch (mysqli_sql_exception $e) {
    $_SESSION['status'] = "Member Gagal Diperbarui";
    echo "<script>
      alert('Terjadi kesalahan, coba lagi nanti.');
      window.history.back();
    </script>";
  }
}
