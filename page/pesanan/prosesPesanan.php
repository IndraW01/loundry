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

function bayar($data)
{
  global $koneksi;
  global $id_user;

  $saldo = (int) $data['saldo'];
  $total = (int) $data['total'];
  $bayar = (int) $data['bayar'];

  // cek jika bayar lebih besar dari saldo
  if ($bayar > $saldo) {
    echo "<script>
            alert('Saldo Anda tidak cukup');
            window.location.href='?page=pesanan';
          </script>";
    return false;
  }
  // cek jika pembayaran kurang dari total
  if ($bayar < $total) {
    echo "<script>
            alert('Uang anda tidak cukup');
            window.location.href='?page=pesanan';
          </script>";
    return false;
  }
  $query = "UPDATE tb_transaksi SET
            status = 'Lunas'
            WHERE id_user = $id_user";
  if (mysqli_query($koneksi, $query)) {
    $sisaSaldo = $saldo - $total;
    $query2 = "UPDATE tb_saldo SET
                saldo = $sisaSaldo
                WHERE id_user = $id_user";
    mysqli_query($koneksi, $query2);
  }

  return mysqli_affected_rows($koneksi);
}
