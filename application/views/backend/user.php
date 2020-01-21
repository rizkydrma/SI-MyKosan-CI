<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h5 class="title">User Profile</h5>
        </div>
        <div class="card-body">
          <?= form_open_multipart('user') ?>
          <div class="row">
            <div class="col-md-6 pr-1">
              <input type="hidden" value="<?= $user->id_pemilik ?>" name="id_pemilik">
              <div class="form-group">
                <label>Nama User</label>
                <input type="text" class="form-control" name="nama_pemilik" disabled="" value="<?= $user->nama_pemilik ?>" id="nama_pemilik">
              </div>
            </div>

            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" value="<?= $user->email ?>" disabled="" id="email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>No Telepon</label>
                <input type="text" class="form-control" value="<?= $user->no_telp ?>" name="no_telp" disabled="" id="no_telp">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text" class="form-control" value="<?= $user->tgl_lahir ?>" name="tgl_lahir" disabled="" id="tgl_lahir">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?= $user->alamat ?>" style="height: 100px" disabled="" id="alamat">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 edit-profile">
              <a href="#" class="btn btn-primary btn-block">Edit Profile</a>
            </div>
            <div class="col-md-4 simpan-perubahan">
              <button type="submit" class="btn btn-info btn-block">Simpan Perubahan</button>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="<?= base_url('assets/images/user/') ?>banner-default.jpg" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <a href="#">
              <img class="avatar border-gray" src="<?= base_url('assets/images/user/') ?><?= $user->gambar ?>" alt="...">
              <h5 class="title"><?= $user->nama_pemilik ?></h5>
            </a>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="gambar" name="gambar">
            <label for="gambar" class="custom-file-label">Ubah Gambar</label>
          </div>
        </div>
        </form>

        <hr>
        <div class="button-container">
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-facebook-f"></i>
          </button>
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-twitter"></i>
          </button>
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-google-plus-g"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>