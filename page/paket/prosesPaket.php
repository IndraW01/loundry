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

function tambah($data)
{
  global $koneksi;

  $pelanggan = htmlspecialchars($data['pelanggan']);
  $tanggalTerima = htmlspecialchars($data['tanggalTerima']);
  $tanggalSelesai = htmlspecialchars($data['tanggalSelesai']);
  $paket = htmlspecialchars($data['paket']);
  $jumlahKiloan = htmlspecialchars($data['jumlahKiloan']);
  $total = htmlspecialchars($data['total']);
  $catatan = htmlspecialchars($data['catatan']);

  $query = "INSERT INTO tb_transaksi (id_user, id_paket, tanggal_terima, tanggal_selesai, jumlah_kiloan, nominal, catatan, status)
            VALUES ('$pelanggan', '$paket', '$tanggalTerima', '$tanggalSelesai', '$jumlahKiloan', '$total', '$catatan', 'Belum Lunas')";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}
