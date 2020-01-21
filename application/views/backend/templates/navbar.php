<div class="main-panel" id="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" href="#"><?= $title ?></a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <?php if ($this->session->userdata('pemilik')) : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="now-ui-icons ui-1_bell-53"></i>
                <p>
                  Notifikasi <span class="badge badge-light ml-2"><?= $notif->notif ?></span>
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right notifikasi" aria-labelledby="navbarDropdownMenuLink">
                  <p> Ada <span class="text-primary"><?= $notif->notif ?></span> Transaksi baru yang belum dibaca</p>
                  <a href="<?= base_url('transaksi') ?>" class="btn btn-primary">Lihat semua</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons users_single-02"></i>
                <p>
                  <?= $this->session->userdata('nama') ?>
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?= base_url('user') ?>">Setting</a>
                <a class="dropdown-item tombol-logout" href="<?= base_url('auth/logout') ?>">Logout</a>
              </div>
            </li>
          <?php else : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons users_single-02"></i>
                <p>
                  <?= $this->session->userdata('nama') ?>
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item tombol-logout" href="<?= base_url('auth/logout') ?>">Logout</a>
              </div>
            </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->