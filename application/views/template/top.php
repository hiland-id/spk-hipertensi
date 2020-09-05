<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" onclick="get_notif_on_top();">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge jml_notif"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="area-notifikasi">

      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
<audio id="sound_notif" src="<?= base_url(); ?>aset/sound/my_sound_02.mp3" type="audio/mp3"></audio>
