<?php
$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT tb_detail_transaksi.*, tb_paket.harga, tb_paket.nama_paket,tb_transaksi.pajak,tb_transaksi.diskon,tb_transaksi.biaya_tambahan,tb_transaksi.status
FROM tb_detail_transaksi
INNER JOIN tb_paket ON tb_detail_transaksi.id_paket = tb_paket.id 
INNER JOIN tb_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id 
WHERE id_transaksi = $id;
");
$no = 1;
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
    <h1 class="fw-bold">Detail transaksi</h1>
    <a href="./control.php?page=add_detail_transaksi&id=<?= $_GET['id']; ?>">
      <button class="view-button">Input Data</button>
    </a>
  </div>
  <div class="container">
    <a class="fw-bold" href="./control.php?page=view_transaksi">Lihat Semua Transaksi</a>
    <div class="table-container">

      <table class="table table-borderless table-hover">
        <thead class="table-header text-center">
          <th>Nomer</th>
          <th>Nama Paket</th>
          <th>QTY</th>
          <th>Harga</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </thead>
        <?php
        $totalBayar = 0;
        while ($hasil = mysqli_fetch_array($tampil)) {
          $id_transaksi = $hasil['id_transaksi'];
          $pajak = $hasil['pajak'];
          $diskon = $hasil['diskon'];
          $biayaTambahan = $hasil['biaya_tambahan'];
          $totalBayar += $hasil['harga'] * $hasil['qty'];
          $hasilDiskon = $totalBayar * ($diskon / 100);
          $totalHasil = $totalBayar + $biayaTambahan - $hasilDiskon + $pajak;
          $status = $hasil['status'];
        ?>
          <tr class="text-center">
            <td><?= $no++ ?></td>
            <td><?= $hasil['nama_paket']; ?></td>
            <td><?= $hasil['qty']; ?></td>
            <td>Rp. <?= $hasil['harga'] * $hasil['qty']; ?></td>
            <td><?= $hasil['keterangan']; ?></td>
            <td>
              <div class="action-container">
                <?php
                if (@$_SESSION['level_user'] === "owner") :
                ?>
                  <p>owner tidak dapat mengubah data ini</p>
                <?php else : ?>
                  <a style="color:#97db84;" href="./control.php?page=update_detail_transaksi&id_transaksi=<?= $id ?>&id=<?= $hasil['id']; ?>">EDIT</a> |
                  <a style="color:#cf5e71; cursor: pointer;" onclick="confirmDelete(<?= $hasil['id']; ?>)">DELETE
                  <?php endif; ?>
              </div>
            </td>
          </tr>
        <?php } ?>
        <?php if ($pajak ?? 0) : ?>
          <tr class="text-center">
            <td></td>
            <td></td>
            <td class="fw-bold">Pajak</td>
            <td class="fw-bold">Rp. <?= $pajak ?? 0; ?></td>
            <td></td>
            <td></td>
          </tr>
        <?php endif; ?>
        <?php if ($diskon ?? 0) : ?>
          <tr class="text-center">
            <td></td>
            <td></td>
            <td class="fw-bold">diskon</td>
            <td class="fw-bold"><?= $diskon ?? 0; ?>%</td>
            <td></td>
            <td></td>
          </tr>
        <?php endif; ?>
        <?php if ($biayaTambahan ?? 0) : ?>
          <tr class="text-center">
            <td></td>
            <td></td>
            <td class="fw-bold">Biaya Tambahan</td>
            <td class="fw-bold">Rp. <?= $biayaTambahan ?? 0; ?></td>
            <td></td>
            <td></td>
          </tr>
        <?php endif; ?>
        <tr class="text-center">
          <td></td>
          <td></td>
          <td class="fw-bold">Total Bayar</td>
          <td class="fw-bold">Rp. <?= $totalHasil ?? 0; ?></td>
          <td></td>
          <td>
            <?php $cekHasilCetak = mysqli_num_rows($tampil);
            if ($cekHasilCetak >= 1) :
            ?>
              <a style="color:#e67f45;" href="./control.php?page=cetak_transaksi&id=<?= $id_transaksi; ?>">CETAK</a>
            <?php else : ?>
              <p>Tidak ada data untuk dicetak</p>
            <?php endif; ?>
          </td>
        </tr>
      </table>
    </div>

  </div>
</div>
<script>
  function confirmDelete(id) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      window.location.href = "../delete/delete_detail_transaksi.php?id=" + id;
    }
  }
</script>