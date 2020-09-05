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
                    <form role="form" action="<?= base_url('diagnosa/hasil'); ?>" method="post">
                        <div class="row">
                            <?php foreach ($dt_gejala as $value) : ?>
                                <div class="col-md-1 ml-4">
                                    <input type="checkbox" name="gejala[]" id="gejala" value="<?= $value->id_gejala; ?>">
                                </div>
                                <div class="col-md-10">
                                    <p class="mb-0"><?= $value->gejala; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-block btn-primary mb-4">Diagnosa</button>
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