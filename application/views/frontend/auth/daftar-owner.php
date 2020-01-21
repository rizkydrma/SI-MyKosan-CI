<br>
<div class="row container-owner justify-content-center mt-5 color-main">
  <div class="col-8">
    <div class="container-info">
      <div class="row">
        <div class="col ">
          <h1 class="bold text-center">Owner SignUp</h1>

          <hr>
          <form action="<?= base_url('auth/daftarOwner') ?>" method="POST">
            <div class="row">
              <div class="col-6 mt-3">
                <h6 class="bold">Nama Pemilik</h6>
                <input type="text" class="form-control rounded-pill" id="nama_pemilik" name="nama_pemilik" placeholder="nama pemilik" autocomplete="off" value="<?= set_value('nama_pemilik') ?>">
                <?= form_error('nama_pemilik', '<small class="text-danger ml-3">', '</small>') ?>

              </div>
              <div class="col-6 mt-3">
                <h6 class="bold">Email</h6>
                <input type="text" class="form-control rounded-pill" id="email" name="email" placeholder="email" autocomplete="off" value="<?= set_value('email') ?>">
                <?= form_error('email', '<small class="text-danger ml-3">', '</small>') ?>

              </div>

              <div class="col-6 mt-3">
                <h6 class="bold">Password</h6>
                <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="password" >
                <?= form_error('password', '<small class="text-danger ml-3">', '</small>') ?>

              </div>
              <div class="col-6 mt-3">
                <h6 class="bold">Confirm Password</h6>
                <input type="password" class="form-control rounded-pill" id="repassword" name="repassword" placeholder="repassword">
                <?= form_error('repassword', '<small class="text-danger ml-3">', '</small>') ?>

              </div>

              <div class="col-6 mt-3">
                <h6 class="bold">No Telpon</h6>
                <input type="text" class="form-control rounded-pill" id="no_telp" name="no_telp" placeholder="no_telp" autocomplete="off" value="<?= set_value('no_telp') ?>">
                <?= form_error('no_telp', '<small class="text-danger ml-3">', '</small>') ?>

              </div>
              <div class="col-6 mt-3">
                <h6 class="bold">Tanggal Lahir</h6>
                <input type="date" class="form-control rounded-pill" id="tgl_lahir" name="tgl_lahir" placeholder="tgl_lahir">
                <?= form_error('tgl_lahir', '<small class="text-danger ml-3">', '</small>') ?>

              </div>
              <div class="col-12 mt-3">
                <h6 class="bold">Alamat</h6>
                <input type="text" class="form-control rounded-pill" id="alamat" name="alamat" placeholder="alamat" autocomplete="off" value="<?= set_value('alamat') ?>">
                <?= form_error('alamat', '<small class="text-danger ml-3">', '</small>') ?>

              </div>
            </div>
            <div class="row justify-content-center mt-4">
              <div class="col-5">
                <button type="submit" class="btn bg-main text-white btn-block rounded-pill">Sign Up</button>
              </div>
            </div>
          </form>
          <div class="row justify-content-center mt-3">
            <div class="col-6 mt-3 text-center">
              <h6><a href="<?= base_url('auth/loginowner') ?>">Do you have a account ? Login</a></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>