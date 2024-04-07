<div class="view-container">
  <h1 class="fw-bold">Data Paket</h1>
  <a href="./control.php?page=add_paket">
    <button class="view-button">Input Data</button>
  </a>
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
            <td><?= $no++ ?></td>
            <td><?= $hasil['nama']; ?></td>
            <td><?= $hasil['nama_paket']; ?></td>
            <td><?= $hasil['jenis']; ?></td>
            <td><?= $hasil['harga']; ?></td>
            <td>
              <div class="action-container">
                <a style="color:#97db84;" href="./control.php?page=update_paket&id=<?= $hasil['id']; ?>">EDIT</a> | <a style="color:#cf5e71" href="../delete/delete_paket.php?id=<?= $hasil['id']; ?>">DELETE
              </div>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>