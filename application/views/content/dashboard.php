<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Custom tabs (Charts with tabs)-->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-th-large"></i>
          Hallo, <?= ucfirst($session['nama']); ?>
        </h3>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content p-0">
          <p>Selamat datang di Sistem Pakar Tingkat Kesembuhan Terapi Farmakologi dan Gaya Hidup Sehat Terhadap Pasien Hipertensi.</p>
        </div>
      </div><!-- /.card-body -->
    </div>
    <?php if ($session['app_level'] == 'admin') { ?>
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $dt_gejala; ?></h3>

              <p>Jumlah Gejala</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-medical-alt"></i>
            </div>
            <a href="<?= base_url('gejala'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $dt_penyakit; ?></h3>

              <p>Jumlah Penyakit</p>
            </div>
            <div class="icon">
              <i class="fas fa-procedures"></i>
            </div>
            <a href="<?= base_url('penyakit'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $dt_rule; ?></h3>

              <p>Jumlah Rule</p>
            </div>
            <div class="icon">
              <i class="fas fa-briefcase-medical"></i>
            </div>
            <a href="<?= base_url('rule'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $dt_pasien; ?></h3>

              <p>Jumlah Pasien</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url('user'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    <?php } else { ?>
      <div class="row">
        <div class="col-lg-12 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $dt_check_up; ?></h3>

              <p>Jumlah Check-Up</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url('diagnosa/riwayat'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-history"></i>
            Hasil Check-up terakhir a.n. <?= ucfirst($session['nama']); ?>
          </h3>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <table id="riwayat" class="table nowrap responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Tgl Pemeriksaan</th>
                  <th>ID Penyakit</th>
                  <th>Penyakit</th>
                  <th>Deskripsi</th>
                  <th>Terapi</th>
                </tr>
              </thead>
              <tbody>
                <!--perulangan data dari db -->
                <?php
                foreach ($dt_check_up_latest as $data) {
                ?>
                  <tr>
                    <td><?= $data->tgl_periksa; ?></td>
                    <td><?= $data->id_penyakit; ?></td>
                    <td><?= $data->penyakit; ?></td>
                    <td><?= $data->deskripsi; ?></td>
                    <td><?= $data->terapi; ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div><!-- /.card-body -->
      </div>
    <?php } ?>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->