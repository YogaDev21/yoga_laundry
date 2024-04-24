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
<style>
  @media (max-width: 993px) {
    tbody tr {
      border-bottom: 1px solid white;
      margin: 0.5rem 0;
    }

    th {
      display: none;
    }

    td {
      display: flex;
      gap: 0.5rem;
      padding: 0.5rem 1rem;
    }

    td::before {
      content: attr(data-cell) ": ";
      font-weight: 700;
      text-transform: capitalize;
    }
  }
</style>
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
    <h1 class="fw-bold">Data Outlet</h1>
    <a href="./control.php?page=add_outlet">
      <button class="view-button">Input Data</button>
    </a>
  </div>
  <div class="container">
    <div class="table-container">
      <table class="table table-borderless table-hover">
        <thead class="table-header text-center">
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Telp</th>
          <th>Aksi</th>
        </thead>
        <?php
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
        while ($hasil = mysqli_fetch_array($tampil)) {
        ?>
          <tr class="text-center">
            <td data-cell="No"><?= $no++ ?></td>
            <td data-cell="Nama"><?= $hasil['nama']; ?></td>
            <td data-cell="Alamat"><?= $hasil['alamat']; ?></td>
            <td data-cell="Telp"><?= $hasil['tlp']; ?></td>
            <td data-cell="Aksi">
              <div class="action-container">
                <a style="color:#97db84;" href="./control.php?page=update_outlet&id=<?= $hasil['id']; ?>">EDIT</a> |
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
      window.location.href = "../delete/delete_outlet.php?id=" + id;
    }
  }
</script>