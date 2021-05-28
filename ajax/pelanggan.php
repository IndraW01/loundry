<?php
sleep(1);
require "proses.php";

$keyword = $_GET['keyword'];
$query = "SELECT * FROM tb_user WHERE
          nama_user LIKE '%$keyword%' and
          role = 'Pelanggan'";

$pelanggan = lihat($query);
$cekdata = count($pelanggan);
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
    </tr>
  </thead>
  <tbody>
    <?php if (isset($tidak)) : ?>
      <tr>
        <td colspan="7" align="center">Data Tidak ada</td>
      </tr>
    <?php else : ?>
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
      <?php endif; ?>
  </tbody>
</table>