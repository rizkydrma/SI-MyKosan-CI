<div class="judul-page">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h5 class="bold">Konfirmasi Pesanan</h5>
      </div>
    </div>

  </div>
</div>

<section class="detail-pemesanan mt-5">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <img src="<?= base_url('assets/frontend/') ?>img/payment-ui.jpg" alt="">
      </div>
      <div class="col-6">
        <div class="container-info color-main">
          <h5 class="bold">Tagihan Pembayaran</h5>
          <h4 class="bold color-join"><?= $pemesanan['no_invoice'] ?></h4>
          <hr>
          <h6>segera lakukan pembayaran sebelum :</h6>
          <h5 class="bold"><?= $pemesanan['bayar_sebelum'] ?></h5>
          <hr>
          <h5 class="bold">Detail Pemesanan</h5>
          <div class="row justify-content-between mt-2 ml-2">
            <div class="col-6 mt-2">
              <h6>Atas Nama</h6>
            </div>
            <div class="col-6 mt-2 text-right">
              <h6><?= $pemesanan['nama_pemesan'] ?></h6>
            </div>
            <div class="col-6 mt-2">
              <h6>Nama Kosan</h6>
            </div>
            <div class="col-6 mt-2 text-right">
              <h6><?= $pemesanan['nama_kosan'] ?></h6>
            </div>
            <div class="col-6 mt-2">
              <h6>Nama Kamar</h6>
            </div>
            <div class="col-6 mt-2 text-right">
              <h6><?= $pemesanan['nama_tipe'] ?></h6>
            </div>
            <div class="col-6 mt-2">
              <h6>Tanggal Masuk</h6>
            </div>
            <div class="col-6 mt-2 text-right">
              <h6><?= $pemesanan['tgl_sewa'] ?></h6>
            </div>
            <div class="col-6 mt-2">
              <h6>Tanggal Keluar</h6>
            </div>
            <div class="col-6 mt-2 text-right">
              <h6><?= $pemesanan['tgl_keluar'] ?></h6>
            </div>
            <div class="col-6 mt-2">
              <h6>Jumlah Kamar</h6>
            </div>
            <div class="col-6 mt-2 text-right">
              <h6><?= $pemesanan['jumlah_kamar_tersedia'] ?></h6>
            </div>
            <div class="col-6 mt-2">
              <h6>Lama Sewa</h6>
            </div>
            <div class="col-6 mt-2 text-right">
              <h6><?= $pemesanan['lama_sewa'] ?></h6>
            </div>
          </div>
          <hr>

          <div class="row justify-content-end">
            <div class="col-4 text-right">
              <h6 class="bold">Total Harga</h6>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-6 text-right">
              <h4 class="bold color-join"><?= $pemesanan['total_harga'] ?></h4>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col">
              <h6>Pembayaran dapat dilakukan di:</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-2">
              <img src="<?= base_url('assets/frontend/') ?>img/alfamart.png" alt="">
            </div>
            <div class="col-2">
              <img src="<?= base_url('assets/frontend/') ?>img/indomaret.png" alt="">
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-3 text-right ">
              <a href="<?= base_url('home') ?>" class="btn btn-block bg-main text-white bold">Tutup</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>