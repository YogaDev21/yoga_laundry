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
?>

<body class="min-vh-100 d-flex flex-column gap-5">
  <div class="container d-flex align-items-center justify-content-center">
    <div class="col-xl-5 ">
      <div class="card rounded-3 text-black">
        <div class="row g-0">
          <div class="card-body p-md-5 mx-md-4 text-white">
            <div class="text-center">
              <h4 class="mt-1 mb-5 pb-1">Tambah Data Outlet</h4>
            </div>
            <form action="../input/proses_tambah_outlet.php" method="POST">
              <label for="nama_outlet" class="form-label">nama outlet</label>
              <div class="form-outline mb-4">
                <input type="text" name="nama_outlet" class="form-control" id="nama_outlet">
              </div>
              <label for="alamat" class="form-label">alamat</label>
              <div class="form-outline mb-4">
                <input type="text" name="alamat" class="form-control" id="alamat">
              </div>
              <label for="tlp" class="form-label">No Telp</label>
              <div class="form-outline mb-4">
                <input type="text" name="tlp" class="form-control" id="tlp">
              </div>
              <div class=" pt-1 pb-1">
                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100" type="submit">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>