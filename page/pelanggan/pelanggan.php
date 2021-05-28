<?php

include "prosesPelanggan.php";

$pelanggan = lihat("SELECT * FROM tb_user WHERE role = 'Pelanggan'");

?>

<div class="card">
  <div class="card-header">
    <div class="card-title">Data pelanggan</div>
  </div>
  <div class="card-body">
    <form action="" method="POST">
      <div class="form-group" style="width: 25%;">
        <input type="text" name="keyword" id="keyword" placeholder="Cari" class="form-control" size="10">
        <img src="img/loading-icon-transparent-background-12.jpg" alt="" class="loader">
      </div>
    </form>
    <div id="container">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No HP</th>
            <th scope="col">Alamat</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($pelanggan as $plg) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $plg['username']; ?></td>
              <td><?= $plg['password']; ?></td>
              <td><?= $plg['nama_user']; ?></td>
              <td><?= $plg['jenis_kelamin']; ?></td>
              <td><?= $plg['no_hp']; ?></td>
              <td><?= $plg['alamat']; ?></td>
            <?php endforeach; ?>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>