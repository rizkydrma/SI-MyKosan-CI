<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card  card-tasks">
        <div class="card-header ">
          <h4 class="card-title">Data Kosan</h4>
          <hr>
        </div>
        <div class="card-body ">
          <button type="" class="btn-modal btn btn-primary rounded-pill" data-toggle="modal" data-target="#tambahModal" data-modal="tambah">Tambah Data Kosan</button>
          <button type="" class="btn btn-info rounded-pill" data-toggle="modal" data-target="#gambarModal">Upload Gambar</button>

          <table id="kosan-table" class="table table-striped display nowrap" style="width:100%">
            <thead>
              <tr>
                <th scope="col" class="p-2">No</th>
                <th scope="col" class="p-2">Nama Pemilik</th>
                <th scope="col">Nama Kosan</th>
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

              <?php $i = 1 ?>
              <?php $this->load->model('Kosan_model', 'kosan') ?>

              <?php foreach ($kosan as $data) : ?>
                <tr>
                  <td><?= $i ?></td>
                  <td class="p-2"><?= $data->nama_pemilik ?></td>
                  <td><?= $data->nama_kosan ?></td>
                  <td><?= $data->provinsi ?></td>
                  <td><?= $data->kota ?></td>
                  <td><?= $data->kecamatan ?></td>
                  <td>
                    <?php echo (str_word_count($data->alamat) > 4 ? substr($data->alamat,0,20)."..." : $data->alamat) ?>
                  </td>
                  <td>
                  <?php echo (str_word_count($data->deskripsi) > 4 ? substr($data->deskripsi,0,20)."..." : $data->deskripsi) ?>
                  </td>
                  <td>
                    <button type="button" class="p-2 btn-modal popupModal btn btn-primary" data-toggle="modal" data-target="#popupModal" data-id="<?= $data->id_kosan ?>" data-nama="<?= $data->nama_kosan ?>" data-modal="lihat_kosan">
                      lihat gambar
                    </button>
                  </td>
                  <td>
                    <a href="#" class="btn-modal btn btn-info btn-sm" id="detail" data-toggle="modal" data-target="#tambahModal" data-id="<?= $data->id_kosan ?>" data-modal="detail">
                      <i class="fa fa-info-circle"></i>
                    </a>
                    <a href="#" class="btn-modal btn btn-success btn-sm" id="ubah" data-toggle="modal" data-target="#tambahModal" data-id="<?= $data->id_kosan ?>" data-modal="ubah">
                      <i class="fa fa-pen"></i>
                    </a>
                    <a href="<?= base_url('kosan/hapusData/') ?><?= $data->id_kosan ?>" class="btn btn-danger btn-sm tombol-hapus">
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


<!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Tambah Data Kosan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('kosan') ?>" method="post">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <input type="hidden" name="id_kosan" id="id_kosan">
                <input type="hidden" name="id_pemilik" id="id_pemilik">

                <input type="hidden" value="<?= $this->session->userdata('id') ?>" name="id_pemilik">
                <label for="nama_pemilik">Nama Pemilik</label>
                <input type="text" class="form-control" id="nama_pemilik" value="<?= $this->session->userdata('nama') ?>" readonly>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="nama_kosan">Nama Kosan</label>
                <input type="text" class="form-control" id="nama_kosan" name="nama_kosan" readonly autocomplete="of">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select class="form-control" id="provinsi" name="provinsi">
                  <option>Pilih Provinsi</option>
                  <?php foreach ($provinsi as $data) : ?>
                    <option value="<?= $data['id'] ?>|<?= $data['name'] ?>" name="id"><?= $data['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

            </div>
            <div class="col">
              <div class="form-group">
                <label for="kota">Kota</label>
                <select class="kota form-control" id="kota" name="kota" readonly>
                  <option>Pilih Kota</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select class="kecamatan form-control" id="kecamatan" name="kecamatan" readonly>
                  <option>Pilih Kecamatan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="alamat">Alamat Lengkap Kosan</label>
                <textarea class="form-control border-dark" id="alamat" rows="3" name="alamat"></textarea>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control border-dark" id="deskripsi" rows="3" name="deskripsi"></textarea>
              </div>
            </div>
          </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Tambah Data</button>
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
        <form action="<?= base_url('kosan/proses_upload') ?>" class="dropzone" method="post">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="id_kosan">Nama Kosan</label>
                <select class="form-control" id="id_kosan" name="id_kosan">
                  <option>Pilih Kosan</option>
                  <?php foreach ($kosan as $data) : ?>
                    <option value="<?= $data->id_kosan ?>" name="id"><?= $data->nama_kosan ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="alamat">Upload Gambar Kosan</label>
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