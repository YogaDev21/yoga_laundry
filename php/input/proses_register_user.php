<?php
session_start();
include "../../koneksi.php";
$nama_lengkap = $_POST['nama_lengkap'];
$username_rgst = $_POST['username'];
$password_rgst = $_POST['password'];
$pass_hash = password_hash($password_rgst, PASSWORD_DEFAULT);
$id_outlet = $_POST['id_outlet'];
$leveluser = $_POST['leveluser'];
if (empty($nama_lengkap) || empty($username_rgst) || empty($password_rgst) || empty($id_outlet) || empty($leveluser)) {
  if (empty($nama_lengkap)) {
    echo "<script>alert('Data Nama Lengkap Kosong, Isi data!');
    location.href='../view/control.php?page=add_user'</script>";
  }
  if (empty($username_rgst)) {
    echo "<script>alert('Data Username Kosong, Isi data!');
    location.href='../view/control.php?page=add_user'</script>";
  }
  if (empty($password_rgst)) {
    echo "<script>alert('Data Password Kosong, Isi data!');
    location.href='../view/control.php?page=add_user'</script>";
  }
  if (empty($id_outlet)) {
    echo "<script>alert('Data Id Outlet Kosong, Isi data!');
    location.href='../view/control.php?page=add_user'</script>";
  }
  if (empty($leveluser)) {
    echo "<script>alert('Data Level User Kosong, Isi data!');
    location.href='../view/control.php?page=add_user'</script>";
  }
} else {
  try {
    $query_username = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_user WHERE username='$username_rgst'");
    $cek_username = mysqli_fetch_row($query_username);
    if ($cek_username['0'] != 0) {
      echo "<script>
    alert('Username sudah ada, silahkan menggunakan username yang lain');
    location.href='../view/control.php?page=add_user'
  </script>";
    } else {
      $query = "INSERT INTO tb_user VALUES(NULL,'$nama_lengkap', '$username_rgst', '$pass_hash', '$id_outlet','$leveluser')";
      $hasil = mysqli_query($koneksi, $query);
      if (!$hasil) {
        echo "Gagal Register : " . mysqli_error($koneksi);
      } else {
        $_SESSION['status'] = "User Berhasil Ditambahkan";
        header('Location:../auth/login.php');
        exit;
      }
    }
  } catch (mysqli_sql_exception $e) {
    $_SESSION['status'] = "User Gagal Ditambahkan";
    echo "<script>
      alert('Terjadi kesalahan, coba lagi nanti.');
      window.history.back();
    </script>";
  }
}
