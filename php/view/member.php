<div class="view-container">
  <h1 class="fw-bold">Data member</h1>
  <a href="./control.php?page=add_member">
    <button class="view-button">Input Data</button>
  </a>
  <div class="container">
    <div class="table-container">
      <table class="table table-borderless table-hover">
        <thead class="table-header text-center">
          <th>Nomer</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Telp</th>
          <th>Aksi</th>
        </thead>
        <?php
        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_member");
        $no = 1;
        while ($hasil = mysqli_fetch_array($tampil)) {
        ?>
          <tr class="text-center">
            <td><?= $no++ ?></td>
            <td><?= $hasil['nama']; ?></td>
            <td><?= $hasil['alamat']; ?></td>
            <td><?php if ($hasil['jenis_kelamin'] == 'P') {
                  echo $hasil['jenis_kelamin'] = 'Perempuan';
                } elseif ($hasil['jenis_kelamin'] == 'L') {
                  echo $hasil['jenis_kelamin'] = 'Laki-Laki';
                }
                ?></td>
            <td><?= $hasil['tlp']; ?></td>
            <td>
              <div class="action-container">
                <a style="color:#97db84;" href="./control.php?page=update_member&id=<?= $hasil['id']; ?>">EDIT</a> | <a style="color:#cf5e71" href="../delete/delete_member.php?id=<?= $hasil['id']; ?>">DELETE
              </div>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>