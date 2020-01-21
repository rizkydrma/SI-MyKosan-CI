<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
      <div class="logo">
        <a href="<?= base_url() ?>" class="simple-text logo-mini">
          <i class="now-ui-icons education_atom"></i>
        </a>
        <a href="<?= base_url() ?>" class="simple-text logo-normal">
          App-MyKossan
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <?php if ($this->session->userdata('pemilik')) : ?>
          <ul class="nav navbar-nav">
            <?php if ($title == "MyKosan - Dashboard") : ?>
              <li class="active">
              <?php else : ?>
              <li>
              <?php endif ?>
              <a href="<?= base_url('dashboard') ?>">
                <i class="now-ui-icons design_app"></i>
                <p>Dashboard</p>
              </a>
              </li>
              <?php if ($title == "MyKosan - Kelola Customer") : ?>
                <li class="active">
                <?php else : ?>
                <li>
                <?php endif ?>
                <a href="<?= base_url('customer') ?>">
                  <i class="now-ui-icons users_circle-08"></i>
                  <p>Kelola Customer</p>
                </a>
                </li>
                <?php if ($title == "MyKosan - Kelola Kosan") : ?>
                  <li class="active">
                  <?php else : ?>
                  <li>
                  <?php endif ?>
                  <a href="<?= base_url('kosan') ?>">
                    <i class="now-ui-icons ui-2_settings-90"></i>
                    <p>Kelola Kosan</p>
                  </a>
                  </li>
                  <?php if ($title == "MyKosan - Kelola Kamar") : ?>
                    <li class="active">
                    <?php else : ?>
                    <li>
                    <?php endif ?>
                    <a href="<?= base_url('kamar') ?>">
                      <i class="now-ui-icons ui-2_settings-90"></i>
                      <p>Kelola Kamar</p>
                    </a>
                    </li>
                      <?php if ($title == "MyKosan - Transaksi") : ?>
                        <li class="active">
                        <?php else : ?>
                        <li>
                        <?php endif ?>
                        <a href="<?= base_url('transaksi') ?>">
                          <i class="now-ui-icons business_money-coins"></i>
                          <p>Transaksi</p>
                        </a>
                        </li>
                        <?php if ($title == "MyKosan - User Setting") : ?>
                          <li class="active">
                          <?php else : ?>
                          <li>
                          <?php endif ?>
                          <a href="<?= base_url('user') ?>">
                            <i class="now-ui-icons loader_gear"></i>
                            <p>Pengaturan</p>
                          </a>
                          </li>

                          <li class="active-pro">
                            <a href="<?= base_url('auth/logout') ?>" class="tombol-logout">
                              <i class="now-ui-icons sport_user-run"></i>
                              <p>Logout</p>
                            </a>
                          </li>
          </ul>
        <?php else : ?>
          <ul class="nav navbar-nav">
            <?php if ($title == "MyKosan - Admin Dashboard") : ?>
              <li class="active">
              <?php else : ?>
              <li>
              <?php endif ?>
              <a href="<?= base_url('admin/dashboard') ?>">
                <i class="now-ui-icons design_app"></i>
                <p>Dashboard</p>
              </a>
              </li>
              <?php if ($title == "MyKosan - Data Pemilik") : ?>
                <li class="active">
                <?php else : ?>
                <li>
                <?php endif ?>
                <a href="<?= base_url('admin/pemilik') ?>">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Data Pemilik</p>
                </a>
                </li>
                <?php if ($title == "MyKosan - Data User") : ?>
                  <li class="active">
                  <?php else : ?>
                  <li>
                  <?php endif ?>
                  <a href="<?= base_url('admin/user') ?>">
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>Data User</p>
                  </a>
                  </li>
                  <?php if ($title == "MyKosan - Data Kosan") : ?>
                    <li class="active">
                    <?php else : ?>
                    <li>
                    <?php endif ?>
                    <a href="<?= base_url('admin/kosan') ?>">
                      <i class="now-ui-icons shopping_shop"></i>
                      <p>Data Kosan</p>
                    </a>
                    </li>
                    <?php if ($title == "MyKosan - Kelola Pesan") : ?>
                      <li class="active">
                      <?php else : ?>
                      <li>
                      <?php endif ?>
                      <a href="<?= base_url('admin/pesan') ?>">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        <p>Kelola Pesan</p>
                      </a>
                      </li>
                      <li class="active-pro">
                        <a href="<?= base_url('auth/logout') ?>" class="tombol-logout">
                          <i class="now-ui-icons sport_user-run"></i>
                          <p>Logout</p>
                        </a>
                      </li>
          </ul>
        <?php endif ?>
      </div>
    </div>