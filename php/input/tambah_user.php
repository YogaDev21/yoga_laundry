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
              <h4 class="mt-1 mb-5 pb-1">Register user</h4>
            </div>
            <form action="../input/proses_register_user.php" method="POST">
              <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
              <div class="form-outline mb-4">
                <input type="text" name="nama_lengkap" class="form-control" id="formGroupExampleInput" placeholder="nama lengkap">
              </div>
              <label for="formGroupExampleInput" class="form-label">Username</label>
              <div class="form-outline mb-4">
                <input type="text" name="username" class="form-control" id="formGroupExampleInput" placeholder="username">
              </div>
              <label for="formGroupExampleInput2" class="form-label">Password</label>
              <div class="form-outline mb-4">
                <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="password">
              </div>
              <div class="d-flex justify-content-between gap-5">
                <div class="outlet-input d-flex flex-column ">
                  <label for="id_outlet" class="form-label">id outlet</label>
                  <select name="id_outlet" id="id_outlet" class="form-select">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
                    while ($hasil = mysqli_fetch_assoc($query)) {
                    ?>
                      <option value="<?= $hasil['id']; ?>"><?= $hasil['nama']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="level-user-input d-flex flex-column flex-grow-1">
                  <label for="leveluser" class="form-label">Level user</label>
                  <select name="leveluser" id="leveluser" class="form-select">
                    <option value="admin">admin</option>
                    <option value="kasir">kasir</option>
                    <option value="owner">owner</option>
                  </select>
                </div>
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