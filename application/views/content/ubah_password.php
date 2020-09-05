<!-- Main content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form Ubah Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="<?= base_url('dashboard/aksi_ubah_password'); ?>" method="post" id="form-lupa-password">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password baru">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="c-password" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="c-password" id="c-password" placeholder="Konfirmasi password">
                                    <i class="text-info" id="passtidaksama"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" class="btn btn-info btn-submit">Submit</button>
                            <button type="buttol" class="btn btn-default float-right btn-reset">Batal</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<script>
    $(function() {
        const flashdata = $('.flash-data').data('flashdata');
        const flashdatatidak = $('.flash-data-tidak').data('flashdata');
        if (flashdata) {
            toastr.success(flashdata);
        }

        if (flashdatatidak) {
            toastr.error(flashdatatidak);
        }

        $(".btn-submit").attr("disabled", "disabled");
        $('#c-password').on('keyup', function() {
            var nps = $("#c-password").val();
            var ps = $("#password").val();

            if (nps == ps) {
                $("#passtidaksama").text("");
                $(".btn-submit").removeAttr("disabled", "disabled");
            } else {
                $("#passtidaksama").text("Password konfirmasi tidak sama dengan password baru");
                $(".btn-submit").attr("disabled", "disabled");
            }
        });

        $(".btn-submit").click(function() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Akan mengubah password akun ini. Setelah proses berhasil silahkan untuk login ulang.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d333085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ubah Password'
            }).then((result) => {
                if (result.value) {
                    $("#form-lupa-password").submit();
                }
            })
        })
    });
</script>