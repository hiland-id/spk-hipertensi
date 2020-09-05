<!-- Content Wrapper. Contains page content -->
<div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
<div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Data Pegawai Terdaftar
                </div>
                <div class="card-body">
                    <table id="riwayat" class="table table-bordered table-hover nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama lengkap</th>
                                <th>Tempat lahir</th>
                                <th>Tanggal lahir</th>
                                <th>Jabatan</th>
                                <th>Golongan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--perulangan data dari db -->
                            <?php
                            $no = 1;
                            foreach ($dt_pegawai as $data) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->nip; ?></td>
                                    <td><?= (!empty($data->gelar_depan)) ? $data->gelar_depan . ". " . $data->nama . ", " . $data->gelar_belakang : "" . $data->nama . ", " . $data->gelar_belakang; ?></td>
                                    <td><?= $data->tempat_lahir; ?></td>
                                    <td><?= $data->tanggal_lahir; ?></td>
                                    <td><?= $data->nama_jabatan; ?></td>
                                    <td><?= $data->nama_golongan; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success" onclick="dt_detail('<?= $data->nip; ?>');">
                                            Detail
                                        </a>
                                        <a href="<?= base_url('pegawai/riwayat/' . $data->nip); ?>" class="btn btn-primary">
                                            Riwayat
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
                                <th>NIP</th>
                                <th>Nama lengkap</th>
                                <th>Tempat lahir</th>
                                <th>Tanggal lahir</th>
                                <th>Jabatan</th>
                                <th>Golongan</th>
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

<!-- MODAL DETAIL PEGAWAI -->
<div class="modal fade" id="modal-detail-pegawai">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="custom-content-below-tab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="data_diri_detail-tab" data-toggle="pill" href="#data_diri_detail" role="tab" aria-controls="data_diri_detail" aria-selected="true">Data Diri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pengangkatan_detail-tab" data-toggle="pill" href="#pengangkatan_detail" role="tab" aria-controls="pengangkatan_detail" aria-selected="false">Pengangkatan</a>
                    </li>
                </ul>
                <form role="form" action="#" id="form-detail-pegawai">
                    <div class="tab-content" id="custom-content-below-tab2Content">
                        <!-- DATA DIRI -->
                        <div class="tab-pane fade show active" id="data_diri_detail" role="tabpanel" aria-labelledby="data_diri_detail-tab">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" name="nip" placeholder="Masukan NIP" readonly>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="gelar_depan">Gelar depan</label>
                                            <input type="text" class="form-control" name="gelar_depan" placeholder="Gelar depan *" readonly>
                                            <i class="text-info">* Jika ada</i>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="nama">Nama pegawai</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Masukan nama pegawai" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="gelar_belakang">Gelar belakang</label>
                                            <input type="text" class="form-control" name="gelar_belakang" placeholder="Gelar depan *" readonly>
                                            <i class="text-info">* Jika ada</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="tempat_lahir">Tempat lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tanggal">Tanggal lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="id_jk">Jenis kelamin</label>
                                            <input type="text" class="form-control" name="id_jk" placeholder="Jenis kelamin" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="id_agama">Agama</label>
                                            <input type="text" class="form-control" name="id_agama" placeholder="Agama" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="id_provinsi">Provinsi</label>
                                            <input type="text" class="form-control" name="id_provinsi" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="id_kabupaten">Kabupaten</label>
                                            <input type="text" class="form-control" name="id_kabupaten" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="id_kecamatan">Kecamatan</label>
                                            <input type="text" class="form-control" name="id_kecamatan" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="id_desa">Desa</label>
                                            <input type="text" class="form-control" name="id_desa" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="alamat_lengkap">Alamat lengkap</label>
                                            <textarea name="alamat_lengkap" class="form-control" readonly></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Masukan email" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="no_telepon">No Telepon/Hp</label>
                                            <input type="number" class="form-control" name="no_telepon" placeholder="Masukan nomor telepon/hp" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <img name="pas_foto" src="" alt="Pas foto belum upload" class="rounded mt-4" width="150px">
                                    </div>
                                </div>
                                <i class="text-info" name="info-text"></i>

                            </div>
                        </div>
                        <!--/ DATA DIRI -->

                        <!-- PENGANGKATAN -->
                        <div class="tab-pane fade" id="pengangkatan_detail" role="tabpanel" aria-labelledby="pengangkatan_detail-tab">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="id_jabatan">Jabatan</label>
                                            <input type="text" name="id_jabatan" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="id_golongan">Golongan</label>
                                            <input type="text" name="id_golongan" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="tanggal_pengangkatan">Tanggal Pengangkatan</label>
                                            <input class="form-control" type="date" name="tanggal_pengangkatan" id="tanggal_pengangkatan" placeholder="Tanggal pengangkatan" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="no_sk">Nomor SK Pengangkatan</label>
                                            <input class="form-control" type="text" name="no_sk" id="no_sk" placeholder="Nomor SK Pengangkatan" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="kenaikan_berkala">Kenaikan Berkala</label>
                                            <input class="form-control" type="date" name="kenaikan_berkala" placeholder="Tanggal kenaikan berkala" required readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kenaikan_pangkat">Kenaikan Pangkat</label>
                                            <input class="form-control" type="date" name="kenaikan_pangkat" placeholder="Tanggal kenaikan pangkat" required readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="pensiun">Pensiun</label>
                                            <input class="form-control" type="date" name="pensiun" placeholder="Tanggal pensiun" required readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/ PENGANGKATAN -->
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--/ MODAL DETAIL PEGAWAI -->


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
        $('#riwayat').DataTable({
            responsive: true,
            language: {
                url: "<?= base_url(); ?>aset/ID.json"
            }
        });
    });
    $('[name="foto"]').change(function() {
        readURL(this);
    });

    function dt_detail(nip) {
        let modal = $("#modal-detail-pegawai").modal();
        $.ajax({
            url: "<?= base_url(); ?>pegawai/detail_pegawai",
            type: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                nip: nip
            },
            success: function(res) {
                $("#form-detail-pegawai")[0].reset();
                modal.find('[name="nip"]').val(res.nip);
                modal.find('[name="gelar_depan"]').val(res.gelar_depan);
                modal.find('[name="nama"]').val(res.nama);
                modal.find('[name="gelar_belakang"]').val(res.gelar_belakang);
                modal.find('[name="tempat_lahir"]').val(res.tempat_lahir);
                modal.find('[name="tanggal_lahir"]').val(res.tanggal_lahir);
                modal.find('[name="id_jk"]').val(res.nama_jk);
                modal.find('[name="id_agama"]').val(res.nama_agama);
                var id_provinsi = res.id_provinsi;
                var id_kabupaten = res.id_kabupaten;
                var id_kecamatan = res.id_kecamatan;
                var id_desa = res.id_desa;
                $.ajax({
                    url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
                    type: "GET",
                    cache: false,
                    dataType: "JSON",
                    success: function(data) {
                        var hasil = data.provinsi;
                        console.log(id_provinsi);
                        if (hasil.length != 0) {
                            for (value in hasil) {
                                if (hasil[value].id == id_provinsi) {
                                    modal.find('[name="id_provinsi"]').val(hasil[value].nama);
                                }
                            }
                        } else {
                            console.log("gagal parsing data provinsi");
                        }
                    },
                    error: function() {
                        toastr.error('Gagal mengambil data.', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 1500
                        });
                    }
                });

                $.ajax({
                    url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + id_provinsi,
                    type: "GET",
                    cache: false,
                    dataType: "JSON",
                    success: function(data) {
                        var hasil = data.kota_kabupaten;
                        console.log(id_kabupaten);
                        if (hasil.length != 0) {
                            for (value in hasil) {
                                if (hasil[value].id == id_kabupaten) {
                                    modal.find('[name="id_kabupaten"]').val(hasil[value].nama);
                                }
                            }
                        } else {
                            console.log("gagal parsing data kab");
                        }
                    },
                    error: function() {
                        toastr.error('Gagal mengambil data.', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 1500
                        });
                    }
                });

                $.ajax({
                    url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + id_kabupaten,
                    type: "GET",
                    cache: false,
                    dataType: "JSON",
                    success: function(data) {
                        var hasil = data.kecamatan;
                        console.log(id_kecamatan);
                        if (hasil.length != 0) {
                            for (value in hasil) {
                                if (hasil[value].id == id_kecamatan) {
                                    modal.find('[name="id_kecamatan"]').val(hasil[value].nama);
                                }
                            }
                        } else {
                            console.log("gagal parsing data kec");
                        }
                    },
                    error: function() {
                        toastr.error('Gagal mengambil data.', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 1500
                        });
                    }
                });

                $.ajax({
                    url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id_kecamatan,
                    type: "GET",
                    cache: false,
                    dataType: "JSON",
                    success: function(data) {
                        var hasil = data.kelurahan;
                        console.log(id_desa);
                        if (hasil.length != 0) {
                            for (value in hasil) {
                                if (hasil[value].id == id_desa) {
                                    modal.find('[name="id_desa"]').val(hasil[value].nama);
                                }
                            }
                        } else {
                            console.log("gagal parsing data desa");
                        }
                    },
                    error: function() {
                        toastr.error('Gagal mengambil data.', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 1500
                        });
                    }
                });
                modal.find('[name="alamat_lengkap"]').val(res.alamat_lengkap);
                modal.find('[name="email"]').val(res.email);
                modal.find('[name="no_telepon"]').val(res.no_telepon);
                modal.find('[name="id_jabatan"]').val(res.nama_jabatan);
                modal.find('[name="id_golongan"]').val(res.nama_golongan);
                modal.find('[name="tanggal_pengangkatan"]').val(res.tanggal_pengangkatan);
                modal.find('[name="no_sk"]').val(res.nomor_sk);
                modal.find('[name="kenaikan_berkala"]').val(res.tgl_kenaikan_berkala);
                modal.find('[name="kenaikan_pangkat"]').val(res.tgl_kenaikan_pangkat);
                modal.find('[name="pensiun"]').val(res.tgl_pensiun);
                let lokasi = "<?= base_url('upload/'); ?>" + res.foto;
                modal.find('[name="pas_foto"]').prop('src', lokasi);
                modal.find('[name="info-text"]').html(lokasi);
                modal.show();
            },
            error: function() {
                toastr.error('Gagal mengambil data.', 'Informasi', {
                    "showMethod": "slideDown",
                    "hideMethod": "slideUp",
                    timeOut: 1500
                });
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