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
          <a href="<?= base_url('manageuser') ?>" class="list-group-item list-group-item-action active">
            Ubah Profil
          </a>
          <a href="<?= base_url('manageuser/ubahPassword') ?>" class="list-group-item list-group-item-action">
            Ubah Password
          </a>
          <a href="<?= base_url('manageuser/riwayatPembelian') ?>" class="list-group-item list-group-item-action">Riwayat Pembelian</a>
          <a href="<?= base_url('auth/logout') ?>" class="list-group-item list-group-item-action">Logout</a>

        </div>
      </div>

      <div class="col-6">
        <?= form_open_multipart('manageuser') ?>
        <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" readonly value="<?= $user->email ?>">
        </div>
        <div class="form-group">
          <label for="nama_user">Nama User</label>
          <input type="text" class="form-control" id="nama_user" name="nama_user" readonly value="<?= $user->nama_user ?>">
        </div>

        <div class="row">
          <div class="col-6 p-0 pr-2">
            <div class="form-group">
              <label for="no_telp">Nomor Telepon</label>
              <input type="text" class="form-control" id="no_telp" name="no_telp" readonly value="<?= $user->no_telp ?>">
            </div>
          </div>
          <div class="col-6 p-0">
            <div class="form-group">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" readonly value="<?= $user->tgl_lahir ?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="3" readonly><?= $user->alamat ?></textarea>
        </div>


        <a href="#" class="btn btn-primary edit-profile">Edit Profile</a>
        <button type="submit" class="btn btn-info simpan-perubahan">Simpan Perubahan</button>


      </div>
      <div class="col-3">
        <div class="row">
          <div class="col-9">
            <img src="<?= base_url('assets/images/user/users/') ?><?= $user->gambar ?>" class="img-thumbnail" alt="">

          </div>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="gambar" name="gambar">
          <label for="gambar" class="custom-file-label">Ubah Gambar</label>
        </div>
      </div>
      </form>

    </div>
  </div>
</div>