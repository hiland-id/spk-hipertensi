<?php
$segmen1 = $this->uri->segment(1);
$segmen2 = $this->uri->segment(2);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('dashboard'); ?>" class="brand-link">
    <!-- <img src="<?= base_url(); ?>aset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">Sistem Pakar Hipertensi</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('upload/' . $session['foto']); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= ucfirst($session['nama']); ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview <?php ($segmen1 == 'dashboard' && $segmen2 == '') ? 'menu-open' : ''; ?>">
          <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= ($segmen1 == 'dashboard' && $segmen2 == '') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= ($segmen1 == 'user') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= ($segmen1 == 'user') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview menu-open">
            <li class="nav-item">
              <a href="<?= base_url('user'); ?>" class="nav-link <?= ($segmen1 == 'user' && $segmen2 == '') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('riwayat'); ?>" class="nav-link <?= ($segmen1 == 'user' && $segmen2 == 'riwayat') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Riwayat Periksa</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('diagnosa'); ?>" class="nav-link  <?= ($segmen1 == 'diagnosa') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-user-md"></i>
            <p>
              Diagnosa
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('gejala'); ?>" class="nav-link  <?= ($segmen1 == 'gejala') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-file-medical-alt"></i>
            <p>
              Gejala
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('penyakit'); ?>" class="nav-link  <?= ($segmen1 == 'penyakit') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-procedures"></i>
            <p>
              Penyakit
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('terapi'); ?>" class="nav-link  <?= ($segmen1 == 'terapi') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-file-medical-alt"></i>
            <p>
              Terapi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('rule'); ?>" class="nav-link  <?= ($segmen1 == 'rule') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-briefcase-medical"></i>
            <p>
              Rule
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= (($segmen1 == 'dashboard' && $segmen2 == 'profil') || ($segmen1 == 'dashboard' && $segmen2 == 'ubah_password')) ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= (($segmen1 == 'dashboard' && $segmen2 == 'profil') || ($segmen1 == 'dashboard' && $segmen2 == 'ubah_password')) ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Akun
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('dashboard/profil'); ?>" class="nav-link <?= ($segmen1 == 'dashboard' && $segmen2 == 'profil') ? 'active' : ''; ?>">
                <i class="far fas fa-user"></i>
                <p>Profil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('dashboard/ubah_password'); ?>" class="nav-link <?= ($segmen1 == 'dashboard' && $segmen2 == 'ubah_password') ? 'active' : ''; ?>">
                <i class="far fa fa-edit"></i>
                <p>Ubah Password</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('login/logout'); ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>