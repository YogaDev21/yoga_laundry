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
              <h4 class="mt-1 mb-5 pb-1">Tambah detail transaksi</h4>
            </div>
            <form action="../input/proses_tambah_detail_transaksi.php?id=<?= $_GET['id'] ?>" method="POST">
              <div class="d-flex flex-column justify-content-between">
                <label for="id_transaksi" class="form-label">Id Transaksi</label>
                <select id="id_transaksi" name="id_transaksi" class="form-select">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
                  $queryKodeInvoice = mysqli_query($koneksi, "SELECT kode_invoice FROM tb_transaksi WHERE id =" . $_GET['id']);
                  $kode_invoice = mysqli_fetch_assoc($queryKodeInvoice);
                  while ($hasil = mysqli_fetch_assoc($query)) {
                  ?>
                    <option value="<?= $hasil['id']; ?>" <?php if ($kode_invoice['kode_invoice'] == $hasil['kode_invoice']) echo 'SELECTED' ?>><?= $hasil['kode_invoice']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="d-flex flex-column justify-content-between">
                <label for="id_paket" class="form-label">Id Paket</label>
                <select id="id_paket" name="id_paket" class="form-select">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_paket");
                  while ($hasil = mysqli_fetch_assoc($query)) {
                  ?>
                    <option value="<?= $hasil['id']; ?>"><?= $hasil['nama_paket']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <label for="formGroupExampleInput" class="form-label">QTY</label>
              <div class="form-outline mb-4">
                <input type="text" name="qty" class="form-control" id="formGroupExampleInput" placeholder="qty">
              </div>
              <label for="formGroupExampleInput" class="form-label">Keterangan</label>
              <div class="form-outline mb-4">
                <input type="text" name="keterangan" class="form-control" id="formGroupExampleInput" placeholder="keterangan">
              </div>
              <div class=" pt-1 pb-1">
                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100" type="submit">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>