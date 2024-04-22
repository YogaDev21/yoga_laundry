<?php
if (@$_SESSION['level_user'] === "owner") {
  echo "<script>alert('Owner tidak dapat menambah data detail transaksi');
  window.history.back();
  </script>";
}
$id = $_GET['id'];
$id_transaksi = $_GET['id_transaksi'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi WHERE id='$id'");
$hasilDetailTransaksi = mysqli_fetch_array($tampil);
?>

<body class="min-vh-100 d-flex flex-column gap-5">
  <div class="container d-flex align-items-center justify-content-center">
    <div class="col-xl-5 ">
      <div class="card rounded-3 text-black">
        <div class="row g-0">
          <div class="card-body p-md-5 mx-md-4 text-white">
            <div class="text-center">
              <h4 class="mt-1 mb-5 pb-1">update detail transaksi</h4>
            </div>
            <form action="../update/proses_update_detail_transaksi.php?id_transaksi=<?= $id_transaksi ?>&id=<?= $hasilDetailTransaksi['id'] ?>" method="POST">
              <div class="d-flex flex-column justify-content-between">
                <label for="id_transaksi" class="form-label">id transaksi</label>
                <select id="id_transaksi_list" name="id_transaksi" class="form-select">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
                  while ($hasil = mysqli_fetch_assoc($query)) {
                  ?>
                    <option value="<?= $hasil['id']; ?>" <?php if ($hasilDetailTransaksi['id_transaksi'] == $hasil['id']) echo 'SELECTED' ?>><?= $hasil['kode_invoice']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="d-flex flex-column justify-content-between">
                <label for="id_paket" class="form-label">id paket</label>
                <select id="id_paket_list" name="id_paket" class="form-select">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_paket");
                  while ($hasil = mysqli_fetch_assoc($query)) {
                  ?>
                    <option value="<?= $hasil['id']; ?>" <?php if ($hasilDetailTransaksi['id_paket'] == $hasil['id']) echo 'SELECTED' ?>><?= $hasil['nama_paket']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <label for="formGroupExampleInput" class="form-label">qty</label>
              <div class="form-outline mb-4">
                <input type="text" name="qty" class="form-control" id="formGroupExampleInput" value="<?= $hasilDetailTransaksi['qty'] ?>">
              </div>
              <label for="formGroupExampleInput" class="form-label">keterangan</label>
              <div class="form-outline mb-4">
                <input type="text" name="keterangan" class="form-control" id="formGroupExampleInput" value="<?= $hasilDetailTransaksi['keterangan'] ?>">
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