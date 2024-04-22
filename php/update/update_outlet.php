<?php
if (@$_SESSION['level_user'] === "owner") {
  echo "<script>alert('Owner tidak dapat menambah data detail transaksi');
  window.history.back();
  </script>";
}
if (@$_SESSION['level_user'] === "kasir") {
  echo "<script>alert('Kasir tidak dapat melihat halaman ini');
  window.history.back();
  </script>";
}
$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_outlet WHERE id='$id'");
$hasil = mysqli_fetch_array($tampil);
?>

<body class="min-vh-100 d-flex flex-column gap-5">
  <div class="container d-flex align-items-center justify-content-center">
    <div class="col-xl-5 ">
      <div class="card rounded-3 text-black">
        <div class="row g-0">
          <div class="card-body p-md-5 mx-md-4 text-white">
            <div class="text-center">
              <h4 class="mt-1 mb-5 pb-1">Update Outlet</h4>
            </div>
            <form action="../update/proses_update_outlet.php?id=<?= $hasil['id'] ?>" method="POST">
              <label for="nama_outlet" class="form-label">Nama Outlet</label>
              <div class="form-outline mb-4">
                <input type="text" name="nama_outlet" class="form-control" id="nama_outlet" value="<?= $hasil['nama'] ?>">
              </div>
              <label for="alamat" class="form-label">Alamat</label>
              <div class="form-outline mb-4">
                <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $hasil['alamat'] ?>">
              </div>
              <label for="tlp" class="form-label">No Telp</label>
              <div class="form-outline mb-4">
                <input type="text" name="tlp" class="form-control" id="tlp" value="<?= $hasil['tlp'] ?>">
              </div>
              <div class=" pt-1 pb-1">
                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100" type="submit">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>