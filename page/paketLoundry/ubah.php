<?php

include "prosesPaketLoundry.php";

$id = $_GET['id'];
$hargaPaket = lihat("SELECT * FROM tb_paket WHERE id_paket = $id")[0];

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
          alert('Harga Paket berhasil diubah');
          window.location.href='?page=paketLoundry';
        </script>";
  } else {
    mysqli_error($koneksi);
  }
}

?>

<div class="card" style="width: 50%;">
  <div class="card-header">
    <div class="card-title">Ubah Harga Paket</div>
  </div>
  <div class="card-body">
    <form action="" method="POST">
      <input type="hidden" name="id" value="<?= $hargaPaket['id_paket']; ?>">
      <div class="form-group">
        <label for="hargaAwal">Harga Awal</label>
        <input type="number" class="form-control" name="hargaAwal" readonly value="<?= $hargaPaket['harga_paket']; ?>">
      </div>
      <div class="form-group">
        <label for="hargaUbah">Harga Ubah</label>
        <input type="number" class="form-control" name="hargaUbah">
      </div>
      <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
      <a href="?page=paketLoundry" class="btn btn-warning">Kembali</a>
    </form>
  </div>
</div>