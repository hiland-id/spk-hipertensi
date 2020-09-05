<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" class="btn btn-success" onclick="dt_tambah();">
                        Tambah Riwayat
                    </a>
                </div>
                <div class="card-body">
                    <table id="riwayat" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>nik</th>
                                <th>Nama lengkap</th>
                                <th>Jabatan</th>
                                <th>Golongan</th>
                                <th>Tgl Pengangkatan (SK)</th>
                                <th>Nomor SK</th>
                                <th>Tgl Kenaikan Berkala</th>
                                <th>Tgl Kenaikan Pangkat</th>
                                <th>Tgl Pensiun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--perulangan data dari db -->
                            <?php
                            $no = 1;
                            foreach ($dt_riwayat as $data) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->nik; ?></td>
                                    <td><?= (!empty($data->gelar_depan)) ? $data->gelar_depan . ". " . $data->nama . ", " . $data->gelar_belakang : "" . $data->nama . ", " . $data->gelar_belakang; ?></td>
                                    <td><?= $data->nama_jabatan; ?></td>
                                    <td><?= $data->nama_golongan; ?></td>
                                    <td><?= $data->tanggal_kenaikan; ?></td>
                                    <td><?= $data->no_sk; ?></td>
                                    <td><?= $data->kenaikan_berkala; ?></td>
                                    <td><?= $data->kenaikan_pangkat; ?></td>
                                    <td><?= $data->pensiun; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success" onclick="aktivasi('<?= $data->id_riwayat; ?>');">
                                            Aktifkan
                                        </a>
                                        <a href="#" class="btn btn-primary" onclick="dt_edit('<?= $data->id_riwayat; ?>');">
                                            Edit
                                        </a>
                                        <a href="#" class="btn btn-danger" onclick="hapus_riwayat('<?= $data->id_riwayat; ?>');">
                                            Hapus
                                        </a>
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
                                <th>Nama lengkap</th>
                                <th>Jabatan</th>
                                <th>Golongan</th>
                                <th>Tgl Pengangkatan (SK)</th>
                                <th>Nomor SK</th>
                                <th>Tgl Kenaikan Berkala</th>
                                <th>Tgl Kenaikan Pangkat</th>
                                <th>Tgl Pensiun</th>
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

<!-- MODAL TAMBAH/UPDATE RIWAYAT -->
<div class="modal fade" id="modal-tambah-riwayat">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Riwayat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pengangkatan-tab" data-toggle="pill" href="#pengangkatan" role="tab" aria-controls="pengangkatan" aria-selected="true">Pengangkatan</a>
                    </li>
                </ul>
                <form role="form" action="<?= base_url('user/simpan_dt_riwayat'); ?>" method="post" id="form-tambah-riwayat">
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <!-- PENGANGKATAN -->
                        <div class="tab-pane fade show active" id="pengangkatan" role="tabpanel" aria-labelledby="pengangkatan-tab">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>nik</label>
                                    <select class="form-control select2bs4" id="nik" name="nik" style="width: 100%;">
                                        <option>-- Pilih nik --</option>
                                        <?php
                                        echo "<option>$nik</option>";
                                        ?>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="nama">Nama</label>
                                            <input class="form-control" type="text" name="nama" id="nama" placeholder="Generate Nama" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input class="form-control" type="text" name="tanggal_lahir" id="tanggal_lahir" placeholder="Generate tanggal lahir" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="jabatan_aktif">Jabatan Aktif</label>
                                            <input class="form-control" type="text" name="jabatan_aktif" id="jabatan_aktif" placeholder="Generate jabatan aktif" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="golongan_aktif">Golongan Aktif</label>
                                            <input class="form-control" type="text" name="golongan_aktif" id="golongan_aktif" placeholder="Generate golongan aktif" readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="id_jabatan">Jabatan</label>
                                            <select class="form-control" name="id_jabatan" id="id_jabatan" required>
                                                <option value="">-- Pilih Jabatan --</option>
                                                <?php
                                                foreach ($dt_jabatan as $data) {
                                                    echo "<option value='$data->id_jabatan'>$data->nama_jabatan</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="id_golongan">Golongan</label>
                                            <select class="form-control" name="id_golongan" id="id_golongan" required>
                                                <option value="">-- Pilih Golongan --</option>
                                                <?php
                                                foreach ($dt_golongan as $data) {
                                                    echo "<option value='$data->id_golongan'>$data->nama_golongan</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="tanggal_pengangkatan">Tanggal Pengangkatan</label>
                                            <input class="form-control" type="date" name="tanggal_pengangkatan" id="tanggal_pengangkatan" placeholder="Tanggal pengangkatan" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="no_sk">Nomor SK Pengangkatan</label>
                                            <input class="form-control" type="text" name="no_sk" id="no_sk" placeholder="Nomor SK Pengangkatan">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="kenaikan_berkala">Kenaikan Berkala</label>
                                            <input class="form-control" type="date" name="kenaikan_berkala" id="kenaikan_berkala" placeholder="Tanggal kenaikan berkala" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kenaikan_pangkat">Kenaikan Pangkat</label>
                                            <input class="form-control" type="date" name="kenaikan_pangkat" id="kenaikan_pangkat" placeholder="Tanggal kenaikan pangkat" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="pensiun">Pensiun</label>
                                            <input class="form-control" type="date" name="pensiun" id="pensiun" placeholder="Tanggal pensiun" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ PENGANGKATAN -->
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-warning">Reset Data</button>
                <button type="submit" class="btn btn-primary btn-submit">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--/ MODAL TAMBAH/UPDATE RIWAYAT -->

<!-- MODAL UPDATE user -->
<div class="modal fade" id="modal-update-riwayat">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Data user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#pengangkatan" role="tab" aria-controls="pengangkatan" aria-selected="true">Data Diri</a>
                    </li>
                </ul>
                <form role="form" action="<?= base_url('user/update_dt_riwayat'); ?>" method="post" id="form-update-riwayat">
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <!-- PENGANGKATAN -->
                        <div class="tab-pane fade show active" id="pengangkatan" role="tabpanel" aria-labelledby="pengangkatan-tab">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>nik</label>
                                    <input type="hidden" name="id_riwayat">
                                    <select class="form-control select2bs4" name="nik" style="width: 100%;" readonly required>
                                        <?php
                                        echo "<option selected='selected'>$nik</option>";
                                        ?>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nama">Nama</label>
                                            <input class="form-control" type="text" name="nama" placeholder="Generate Nama" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input class="form-control" type="text" name="tanggal_lahir" placeholder="Generate tanggal lahir" readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="id_jabatan">Jabatan</label>
                                            <select class="form-control" name="id_jabatan" required>
                                                <option value="">-- Pilih Jabatan --</option>
                                                <?php
                                                foreach ($dt_jabatan as $data) {
                                                    echo "<option value='$data->id_jabatan'>$data->nama_jabatan</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="id_golongan">Golongan</label>
                                            <select class="form-control" name="id_golongan" required>
                                                <option value="">-- Pilih Golongan --</option>
                                                <?php
                                                foreach ($dt_golongan as $data) {
                                                    echo "<option value='$data->id_golongan'>$data->nama_golongan</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="tanggal_pengangkatan">Tanggal Pengangkatan</label>
                                            <input class="form-control" type="date" name="tanggal_pengangkatan" placeholder="Tanggal pengangkatan" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="no_sk">Nomor SK Pengangkatan</label>
                                            <input class="form-control" type="text" name="no_sk" placeholder="Nomor SK Pengangkatan">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="kenaikan_berkala">Kenaikan Berkala</label>
                                            <input class="form-control" type="date" name="kenaikan_berkala" placeholder="Tanggal kenaikan berkala" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kenaikan_pangkat">Kenaikan Pangkat</label>
                                            <input class="form-control" type="date" name="kenaikan_pangkat" placeholder="Tanggal kenaikan pangkat" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="pensiun">Pensiun</label>
                                            <input class="form-control" type="date" name="pensiun" placeholder="Tanggal pensiun" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ PENGANGKATAN -->
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-warning">Reset Data</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--/ MODAL UPDATE user -->

<script type="text/javascript">
    $(function() {
        const flashdata = $('.flash-data').data('flashdata');
        const flashdatatidak = $('.flash-data-tidak').data('flashdata');
        if (flashdata) {
            toastr.success(flashdata);
        }

        if (flashdatatidak) {
            toastr.error(flashdatatidak);
        }
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $('#riwayat').DataTable({
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
                    targets: 3
                },
                {
                    responsivePriority: 3,
                    targets: 4
                },
                {
                    responsivePriority: 4,
                    targets: -1
                }
            ]
        });

        $("#nik").on("change", function() {
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
                        $(".btn-submit").removeAttr("disabled", "disabled");
                        toastr.success(res.pesan);

                        if (res.data.gelar_depan != "" && res.data.gelar_belakang == "") {
                            $("#nama").val(res.data.gelar_depan + ". " + res.data.nama);
                        } else if (res.data.gelar_depan == "" && res.data.gelar_belakang != "") {
                            $("#nama").val(res.data.nama + ", " + res.data.gelar_belakang);
                        } else if (res.data.gelar_depan != "" && res.data.gelar_belakang != "") {
                            $("#nama").val(res.data.gelar_depan + ". " +
                                res.data.nama + ", " + res.data.gelar_belakang);
                        } else if (res.data.gelar_depan == "" && res.data.gelar_belakang == "") {
                            $("#nama").val(res.data.nama);
                        }

                        $("#tanggal_lahir").val(res.data.tanggal_lahir);
                        $("#jabatan_aktif").val(res.data.nama_jabatan);
                        $("#golongan_aktif").val(res.data.nama_golongan);
                        console.log(res.data);
                    } else {
                        $(".btn-submit").attr("disabled", "disabled");
                        toastr.error(res.pesan);
                    }
                },
                error: function() {
                    toastr.error("400");
                }
            });
        });

        //ujung JQuery
    });

    function dt_tambah() {
        $("#form-tambah-riwayat")[0].reset();
        $("#modal-tambah-riwayat").modal('show');
    }

    function dt_edit(id_riwayat) {
        let modal = $("#modal-update-riwayat").modal();
        $.ajax({
            url: "<?= base_url(); ?>user/cek_id_riwayat",
            type: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                id_riwayat: id_riwayat
            },
            success: function(res) {
                if (res.status) {
                    $("#form-update-riwayat")[0].reset();
                    modal.find('[name="id_riwayat"]').val(res.data.id_riwayat);
                    modal.find('[name="nik"]').val(res.data.nik);
                    modal.find('[name="nama"]').val(res.data.nama);
                    modal.find('[name="tanggal_lahir"]').val(res.data.tanggal_lahir);
                    modal.find('[name="id_jabatan"]').val(res.data.id_jabatan);
                    modal.find('[name="id_golongan"]').val(res.data.id_golongan);
                    modal.find('[name="tanggal_pengangkatan"]').val(res.data.tanggal_kenaikan);
                    modal.find('[name="no_sk"]').val(res.data.no_sk);
                    modal.find('[name="kenaikan_berkala"]').val(res.data.kenaikan_berkala);
                    modal.find('[name="kenaikan_pangkat"]').val(res.data.kenaikan_pangkat);
                    modal.find('[name="pensiun"]').val(res.data.pensiun);
                    toastr.success(res.pesan);
                    modal.show();
                } else {
                    toastr.error(res.pesan);
                }
            },
            error: function() {
                toastr.error('Gagal 400');
            }
        });
    }

    function aktivasi(id_riwayat) {
        $.ajax({
            url: "<?= base_url(); ?>user/cek_id_riwayat",
            type: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                id_riwayat: id_riwayat
            },
            success: function(res) {
                if (res.status) {
                    let href = "<?= base_url(); ?>user/aktivasi/" + res.data.id_riwayat + "/" + res.data.nik;
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Akan mengaktifkan data ini untuk nik " +
                            res.data.nik + ".",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Proses Data'
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = href;
                        }
                    });
                } else {
                    toastr.error(res.pesan);
                }
            },
            error: function() {
                toastr.error('Gagal 400');
            }
        });
    }

    function hapus_riwayat(id_riwayat) {
        $.ajax({
            url: "<?= base_url(); ?>user/cek_id_riwayat",
            type: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                id_riwayat: id_riwayat
            },
            success: function(res) {
                if (res.status) {
                    let href = "<?= base_url(); ?>user/hapus_riwayat/" + res.data.id_riwayat + "/" + res.data.nik;
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data riwayat ini akan dihapus. Setelah proses berhasil segera lakukan aktivasi data riwayat atau tambah riwayat baru.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, saya mengerti. Hapus Data'
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = href;
                        }
                    });
                } else {
                    toastr.error(res.pesan);
                }
            },
            error: function() {
                toastr.error('Gagal 400');
            }
        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('[name="pas_foto"]').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>