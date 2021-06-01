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
