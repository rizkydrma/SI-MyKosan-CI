<div class="judul-page">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h5 class="bold">Konfirmasi Pesanan</h5>
      </div>
    </div>
  </div>
</div>


<div class="informasi-kamar mt-4 color-main">
  <form action="<?= base_url('daftarkosan/konfirmasi') ?>" method="POST">

    <div class="container">
      <input type="hidden" name="id_tipe" value="<?= $detailPesanan->id_tipe ?>">
      <div class="row justify-content-end">
        <div class="col-md-7">
          <div class="container-info">
            <h5>Informasi Kosan</h5>
            <div class="row justify-content-between mt-4">
              <div class="col ml-4">
                <h6>Nama Kosan</h6>
              </div>
              <div class="col text-right">
                <input type="hidden" name="bayar_sebelum" value="<?= $konfirmasi['bayar_sebelum'] ?>">
                <input type="hidden" name="id_pemilik" value="<?= $detailPesanan->id_pemilik ?>">
                <input type="hidden" name="id_kosan" value="<?= $detailPesanan->id_kosan ?>">
                <input type="hidden" name="nama_kosan" value="<?= $detailPesanan->nama_kosan ?>">
                <input type="hidden" name="new_jumlah_kamar" value="<?= $detailPesanan->jumlah_kamar_tersedia ?>">
                <h6><?= $detailPesanan->nama_kosan ?></h6>
              </div>
            </div>
            <div class="row justify-content-between mt-4">
              <div class="col ml-4">
                <h6>Nama Kamar</h6>
              </div>
              <div class="col text-right">
                <input type="hidden" name="id_tipe" value="<?= $detailPesanan->id_tipe ?>">
                <input type="hidden" name="nama_tipe" value="<?= $detailPesanan->nama_tipe ?>">
                <h6><?= $detailPesanan->nama_tipe ?></h6>
              </div>
            </div>
            <div class="row justify-content-between mt-4">
              <div class="col ml-4">
                <h6>Harga Perbulan</h6>
              </div>
              <div class="col text-right">
                <input type="hidden" name="harga" value="<?= $detailPesanan->harga ?>">
                <h6><?= $detailPesanan->harga ?></h6>
              </div>
            </div>
            <div class="row justify-content-between mt-4">
              <div class="col ml-4">
                <h6>Jumlah Kamar</h6>
              </div>
              <div class="col text-right">
                <input type="hidden" name="jumlah_kamar_tersedia" value="<?= $konfirmasi['jumlah_kamar_tersedia'] ?>">
                <h6><?= $konfirmasi['jumlah_kamar_tersedia'] ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-5">
          <img src="<?= base_url('assets/frontend/') ?>img/choose-ui.jpg" alt="" class="">
        </div>
        <div class="col-7">
          <div class="container-info">
            <h5 class="bold">Detail Pemesanan</h5>

            <div class="row ml-3 mt-4">
              <div class="col-12">
                <label for="">
                  <h6>Nomor Pemesanan</h6>
                  <input type="text" id="no_invoice" name="no_invoice" class="input-info input-block" readonly value="<?= $konfirmasi['no_invoice'] ?>">
                </label>
              </div>
            </div>

            <div class="row ml-3 mt-2">
              <div class="col-12">
                <label for="">
                  <h6>Nama Pemesan</h6>
                  <input type="hidden" name="id_user" value="<?= $this->session->userdata('id') ?>">
                  <input type="text" id="nama_pemesan" name="nama_pemesan" class="input-info input-block" readonly value="<?= $this->session->userdata('nama') ?>">
                </label>
              </div>
            </div>

            <div class="row ml-3">
              <div class="col-6">
                <label for="">
                  <h6>Tanggal Masuk</h6>
                  <input type="text" id="tgl_sewa" name="tgl_sewa" class="input-info input-block2" readonly value="<?= $konfirmasi['tgl_sewa'] ?>">
                </label>
              </div>
              <div class="col-6">
                <label for="">
                  <h6>Lama Sewa</h6>
                  <input type="text" id="lama_sewa" name="lama_sewa" class="input-info input-block2" readonly value="<?= $konfirmasi['lama_sewa'] ?>">
                </label>
              </div>
            </div>

            <div class="row ml-3">
              <div class="col-6">
                <label for="">
                  <h6>Tanggal Keluar</h6>
                  <input type="text" id="tgl_keluar" name="tgl_keluar" class="input-info input-block2" readonly value="<?= $konfirmasi['tgl_keluar'] ?>">
                </label>
              </div>
              <div class="col-6">
                <label for="">
                  <h6>Total Harga</h6>
                  <input type="text" id="total_harga" name="total_harga" class="input-info input-block2" readonly value="<?= $konfirmasi['total_harga'] ?>">
                </label>
              </div>
            </div>

            <div class="row justify-content-end mt-3">
              <div class="col-2 mr-5">
                <button type="submit" class="btn btn-primary bg-main" name="konfirmasi">Konfirmasi</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>