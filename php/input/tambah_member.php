<?php
if (@$_SESSION['level_user'] === "owner") {
  echo "<script>alert('Owner tidak dapat menambah data detail transaksi');
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
              <h4 class="mt-1 mb-5 pb-1">Tambah Member</h4>
            </div>
            <form action="../input/proses_tambah_member.php" method="POST">
              <label for="formGroupExampleInput" class="form-label">Nama</label>
              <div class="form-outline mb-4">
                <input type="text" name="nama" class="form-control" id="formGroupExampleInput" placeholder="nama">
              </div>
              <label for="formGroupExampleInput" class="form-label">Alamat</label>
              <div class="form-outline mb-4">
                <input type="text" name="alamat" class="form-control" id="formGroupExampleInput" placeholder="alamat">
              </div>
              <label for="formGroupExampleInput2" class="form-label">Telp</label>
              <div class="form-outline mb-4">
                <input type="text" name="tlp" class="form-control" id="formGroupExampleInput2" placeholder="telp">
              </div>
              <div>
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                  <option value="L">Laki laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
              <div class=" pt-3 pb-1">
                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100" type="submit">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>