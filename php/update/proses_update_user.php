<?php
session_start();
include "../../koneksi.php";
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$pass_hash = password_hash($password, PASSWORD_DEFAULT);
$id_outlet = $_POST['id_outlet'];
$leveluser = $_POST['leveluser'];
$id = $_GET['id'];
if (empty($nama_lengkap) || empty($username) || empty($password) || empty($id_outlet) || empty($leveluser)) {
  if (empty($nama_lengkap)) {
    echo "<script>alert('Data Nama, Isi data!');
    location.href='../view/control.php?page=update_user&id=$id'</script>";
  }
  if (empty($username)) {
    echo "<script>alert('Data Username Kosong, Isi data!');
    location.href='../view/control.php?page=update_user&id=$id'</script>";
  }
  if (empty($password)) {
    echo "<script>alert('Data Password Kosong, Isi data!');
    location.href='../view/control.php?page=update_user&id=$id'</script>";
  }
  if (empty($id_outlet)) {
    echo "<script>alert('Data Id Outlet Kosong, Isi data!');
    location.href='../view/control.php?page=update_user&id=$id'</script>";
  }
  if (empty($leveluser)) {
    echo "<script>alert('Data Level User Kosong, Isi data!');
    location.href='../view/control.php?page=update_user&id=$id'</script>";
  }
} else {
  try {
    $query = "UPDATE tb_user SET id=$id,nama='$nama_lengkap',username='$username',password='$pass_hash',id_outlet='$id_outlet',role='$leveluser' WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query);
    if (!$hasil) {
      echo "Gagal Tambah Data user : " . mysqli_error($koneksi);
    } else {
      $_SESSION['status'] = "User Berhasil Diperbarui";
      header('Location:../view/control.php?page=view_user');
      exit;
    }
  } catch (mysqli_sql_exception $e) {
    $_SESSION['status'] = "User Gagal Diperbarui";
    echo "<script>
    alert('Terjadi kesalahan, coba lagi nanti.');
    window.history.back();
  </script>";
  }
}
