<div class="judul-page">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h5 class="bold">Akun Saya</h5>
      </div>
    </div>
  </div>
</div>

<div class="manage-user mt-4">
  <div class="container">
    <div class="row">
      <div class="col-3">
        <div class="list-group">
          <a href="<?= base_url('manageuser') ?>" class="list-group-item list-group-item-action ">
            Ubah Profil
          </a>
          <a href="<?= base_url('manageuser/ubahPassword') ?>" class="list-group-item list-group-item-action active">
            Ubah Password
          </a>
          <a href="<?= base_url('manageuser/riwayatPembelian') ?>" class="list-group-item list-group-item-action">Riwayat Pembelian</a>
          <a href="<?= base_url('auth/logout') ?>" class="list-group-item list-group-item-action">Logout</a>
        </div>
      </div>
      <div class="col-4">
        <form action="<?= base_url('manageuser/ubahPassword') ?>" method="POST">
          <div class="form-group">
            <label for="password">Password Lama</label>
            <input type="password" class="form-control" id="password" name="password">
            <?= form_error('password', '<small class="text-danger ml-3">', '</small>') ?>
          </div>
          <div class="form-group">
            <label for="newPassword">Password Baru</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword">
            <?= form_error('newPassword', '<small class="text-danger ml-3">', '</small>') ?>
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
            <?= form_error('confirmPassword', '<small class="text-danger ml-3">', '</small>') ?>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
      </div>

    </div>
  </div>
</div>