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
  $hargaUbah = $data['hargaUbah'];

  if ($hargaUbah == '') {
    echo "<script>
          alert('Harga Ubah Belum dimasukkan');
        </script>";
  }
  $query = "UPDATE tb_paket SET
            harga_paket = $hargaUbah
            WHERE id_paket = $id";

  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}
