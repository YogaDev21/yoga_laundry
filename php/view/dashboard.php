<?php
$tables = ['tb_transaksi', 'tb_user', 'tb_member', 'tb_outlet'];
$results = [];
foreach ($tables as $table) {
  $query = mysqli_query($koneksi, "SELECT COUNT(*) FROM $table");
  $row = mysqli_fetch_array($query);
  $results[$table] = $row[0];
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
<div class="d-flex flex-column container view-dashboard">
  <div class="pt-5 row">
    <div class="col-sm-3 mb-3 mb-sm-0">
      <div class="card text-bg-dark mb-3">
        <div class="card-header">Total Transaksi</div>
        <div class="card-body">
          <h5 class="card-title"><?= $results['tb_transaksi'] ?></h5>
        </div>
      </div>
    </div>
    <div class="col-sm-3 mb-3 mb-sm-0">
      <div class="card text-bg-dark mb-3">
        <div class="card-header">Total User</div>
        <div class="card-body">
          <h5 class="card-title"><?= $results['tb_user'] ?></h5>
        </div>
      </div>
    </div>
    <div class="col-sm-3 mb-3 mb-sm-0">
      <div class="card text-bg-dark mb-3">
        <div class="card-header">Total Member</div>
        <div class="card-body">
          <h5 class="card-title"><?= $results['tb_member'] ?></h5>
        </div>
      </div>
    </div>
    <div class="col-sm-3 mb-3 mb-sm-0">
      <div class="card text-bg-dark mb-3">
        <div class="card-header">Total Outlet</div>
        <div class="card-body">
          <h5 class="card-title"><?= $results['tb_outlet'] ?></h5>
        </div>
      </div>
    </div>
    <h1 class="fw-bold">Selamat Datang <?= $_SESSION['username'] ?></h1>
    <p>Project ini adalah project Pemrograman web Sekolah saya, project ini berfokus dimana pengurus laundry dapat mengatur data member yang ingin mencuci barang mereka, project ini menggunakan php, mysql dan bootstrap 5, untuk mengecek semua fiturnya, kalian dapat menekan tombol control di bawah ini</p>
    <div class="container">
      <div class="table-container table-responsive">
        <h3 class="text-left">Transaksi Terbaru</h3>
        <table class="table table-borderless table-hover">
          <thead class="table-header text-center">
            <th>Nomer</th>
            <th>Kode Invoice</th>
            <th>Nama Pembeli</th>
            <th>Batas Pengambilan</th>
            <th>Status</th>
            <th>Aksi</th>
          </thead>
          <?php
          $tampil = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
          $no = 1;
          while ($hasil = mysqli_fetch_array($tampil)) {
            $batas_waktu = date("M d, Y", strtotime($hasil['batas_waktu']));
            $tgl_bayar = date("M d, Y", strtotime($hasil['tgl_bayar']));
            $id = $hasil['id'];
            $tampilMember = mysqli_query($koneksi, "SELECT tb_transaksi.*, tb_member.nama FROM tb_transaksi INNER JOIN tb_member ON tb_transaksi.id_member = tb_member.id WHERE tb_transaksi.id = $id;");
            $hasilMember = mysqli_fetch_array($tampilMember);
          ?>
            <tr class="text-center">
              <td data-cell="No"><?= $no++ ?></td>
              <td data-cell="Kode Invoice"><?= $hasil['kode_invoice']; ?></td>
              <td data-cell="Nama Pembeli"><?= $hasilMember['nama']; ?></td>
              <td data-cell="Batas Pengambilan"><?= $batas_waktu; ?></td>
              <td data-cell="Status"><?= $hasil['status']; ?></td>
              <td data-cell="Aksi">
                <div class="action-container">
                  <a style="color:#e67f45;" href="./control.php?page=detail_transaksi&id=<?= $hasil['id']; ?>">Detail Transaksi</a>
                </div>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>