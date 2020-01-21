<div class="panel-header panel-header-sm">

</div>

<div class="content ">
  <div class="row">
    <div class="col-md-12">
      <div class="card  card-tasks">
        <div class="card-header ">
          <h4 class="card-title">Data Pemilik</h4>
          <hr>
        </div>
        <div class="card-body ">
          <table id="kosan-table" class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="p-2">No</th>
                <th scope="col" class="p-2">Nama Pemilik</th>
                <th scope="col">Email</th>
                <th scope="col">No Telp</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($pemilik) : ?>
                <?php $i = 1 ?>
                <?php foreach ($pemilik as $data) : ?>
                  <tr>

                    <td><?= $i ?></td>
                    <td class="text-primary p-2" width=150px><?= $data->nama_pemilik ?></td>
                    <td><?= $data->email ?></td>
                    <td><?= $data->no_telp ?></td>
                    <td><?= $data->tgl_lahir ?></td>
                    <td>
                      <?= (str_word_count($data->alamat) > 4 ? substr($data->alamat, 0, 20) . '...' : $data->alamat) ?>
                    <td>
                      <a href="#" class="btn btn-info btn-sm btn-modal adminPopup" id="detail" data-toggle="modal" data-target="#detailPemilik" data-id="<?= $data->id_pemilik ?>" data-modal="detailPemilik">
                        <i class="fa fa-info-circle"></i>
                      </a>
                      <a href="<?= base_url('admin/hapusData/') ?><?= $data->id_pemilik ?>/Pemilik" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>

                  </tr>
                  <?php $i++ ?>
                <?php endforeach ?>
              <?php else : ?>
                <tr>
                  <td colspan="8">
                    <h5 class="text-center">Tidak ada pemilik</h5>
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
<div class="modal fade" id="detailPemilik" tabindex="-1" role="dialog" aria-labelledby="detailPemilikLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailPemilikLabel">Detail Transaksi Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-between">
          <div class="col-9">
            <h5 class="d-inline">ID Pemilik <h5 class="d-inline text-info" id="id_pemilik">01</h5>
          </div>
          <div class="col-3">
            <img src="" alt="" class="img-thumbnail gambar">
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
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" readonly>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="no_telpon">No telepon</label>
                <input type="text" class="form-control" id="no_telpon" name="no_telpon" readonly>
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
                <label for="gambar">Gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar" readonly>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="is_active">Is Active</label>
                <input type="text" class="form-control" id="is_active" name="is_active" readonly>
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