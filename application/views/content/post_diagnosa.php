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
                    <div class="row">
                        <table id="diagnosa" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Penyakit</th>
                                    <th>Deskripsi</th>
                                    <th>Terapi</th>
                                    <!-- <th>Skor</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $arr_skor = array();
                                foreach ($diagnosa as $value) {
                                    array_push($arr_skor, $value['skor']);
                                }

                                $no = 1;
                                foreach ($diagnosa as $value) {
                                    if (max($arr_skor) == $value['skor']) {
                                ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <?= $value['id_penyakit']; ?>
                                            </td>
                                            <td>
                                                <?= $value['nama_penyakit']; ?>
                                            </td>
                                            <td>
                                                <?= $value['deskripsi']; ?>
                                            </td>
                                            <td>
                                                <?= $value['nik']; ?>
                                            </td>
                                            <!-- <td>
                                                <?= $value['skor'] . " %"; ?>
                                            </td> -->
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Penyakit</th>
                                    <th>Deskripsi</th>
                                    <th>Terapi</th>
                                    <!-- <th>Skor</th> -->
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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
  $(function()
  {
    $('#diagnosa').DataTable({
      responsive:true
    });

</script>