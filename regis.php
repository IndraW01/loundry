<?php

include "koneksi.php";

if (isset($_POST['regis'])) {
  // ambil semua inputan user
  // var_dump($_FILES);
  // die;
  $username = htmlspecialchars(strtolower($_POST['username']));
  $password = htmlspecialchars(strtolower($_POST['password']));
  $nama = htmlspecialchars(stripslashes($_POST['nama']));
  $jenisKelamin = htmlspecialchars($_POST['jenisKelamin']);
  $noHP = htmlspecialchars($_POST['noHP']);
  $alamat = htmlspecialchars($_POST['alamat']);

  // mengambil inputan gambar
  $namaGambar = $_FILES['gambar']['name'];
  $tempatGambar = $_FILES['gambar']['tmp_name'];
  $error = $_FILES['gambar']['error'];
  $ukuran = $_FILES['gambar']['size'];

  // cek apakah username sudah ada
  $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");
  // jika username ditemukan
  if (mysqli_num_rows($result)) {
    echo "<script>
            alert('Username sudah ada');
            window.location.href = 'regis.php';
          </script>";
    return false;
  }
  // cek apakah ada gambar yang dipilih
  if ($error == 4) {
    echo "<script>
            alert('Gambar blm dipiih');
            window.location.href = 'regis.php';
          </script>";
    return false;
  }
  // cek apakah ekstensi valid
  $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
  $ekstensiGambar = pathinfo($namaGambar, PATHINFO_EXTENSION);
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
            alert('Ekstensi gambar tidak valid');
            window.location.href = 'regis.php';
          </script>";
    return false;
  }
  // cek apakah ukuran lebih dari 1 mb
  if ($ukuran > 1000000) {
    echo "<script>
            alert('Ukuran Gambar terlalu besar');
            window.location.href = 'regis.php';
          </script>";
    return false;
  }
  // cek gambar benar
  $nameAcak = uniqid();
  $nameAcak .= '.';
  $nameAcak .= $ekstensiGambar;
  move_uploaded_file($tempatGambar, "img/" . $nameAcak);
  $nameFileBaru = $nameAcak;

  // jika tidak ada username yang sama
  $query = "INSERT INTO tb_user (username, password, role, nama_user, jenis_kelamin, no_hp, alamat, gambar)
            VALUES ('$username', '$password', 'Pelanggan', '$nama', '$jenisKelamin', $noHP, '$alamat', '$nameFileBaru')";
  mysqli_query($koneksi, $query);

  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Regis Berhasil');
            window.location.href='login.php';
          </script>";
  } else {
    echo "<script>
            alert('Regis Gagal');
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body>


  <div class="card card-dark" style="width: 35%; margin: 5px auto;">
    <div class="card-header">
      <h3 class="card-title">Registrasi</h3>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" placeholder="Username" name="username" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" autocomplete="off" required>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin" value="LK" required>
          <label class="form-check-label" for="jenisKelamin"> Laki - Laki </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin" value="PR" required>
          <label class="form-check-label" for="jenisKelamin"> Perempuan </label>
        </div>
        <div class="form-group">
          <label for="noHP">Nomor Hp</label>
          <input type="number" class="form-control" id="noHP" placeholder="noHP" name="noHP" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
        </div>
        <div class="form-group">
          <label for="gambar">gambar</label>
          <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="regis">Registrasi</button>
        <a href="login.php" class="btn btn-success">Kembali</a>
      </div>
    </form>
  </div>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/demo.js"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>