<?php
$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT tb_detail_transaksi.*,  tb_transaksi.kode_invoice,tb_paket.nama_paket,tb_paket.harga
  FROM tb_detail_transaksi
  INNER JOIN tb_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id
  INNER JOIN tb_paket ON tb_detail_transaksi.id_paket = tb_paket.id  
  WHERE id_transaksi = $id;
  ");
$hasilTransaksi = mysqli_fetch_array($tampil);
$tampilTransaksi = mysqli_query($koneksi, "SELECT tb_transaksi.*, tb_member.nama FROM tb_transaksi INNER JOIN tb_member ON tb_transaksi.id_member = tb_member.id WHERE tb_transaksi.id = $id;");
$hasilTransaksiBaru = mysqli_fetch_array($tampilTransaksi);
$tgl = date("M d, Y", strtotime($hasilTransaksiBaru['tgl']));
?>

<style>
  * {
    color: black !important;
  }

  .navbar {
    display: none;
  }
</style>
<div class="view-container d-flex flex-column align-items-center justify-content-center vh-100">
  <div class="d-flex flex-column align-items-center">
    <img src="../../assets/logoIcon.png" width="150px" class="mb-2">
    <h3 class="fw-bold">Laporan Transaksi #<?= $id ?></h3>
    <h5>Nama Kasir : <?= $hasilTransaksiBaru['nama'] ?></h4>
  </div>
  <div class="container">
    <div class="table-container">
      <table class="table table-borderless table-hover">
        <thead class=>
          <th>Nama</th>
          <th>QTY</th>
          <th>Harga</th>
        </thead>
        <?php
        $totalBayar = 0;
        $tampil = mysqli_query($koneksi, "SELECT tb_detail_transaksi.*, tb_paket.harga, tb_paket.nama_paket,tb_transaksi.pajak,tb_transaksi.diskon,tb_transaksi.biaya_tambahan
FROM tb_detail_transaksi
INNER JOIN tb_paket ON tb_detail_transaksi.id_paket = tb_paket.id 
INNER JOIN tb_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id 
WHERE id_transaksi = $id;
");
        while ($hasil = mysqli_fetch_array($tampil)) {
          $id_transaksi = $hasil['id_transaksi'];
          $pajak = $hasil['pajak'];
          $diskon = $hasil['diskon'];
          $keterangan = $hasil['keterangan'];
          $biayaTambahan = $hasil['biaya_tambahan'];
          $totalBayar += $hasil['harga'] * $hasil['qty'];
          $hasilDiskon = $totalBayar * ($diskon / 100);
          $totalHasil = $totalBayar + $biayaTambahan - $hasilDiskon + $pajak;
        ?>
          <tr>
            <td><?= $hasil['nama_paket']; ?></td>
            <td><?= $hasil['qty']; ?></td>
            <td>Rp. <?= $hasil['harga'] * $hasil['qty']; ?></td>
          </tr>
        <?php } ?>
        <?php if ($pajak ?? 0) : ?>
          <tr>
            <td class="fw-bold">Pajak</td>
            <td></td>
            <td colspan="2">Rp. <?= $pajak ?? 0; ?></td>
          </tr>
        <?php endif; ?>
        <?php if ($diskon ?? 0) : ?>
          <tr>
            <td class="fw-bold">diskon</td>
            <td></td>
            <td colspan="2"><?= $diskon ?? 0; ?>%</td>
          </tr>
        <?php endif; ?>

        <tr>
          <td class="fw-bold">Biaya Tambahan</td>
          <td></td>
          <td colspan="2">Rp. <?= $biayaTambahan ?? 0; ?></td>
        </tr>
        <tr>
          <td class="fw-bold">Total</td>
          <td></td>
          <td class="fw-bold" colspan="2">Rp. <?= $totalHasil ?? 0; ?></td>
        </tr>
      </table>
    </div>

  </div>
  <div>

    <p class="fw-bold"><?= $tgl ?> ~ <?= $hasilTransaksi['kode_invoice'] ?> </p>
  </div>
</div>

<script>
  window.print();
  setTimeout(function() {
    location.href = '../view/control.php?page=detail_transaksi&id=<?= $id_transaksi ?>';
  }, 100);
</script>