<?php

include "prosesPaket.php";

if (isset($_POST['pesan'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Pesanan Berhasil ditambahkan');
            window.location.href='?page=pesanan';
          </script>";
  } else {
    echo mysqli_error($koneksi);
  }
}


$hargaPaket = lihat("SELECT harga_paket FROM tb_paket");
// var_dump($hargaPaket);

?>

<script>
  function paketLaundry() {
    const paket = document.getElementById('paket').value;
    const jumlahKiloan = document.getElementById('jumlahKiloan');
    const total = document.getElementById('total');

    if (paket == 1) {
      let harga = 0;
      jumlahKiloan.addEventListener('keyup', function() {
        let kiloan = jumlahKiloan.value;
        harga = parseInt(kiloan) * <?= $hargaPaket[0]['harga_paket']; ?>;
        if (!isNaN(harga)) {
          total.value = harga;
        }
      });
    } else if (paket == 2) {
      let harga = 0;
      jumlahKiloan.addEventListener('keyup', function() {
        let kiloan = jumlahKiloan.value;
        harga = parseInt(kiloan) * <?= $hargaPaket[1]['harga_paket']; ?>;
        if (!isNaN(harga)) {
          total.value = harga;
        }
      });
    } else if (paket == 3) {
      let harga = 0;
      jumlahKiloan.addEventListener('keyup', function() {
        let kiloan = jumlahKiloan.value;
        harga = parseInt(kiloan) * <?= $hargaPaket[2]['harga_paket']; ?>;
        if (!isNaN(harga)) {
          total.value = harga;
        }
      });
    }
  }
</script>

<div class="card" style="width: 50%;">
  <div class="card-header">
    <div class="card-title">Pesen Paket Laundry</div>
  </div>
  <div class="card-body">
    <form action="" method="POST">
      <div class="form-group">
        <label for="pelanggan">Nama Pelanggan</label>
        <input type="text" id="pelanggan" value="<?= $nama; ?>" class="form-control" readonly>
        <input type="hidden" name="pelanggan" id="pelanggan" value="<?= $id_user; ?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="tanggalTerima">Tanggal Terima</label>
        <input type="date" name="tanggalTerima" id="tanggalTerima" class="form-control">
      </div>
      <div class="form-group">
        <label for="tanggalSelesai">Tanggal Selesai</label>
        <input type="date" name="tanggalSelesai" id="tanggalSelesai" class="form-control">
      </div>
      <div class="form-group">
        <label for="paket">Pilih Paket</label>
        <select name="paket" id="paket" class="form-control paket" onchange="paketLaundry();">
          <option value="paket">--Pilih Paket--</option>

          <?php $paket = lihat("SELECT * FROM tb_paket"); ?>

          <?php foreach ($paket as $pkt) : ?>
            <option value="<?= $pkt['id_paket']; ?>"><?= $pkt['nama_paket']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="jumlahKiloan">Jumlah Kiloan</label>
        <input type="number" name="jumlahKiloan" id="jumlahKiloan" class="form-control">
      </div>
      <div class="form-group">
        <label for="total">Nominal</label>
        <input type="number" name="total" id="total" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label for="catatan">Catatan</label>
        <textarea class="form-control" name="catatan" id="catatan" rows="3"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" name="pesan" class="btn btn-primary">Pesan Laundry</button>
      </div>
    </form>
  </div>
</div>