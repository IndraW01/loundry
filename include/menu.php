<div class="form-inline">
  <div class="input-group" data-widget="sidebar-search">
    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
      <button class="btn btn-sidebar">
        <i class="fas fa-search fa-fw"></i>
      </button>
    </div>
  </div>
</div>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <?php if ($_SESSION['Admin']) : ?>
      <li class="nav-item">
        <a href="?page=" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=paketLoundry" class="nav-link">
          <i class="nav-icon fas fa-shipping-fast"></i>
          <p>Paket Laundry</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=pengguna" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>Pengguna</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=pelanggan" class="nav-link">
          <i class="nav-icon far fa-user-circle"></i>
          <p>Pelanggan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=transaksiLaundry" class="nav-link">
          <i class="nav-icon fas fa-money-check-alt"></i>
          <p>Transaksi Laundry</p>
        </a>
      </li>
    <?php endif; ?>

    <?php if ($_SESSION['Pelanggan']) : ?>
      <li class="nav-item">
        <a href="?page=profile" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Profile</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=paket" class="nav-link">
          <i class="nav-icon fas fa-shipping-fast"></i>
          <p>Pesan Laundry</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=pesanan" class="nav-link">
          <i class="nav-icon fas fa-shipping-fast"></i>
          <p>Bayar Pesanan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=saldo" class="nav-link">
          <i class="nav-icon fas fa-money-check-alt"></i>
          <p>Saldo</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=riwayat" class="nav-link">
          <i class="nav-icon fas fa-money-check-alt"></i>
          <p>Riwayat Transaksi</p>
        </a>
      </li>
    <?php endif; ?>

    <?php if ($_SESSION['Kasir']) : ?>
      <li class="nav-item">
        <a href="index.php" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=pelanggan" class="nav-link">
          <i class="nav-icon far fa-user-circle"></i>
          <p>Pelanggan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=transaksiLaundry" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Transaksi Laundry</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?page=keluar" class="nav-link">
          <i class="nav-icon fas fa-money-check-alt"></i>
          <p>Transaksi Pengeluaran</p>
        </a>
      </li>
    <?php endif; ?>

  </ul>
</nav>
</div>
</aside>