<?php

include "prosesProfile.php";

$profile = lihat("SELECT * FROM tb_user WHERE id_user = $id_user")[0];

?>

<div class="card">
  <div class="card-header">
    <div class="card-title">Profile</div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Nama</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">No HP</th>
          <th scope="col">Alamat</th>
          <th scope="col">Gambar</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $profile['username']; ?></td>
          <td><?= $profile['password']; ?></td>
          <td><?= $profile['nama_user']; ?></td>
          <td><?= $profile['jenis_kelamin']; ?></td>
          <td><?= $profile['no_hp']; ?></td>
          <td><?= $profile['alamat']; ?></td>
          <td>
            <img src="img/<?= $profile['gambar']; ?>" alt="" width="70px">
          </td>
          <td>
            <a href="?page=profile&aksi=ubah&id=<?= $profile['id_user']; ?>" class="btn btn-warning">Ubah Profile</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>