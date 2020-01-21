<div class="panel-header panel-header-sm">

</div>

<div class="content ">
  <?php foreach ($pesan as $data) : ?>

    <div class="card">
      <div class="card-header text-primary">
        <?= date('F j, y G:i', $data->waktu) ?>
        <span class="text-info pl-5"> From : <?= $data->email ?></span>
        <a href="<?= base_url('admin/hapusData/') ?><?= $data->id ?>/Pesan" class="ml-2 mb-1 close tombol-hapus" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>

      </div>
      <div class="card-body">
        <p class="card-text"><?= $data->kritik_saran ?></p>
      </div>
    </div>
  <?php endforeach ?>
</div>