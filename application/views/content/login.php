<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Keuseran | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="title" content="Sistem Informasi Keuseran, SIMPEG, Hiland.id">
  <meta name="description" content="Sistem Informasi Keusern atau SIMPEG dikembangkan oleh Hiland Group, menggunakan framework CI3, dan fitur realtime notifikasi informasi kenaikan berkala, kenaikan pangkat dan informasi pensiun.">

  <?php $this->load->view('template/head.php'); ?>

</head>

<body class="hold-transition login-page">

  <div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
  <div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>SIM</b>PEG</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Login Untuk Masuk ke Sistem</p>

        <form action="<?= base_url('login/cek_login'); ?>" method="post" role="form">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="nik" name="nik">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <a href="#">
                  <label for="remember">
                    Lupa password?
                  </label></a>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  <?php $this->load->view('template/js.php'); ?>

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
    })
  </script>

</body>

</html>