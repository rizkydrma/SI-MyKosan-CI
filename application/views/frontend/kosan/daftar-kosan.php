</section>
<div class="judul-page">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-6">
        <i class="fas fa-home">
        </i>
        <h4>Daftar Kosan</h4>
      </div>
      <div class="col-6 text-right">
        <button class="btn bg-main text-white" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Cari Ulang
        </button>
      </div>
    </div>

  </div>
</div>

<div class="form-kosan mt-3 collapse" id="collapseExample">
  <!-- BAGIAN FORM -->
  <div class="container">
    <div class="kotak">
      <div class="row">
        <div class="col text-center">
          <h3 class="text-white mt-2 font-weight-bold">Cari Kosan</h3>
        </div>
      </div>
      <form action="<?= base_url('daftarkosan') ?>" method="GET">
        <div class="row justify-content-center">
          <div class="col-3">
            <div class="form-group">
              <select class="form-control" id="provinsi" name="provinsi">
                <option>Pilih Provinsi</option>
                <?php foreach ($provinsi['semuaprovinsi'] as $data) : ?>
                  <option value="<?= $data['id'] ?>|<?= $data['nama'] ?>" name="id"><?= $data['nama'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <select class="kota form-control" id="kota" name="kota">
                <option>Cari Kota</option>

              </select>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <select class="kecamatan form-control" id="kecamatan" name="kecamatan">
                <option>Cari Kecamatan</option>

              </select>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6">
            <div class="form-group">
              <label for="harga_terendah">Harga Terendah</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                </div>
                <input type="text" class="form-control" id="harga_terendah" placeholder="100000" name="harga_terendah">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="form-group">
              <label for="harga_tertinggi">Harga Tertinggi</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                </div>
                <input type="text" class="form-control" id="harga_tertinggi" placeholder="900000" name="harga_tertinggi">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col text-center">
            <button type="submit" class="btn btn-join rounded-pill text-white">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<section class="daftar-kosan mt-5">
  <div class="container">
    <div class="row  mt-5">
      <?php if (isset($kosan)) : ?>
        <?php $i = 0; ?>
        <?php foreach ($kosan as $data) : ?>
          <div class="col-md-4 mb-4">
            <div class="card">
              <?php if($gambar[$i] == NULL) : ?>
              <img src="<?= base_url('assets/images/kosan/') ?>default.png" class="card-img-top">
              <?php else : ?>
              <img src="<?= base_url('assets/images/kosan/') ?><?= $gambar[$i]['foto'] ?>" class="card-img-top">
              <?php endif ?>
              <div class="card-body">
                <h5 class="card-title"><?= $data['nama_kosan'] ?></h5>
                <i class="fas fa-map-marker-alt"></i>
                <p class="alamat-kosan"><?= $data['provinsi'] ?>, <?= $data['kota'] ?>, <?= $data['kecamatan'] ?></p>
                <h6 class="fasilitas">Fasilitas</h6>
                <p class="fasilitas-kosan"><?= $data['fasilitas'] ?></p>
                <div class="row">
                  <div class="col">
                    <a href="<?= base_url('daftarkosan/detailkosan/') ?><?= $data['id_kosan'] ?>" class="btn btn-join text-white btn-block" id="card-button">detail</a>
                  </div>
                  <div class="col">
                    <a href="#" class="btn btn-primary text-white btn-block" id="card-button"><?= $data['harga'] ?></a>
                  </div>
                  <div class="col">
                    <a href="#" class="btn btn-pesan text-white btn-block" id="card-button">Pesan</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php $i++ ?>
        <?php endforeach ?>
      <?php else : ?>
        <div class="col">
          <h2 class="text-center">Tidak ada data kosan</h2>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>
