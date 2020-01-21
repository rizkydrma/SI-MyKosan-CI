<br>
<br>
<div class="row container-owner justify-content-center mt-5 color-main">
  <div class="col-6">
    <div class="container-info">
      <div class="row">
        <div class="col text-center">
          <h1 class="bold">Change Password</h1>
          <h4><?= $this->session->userdata('reset_email') ?></h4>

          <hr>
          <form action="<?= base_url('auth/changepassword/') ?><?= $this->session->userdata('table') ?>" method="POST">
            <div class="row justify-content-center mt-5">
              <div class="col-8 text-center">
                <h5 class="bold">new password</h5>
                <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="password">
                <?= form_error('password', '<small class="text-danger ml-3">', '</small>') ?>

              </div>
              <div class="col-8 text-center">
                <h5 class="bold">confirm password</h5>
                <input type="password" class="form-control rounded-pill" id="repassword" name="repassword" placeholder="confirm password">
                <?= form_error('repassword', '<small class="text-danger ml-3">', '</small>') ?>

              </div>
            </div>

            <div class="row justify-content-center mt-4">
              <div class="col-5">
                <button type="submit" class="btn bg-main text-white btn-block rounded-pill">Change Password</button>
              </div>
            </div>
          </form>
          <div class="row justify-content-center mt-3">
            <div class="col-6 text-center">
              <h6><a href="<?= base_url('auth/loginowner') ?>">Do you have a accoung ? Login</a></h6>
              <h6><a href="<?= base_url('auth/daftarOwner') ?>">Dont have a account ? Sign Up</a></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>