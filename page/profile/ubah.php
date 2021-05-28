<?php

include "prosesProfile.php";

$id = $_GET['id'];
$ubahProfile = lihat("SELECT * FROM tb_user WHERE id_user = $id")[0];

if (isset($_POST['ubah'])) {
  if (ubah($_POST) >= 0) {
    echo "<script>
          alert('Profile berhasil diubah');
          window.location.href='?page=profile';
        </script>";
  } else {
    mysqli_error($koneksi);
  }
}

?>


<div class="card" style="width: 50%;">
  <div class="card-header">
    <div class="card-title">Ubah Profile</div>
  </div>
  <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="gambarLama" value="<?= $ubahProfile['gambar']; ?>">
      <input type="hidden" name="id" value="<?= $ubahProfile['id_user']; ?>">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" class="form-control" name="username" value="<?= $ubahProfile['username']; ?>">
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input type="text" id="password" class="form-control" name="password" value="<?= $ubahProfile['password']; ?>">
      </div>
      <div class="form-group">
        <label for="nama">nama</label>
        <input type="text" id="nama" class="form-control" name="nama" value="<?= $ubahProfile['nama_user']; ?>">
      </div>
      <input type="hidden" id="jenis_kelamin" class="form-control" name="jenis_kelamin" value="<?= $ubahProfile['jenis_kelamin']; ?>">
      <div class="form-group">
        <label for="no_hp">no_hp</label>
        <input type="text" id="no_hp" class="form-control" name="no_hp" value="<?= $ubahProfile['no_hp']; ?>">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $ubahProfile['alamat']; ?></textarea>
      </div>
      <div class="form-group">
        <p>Masukkan Gambar Baru</p>
        <img src="img/<?= $ubahProfile['gambar']; ?>" alt="" width="70px">
        <input type="file" name="gambar" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
      <a href="?page=profile" class="btn btn-warning">Kembali</a>
    </form>
  </div>
</div>