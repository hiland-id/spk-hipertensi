<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="riwayat" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>nik</th>
                                <th>Nama lengkap</th>
                                <th>Penyakit</th>
                                <th>Terapi</th>
                                <th>Tgl Pemeriksaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--perulangan data dari db -->
                            <?php
                            $no = 1;
                            foreach ($riwayat as $data) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->nik; ?></td>
                                    <td><?= (!empty($data->gelar_depan)) ? $data->gelar_depan . ". " . $data->nama . ", " . $data->gelar_belakang : "" . $data->nama . ", " . $data->gelar_belakang; ?></td>
                                    <td><?= $data->penyakit; ?></td>
                                    <td><?= $data->terapi; ?></td>
                                    <td><?= $data->tgl_periksa; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                               <th>No</th>
                                <th>nik</th>
                                <th>Nama lengkap</th>
                                <th>Penyakit</th>
                                <th>Terapi</th>
                                <th>Tgl Pemeriksaan</th>
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


<script type="text/javascript">
    $(function() {
        $('#riwayat').DataTable({
            responsive: true,
            language: {
                url: "<?= base_url(); ?>aset/ID.json"
            },
    }
</script>