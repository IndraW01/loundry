<?php

include "prosesRiwayat.php";

$riwayatLoundry = lihat("SELECT * FROM tb_transaksi
                            JOIN tb_user ON (tb_user.id_user = tb_transaksi.id_user)
                            JOIN tb_paket ON (tb_paket.id_paket = tb_transaksi.id_paket)
                            WHERE nama_user = '$nama' AND status = 'Lunas'");
// var_dump($riwayatLoundry);

?>

<div class="card">
  <div class="card-header">
    <div class="card-title">Riwayat Pesanan</div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal Selesai</th>
          <th scope="col">Paket Londry</th>
          <th scope="col">Kiloan</th>
          <th scope="col">Nominal</th>
          <th scope="col">Catatan</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($riwayatLoundry) == 0) : ?>
          <tr>
            <td colspan="6" align="center">Riwayat Kosong</td>
          </tr>
        <?php else : ?>
          <?php $no = 1; ?>
          <?php foreach ($riwayatLoundry as $riwayat) : ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $riwayat['tanggal_selesai']; ?></td>
              <td><?= $riwayat['nama_paket']; ?></td>
              <td><?= $riwayat['jumlah_kiloan']; ?></td>
              <td><?= $riwayat['nominal']; ?></td>
              <td><?= $riwayat['catatan']; ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>