<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pakar Hipertensi | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="title" content="Sistem Pakar Hipertensi, SPHIPERTENSI, Hiland.id">
  <meta name="description" content="Sistem Pakar Hipertensi, menggunakan framework CI3.">

  <?php $this->load->view('template/head.php'); ?>

</head>

<body class="hold-transition login-page">

  <div class='flash-data' data-flashdata='<?= $this->session->flashdata('berhasil'); ?>'></div>
  <div class='flash-data-tidak' data-flashdata='<?= $this->session->flashdata('gagal'); ?>'></div>

  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>SP</b>HIPERTENSI</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Login Untuk Masuk ke Sistem</p>

        <form action="<?= base_url('login/cek_login'); ?>" method="post" role="form">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="nik" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
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