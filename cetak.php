<?php

require_once __DIR__ . '/vendor/autoload.php';
include "page/transaksiLoundry/prosesTransaksiLoundry.php";

$id = $_GET['id'];
$cetak = lihat("SELECT * FROM tb_transaksi
                JOIN tb_user ON (tb_user.id_user = tb_transaksi.id_user)
                JOIN tb_paket ON (tb_paket.id_paket = tb_transaksi.id_paket)
                WHERE id_transaksi = $id");

date_default_timezone_set("Asia/Jakarta");
$jamm = date("H") + 1;
$jam = date($jamm . ":i:s");

$mpdf = new \Mpdf\Mpdf();
foreach ($cetak as $ctk) :
  $html = '
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Laundry</title>
    <link rel="stylesheet" href="css/cetak.css">
  </head>
  <body>
    <div class="container">
      <header>
        <h2 class="jalan">Jalan Balikpapan - Handil II Rt 19 Kelurahan Kuala Samboja</h2>
        <hr>
      </header>
      <main>
        <p>Tanggal Transaksi : ' . $ctk['tanggal_terima'] . '</p>
        <p>Jam Cetak : ' . $jam . '</p>
        <hr>
        <p>Nama Pelanggan : ' . $ctk['nama_user'] . '</p>
        <p>Paket Laundry : ' . $ctk['nama_paket'] . '</p>
        <p>Harga Paket/KG : ' . $ctk['harga_paket'] . '</p>
        <p>Jumah Kiloan : ' . $ctk['jumlah_kiloan'] . '</p>
        <p>Total Harga : ' . $ctk['nominal'] . '</p>
        <hr>
        <p>Terima Kasih Telah Memakai Jasa Laundry Kami</p>
      </main>
    </div>
  </body>

  </html>
  ';
endforeach;
$mpdf->WriteHTML($html);
$mpdf->Output('struk-laundry.pdf', 'I');
