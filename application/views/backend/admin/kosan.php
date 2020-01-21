<div class="panel-header panel-header-sm">

</div>

<div class="content ">
  <div class="row">
    <div class="col-md-12">
      <div class="card  card-tasks">
        <div class="card-header ">
          <h4 class="card-title">Data Kosan</h4>
          <hr>
        </div>
        <div class="card-body ">
          <table id="kosan-table" class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="p-2">No</th>
                <th scope="col">Nama Kosan</th>
                <th scope="col">Nama Pemilik</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Kota</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($kosan) : ?>
                <?php $i = 1 ?>
                <?php foreach ($kosan as $data) : ?>
                  <tr>

                    <td><?= $i ?></td>
                    <td class="text-primary p-2"><?= $data->nama_kosan ?></td>
                    <td><?= $data->nama_pemilik ?></td>
                    <td><?= $data->provinsi ?></td>
                    <td><?= $data->kota ?></td>
                    <td><?= $data->kecamatan ?></td>
                    <td>
                      <?= (str_word_count($data->alamat) > 4 ? substr($data->alamat, 0, 20) . '...' : $data->alamat) ?>
                    </td>
                    <td>
                      <?= (str_word_count($data->deskripsi) > 4 ? substr($data->deskripsi, 0, 20) . '...' : $data->deskripsi) ?>
                    </td>
                    <td>
                    <button type="button" class="p-2 btn-modal adminPopup btn btn-primary" data-toggle="modal" data-target="#popupModal" data-id="<?= $data->id_kosan ?>" data-nama="<?= $data->nama_kosan ?>" data-modal="lihat_kosan_admin">
                      lihat gambar
                    </button>
                  </td>
                    <td>
                      <a href="#" class="btn btn-info btn-sm btn-modal adminPopup" id="detail" data-toggle="modal" data-target="#detailKosan" data-id="<?= $data->id_kosan ?>" data-modal="detailKosan">
                        <i class="fa fa-info-circle"></i>
                      </a>
                      <a href="<?= base_url('admin/hapusData/') ?><?= $data->id_kosan ?>/Kosan" class="btn btn-danger btn-sm tombol-hapus">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php $i++ ?>
                <?php endforeach ?>
              <?php else : ?>
                <tr>
                  <td colspan="8">
                    <h5 class="text-center">Tidak ada kosan</h5>
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
<div class="modal fade" id="detailKosan" tabindex="-1" role="dialog" aria-labelledby="detailKosanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailKosanLabel">Detail Kosan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <h5 class="d-inline">ID Kosan <h5 class="d-inline text-info" id="id_kosan"></h5>
          </div>
          <div class="col">
            <h5 class="d-inline text-primary nama-kosan"></h5>
          </div>
        </div>
        <hr>
        <form>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik</label>
                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" readonly>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" class="form-control" id="provinsis" name="provinsi" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" readonly>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamats" name="alamat" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsis" name="deskripsi" readonly>
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

<!-- Gambar MODAL -->
<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupModalLabel">Gambar Kosan</h5>
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