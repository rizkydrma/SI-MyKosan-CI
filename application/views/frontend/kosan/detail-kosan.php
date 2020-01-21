<div class="judul-page">
  <div class="container">
    <div class="row justify-content-end">
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

<section class="isi mt-5">
  <div class="container">
    <div class="konten">
      <div class="row">
        <div class="col">
          <h3 class="color-main" id="judul-kosan"><?= $kosan['nama_kosan'] ?></h3>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <i class="fas fa-map-marker-alt "></i>
          <p class="alamat-kosan"><?= $kosan['alamat'] ?></p>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col">
          <div class="grid-container">
            <?php for ($i = 0; $i < 4; $i++) : ?>
              <div class="item<?= $i + 1 ?>">
                <?php if (isset($gambarKosan[$i]['foto'])) : ?>
                  <img src="<?= base_url('assets/images/kosan/') ?><?= $gambarKosan[$i]['foto'] ?>" alt="" class="img-block">
                <?php else : ?>
                  <img src="<?= base_url('assets/images/kosan/') ?>default.png" alt="" class="img-block">
                <?php endif ?>
              </div>
            <?php endfor ?>
          </div>
        </div>
      </div>

      <div class="row justify-content-end mt-4 color-main">
        <!-- <div class="col-md-6 col-sm-6">
          <h5>Fasilitas Kosan :</h5>
        </div> -->
        <div class="col-md-6 col-sm-6 text-right">
          <h5>Harga/kamar/bulan mulai dari</h5>
        </div>
      </div>

      <div class="row justify-content-end mt-1 color-main">
        <!-- <div class="col-6 ml-3">
          <i class="fas fa-bed"></i>
          <p class="fasilitas-kosan">WIFI, Kamar Mandi Dalam, Dapur, Parkiran, TV</p>
        </div> -->
        <div class="col-4 text-right">
          <h4>Rp. 500.000</h4>
        </div>
      </div>

      <div class="row justify-content-end">
        <div class="col-3 text-right ">
          <a href="#kamar" class="btn btn-primary text-white btn-block btn-pesan-kamar">Pilih Kamar</a>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-12">
          <h5>Deskripsi :</h5>
        </div>
        <div class="col-11 ml-3">
          <p>
            <?= $kosan['deskripsi'] ?>
          </p>
        </div>
      </div>

    </div>

    <div class="konten mt-3 color-main">
      <h4 id="judul-kosan">Alamat Kosan</h4>
      <hr>
      <div class="container map">
        <img src="<?= base_url('assets/images/map/map-static.png') ?>" alt="">
      </div>

      
      <div class="row justify-content-end mt-3">
        <div class="col-12 text-right ">
          <a href="https://www.google.com/maps/place/<?= $kosan['alamat'] ?>" target="_blank" class="btn btn-info text-white btn-block">Lihat Alamat Kosan di Google Map</a>
        </div>
      </div>
    </div>
    <?php $this->load->model('DaftarKosan_model', 'daftarKosan') ?>
    <?php $j = 0 ?>
    <?php foreach ($kamar as $data) : ?>
      <div class="konten mt-3 color-main kamar" id="kamar">
        <h4 id="judul-kosan"><?= $data['nama_tipe'] ?></h4>
        <hr>
        <div class="row">
          <div class="col-5">
            <?php $gambarKamar = $this->daftarKosan->getGambarKamar($data['id_tipe']) ?>


            <div id="carouselExampleControls<?= $j ?>" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php if (count($gambarKamar) > 0) : ?>
                  <?php for ($i = 0; $i < count($gambarKamar); $i++) : ?>
                    <?php if ($i == 0) : ?>
                      <div class="carousel-item active img-kamar">
                      <?php else : ?>
                        <div class="carousel-item img-kamar">
                        <?php endif ?>
                        <img src="<?= base_url('assets/images/tipe_kamar/') ?><?= $gambarKamar[$i]['foto'] ?>" class="d-block w-100" class="img-kamar">
                        </div>
                      <?php endfor ?>
                      </div>
                    <?php else : ?>
              </div>
              <div class="carousel-item active img-kamar">
                <img src="<?= base_url('assets/images/tipe_kamar/') ?>default.png" class="d-block w-100" class="img-kamar">
              </div>
            <?php endif ?>
            <a class="carousel-control-prev" href="#carouselExampleControls<?= $j ?>" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls<?= $j ?>" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            </div>
          </div>
          <div class="col-7">
            <div class="row">
              <div class="col">
                <h5 id="judul-kosan">Tipe Ruangan</h5>
                <p class="ml-3"><?= $data['tipe_kamar'] ?></p>
              </div>
              <div class="col">
                <h5 id="judul-kosan">Jumlah Kamar Tersedia</h5>
                <p class="ml-3"><?= $data['jumlah_kamar_tersedia'] ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <h5 id="judul-kosan">Fasilitas</h5>
                <p class="ml-3"><?= $data['fasilitas'] ?></p>
              </div>
            </div>
            <br>
            <br>
            <div class="row">
              <div class="col-6">
                <h5>Harga/Bulan</h5>
                <h5 class="text-danger" id="judul-kosan"><?= $data['harga'] ?></h5>
                <a href="" class="btn btn-pesan d-inline text-white" data-toggle="modal" data-target="#modalPesanKamar" data-id="<?= $data['id_tipe'] ?>" data-kamar="<?= $data['jumlah_kamar_tersedia'] ?>">Pesan Kamar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $j++ ?>
    <?php endforeach ?>


  </div>
</section>


<!-- Modal -->
<div class="modal fade" id="modalPesanKamar" tabindex="-1" role="dialog" aria-labelledby="modalPesanKamarTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPesanKamarTitle">Pesan Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('daftarkosan/konfirmasi') ?>" method="POST">
          <input type="hidden" name="id_tipe" id="id_tipe">
          <div class="form-row">
            <div class="col">
              <label for="">Tanggal Sewa</label>
              <input type="text" class="form-control" name="tgl_sewa" placeholder="Tanggal Mulai Sewa" id="tgl_sewa" autocomplete="off">
            </div>
            <div class="col">
              <label for="">Lama Sewa/Bulan</label>
              <input type="text" class="form-control" name="lama_sewa" placeholder="1" autocomplete="off">
            </div>
            <div class="col">
              
              <div class="form-group">
                <label for="jumlah_kamar_tersedia">Jumlah Kamar</label>
                <select class="form-control" id="jumlah_kamar_tersedia" name="jumlah_kamar_tersedia">
                </select>
              </div>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">Pesan Sekarang</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>