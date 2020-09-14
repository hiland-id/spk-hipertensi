<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Data Gejala
                </div>
                <div class="card-body">
                    <form role="form" id="form-diagnosa" action="<?= base_url('diagnosa/hasil'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Pasien</label>
                                    <select class="form-control" name="nik" required>
                                        <?= ($session['app_level'] == 'admin') ? "<option value=''>--Pilih Pasien--</option>" : "<option value='' disabled>--Pilih Pasien--</option>"; ?>
                                        <?php
                                        foreach ($user as $data) {
                                            echo "<option value='$data->nik'>$data->nama</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <?php foreach ($dt_gejala as $value) : ?>
                                <div class="col-md-1 ml-1">
                                    <input type="checkbox" class="gejala" name="gejala[]" id="gejala" value="<?= $value->id_gejala; ?>">
                                </div>
                                <div class="col-md-2">
                                    <p class="mb-0"><?= $value->id_gejala; ?></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="mb-0"><?= $value->gejala; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="button" class="btn btn-block btn-primary mb-4 btn-submit">Diagnosa</button>
                        </div>
                    </form>
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

<script>
    $(function() {
        $(".btn-submit").on('click', function() {
            let id = [];
            $(".gejala:checked").each(function(i) {
                id[i] = $(this).val();
            });
            if (id.length === 0) {
                toastr.error('Pilih salah satu data gejala.');
            } else {
                $("#form-diagnosa").submit();
            }
        });
    });
</script>