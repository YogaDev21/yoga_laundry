<div class="view-container">
  <h1 class="fw-bold">Data transaksi</h1>
  <a href="./control.php?page=add_transaksi">
    <button class="view-button">Input Data</button>
  </a>
  <div class="container">
    <div class="table-container">

      <table class="table table-borderless table-hover">
        <thead class="table-header text-center">
          <th>Nomer</th>
          <th>Kode Invoice</th>
          <th>Batas Waktu</th>
          <th>Tanggal bayar</th>
          <th>Status</th>
          <th>Dibayar</th>
          <th>Aksi</th>
        </thead>
        <?php
        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
        $no = 1;
        while ($hasil = mysqli_fetch_array($tampil)) {
          $batas_waktu = date("M d, Y", strtotime($hasil['batas_waktu']));
          $tgl_bayar = date("M d, Y", strtotime($hasil['tgl_bayar']));
        ?>
          <tr class="text-center">
            <td><?= $no++ ?></td>
            <td><?= $hasil['kode_invoice']; ?></td>
            <td><?= $batas_waktu; ?></td>
            <td><?= $tgl_bayar; ?></td>
            <td><?= $hasil['status']; ?></td>
            <td><?= $hasil['dibayar']; ?></td>
            <td>
              <div class="action-container">
                <a style="color:#e67f45;" href="./control.php?page=detail_transaksi&id=<?= $hasil['id']; ?>">DETAIL</a> | <a style="color:#97db84;" href="./control.php?page=update_transaksi&id=<?= $hasil['id']; ?>">EDIT</a> | <a style="color:#cf5e71" href="../delete/delete_transaksi.php?id=<?= $hasil['id']; ?>">DELETE
              </div>

            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>