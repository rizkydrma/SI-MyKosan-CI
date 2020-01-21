<section class="detail-pemesanan mt-5">
  <div class="container">
    <div class="row">
      <div class="col-5">
        <img src="<?= base_url('assets/frontend/') ?>img/work-ui.jpg" alt="">
      </div>
      <div class="col-7">
        <div class="container-info">
          <div class="row color-main">
            <div class="col text-center">
              <i class="fas fa-fire fa-3x"></i>
              <h1 class="bold d-inline">Sign Up</h1>
              <hr>
            </div>
          </div>
          <form action="<?= base_url('auth/daftarUser') ?>" method="POST">
            <div class="row mt-3 justify-content-between">
              <div class="col">
                <div class="form-group">
                  <label for="nama_user" class="color-main">Nama User</label>
                  <input type="text" class="form-control rounded-pill" id="nama_user" name="nama_user" placeholder="Enter nama user" value="<?= set_value('nama_user') ?>" autocomplete="off">
                  <?= form_error('nama_user', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="email" class="color-main">email</label>
                  <input type="email" class="form-control rounded-pill" id="email" name="email" placeholder="email" value="<?= set_value('email') ?>" autocomplete="off">
                  <?= form_error('email', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col">
                <div class="form-group">
                  <label for="password" class="color-main">Password</label>
                  <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="password">
                  <?= form_error('password', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="repassword" class="color-main">Confirm Password</label>
                  <input type="password" class="form-control rounded-pill" id="repassword" name="repassword" placeholder="Confirm Password">
                  <?= form_error('repassword', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col-6">
                <div class="form-group">
                  <label for="tgl_lahir" class="color-main">Tanggal Lahir</label>
                  <input type="date" class="form-control rounded-pill" id="tgl_lahir" name="tgl_lahir" placeholder="tgl_lahir" value=<?= set_value('tgl_lahir') ?>>
                  <?= form_error('tgl_lahir', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="no_telp" class="color-main">No Telpon</label>
                  <input type="text" class="form-control rounded-pill" id="no_telp" name="no_telp" placeholder="no_telp" value="<?= set_value('no_telp') ?>" autocomplete="off">
                  <?= form_error('no_telp', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="alamat" class="color-main">Alamat</label>
                  <textarea class="form-control" id="alamat" name="alamat"><?= set_value('alamat') ?></textarea>
                  <?= form_error('alamat', '<small class="text-danger ml-3">', '</small>') ?>
                </div>
              </div>
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-5 text-center">
                <button type="submit" name="submit" class="btn bg-main text-white btn-block">Sign Up</button>
              </div>
            </div>
          </form>
          <div class="row justify-content-center mt-3">
            <div class="col-6 text-center">
              <h6><a href="<?= base_url('auth/index') ?>">Do you have a account ? Login</a></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>