<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="riwayat" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama lengkap</th>
                                <th>ID Penyakit</th>
                                <th>Penyakit</th>
                                <th>Terapi</th>
                                <th>Tgl Pemeriksaan</th>
                                <?= ($session['app_level'] == 'admin') ? "<th>Aksi</th>" : ""; ?>
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
                                    <td><?= $data->nama; ?></td>
                                    <td><?= $data->id_penyakit; ?></td>
                                    <td><?= $data->penyakit; ?></td>
                                    <td><?= $data->terapi; ?></td>
                                    <td><?= $data->tgl_periksa; ?></td>
                                    <?php if ($session['app_level'] == 'admin') { ?>
                                        <td>
                                            <a href="#" class="btn btn-danger" onclick="hapus_dt_riwayat('<?= $data->id_riwayat; ?>');">Hapus</a>
                                        </td>
                                    <?php } ?>
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
                                <th>ID Penyakit</th>
                                <th>Penyakit</th>
                                <th>Terapi</th>
                                <th>Tgl Pemeriksaan</th>
                                <?= ($session['app_level'] == 'admin') ? "<th>Aksi</th>" : ""; ?>
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
        });
        const flashdata = $('.flash-data').data('flashdata');
        const flashdatatidak = $('.flash-data-tidak').data('flashdata');
        if (flashdata) {
            toastr.success(flashdata);
        }
        if (flashdatatidak) {
            toastr.error(flashdatatidak);
        }
    });

    function hapus_dt_riwayat(id) {
        let href = "<?= base_url(); ?>riwayat/hapus/" + id;
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data riwayat dengan ID " +
                id + " akan dihapus.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus Data',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    }
</script>