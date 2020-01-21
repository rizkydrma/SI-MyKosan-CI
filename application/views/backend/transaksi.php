<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card  card-tasks">
        <div class="card-header ">
          <h4 class="card-title">Data Transaksi</h4>
          <hr>
        </div>
        <div class="card-body ">
          <table id="kosan-table" class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="p-2">No</th>
                <th scope="col" class="p-2">No Invoice</th>
                <th scope="col">Nama User</th>
                <th scope="col">Nama Kosan</th>
                <th scope="col">Nama Kamar</th>
                <th scope="col">Jumlah Kamar</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($transaksi) : ?>
                <?php $i = 1 ?>
                <?php foreach ($transaksi as $data) : ?>
                  <tr>

                    <td><?= $i ?></td>
                    <td class="text-primary p-2" width=150px><?= $data->no_invoice ?></td>
                    <td><?= $data->nama_user ?></td>
                    <td><?= $data->nama_kosan ?></td>
                    <td><?= $data->nama_tipe ?></td>
                    <td><?= $data->jumlah_kamar ?></td>
                    <td><?= date('Y-m-d',$data->tgl_transaksi) ?></td>
                    <td class="status">


                      <form action="" name="ubahstatus" method="post">
                        <?php if ($data->status == 'Menunggu Pembayaran') : ?>
                          <button type="submit" class="btn btn-warning rounded-pill active" name="ubahstatus" data-id="<?= $data->id_transaksi ?>" data-user=<?= $data->id_user ?> data-kosan= <?= $data->id_kosan ?> data-tipe="<?= $data->id_tipe ?>">
                          <?php else : ?>
                            <button type="submit" class="btn btn-info rounded-pill not-active" name="ubahstatus" data-id="<?= $data->id_transaksi ?>" data-user=<?= $data->id_user ?> data-kosan= <?= $data->id_kosan ?> data-tipe="<?= $data->id_tipe ?>">
                            <?php endif ?>
                            <?= $data->status ?>
                            </button>
                      </form>

                    </td>
                    <td>
                      <a href="#" class="btn btn-info btn-sm btn-modal" id="detail" data-toggle="modal" data-target="#transaksiModal" data-id="<?= $data->id_transaksi ?>" data-modal="detailTransaksi">
                        <i class="fa fa-info-circle"></i>
                      </a>
                      <a href="<?= base_url('transaksi/hapusData/') ?><?= $data->id_transaksi ?>/<?= $data->id_tipe ?>/<?= $data->jumlah_kamar ?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>

                  </tr>
                  <?php $i++ ?>
                <?php endforeach ?>
              <?php else : ?>
                <tr>
                  <td colspan="8">
                    <h5 class="text-center">Belum Ada Pelanggan</h5>
                  </td>
                </tr>
              <?php endif ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="transaksiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="transaksiModalLabel">Detail Transaksi Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="d-inline">No Invoice <h5 class="d-inline text-info" id="no_invoice">INV</h5>
          <hr>
          <form>
            <div class="form-group">
              <label for="nama_user">Nama User</label>
              <input type="text" class="form-control" id="nama_user" name="nama_user" readonly>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="nama_kosan">Nama Kosan</label>
                  <input type="text" class="form-control" id="nama_kosan" name="nama_kosan" readonly>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="nama_tipe">Tipe Kamar</label>
                  <input type="text" class="form-control" id="nama_tipe" name="nama_tipe" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="lama_sewa">Lama Sewa</label>
                  <input type="text" class="form-control" id="lama_sewa" name="lama_sewa" readonly>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="tgl_transaksi">Tanggal Transaksi</label>
                  <input type="text" class="form-control" id="tgl_transaksi" name="tgl_transaksi" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="tgl_masuk">Tanggal Masuk</label>
                  <input type="text" class="form-control" id="tgl_masuk" name="tgl_masuk" readonly>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="tgl_keluar">Tanggal Keluar</label>
                  <input type="text" class="form-control" id="tgl_keluar" name="tgl_keluar" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="total_harga">Total Harga</label>
                  <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="status">Status</label>
                  <input type="text" class="form-control" id="status" name="status" readonly>
                </div>
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>