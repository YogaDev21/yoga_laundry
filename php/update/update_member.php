<?php
if (@$_SESSION['level_user'] === "owner") {
  echo "<script>alert('Owner tidak dapat menambah data detail transaksi');
  window.history.back();
  </script>";
}
$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_member WHERE id='$id'");
$hasil = mysqli_fetch_array($tampil);
?>

<body class="min-vh-100 d-flex flex-column gap-5">
  <div class="container d-flex align-items-center justify-content-center">
    <div class="col-xl-5 ">
      <div class="card rounded-3 text-black">
        <div class="row g-0">
          <div class="card-body p-md-5 mx-md-4 text-white">
            <div class="text-center">
              <h4 class="mt-1 mb-5 pb-1">Update Member</h4>
            </div>
            <form action="../update/proses_update_member.php?id=<?= $hasil['id'] ?>" method="POST">
              <label for="formGroupExampleInput" class="form-label">nama</label>
              <div class="form-outline mb-4">
                <input type="text" name="nama" class="form-control" id="formGroupExampleInput" value="<?= $hasil['nama'] ?>">
              </div>
              <label for="formGroupExampleInput" class="form-label">alamat</label>
              <div class="form-outline mb-4">
                <input type="text" name="alamat" class="form-control" id="formGroupExampleInput" value="<?= $hasil['alamat'] ?>">
              </div>
              <label for="formGroupExampleInput2" class="form-label">telp</label>
              <div class="form-outline mb-4">
                <input type="text" name="tlp" class="form-control" id="formGroupExampleInput2" value="<?= $hasil['tlp'] ?>">
              </div>
              <label for="jenis_kelamin" class="form-label">jenis_kelamin</label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                <option value="L" <?php if ($hasil['jenis_kelamin'] == 'L') echo 'SELECTED' ?>>Laki laki</option>
                <option value="P" <?php if ($hasil['jenis_kelamin'] == 'P') echo 'SELECTED' ?>>Perempuan</option>
              </select>
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