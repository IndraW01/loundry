<?php

include "prosesPaketLoundry.php";

$paket = lihat("SELECT * FROM tb_paket");
// var_dump($paket);

?>

<div class="card">
  <div class="card-header">
    <div class="card-title">Paket Loundry</div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Paket</th>
          <th scope="col">Harga Paket/KG</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($paket as $pkt) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $pkt['nama_paket']; ?></td>
            <td><?= $pkt['harga_paket']; ?></td>
            <td>
              <a href="?page=paketLoundry&aksi=ubah&id=<?= $pkt['id_paket']; ?>" class="btn btn-warning">Ubah Harga</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>