<div class="panel-header panel-header-sm">

</div>

<div class="content ">
  <div class="row">
    <div class="col-md-12">
      <div class="card  card-tasks">
        <div class="card-header ">
          <h4 class="card-title">Data User</h4>
          <hr>
        </div>
        <div class="card-body ">
          <table id="kosan-table" class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="p-2">No</th>
                <th scope="col" class="p-2">Nama User</th>
                <th scope="col">Email</th>
                <th scope="col">No Telp</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($user) : ?>
                <?php $i = 1 ?>
                <?php foreach ($user as $data) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td class="text-primary p-2" width=150px><?= $data->nama_user ?></td>
                    <td><?= $data->email ?></td>
                    <td><?= $data->no_telp ?></td>
                    <td><?= $data->tgl_lahir ?></td>
                    <td>
                      <?= (str_word_count($data->alamat) > 4 ? substr($data->alamat, 0, 20) . '...' : $data->alamat) ?>
                    </td>
                    <td>
                      <a href="#" class="btn btn-info btn-sm btn-modal adminPopup" id="detail" data-toggle="modal" data-target="#detailUser" data-id="<?= $data->id_user ?>" data-modal="detailUser">
                        <i class="fa fa-info-circle"></i>
                      </a>
                      <a href="<?= base_url('admin/hapusData/') ?><?= $data->id_user ?>/User" class="btn btn-danger btn-sm">
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
<div class="modal fade" id="detailUser" tabindex="-1" role="dialog" aria-labelledby="detailUserLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailUserLabel">Detail Transaksi Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-between">
          <div class="col-9">
          <h5 class="d-inline">ID User <h5 class="d-inline text-info" id="id_user">01</h5>
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
                  <label for="nama_user">Nama User</label>
                  <input type="text" class="form-control" id="nama_user" name="nama_user" readonly>
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
                  <label for="no_telp">No telepon</label>
                  <input type="text" class="form-control" id="no_telp" name="no_telp" readonly>
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
                  <label for="is_active">iS Active</label>
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