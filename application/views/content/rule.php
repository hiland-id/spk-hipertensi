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
            Tambah Rule
          </button>
        </div>
        <div class="card-body">
          <table id="ruleTable" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Gejala</th>
                <th>Penyakit</th>
                <th>Terapi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!--perulangan data dari db -->
              <?php
              $no = 1;
              foreach ($rule as $data) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data->gejala; ?></td>
                  <td><?= $data->penyakit; ?></td>
                  <td><?= $data->terapi; ?></td>
                  <td>
                    <a href="javascript:;" data-id_rule='<?= $data->id_rule; ?>' data-id_gejala='<?= $data->id_gejala; ?>' data-id_penyakit='<?= $data->id_penyakit; ?>' class="btn btn-primary edit">
                      Edit
                    </a>
                    <a href="<?= base_url('rule/hapus/' . $data->id_rule); ?>" class="btn btn-danger btn-md tombol-hapus">Hapus</a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Gejala</th>
                <th>Penyakit</th>
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
        <h4 class="modal-title">Tambah Rule</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="<?= base_url('rule/simpan'); ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputPassword1">Gejala</label>
              <select class="form-control" name="id_gejala" required>
                <option value="">--Pilih Gejala--</option>
                <?php
                foreach ($gejala as $data) {
                  echo "<option value='$data->id_gejala'>$data->gejala</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Penyakit</label>
              <select class="form-control" name="id_penyakit" required>
                <option value="">--Pilih Penyakit--</option>
                <?php
                foreach ($penyakit as $data) {
                  echo "<option value='$data->id_penyakit'>$data->penyakit</option>";
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
        <h4 class="modal-title">Edit Rule</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="<?= base_url('rule/simpan'); ?>" method="post">
          <div class="card-body">
            <input type="hidden" name="id_rule" id="id_rule" required>
            <div class="form-group">
              <label for="exampleInputPassword1">Gejala</label>
              <select class="form-control" id="id_gejala" name="id_gejala" required>
                <option>--Pilih Gejala--</option>
                <?php
                foreach ($gejala as $data) {
                  echo "<option value='$data->id_gejala'>$data->gejala</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Penyakit</label>
              <select class="form-control" id="id_penyakit" name="id_penyakit" required>
                <option>--Pilih Penyakit--</option>
                <?php
                foreach ($penyakit as $data) {
                  echo "<option value='$data->id_penyakit'>$data->penyakit</option>";
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
    $('#ruleTable').DataTable({
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
        text: "Data Rule akan dihapus",
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

    $("#ruleTable").on("click", ".edit", function() {
      $("#modal-edit").modal("show");
      $('#id_rule').val($(this).data('id_rule'));
      $('#id_gejala').val($(this).data('id_gejala'));
      $('#id_penyakit').val($(this).data('id_penyakit'));
    });

  });
</script>