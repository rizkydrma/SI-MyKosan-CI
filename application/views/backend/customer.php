<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card  card-tasks">
        <div class="card-header ">
          <h4 class="card-title">Data Customer</h4>
          <hr>
        </div>
        <div class="card-body ">
          <table id="customer-table" class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="p-2">No</th>
                <th scope="col" class="p-2">Nama Customer</th>
                <th scope="col">Email</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Tanggal Keluar</th>
                <th scope="col">No Invoice</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              <?php foreach ($customer as $data) : ?>
                <tr>

                  <td><?= $i ?></td>
                  <td class="p-2"><?= $data->nama_user ?></td>
                  <td><?= $data->email ?></td>
                  <td><?= $data->no_telp ?></td>
                  <td><?= $data->tgl_masuk ?></td>
                  <td><?= $data->tgl_keluar ?></td>
                  <td class="text-primary"><?= $data->no_invoice ?></td>
                  <td>
                    <a href="#" class="btn btn-info btn-sm btn-modal" id="detail" data-toggle="modal" data-target="#customerModal" data-id="<?= $data->id_customer ?>" data-detail="customer" data-modal="detailCustomer">
                      <i class="fa fa-info-circle"></i>
                    </a>
                    <a href="<?= base_url('customer/hapusData/') ?><?= $data->id_customer ?>" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>

                </tr>
                <?php $i++ ?>
              <?php endforeach ?>

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerModalLabel">Detail Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="d-inline">No Invoice <h5 class="d-inline text-info" id="no_invoice">INV</h5>
          <hr>
          <form>
            <div class="form-group">
              <label for="nama_user">Nama Customer</label>
              <input type="text" class="form-control" id="nama_user" disabled>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="nama_kosan">Nama Kosan</label>
                  <input type="text" class="form-control" id="nama_kosan" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="nama_tipe">Tipe Kamar</label>
                  <input type="text" class="form-control" id="nama_tipe" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="tgl_masuk">Tanggal Masuk</label>
                  <input type="text" class="form-control" id="tgl_masuk" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="tgl_keluar">Tanggal Keluar</label>
                  <input type="text" class="form-control" id="tgl_keluar" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="no_telp">No Telp</label>
                  <input type="text" class="form-control" id="no_telp" disabled>
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