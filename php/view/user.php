<?php
if (@$_SESSION['level_user'] === "owner") {
  echo "<script>alert('Owner tidak dapat melihat halaman ini');
  window.history.back();
  </script>";
}
if (@$_SESSION['level_user'] === "kasir") {
  echo "<script>alert('Kasir tidak dapat melihat halaman ini');
  window.history.back();
  </script>";
}
?>
<div class="view-container">
  <div class="view-header">
    <?php if (isset($_SESSION['status'])) {
    ?>
      <div class="alert alert-light" role="alert">
        <?= $_SESSION['status'] ?>
      </div>
    <?php
      unset($_SESSION['status']);
    } ?>
    <h1 class="fw-bold">Data User</h1>
    <a href="./control.php?page=add_user">
      <button class="view-button">Input Data</button>
    </a>
  </div>
  <div class="container">
    <div class="table-container">
      <table class="table table-borderless table-hover">
        <thead class="table-header text-center">
          <th>Nomer</th>
          <th>nama</th>
          <th>username</th>
          <th>role</th>
          <th>Aksi</th>
        </thead>
        <?php
        $userLogin = $_SESSION['username'];
        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_user");
        $no = 1;
        while ($hasil = mysqli_fetch_array($tampil)) {
        ?>
          <tr class="text-center">
            <td><?= $no++ ?></td>
            <td><?= $hasil['nama']; ?></td>
            <td><?= $hasil['username']; ?></td>
            <td><?= $hasil['role']; ?></td>
            <td>
              <?php if ($hasil['nama'] !== $userLogin) : ?>
                <div class="action-container">
                  <a style="color:#97db84;" href="./control.php?page=update_user&id=<?= $hasil['id']; ?>">EDIT</a> |
                  <a style="color:#cf5e71; cursor: pointer;" onclick="confirmDelete(<?= $hasil['id']; ?>)">DELETE
                </div>
              <?php else : ?>
                <div class="action-container">
                  <p>Ini Akun Anda</p>
                </div>
              <?php endif; ?>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>


<script>
  function confirmDelete(id) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      window.location.href = "../delete/delete_user.php?id=" + id;
    }
  }
</script>