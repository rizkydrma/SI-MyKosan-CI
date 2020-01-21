<body>
  <!-- BAGIAN TOP & NAVBAR -->

  <?php if ($title == "MyKosan - Home Page") : ?>
    <section class="top">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-4 sticky-top fixed-top">
          <a class="navbar-brand" href="<?= base_url() ?>"> <img src="<?= base_url('assets/frontend/') ?>img/logo.png" alt="" class="logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ml-auto" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-item nav-link text-white" href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link text-white" href="#about">About Us</a>
              <a class="nav-item nav-link text-white" href="#contact">Contact Us</a>
              <?php if (!$this->session->userdata('user')) : ?>
                <div class="tombol-nav tombol-nav-left">
                  <a class="nav-link text-white " href="<?= base_url('auth/index') ?>">Login</a>
                </div>
                <div class="tombol-nav tombol-nav-right">
                  <a class="nav-link text-white" href="<?= base_url('auth/daftarUser') ?>">Daftar</a>
                </div>
              <?php else : ?>
                <div class="dropdown user">
                  <a class="btn dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?= base_url('assets/images/user/users/') ?><?= $this->session->userdata('gambar') ?>" alt="" class="img-fluid rounded-circle d-inline-block ">
                    <?= $this->session->userdata('nama') ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="<?= base_url('manageuser') ?>">Ubah Profil</a>
                    <a class="dropdown-item" href="<?= base_url('manageuser/riwayatpembelian') ?>">Riwayat Pembelian</a>
                    <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
                  </div>
                </div>

              <?php endif ?>
            </div>
          </div>
        </nav>
      <?php else : ?>
        <section class="topbar bg-main">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-4 sticky-top fixed-top">
              <a class="navbar-brand" href="#"> <img src="<?= base_url('assets/frontend/') ?>img/logo.png" alt="" class="logo"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse ml-auto" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                  <a class="nav-item nav-link text-white" href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
                  <a class="nav-item nav-link text-white" href="#">About Us</a>
                  <a class="nav-item nav-link text-white" href="#">Contact Us</a>
                  <?php if (!$this->session->userdata('user')) : ?>
                    <div class="tombol-nav tombol-nav-left">
                      <a class="nav-link text-white " href="<?= base_url('auth/index') ?>">Login</a>
                    </div>
                    <div class="tombol-nav tombol-nav-right">
                      <a class="nav-link text-white" href="<?= base_url('auth/daftarUser') ?>">Daftar</a>
                    </div>
                  <?php else : ?>
                    <div class="dropdown user">
                      <a class="btn dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= base_url('assets/images/user/users/') ?><?= $this->session->userdata('gambar') ?>" alt="" class="img-fluid rounded-circle d-inline-block ">
                        <?= $this->session->userdata('nama') ?>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('manageuser') ?>">Ubah Profil</a>
                        <a class="dropdown-item" href="<?= base_url('manageuser/riwayatpembelian') ?>">Riwayat Pembelian</a>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
                      </div>
                    </div>

                  <?php endif ?>
                </div>
              </div>
            </nav>
          </div>
        </section>
      <?php endif ?>