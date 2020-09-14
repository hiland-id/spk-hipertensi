<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            Tambah Penyakit
          </button>
        </div>
        <div class="card-body">
          <table id="penyakitTable" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>ID Penyakit</th>
                <th>Nama Penyakit</th>
                <th>Deskripsi</th>
                <th>Terapi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!--perulangan data dari db -->
              <?php
              $no = 1;
              foreach ($penyakit as $data) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data->id_penyakit; ?></td>
                  <td><?= ucfirst($data->penyakit); ?></td>
                  <td><?= ucfirst($data->deskripsi); ?></td>
                  <td><?= $data->terapi; ?></td>
                  <td>
                    <a href="javascript:;" data-id_penyakit='<?= $data->id_penyakit; ?>' data-penyakit='<?= $data->penyakit; ?>' data-deskripsi='<?= $data->deskripsi; ?>' data-id_terapi='<?= $data->id_terapi; ?>' class="btn btn-primary edit">
                      Edit
                    </a>
                    <a href="<?= base_url('penyakit/hapus/' . $data->id_penyakit); ?>" class="btn btn-danger btn-md tombol-hapus">Hapus</a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>ID Penyakit</th>
                <th>Nama Penyakit</th>
                <th>Deskripsi</th>
                <th>Terapi</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Penyakit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="<?= base_url('penyakit/simpan'); ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">ID Penyakit</label>
              <input type="text" class="form-control" name="id_penyakit" placeholder="ID Penyakit" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Penyakit</label>
              <input type="text" class="form-control" name="penyakit" placeholder="Nama Penyakit" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi" required></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Terapi</label>
              <select class="form-control" name="id_terapi" required>
                <option>--Pilih Terapi--</option>
                <?php
                foreach ($terapi as $data) {
                  echo "<option value='$data->id_terapi'>$data->terapi</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Penyakit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="<?= base_url('penyakit/ubah'); ?>" method="post">
          <div class="card-body">
            <input type="hidden" name="id_penyakit" id="id_penyakit" required>
            <div class="form-group">
              <label for="penyakit">Penyakit</label>
              <input type="text" class="form-control" name="penyakit" id="penyakit" placeholder="Nama Penyakit" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea name="deskripsi" id="edit_deskripsi" class="form-control" placeholder="Deskripsi" required></textarea>
            </div>
            <div class="form-group">
              <label for="id_terapi">Terapi</label>
              <select class="form-control" id="id_terapi" name="id_terapi" required>
                <option>--Pilih Terapi--</option>
                <?php
                foreach ($terapi as $data) {
                  echo "<option value='$data->id_terapi'>$data->terapi</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
  $(function() {
    $('#penyakitTable').DataTable({
      responsive: true
    });

    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata) {
      toastr.success(flashdata);
    }
    const flashdatatidak = $('.flash-data-tidak').data('flashdata');
    if (flashdatatidak) {
      toastr.error(flashdatatidak);
    }

    $('.tombol-hapus').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data mahasiswa akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
    });

    $("#penyakitTable").on("click", ".edit", function() {
      $("#modal-edit").modal("show");
      $('#id_penyakit').val($(this).data('id_penyakit'));
      $('#penyakit').val($(this).data('penyakit'));
      $('#edit_deskripsi').html($(this).data('deskripsi'));
      $('#id_terapi').val($(this).data('id_terapi'));
    });

  });
</script>