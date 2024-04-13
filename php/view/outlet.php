<div class="view-container">
  <h1 class="fw-bold">Data Outlet</h1>
  <a href="./control.php?page=add_outlet">
    <button class="view-button">Input Data</button>
  </a>
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
            <td><?= $no++ ?></td>
            <td><?= $hasil['nama']; ?></td>
            <td><?= $hasil['alamat']; ?></td>
            <td><?= $hasil['tlp']; ?></td>
            <td>
              <div class="action-container">
                <a style="color:#97db84;" href="./control.php?page=update_outlet&id=<?= $hasil['id']; ?>">EDIT</a> | <a style="color:#cf5e71" href="../delete/delete_outlet.php?id=<?= $hasil['id']; ?>">DELETE
              </div>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>