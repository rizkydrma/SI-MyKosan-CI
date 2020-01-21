<div class="panel-header panel-header-sm">
</div>
<div class="content">

  <div class="row">
    <?php $i = 0; ?>
    <?php foreach ($kosan as $data) : ?>

      <div class="col-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-primary"><?= $data->nama_kosan ?></h5>
            <h6>Alamat</h6>
            <p class="card-text"><?= $data->alamat ?></p>
            <?php
            $this->load->model('Kamar_model', 'kamar');

            $kamar = $this->kamar->getDataKamar($data->id_kosan);
            $sum = $this->kamar->getJumlah($data->id_kosan);
            
            ?>
            <p class="card-text">Jumlah Tipe Kamar :
              <?php if ($sum->jumlahTipeKamar == 0) : ?>
                0
              <?php else : ?>
                <?= $sum->jumlahTipeKamar ?>
              <?php endif ?>
            </p>
            <p class="card-text">Jumlah Total Kamar :
              <?php if ($sum->jumlahTotalKamar == NULL) : ?>
                0
              <?php else : ?>
                <?= $sum->jumlahTotalKamar ?>
              <?php endif ?>
            </p>
            <a href="<?= base_url('kamar/dataKamar/') ?><?= $data->id_kosan ?>" class="btn btn-primary btn-block">Kelola Kosan</a>
          </div>
        </div>
      </div>
      <?= $i++ ?>
    <?php endforeach ?>
  </div>
</div>