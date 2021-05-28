<?php

session_start();
include "koneksi.php";

// cek jika session login sudah ada
if (isset($_SESSION['login'])) {
  header('Location: index.php');
  exit;
}

if (isset($_POST['login'])) {
  // ambil inputan user
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $role = htmlspecialchars($_POST['role']);
  // cek apakah ada username yang ditemukan
  $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");
  // jika username ditemukan
  if (mysqli_num_rows($result) == 1) {
    // cek apakah passwordnya benar
    $row = mysqli_fetch_assoc($result);
    if ($password === $row['password']) {
      // cek apakah role benar
      if ($role === $row['role']) {
        // cek siapa yang login
        if ($role === 'Admin') {
          $_SESSION['Admin'] = $row['id_user'];
          $_SESSION['login'] = true;

          header('Location: index.php');
          exit;
        } elseif ($role === 'Kasir') {
          $_SESSION['Kasir'] = $row['id_user'];
          $_SESSION['login'] = true;

          header('Location: index.php');
          exit;
        } elseif ($role === 'Pelanggan') {
          $_SESSION['Pelanggan'] = $row['id_user'];
          $_SESSION['login'] = true;

          header('Location: index.php');
          exit;
        }
      } else {
        echo "<script>
            alert('Role anda salah');
          </script>";
      }
    } else {
      echo "<script>
            alert('Password anda salah');
          </script>";
    }
  } else {
    echo "<script>
            alert('Username Tidak ditemukan');
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body>


  <div class="card card-dark" style="width: 35%; margin: 170px auto;">
    <div class="card-header">
      <h3 class="card-title">Login</h3>
    </div>
    <form action="" method="POST">
      <div class="card-body">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" placeholder="Username" name="username" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        <div class="form-group">
          <label for="role">Login Sebagai</label>
          <select class="form-control" id="role" name="role">
            <option>--Pilih role--</option>
            <option value="Admin">Admin</option>
            <option value="Kasir">Kasir</option>
            <option value="Pelanggan">Pelanggan</option>
          </select>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <a href="regis.php" class="btn btn-success">Registrasi Pelanggan</a>
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