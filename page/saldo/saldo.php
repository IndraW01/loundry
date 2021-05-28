<?php
include_once "koneksi.php";

$saldo = mysqli_query($koneksi, "SELECT * FROM tb_saldo, tb_user WHERE tb_saldo.id_user=tb_user.id_user and nama_user = '$nama'");
$cek = mysqli_fetch_assoc($saldo);
// cek debugging
// var_dump($cek);
$saldoSekarang = $cek['saldo'];
$id_user = $cek['id_user'];

if (isset($_POST['tambahSaldo'])) {
  // ambil inputan user
  $pin = htmlspecialchars($_POST['pin']);
  $saldo = htmlspecialchars(($_POST['saldo']));
  $saldo2 = (int) $saldo;

  $saldoMasuk = (int) $saldoSekarang + $saldo2;

  // cek apakah pin sama
  if ($pin !== $cek['pin']) {
    echo "<script>
            alert('Pin anda salah');
            window.location.href = '?page=saldo';
          </script>";
    return false;
  }

  $query = "UPDATE tb_saldo SET
            saldo = $saldoMasuk
            WHERE id_user = $id_user";
  mysqli_query($koneksi, $query);
  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Saldo anda Berhasil ditambahkan');
            window.location.href = '?page=saldo';
          </script>";
  } else {
    echo "<script>
            alert('Saldo Anda gagal ditambahkan);
            window.location.href = '?page=saldo';
          </script>";
  }
}

?>

<div class="row">
  <div class="col-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Saldo</h3>
      </div>
      <div class="card-body">
        <?php if ($cek['pin'] == '') : ?>
          <p>Anda harus buat pin terlebih dahulu</p>
          <a href="?page=saldo&aksi=pin" class="btn btn-primary">Buat Pin</a>
        <?php elseif ($id_user == $cek['id_user']) : ?>
          <h3>Saldo Anda : Rp <?= $cek['saldo']; ?></h3>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="col-5">
    <?php if ($cek['pin'] != '') : ?>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Saldo</h3>
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="pin">Masukkan Pin anda</label>
              <input type="number" class="form-control" name="pin" id="pin">
            </div>
            <div class="form-group">
              <label for="saldo">Masukkan Jumlah saldo anda</label>
              <input type="number" class="form-control" name="saldo" id="saldo" required>
            </div>
            <button type="submit" name="tambahSaldo" class="btn btn-primary">Tambah Saldo</button>
          </form>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>