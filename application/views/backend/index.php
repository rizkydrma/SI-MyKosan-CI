<div class="panel-header panel-header-lg topChart">
    <canvas id="chartPendapatan"></canvas>
</div>
<div class="content ">
  <div class="row ">
    <div class="col-md-12">
      <div class="card card-tasks">
        <div class="card-header ">
          <h4 class="card-title">Transaksi Terbaru</h4>
          <hr>
        </div>
        <?php foreach ($transaksi as $data) : ?>
          <div class="card-body ">
            <h6 class="text-primary"><?= $data->nama_user ?> - <?= $data->nama_tipe ?></h6>
            <h6 class="text-info">(<?= $data->no_invoice ?>)</h6>
            <div class="row justify-content-between">
              <div class="col-9 status">
                <form action="" name="ubahstatus" method="post">
                  <?php if ($data->status == 'Menunggu Pembayaran') : ?>
                    <button type="submit" class="btn btn-warning rounded-pill active" name="ubahstatus" data-id="<?= $data->id_transaksi ?>" data-user=<?= $data->id_user ?> data-kosan= <?= $data->id_kosan ?> data-tipe="<?= $data->id_tipe ?>">
                    <?php else : ?>
                      <button type="submit" class="btn btn-info rounded-pill not-active" name="ubahstatus" data-id="<?= $data->id_transaksi ?>" data-user=<?= $data->id_user ?> data-kosan= <?= $data->id_kosan ?> data-tipe="<?= $data->id_tipe ?>">
                      <?php endif ?>
                      <?= $data->status ?>
                      </button>
                </form>
              </div>
              <div class="col-3">
                <p class="text-info"><?= date('Y-m-d',$data->tgl_transaksi) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <div class="card-footer ">
          <hr>
          <div class="row justify-content-center">
            <div class="col-3">
              <a href="<?= base_url('transaksi') ?>" class="btn btn-info btn-block p-3">View All</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>