<div class="line-1">
</div>

<div class="tagline">
  <h1 class="text-white ">Nge-Kos Dulu,<Br>
    Raih Impianmu Kemudian.</h1>
</div>

<div class="join">
  <div class="row">
    <div class="col">
      <h2 class="text-white">Daftarkan Kosan-mu Sekarang !</h2>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col">
      <a href="<?= base_url('auth/loginowner') ?>" class="btn btn-join rounded-pill text-white">Join Now !</a>
    </div>
  </div>
</div>

<div class="line-2">
</div>
</div>
</section>

<!-- BAGIAN FORM -->
<section class="form-cari text-white">
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
                <?php foreach ($provinsi as $data) : ?>
                  <option value="<?= $data['id'] ?>|<?= $data['name'] ?>" name="id"><?= $data['name'] ?></option>
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
</section>

<!-- ABOUT US -->
<section class="about" id="about">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h2>Tentang MyKosan</h2>
      </div>
    </div>

    <div class="row justify-content-center mt-5">
      <div class="col-4">
        <img src="<?= base_url('assets/frontend/') ?>img/search-ui.jpg" alt="" class="search-ui">
      </div>
      <div class="col-6">
        <p>
          MyKossan adalah adalah aplikasi terkemuka di Indonesia yang menyediakan berbagai kebutuhan untuk mencari
          sebuah kosan dalam satu platform, memungkinkan Anda untuk menciptakan tempat tinggal terbaik bersama
          orang-orang terkasih. Kami menawarkan kos-kosan diseluruh Indonesia yang akan mempermudah anda untuk mencari
          tempat tinggal yang nyaman.
        </p>
      </div>
    </div>

    <div class="row justify-content-center mt-4">
      <div class="col-6">
        <p>Bekerja sama dengan lebih dari puluhan ribu pemilik kosan & kontrakan di seluruh indonesia, MyKosan
          melayani lebih dari 200.000 pelanggan. Semua itu didukung oleh berbagai metode pembayaran untuk seluruh
          pelanggan di di Indonesia, serta customer service yang siap melayani selama 24 jam dalam bahasa lokal.
        </p>
      </div>
      <div class="col-5">
        <img src="<?= base_url('assets/frontend/') ?>img/teamwork-ui.jpg" alt="" class="teamwork-ui">
      </div>
    </div>

    <div class="line-3"></div>
    <div class="line-4"></div>
  </div>
</section>

<!-- Contact Us -->
<section class="contact" id="contact">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h2>Contact Us</h2>
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <p>
          Seperti bintang-bintang yang hilang ditengah malam, bagai harus melangkah tanpa ku tau arah. Seperti
          dedaunan berjatuhan di taman, Bagaikan debur ombak mampu pecahkan karang, tidak ada yang sempurna di dunia
          ini, begitu pula situs ini, silahkan beri masukan ke pengembang jika terdapat kekurangan di situs ini
        </p>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-5 text-center">
        <img src="<?= base_url('assets/frontend/') ?>img/review-ui.jpg" alt="" class="review-ui">
      </div>
      <div class="col-7">
        <form action="<?= base_url('home/kirimPesan') ?>" method="POST">
        <div class="kotak-contact">
          <div class="row justify-content-center mt-3">
            <div class="col-10">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="enter email" name="email">
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-10">
              <div class="form-group">
                <label for="kritik_saran">Tulis Kritik ataupun Saran</label>
                <textarea class="form-control" id="kritik_saran" rows="3" name="kritik_saran"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3 offset-1">
              <button type="submit" class="btn btn-send btn-block rounded-pill text-white">Send</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>