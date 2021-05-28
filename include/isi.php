<?php

$page = $_GET['page'];
$aksi = $_GET['aksi'];

if ($_SESSION['Admin'] || $_SESSION['Kasir']) {
  if ($page == '') {
    include 'home.php';
  }
}

if ($_SESSION['Pelanggan']) {
  if ($page == '') {
    include 'page/profile/profile.php';
  }
}

// role admin
if ($page == 'paketLoundry') {
  if ($aksi == '') {
    include "page/paketLoundry/paketLoundry.php";
  } elseif ($aksi == 'ubah') {
    include "page/paketLoundry/ubah.php";
  }
}

if ($page == 'pengguna') {
  if ($aksi == '') {
    include "page/pengguna/pengguna.php";
  } elseif ($aksi == 'ubah') {
    include "page/pengguna/ubah.php";
  }
}

if ($page == 'pelanggan') {
  if ($aksi == '') {
    include 'page/pelanggan/pelanggan.php';
  }
}

if ($page == 'transaksiLaundry') {
  if ($aksi == '') {
    include "page/transaksiLoundry/transaksiLoundry.php";
  } elseif ($aksi == 'hapus') {
    include "page/transaksiLoundry/hapus.php";
  }
}



// role pelanggan

if ($page == 'profile') {
  if ($aksi == '') {
    include "page/profile/profile.php";
  } elseif ($aksi == 'ubah') {
    include "page/profile/ubah.php";
  }
}

if ($page == 'paket') {
  if ($aksi == '') {
    include "page/paket/paket.php";
  }
}

if ($page == 'pesanan') {
  if ($aksi == '') {
    include "page/pesanan/pesanan.php";
  }
}

if ($page == 'saldo') {
  if ($aksi == '') {
    include 'page/saldo/saldo.php';
  } elseif ($aksi == 'pin') {
    include 'page/saldo/pin.php';
  }
}
