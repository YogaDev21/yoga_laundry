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
              <h4 class="mt-1 mb-5 pb-1">Tambah paket</h4>
            </div>
            <form action="../input/proses_tambah_paket.php" method="POST">
              <label for="formGroupExampleInput" class="form-label">Nama Paket</label>
              <div class="form-outline mb-4">
                <input type="text" name="nama_paket" class="form-control" id="formGroupExampleInput" placeholder="nama paket">
              </div>
              <label for="formGroupExampleInput" class="form-label">Harga</label>
              <div class="form-outline mb-4">
                <input type="text" name="harga" class="form-control" id="formGroupExampleInput" placeholder="harga">
              </div>
              <div class="d-flex justify-content-between">
                <div class="outlet-input">
                  <label for="id_outlet" class="form-label">id outlet</label>
                  <select name="id_outlet" id="id_outlet" class="form-select">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
                    while ($hasil = mysqli_fetch_assoc($query)) {
                    ?>
                      <option value="<?= $hasil['id']; ?>" <?php if ($hasil['nama'] == $hasil['nama']) echo 'SELECTED' ?>><?= $hasil['nama']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="level-paket-input">
                  <label for="jenis_paket" class="form-label">Level paket</label>
                  <select name="jenis_paket" id="jenis_paket" class="form-select">
                    <option value="kiloan">kiloan</option>
                    <option value="selimut">selimut</option>
                    <option value="bed_cover">bed_cover</option>
                    <option value="kaos">kaos</option>
                    <option value="lain">lain</option>

                  </select>
                </div>
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