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

function hapus($id)
{
  global $koneksi;

  mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE id_transaksi = $id");
  return mysqli_affected_rows($koneksi);
}
