<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
            Tambah Dokumen
          </button>
        </div>
        <div class="card-body">
          <table id="dokumen" class="table table-bordered  table-hover nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>nik</th>
                <th>Nama</th>
                <th>Dokumen</th>
                <th>Tipe Dokumen</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!--perulangan data dari db -->
              <?php
              $no = 1;
              foreach ($dokumen as $data) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data->nik; ?></td>
                  <td><?= (!empty($data->gelar_depan)) ? $data->gelar_depan . ". " . $data->nama . ", " . $data->gelar_belakang : "" . $data->nama . ", " . $data->gelar_belakang; ?></td>
                  <td><?= $data->nama_dokumen; ?></td>
                  <td><?= $data->type_dokumen; ?></td>
                  <td>
                    <!-- <a href="javascript:;" data-id_dokumen="<?= $data->id_dokumen; ?>" data-nik="<?= $data->nik; ?>" data-nama_dokumen="<?= $data->nama_dokumen; ?>" data-type_dokumen="<?= $data->type_dokumen; ?>" data-keterangan="<?= $data->keterangan; ?>" class="btn btn-primary edit">
                      Edit
                    </a> -->
                    <a href="<?= base_url('dokumen/hapus/' . $data->id_dokumen); ?>" class="btn btn-danger btn-md tombol-hapus">Hapus</a>

                  </td>

                </tr>
              <?php
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>nik</th>
                <th>Nama</th>
                <th>Dokumen</th>
                <th>Tipe Dokumen</th>
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
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="<?= base_url('dokumen/simpan'); ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputPassword1">nik</label>
              <select class="form-control select2bs4" name="nik" id="nik_add" style="width: 100%;" required>
                <option>-- Pilih nik --</option>
                <?php
                foreach ($user as $data) {
                  echo "<option>$data->nik</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control" name="nama_add" placeholder="Input Nama" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Dokumen</label>
              <input type="text" class="form-control" name="nama_dokumen" placeholder="Input Nama Dokumen" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tipe Dokumen</label>
              <select class="form-control" name="type_dokumen" required>
                <option>--Pilih Tipe Dokumen--</option>
                <option value='Ijazah'>Ijazah</option>
                <option value='SK'>SK Pengangkatan</option>
                <option value='Sertifikat'>Sertifikat</option>
                <option value='KK'>Kartu Keluarga</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="berkas" required>
                  <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                </div>
              </div>
            </div>
            <i class="text-info">File yang diperbolehkan : jpg|jpeg|png|pdf|docx|doc</i>
            <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
          <h4 class="modal-title">Edit dokumen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" action="<?= base_url('dokumen/simpan'); ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id_dokumen" id="id_dokumen">
              <div class="form-group">
                <label for="nik">nik</label>
                <select class="form-control" name="nik" id="nik">
                  <option>--Pilih nik--</option>
                  <?php
                  foreach ($user as $data) {
                    echo "<option value='$data->nik'>$data->nama</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="nama_dokumen">Nama Dokumen</label>
                <input type="time" class="form-control" name="nama_dokumen" id="nama_dokumen" placeholder="Input Nama Dokumen">
              </div>
              <div class="form-group">
                <label for="type_dokumen">Tipe Dokumen</label>
                <select class="form-control" name="type_dokumen" id="type_dokumen">
                  <option>--Pilih Tipe Dokumen--</option>
                  <option value='Ijazah'>Ijazah</option>
                  <option value='SK'>SK Pengangkatan</option>
                  <option value='Sertifikat'>Sertifikat</option>
                  <option value='KK'>Kartu Keluarga</option>
                </select>
              </div>
              <div class="form-group">
                <label for="berkas">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="berkas" name="berkas">
                    <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                  </div>
                  <i class="text-info">File yang diperbolehkan : jpg|jpeg|png|pdf|docx|doc</i>
                  <img src="" id="tampil_foto" width="10%">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan perubahan</button>
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
      $('#dokumen').DataTable({
        responsive: true,
        language: {
          url: "<?= base_url(); ?>aset/ID.json"
        },
        columnDefs: [{
            responsivePriority: 1,
            targets: 0
          },
          {
            responsivePriority: 2,
            targets: 1
          },
          {
            responsivePriority: 3,
            targets: 2
          },
          {
            responsivePriority: 4,
            targets: -1
          }
        ]
      });

      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

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
          text: "Data Dokumen akan dihapus",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus Data!'
        }).then((result) => {
          if (result.value) {
            document.location.href = href;
          }
        })
      });

      $("#dokumen").on("click", ".edit", function() {
        $("#modal-edit").modal("show");
        // $('#id_dokumen').val($(this).data('id_dokumen'));
        // $('#nik').val($(this).data('nik'));
        // $('#nama_dokumen').val($(this).data('nama_dokumen'));
        // $('#nama').val($(this).data('nama'));
        // $('#type_dokumen').val($(this).data('type_dokumen'));
        // $('#keterangan').val($(this).data('keterangan'));
      });

      $("#nik_add").on("change", function() {
        let nik = $(this).val();
        // cek nik terdaftar
        $.ajax({
          url: "<?= base_url('user/cek_nik_aktif'); ?>",
          type: "POST",
          dataType: "JSON",
          cache: false,
          data: {
            nik: nik
          },
          success: function(res) {
            if (res.status) {
              if (res.data.gelar_depan != "" && res.data.gelar_belakang == "") {
                $("[name='nama_add']").val(res.data.gelar_depan + ". " + res.data.nama);
              } else if (res.data.gelar_depan == "" && res.data.gelar_belakang != "") {
                $("[name='nama_add']").val(res.data.nama + ", " + res.data.gelar_belakang);
              } else if (res.data.gelar_depan != "" && res.data.gelar_belakang != "") {
                $("[name='nama_add']").val(res.data.gelar_depan + ". " +
                  res.data.nama + ", " + res.data.gelar_belakang);
              } else if (res.data.gelar_depan == "" && res.data.gelar_belakang == "") {
                $("[name='nama_add']").val(res.data.nama);
              }
              toastr.success(res.pesan);
              console.log(res.data);
            } else {
              toastr.error(res.pesan);
            }
          },
          error: function() {
            toastr.error("400");
          }
        });
      });

    });
  </script>