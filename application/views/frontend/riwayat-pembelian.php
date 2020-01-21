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
          <a href="<?= base_url('manageuser') ?>" class="list-group-item list-group-item-action">
            Ubah Profil
          </a>
          <a href="<?= base_url('manageuser/ubahPassword') ?>" class="list-group-item list-group-item-action">
            Ubah Password
          </a>
          <a href="<?= base_url('manageuser/riwayatPembelian') ?>" class="list-group-item list-group-item-action active">Riwayat Pembelian</a>
          <a href="<?= base_url('auth/logout') ?>" class="list-group-item list-group-item-action">Logout</a>
        </div>
      </div>

      <div class="col-9">
        <?php if (isset($riwayat_pembelian)) : ?>
          <table class="table table-striped" id="table-riwayat" width=100px>
            <thead>
              <tr>
                <th scope="col">Status</th>
                <th scope="col">No Invoice</th>
                <th scope="col">Kosan</th>
                <th scope="col">Tipe Kamar</th>
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Lama Sewa</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Tanggal Keluar</th>
                <th scope="col">Total Harga</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($riwayat_pembelian as $data) : ?>
                <tr>
                  <td class="text-danger"><?= $data->status ?></td>
                  <td><?= $data->no_invoice ?></td>
                  <td><?= $data->nama_kosan ?></td>
                  <td><?= $data->nama_tipe ?></td>
                  <td><?= date('Y-m-d',$data->tgl_transaksi) ?></td>
                  <td><?= $data->lama_sewa ?></td>
                  <td><?= $data->tgl_masuk ?></td>
                  <td><?= $data->tgl_keluar ?></td>
                  <td><?= $data->total_harga ?></td>
                </tr>
              <?php endforeach ?>


            </tbody>
          </table>
        <?php else : ?>
          <h3 class="text-center">Belum Ada Riwayat Pembelian</h3>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>