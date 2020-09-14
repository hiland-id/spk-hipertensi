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
                        <div class="col-md-12">
                        <div class="form-group">
                        <label for="exampleInputPassword1">Nama Pasien</label>
                        <select class="form-control" name="nik">
                            <option>--Pilih Pasien--</option>
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
                                    <input type="checkbox" name="gejala[]" id="gejala" value="<?= $value->id_gejala; ?>">
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