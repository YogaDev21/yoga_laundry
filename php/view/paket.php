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

    <h1 class="fw-bold">Data Paket</h1>
    <a href="./control.php?page=add_paket">
      <button class="view-button">Input Data</button>
    </a>
  </div>
  <div class="container">
    <div class="table-container">

      <table class="table table-borderless table-hover">
        <thead class="table-header text-center">
          <th>Nomer</th>
          <th>Nama Outlet</th>
          <th>Nama Paket</th>
          <th>jenis</th>
          <th>Harga</th>
          <th>Aksi</th>
        </thead>
        <?php
        $tampil = mysqli_query($koneksi, "SELECT tb_paket.* , tb_outlet.nama
        FROM tb_paket
        INNER JOIN tb_outlet ON tb_paket.id_outlet = tb_outlet.id");
        $no = 1;
        while ($hasil = mysqli_fetch_array($tampil)) {
        ?>
          <tr class="text-center">
            <td data-cell="No"><?= $no++ ?></td>
            <td data-cell="Nama Outlet"><?= $hasil['nama']; ?></td>
            <td data-cell="Nama Paket"><?= $hasil['nama_paket']; ?></td>
            <td data-cell="Jenis"><?= $hasil['jenis']; ?></td>
            <td data-cell="Harga"><?= $hasil['harga']; ?></td>
            <td data-cell="Aksi">
              <div class="action-container">
                <a style="color:#97db84;" href="./control.php?page=update_paket&id=<?= $hasil['id']; ?>">EDIT</a> |
                <a style="color:#cf5e71; cursor: pointer;" onclick="confirmDelete(<?= $hasil['id']; ?>)">DELETE
              </div>
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
      window.location.href = "../delete/delete_paket.php?id=" + id;
    }
  }
</script>