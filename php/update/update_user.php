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
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id='$id'");
$hasilUser = mysqli_fetch_array($tampil);
?>

<body class="min-vh-100 d-flex flex-column gap-5">
  <div class="container d-flex align-items-center justify-content-center">
    <div class="col-xl-5 ">
      <div class="card rounded-3 text-black">
        <div class="row g-0">
          <div class="card-body p-md-5 mx-md-4 text-white">
            <div class="text-center">
              <h4 class="mt-1 mb-5 pb-1">Update user</h4>
            </div>
            <form action="../update/proses_update_user.php?id=<?= $hasilUser['id'] ?>" method="POST">
              <label for="formGroupExampleInput" class="form-label">nama lengkap</label>
              <div class="form-outline mb-4">
                <input type="text" name="nama_lengkap" class="form-control" id="formGroupExampleInput" value="<?= $hasilUser['nama'] ?>">
              </div>
              <label for="formGroupExampleInput" class="form-label">username</label>
              <div class="form-outline mb-4">
                <input type="text" name="username" class="form-control" id="formGroupExampleInput" value="<?= $hasilUser['username'] ?>">
              </div>
              <label for="formGroupExampleInput2" class="form-label">password</label>
              <div class="form-outline mb-4">
                <input type="password" name="password" class="form-control" id="formGroupExampleInput2" value="<?= $hasilUser['password'] ?>">
              </div>
              <div class="d-flex justify-content-between">
                <div class="outlet-input">
                  <label for="id_outlet" class="form-label">id outlet</label>
                  <select name="id_outlet" id="id_outlet" class="form-select">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
                    while ($hasil = mysqli_fetch_assoc($query)) {
                    ?>
                      <option value="<?= $hasil['id']; ?>" <?php if ($hasil['id'] == $hasilUser['id_outlet']) echo 'SELECTED' ?>><?= $hasil['nama']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="level-user-input">
                  <label for="leveluser" class="form-label">Level user</label>
                  <select name="leveluser" id="leveluser" class="form-select">
                    <option value="admin" <?php if ($hasilUser['role'] == 'admin') echo 'SELECTED' ?>>admin</option>
                    <option value="kasir" <?php if ($hasilUser['role'] == 'kasir') echo 'SELECTED' ?>>kasir</option>
                    <option value="owner" <?php if ($hasilUser['role'] == 'owner') echo 'SELECTED' ?>>owner</option>
                  </select>
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