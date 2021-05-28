<?php

include "prosesPesanan.php";

$transaksi = lihat("SELECT * FROM tb_transaksi, tb_paket WHERE tb_transaksi.id_paket = tb_paket.id_paket and id_user = $id_user ORDER BY id_transaksi DESC")[0];
// var_dump($transaksi);
$saldo = lihat("SELECT * FROM tb_saldo WHERE id_user = $id_user")[0];
// var_dump($saldo);

if (isset($_POST['cek'])) {
  if (bayar($_POST) > 0) {
    echo "<script>
            alert('Pesanan Berhasil dilunaskan');
            window.location.href='?page=pesanan';
          </script>";
  } else {
    echo mysqli_error($koneksi);
  }
}

?>

<?php if ($transaksi['status'] != 'Lunas' && $transaksi['id_user']) : ?>
  <div class="card" style="width: 50%;">
    <div class="card-header">
      <div class="card-title"> Bayar Pesanan Anda </div>
    </div>
    <div class="card-body">
      <form action="" method="POST">
        <input type="hidden" name="saldo" value="<?= $saldo['saldo']; ?>">
        <label for="paket">Paket Laundry</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="paket">Paket</span>
          </div>
          <input type="text" class="form-control" id="paket" aria-describedby="paket" value="<?= $transaksi['nama_paket']; ?>">
        </div>
        <label for="jumlahKiloan">Jumlah Kiloan</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="jumlahKiloan">KG</span>
          </div>
          <input type="number" class="form-control" id="jumlahKiloan" aria-describedby="jumlahKiloan" value="<?= $transaksi['jumlah_kiloan']; ?>">
        </div>
        <label for="total">Total Pesanan</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="total">RP</span>
          </div>
          <input type="number" class="form-control" name="total" id="total" aria-describedby="total" value="<?= $transaksi['nominal']; ?>">
        </div>
        <label for="bayar">Bayar Pesanan</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="bayar">RP</span>
          </div>
          <input type="number" class="form-control" name="bayar" id="bayar" aria-describedby="bayar">
        </div>
        <button type="submit" name="cek" class="btn btn-primary">Bayar</button>
      </form>
    </div>
  </div>
<?php else : ?>
  <div class="card" style="width: 50%;">
    <div class="card-header">
      <div class="card-title"> Tidak ada pesanan </div>
    </div>
  </div>
<?php endif; ?>