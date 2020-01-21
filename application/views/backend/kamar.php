<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <?= validation_errors(); ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card  card-tasks">
        <div class="card-header ">
          <h4 class="card-title d-inline">Data Kamar : </h4>
          <h4 class="card-title d-inline text-info"><?= $kosan[0]->nama_kosan ?></h4>
          <hr>
        </div>
        <div class="card-body ">
          <button type="" class="btn-modal btn btn-primary rounded-pill" data-toggle="modal" data-target="#kamarTambah" data-modal="kamarTambah">Tambah Tipe Kamar</button>
          <button type="" class="btn btn-info rounded-pill" data-toggle="modal" data-target="#gambarModal">Upload Gambar</button>

          <table id="kosan-table" class="table table-striped display nowrap" style="width:100%">
            <thead>
              <tr>
                <th scope="col" class="p-2">No</th>
                <th scope="col">ID Tipe</th>
                <th scope="col">Nama Tipe</th>
                <th scope="col">Tipe Kamar</th>
                <th scope="col">Jumlah Kamar</th>
                <th scope="col">Tersedia</th>
                <th scope="col">Fasilitas</th>
                <th scope="col">Harga</th>
                <th scope="col">Gambar</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php $i = 1 ?>
              <?php foreach ($kamar as $data) : ?>

                <tr>
                  <td><?= $i ?></td>
                  <td><?= $data->id_tipe ?></td>
                  <td><?= $data->nama_tipe ?></td>
                  <td><?= $data->tipe_kamar ?></td>
                  <td><?= $data->jumlah_kamar ?></td>
                  <td><?= $data->jumlah_kamar_tersedia ?></td>
                  <td><?= $data->fasilitas ?></td>
                  <td><?= $data->harga ?></td>
                  <td>
                    <button type="button" class="p-2 btn-modal popupModal btn btn-primary" data-toggle="modal" data-target="#popupModal" data-id="<?= $data->id_tipe ?>" data-nama="<?= $data->nama_tipe ?>" data-modal="lihat_tipe">
                      lihat gambar
                    </button>
                  </td>
                  <td>
                    <a href="#" class="btn-modal btn btn-info btn-sm" id="detail" data-toggle="modal" data-target="#kamarTambah" data-id="<?= $data->id_tipe ?>" data-modal="detailKamar">
                      <i class="fa fa-info-circle"></i>
                    </a>
                    <a href="#" class="btn-modal btn btn-success btn-sm" id="ubah" data-toggle="modal" data-target="#kamarTambah" data-id="<?= $data->id_tipe ?>" data-modal="ubahKamar">
                      <i class="fa fa-pen"></i>
                    </a>
                    <a href="<?= base_url('kamar/hapusData/') ?><?= $data->id_tipe ?>" class="btn btn-danger btn-sm tombol-hapus">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <?php $i++ ?>
                </tr>
              <?php endforeach ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="kamarTambah" tabindex="-1" role="dialog" aria-labelledby="kamarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kamarModalLabel">Tambah Tipe Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="d-inline" id="nama-kosan">Nama Kosan </h5>
        <h5 class="d-inline text-info" id="data-kosan"><?= $kosan[0]->nama_kosan ?></h5>
        <hr>
        <form action="<?= base_url('kamar/dataKamar/') ?><?= $kosan[0]->id_kosan ?>" method="POST">
          <input type="hidden" name="id_tipe" id="id_tipe">
          <input type="hidden" name="id_kosan" id="id_kosan" value="<?= $kosan[0]->id_kosan ?>">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="nama_tipe">Nama Kamar</label>
                <input type="text" class="form-control" id="nama_tipe" name="nama_tipe" autocomplete="off">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="tipe_kamar">Tipe Kamar</label>
                <input type="text" class="form-control" id="tipe_kamar" name="tipe_kamar" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="jumlah_kamar">Jumlah Kamar</label>
                <input type="text" class="form-control" id="jumlah_kamar" name="jumlah_kamar" autocomplete="off">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="kamar_tersedia">Jumlah Kamar Tersedia</label>
                <input type="text" class="form-control" id="kamar_tersedia" name="kamar_tersedia" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="fasilitas">Fasilitas</label>
                <input type="text" class="form-control" id="fasilitas" name="fasilitas" autocomplete="off">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" autocomplete="off">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" value="Submit"></button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Upload MODAL -->
<div class="modal fade" id="gambarModal" tabindex="-1" role="dialog" aria-labelledby="gambarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gambarModalLabel">Upload Gambar Kosan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <hr>
        <form action="<?= base_url('kamar/proses_upload') ?>" class="dropzone" method="post">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="id_tipe">Tipe Kamar</label>
                <select class="form-control" id="id_tipe" name="id_tipe">
                  <option>Pilih Tipe Kamar</option>
                  <?php foreach ($kamar as $data) : ?>
                    <option value="<?= $data->id_tipe ?>" name="id"><?= $data->nama_tipe ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="alamat">Upload Gambar Tipe Kamar</label>
                <div class="fallback">
                  <input name="file" type="file" multiple />
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" id="uploadGambar">Simpan</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>


<!-- Gambar MODAL -->
<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupModalLabel">Gambar Tipe Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <hr>
        <form action="<?= base_url('kosan/proses_upload') ?>" method="post">
          <div class="row lihat-gambar">

          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" id="uploadGambar">Simpan</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>