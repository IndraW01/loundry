<?php
sleep(1);
require "proses.php";

$keyword = $_GET['keyword2'];
$query = "SELECT * FROM tb_user WHERE
          nama_user LIKE '%$keyword%' and
          role != 'Pelanggan'";

$pengguna = lihat($query);
$cekdata = count($pengguna);
if ($cekdata == 0) {
  $tidak = false;
}

?>


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
    <?php if (isset($tidak)) : ?>
      <tr>
        <td colspan="8" align="center">Data Tidak ada</td>
      </tr>
    <?php else : ?>
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
      <?php endif; ?>
  </tbody>
</table>