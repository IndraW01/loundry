<?php

include "prosesPengguna.php";

$pengguna = lihat("SELECT * FROM tb_user WHERE role = 'Admin' or role = 'Kasir'");

?>

<div class="card">
  <div class="card-header">
    <div class="card-title">Data Pengguna</div>
  </div>
  <div class="card-body">
    <form action="" method="POST">
      <div class="form-group" style="width: 25%;">
        <input type="text" name="keyword2" id="keyword2" placeholder="Cari" class="form-control" size="10">
        <img src="img/loading-icon-transparent-background-12.jpg" alt="" class="loader">
      </div>
    </form>
    <div id="container2">
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
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($pengguna as $pgn) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $pgn['username']; ?></td>
              <td><?= $pgn['password']; ?></td>
              <td><?= $pgn['nama_user']; ?></td>
              <td><?= $pgn['jenis_kelamin']; ?></td>
              <td><?= $pgn['no_hp']; ?></td>
              <td><?= $pgn['alamat']; ?></td>
              <td>
                <a href="?page=pengguna&aksi=ubah&id=<?= $pgn['id_user']; ?>" class="btn btn-warning">Ubah Pengguna</a>
              </td>
            <?php endforeach; ?>

            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>