<br>
<br>
<div class="row container-owner justify-content-center mt-5 color-main">
  <div class="col-6">
    <div class="container-info">
      <div class="row">
        <div class="col text-center">
          <h1 class="bold">Owner Login</h1>

          <hr>
          <form action="<?= base_url('auth/loginOwner') ?>" method="POST">
            <div class="row justify-content-center mt-5">
              <div class="col-8 text-center">
                <h5 class="bold">Email</h5>
                <input type="text" class="form-control rounded-pill" id="email" name="email" placeholder="email" value="<?= set_value('email') ?>" autocomplete="off">
                <?= form_error('email', '<small class="text-danger ml-3">', '</small>') ?>

              </div>
              <div class="col-8 text-center mt-4">
                <h5 class="bold">Password</h5>
                <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="password">
                <?= form_error('password', '<small class="text-danger ml-3">', '</small>') ?>

              </div>
            </div>

            <div class="row justify-content-center mt-4">
              <div class="col-3">
                <button type="submit" class="btn bg-main text-white btn-block rounded-pill">Login</button>
              </div>
            </div>
          </form>
          <div class="row justify-content-center mt-3">
            <div class="col-6 text-center">
              <h6><a href="<?= base_url('auth/forgotowner') ?>">Forgot Password ?</a></h6>
              <h6><a href="<?= base_url('auth/daftarOwner') ?>">Dont have a account ? Sign Up</a></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>