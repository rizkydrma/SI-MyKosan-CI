<br>
<br>
<div class="row container-owner justify-content-center mt-5 color-main">
    <div class="col-6">
        <div class="container-info">
            <div class="row">
                <div class="col text-center">
                    <h1 class="bold">Forgot Password</h1>

                    <hr>
                    <form action="<?= base_url('auth/forgotowner') ?>" method="POST">
                        <div class="row justify-content-center mt-5">
                            <div class="col-8 text-center">
                                <h5 class="bold">Email</h5>
                                <input type="text" class="form-control rounded-pill" id="email" name="email" placeholder="email">
                                <?= form_error('email', '<small class="text-danger ml-3">', '</small>') ?>

                            </div>
                        </div>

                        <div class="row justify-content-center mt-4">
                            <div class="col-3">
                                <button type="submit" class="btn bg-main text-white btn-block rounded-pill">Forgot</button>
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