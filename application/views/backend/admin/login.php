<br>
<br>
<div class="row container-owner justify-content-center mt-5 color-main">
  <div class="col-6">
    <div class="container-info">
      <div class="row">
        <div class="col text-center">
          <h1 class="bold">Admin Login</h1>

          <hr>
          <form action="<?= base_url('admin') ?>" method="POST">
            <div class="row justify-content-center mt-5">
              <div class="col-8 text-center">
                <h5 class="bold">Username</h5>
                <input type="text" class="form-control rounded-pill" id="username" name="username" placeholder="username" value="<?= set_value('username') ?>" autocomplete="off">
                <?= form_error('username', '<small class="text-danger ml-3">', '</small>') ?>

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
        </div>
      </div>
    </div>
  </div>
</div>