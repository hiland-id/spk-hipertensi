<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil');?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal');?>'></div>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
             Tambah Gejala
          </button>
        </div>
        <div class="card-body">
          <table id="formgejala" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Gejala</th>
                <th>Gejala</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!--perulangan data dari db -->
              <?php 
              $no = 1;
              foreach ($gejala as $data) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data->id_gejala; ?></td>
                  <td><?= $data->gejala; ?></td>
                  <td>
                    <a href="javascript:;" 
                    data-id_gejala='<?= $data->id_gejala; ?>'
                    data-gejala='<?= $data->gejala; ?>' 
                    class="btn btn-primary edit" >
                    Edit
                  </a>
                  <a href="<?= base_url('gejala/hapus/'.$data->id_gejala); ?>" class="btn btn-danger btn-md tombol-hapus">Hapus</a>

                </td>

              </tr>
              <?php 
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
                <th>Kode Gejala</th>
                <th>Gejala</th>
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
        <h4 class="modal-title">Tambah Gejala</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form role="form" action="<?= base_url('gejala/simpan');?>" method="post">
        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Kode Gejala</label>
          <input type="text" class="form-control" name="id_gejala" placeholder="Input Kode Gejala">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Gejala</label>
          <input type="text" class="form-control" name="gejala" placeholder="Input Nama Gejala">
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
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
        <h4 class="modal-title">Edit Gejala</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form role="form" action="<?= base_url('gejala/simpan');?>" method="post">
        <div class="card-body">
          <input type="hidden" name="id_gejala" id="id_gejala" >
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Gejala</label>
            <input type="text" class="form-control" name="gejala" id="gejala" placeholder="Input Nama Gejala">
          </div>
        </div>
        <!-- /.card-body -->

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
  $(function()
  {
    $('#formgejala').DataTable({
      responsive:true
    });

    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata) 
    {
      toastr.success(flashdata);
    }
    const flashdatatidak = $('.flash-data-tidak').data('flashdata');
    if (flashdatatidak) 
    {
      toastr.success(flashdatatidak);
    }

    $('.tombol-hapus').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data Gejala akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
      }).then((result) => {
       if (result.value) {
         // Swal.fire(
         //   'Deleted!',
         //   'Your file has been deleted.',
         //   'success'
         // )
         
         document.location.href = href;
       }
     })
    });

    $("#formgejala").on("click",".edit",function(){
      // alert($(this).data('gejala'));
      $("#modal-edit").modal("show");
      $('#id_gejala').val($(this).data('id_gejala'));
      $('#gejala').val($(this).data('gejala'));
    });

  });

</script>