<?php

include "prosesTransaksiLoundry.php";

$id = $_GET['id'];

if (hapus($id) > 0) {
  echo "<script>
          alert('Data Transkasi Berhasil dihapus');
          window.location.href='?page=transaksiLaundry';
        </script>";
} else {
  mysqli_error($koneksi);
}
