<?php
if (@$_SESSION['level_user'] === "owner") {
  echo "<script>alert('Owner tidak dapat menambah data detail transaksi');
  window.history.back();
  </script>";
}
$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id='$id'");
$hasilTransaksi = mysqli_fetch_array($tampil);
?>

<body class="min-vh-100 d-flex flex-column gap-5">
  <div class="container d-flex align-items-center justify-content-center mtmb-5">
    <div class="col-xl-5 ">
      <div class="card rounded-3 text-black">
        <div class="row g-0">
          <div class="card-body p-md-5 mx-md-4 text-white">
            <div class="text-center">
              <h4 class="mt-1 mb-5 pb-1">update transaksi</h4>
            </div>
            <form action="../update/proses_update_transaksi.php?id=<?= $hasilTransaksi['id'] ?>" method="POST">
              <div>
                <label for="id_member" class="form-label">id member</label>
                <select id="id_member" name="id_member" class="form-select">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_member");
                  while ($hasil = mysqli_fetch_assoc($query)) {
                  ?>
                    <option value="<?= $hasil['id']; ?>" <?php if ($hasilTransaksi['id_member'] == $hasil['id']) echo 'SELECTED' ?>><?= $hasil['nama']; ?></option>

                  <?php
                  }
                  ?>
                </select>
              </div>
              <label for="formGroupExampleInput" class="form-label">kode invoice</label>
              <div class="form-outline mb-4">
                <input type="text" name="kode_invoice" class="form-control" id="formGroupExampleInput" value="<?= $hasilTransaksi['kode_invoice'] ?>">
              </div>
              <label for="formGroupExampleInput" class="form-label">biaya_tambahan</label>
              <div class="form-outline mb-4">
                <input type="text" name="biaya_tambahan" class="form-control" id="formGroupExampleInput" value="<?= $hasilTransaksi['biaya_tambahan'] ?>">
              </div>
              <label for="formGroupExampleInput" class="form-label">diskon</label>
              <div class="form-outline mb-4">
                <input type="text" name="diskon" class="form-control" id="formGroupExampleInput" value="<?= $hasilTransaksi['diskon'] ?>">
              </div>
              <label for="formGroupExampleInput" class="form-label">pajak</label>
              <div class="form-outline mb-4">
                <input type="text" name="pajak" class="form-control" id="formGroupExampleInput" value="<?= $hasilTransaksi['pajak'] ?>">
              </div>
              <div class="d-flex justify-content-between">
                <div class="outlet-input">
                  <label for="id_outlet" class="form-label">id outlet</label>
                  <select name="id_outlet" id="id_outlet" class="form-select">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
                    while ($hasil = mysqli_fetch_assoc($query)) {
                    ?>
                      <option value="<?= $hasil['id']; ?>" <?php if ($hasilTransaksi['id_outlet'] == $hasil['id']) echo 'SELECTED' ?>><?= $hasil['nama']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="level-user-input">
                  <label for="id_user" class="form-label">id user</label>
                  <select name="id_user" id="id_user" class="form-select">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_user");
                    while ($hasil = mysqli_fetch_assoc($query)) {
                    ?>
                      <option value="<?= $hasil['id']; ?>" <?php if ($hasilTransaksi['id_user'] == $hasil['id']) echo 'SELECTED' ?>><?= $hasil['nama']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="d-flex justify-content-between gap-3">
                <div class="level-user-input  flex-grow-1">
                  <label for="status" class="form-label">Status</label>
                  <select name="status" id="status" class="form-select">
                    <option value="baru" <?php if ($hasilTransaksi['status'] == 'baru') echo 'SELECTED' ?>>baru</option>
                    <option value="proses" <?php if ($hasilTransaksi['status'] == 'proses') echo 'SELECTED' ?>>proses</option>
                    <option value="selesai" <?php if ($hasilTransaksi['status'] == 'selesai') echo 'SELECTED' ?>>selesai</option>
                    <option value="diambil" <?php if ($hasilTransaksi['status'] == 'diambil') echo 'SELECTED' ?>>diambil</option>
                  </select>
                </div>
                <div class="level-user-input  flex-grow-1">
                  <label for="dibayar" class="form-label">dibayar</label>
                  <select name="dibayar" id="dibayar" class="form-select">
                    <option value="belum_dibayar" <?php if ($hasilTransaksi['dibayar'] == 'belum_dibayar') echo 'SELECTED' ?>>belum_dibayar</option>
                    <option value="dibayar" <?php if ($hasilTransaksi['dibayar'] == 'dibayar') echo 'SELECTED' ?>>dibayar</option>
                  </select>
                </div>
              </div>
              <div class="d-flex justify-content-between flex-wrap">
                <div>
                  <label for="formGroupExampleInput2" class="form-label">tgl</label>
                  <div class="form-outline mb-4">
                    <input type="datetime-local" name="tgl" class="form-control" id="formGroupExampleInput2" value="<?= $hasilTransaksi['tgl'] ?>">
                  </div>
                </div>
                <div>
                  <label for="formGroupExampleInput2" class="form-label">batas_waktu</label>
                  <div class="form-outline mb-4">
                    <input type="datetime-local" name="batas_waktu" class="form-control" id="formGroupExampleInput2" value="<?= $hasilTransaksi['batas_waktu'] ?>">
                  </div>
                </div>
                <div>
                  <label for=" formGroupExampleInput2" class="form-label">tgl_bayar</label>
                  <div class="form-outline mb-4">
                    <input type="datetime-local" name="tgl_bayar" class="form-control" id="formGroupExampleInput2" value="<?= $hasilTransaksi['tgl_bayar'] ?>">
                  </div>
                </div>
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