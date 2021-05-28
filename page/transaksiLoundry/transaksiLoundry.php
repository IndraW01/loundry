<?php

include "prosesTransaksiLoundry.php";

// $transaksiLoundry = lihat("SELECT * FROM tb_transaksi, tb_user, tb_paket WHERE 
//                           tb_transaksi.id_user = tb_user.id_user and
//                           tb_transaksi.id_paket = tb_paket.id_paket");
$transaksiLoundry = lihat("SELECT * FROM tb_transaksi
                            JOIN tb_user ON (tb_user.id_user = tb_transaksi.id_user)
                            JOIN tb_paket ON (tb_paket.id_paket = tb_transaksi.id_paket)");
// var_dump($transaksiLoundry);

?>

<div class="card">
  <div class="card-header">
    <div class="card-title">Transaksi Loundry</div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Pelanggan</th>
          <th scope="col">Tanggal Terima</th>
          <th scope="col">Tanggal Selesai</th>
          <th scope="col">Paket Londry</th>
          <th scope="col">Harga Perkilo</th>
          <th scope="col">Kiloan</th>
          <th scope="col">Nominal</th>
          <th scope="col">Catatan</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($transaksiLoundry as $transaksi) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $transaksi['nama_user']; ?></td>
            <td><?= $transaksi['tanggal_terima']; ?></td>
            <td><?= $transaksi['tanggal_selesai']; ?></td>
            <td><?= $transaksi['nama_paket']; ?></td>
            <td><?= $transaksi['harga_paket']; ?></td>
            <td><?= $transaksi['jumlah_kiloan']; ?></td>
            <td><?= $transaksi['nominal']; ?></td>
            <td><?= $transaksi['catatan']; ?></td>
            <?php if ($transaksi['status'] == 'Lunas') : ?>
              <td><a class="btn btn-warning disabled"><?= $transaksi['status']; ?></a></td>
            <?php else : ?>
              <td><a class="btn btn-warning"><?= $transaksi['status']; ?></a></td>
            <?php endif; ?>
            <td align="center">
              <?php if ($transaksi['status'] == 'Lunas') : ?>
                <a onclick="return confirm('Yakin ingin menghapus Data');" href="?page=transaksiLaundry&aksi=hapus&id=<?= $transaksi['id_transaksi']; ?>" class="btn btn-danger">Hapus</a>
                <a href="#" class="btn btn-success">Cetak</a>
              <?php else : ?>
                <a href="#" class="btn btn-danger disabled">Hapus</a>
                <a href="#" class="btn btn-success disabled">Cetak</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>