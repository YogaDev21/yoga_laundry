<body class="min-vh-100 d-flex">
  <div class="container d-flex align-items-center justify-content-center">
    <div class="col-xl-5 ">
      <div class="card rounded-3 text-black">
        <div class="row g-0">
          <div class="card-body p-md-5 mx-md-4 text-white">
            <div class="text-center">
              <h4 class="mt-1 mb-5 pb-1">Tambah transaksi</h4>
            </div>
            <form action="../input/proses_tambah_transaksi.php" method="POST">
              <div class="d-flex flex-column justify-content-between">
                <label for="id_member" class="form-label">id member</label>
                <input type="text" name="id_member" id="id_member" list="id_member_list" class="form-select">
                <datalist id="id_member_list">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_member");
                  while ($hasil = mysqli_fetch_assoc($query)) {
                  ?>
                    <option value="<?= $hasil['id']; ?>"><?= $hasil['nama']; ?></option>
                  <?php
                  }
                  ?>
                </datalist>
              </div>
              <div class="d-flex flex-column justify-content-between">
                <label for="dibayar" class="form-label">dibayar</label>
                <select name="dibayar" id="dibayar" class="form-select">
                  <option value="belum_dibayar">belum_dibayar</option>
                  <option value="dibayar">dibayar</option>
                </select>
              </div>
              <label for="formGroupExampleInput" class="form-label">biaya_tambahan</label>
              <div class="form-outline mb-4">
                <input type="text" name="biaya_tambahan" class="form-control" id="formGroupExampleInput">
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