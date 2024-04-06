<?php
include "../../koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];
$id = $_GET['id'];

$query = "UPDATE tb_member SET id=$id,nama='$nama',alamat='$alamat',jenis_kelamin='$jenis_kelamin',tlp='$tlp' WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
  echo "Gagal Tambah Data member : " . mysqli_error($koneksi);
} else {
  header('Location:../view/control.php?page=view_member');
  exit;
}
