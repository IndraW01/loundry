<?php

include "koneksi.php";

function lihat($query)
{
  global $koneksi;
  $data = [];

  $result = mysqli_query($koneksi, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }

  return $data;
}

function ubah($data)
{
  global $koneksi;

  $id = $data['id'];
  $username = $data['username'];
  $password = $data['password'];
  $nama = $data['nama'];
  $jenisKelamin = $data['jenis_kelamin'];
  $no_hp = $data['no_hp'];
  $alamat = $data['alamat'];
  $gambarLama = $data['gambarLama'];



  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = gambar();
  }

  $query = "UPDATE tb_user SET
            username = '$username',
            password = '$password',
            nama_user = '$nama',
            jenis_kelamin = '$jenisKelamin',
            no_hp = $no_hp,
            alamat = '$alamat',
            gambar = '$gambar'
            WHERE id_user = $id";

  $root = $_SERVER['DOCUMENT_ROOT'];
  $namaFolder = $root . "/loundry/img/";
  $ambilFoto = mysqli_query($koneksi, "SELECT gambar FROM tb_user WHERE id_user = $id");
  while ($foto = mysqli_fetch_assoc($ambilFoto)) {
    $foto_lama = $namaFolder . $foto['gambar'];
    unlink($foto_lama);
  }
  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}

function gambar()
{
  // mengambil inputan gambar
  $namaGambar = $_FILES['gambar']['name'];
  $tempatGambar = $_FILES['gambar']['tmp_name'];
  $error = $_FILES['gambar']['error'];
  $ukuran = $_FILES['gambar']['size'];

  // cek apakah ada gambar yang dipilih
  if ($error == 4) {
    echo "<script>
             alert('Gambar blm dipiih');
           </script>";
    return false;
  }
  // cek apakah ekstensi valid
  $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
  $ekstensiGambar = pathinfo($namaGambar, PATHINFO_EXTENSION);
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
             alert('Ekstensi gambar tidak valid');
           </script>";
    return false;
  }
  // cek apakah ukuran lebih dari 1 mb
  if ($ukuran > 1000000) {
    echo "<script>
             alert('Ukuran Gambar terlalu besar');
           </script>";
    return false;
  }
  // cek gambar benar
  $nameAcak = uniqid();
  $nameAcak .= '.';
  $nameAcak .= $ekstensiGambar;
  move_uploaded_file($tempatGambar, "img/" . $nameAcak);
  return $nameAcak;
}
