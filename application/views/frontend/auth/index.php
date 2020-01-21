<section class="detail-pemesanan mt-5">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <img src="<?= base_url('assets/frontend/') ?>img/work-ui.jpg" alt="">
      </div>
      <div class="col-6">
        <div class="container-info">
          <div class="row color-main">
            <div class="col text-center">
              <i class="fas fa-fire fa-3x"></i>
              <h1 class="bold d-inline">Login</h1>
              <hr>
            </div>
          </div>
          <form action="<?= base_url('auth') ?>" method="POST">
            <div class="row mt-4">
              <div class="col">
                <div class="form-group">
                  <label for="email" class="color-main">Email</label>
                  <input type="text" class="form-control rounded-pill" id="email" name="email" placeholder="Enter email" autocomplete="off" value="<?= set_value('email') ?>">
                  <?= form_error('email', '<small class="text-danger ml-3">', '</small>') ?>


                </div>
                <div class="form-group">
                  <label for="password" class="color-main">Password</label>
                  <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="Password">
                  <?= form_error('password', '<small class="text-danger ml-3">', '</small>') ?>

                </div>
              </div>
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-3 text-center">
                <button type="submit" name="submit" class="btn bg-main text-white btn-block ">Login</button>
              </div>
            </div>
          </form>
          <div class="row justify-content-center mt-3">
            <div class="col-6 text-center">
              <h6><a href="<?= base_url('auth/forgotuser') ?>">Forgot Password ?</a></h6>
              <h6><a href="<?= base_url('auth/daftarUser') ?>">Dont have a account ? Sign Up</a></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>