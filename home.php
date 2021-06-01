<?php

include "page/transaksiLoundry/prosesTransaksiLoundry.php";

$paketLaundry = lihat("SELECT * FROM tb_paket");
$pengguna = lihat("SELECT * FROM tb_user WHERE role != 'Pelanggan'");
$pelanggan = lihat("SELECT * FROM tb_user WHERE role = 'Pelanggan'");
$transaksi = lihat("SELECT * FROM tb_transaksi");

$dataPaketLaundry = count($paketLaundry);
$dataPengguna = count($pengguna);
$dataPelanggan = count($pelanggan);
$dataTransaksi = count($transaksi);

?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $dataPaketLaundry; ?></h3>

            <p>Menu Paket</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="?page=paketLoundry" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <?php if ($_SESSION['Admin']) : ?>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $dataPengguna; ?></h3>

              <p>Data Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?page=pengguna" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php endif; ?>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3 class="text-white"><?= $dataPelanggan; ?></h3>

            <p class="text-white">Data Pelanggan</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="?page=pelanggan" class="small-box-footer text-white" style="color: white !important;">More info <i class="fas fa-arrow-circle-right text-white"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $dataTransaksi; ?></h3>
            <p>Data Transaksi</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>