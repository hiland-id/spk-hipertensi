<?php
$segmen1 = $this->uri->segment(1);
$segmen2 = $this->uri->segment(2);
$segmen3 = $this->uri->segment(3);
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="m-0 text-dark">
          <?php
          if ($segmen1 != "" && $segmen2 == "" && $segmen3 == "") :
            echo ucfirst($segmen1);
          elseif ($segmen1 != "" && $segmen2 != "" && $segmen3 == "") :
            echo ucfirst($segmen2);
          elseif ($segmen1 != "" && $segmen2 != "" && $segmen3 != "") :
            echo ucfirst($segmen2) . "(" . $segmen3 . ")";
          endif;
          ?>
        </h4>
      </div> <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">
              <i class="fa fa-home"></i></a></li>
          <?php
          if ($segmen1 != "" && $segmen2 == "" && $segmen3 == "") :
          ?>
            <li class="breadcrumb-item active"><?= ucfirst($segmen1); ?></li>
          <?php
          elseif ($segmen1 != "" && $segmen2 != "" && $segmen3 == "") :
          ?>
            <li class="breadcrumb-item"><a href="<?= base_url($segmen1); ?>"><?= ucfirst($segmen1); ?></a></li>
            <li class="breadcrumb-item active"><?= ucfirst($segmen2); ?></li>
          <?php
          elseif ($segmen1 != "" && $segmen2 != "" && $segmen3 != "") :
          ?>
            <li class="breadcrumb-item"><a href="<?= base_url($segmen1); ?>"><?= ucfirst($segmen1); ?></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url($segmen1 . "/" . $segmen2); ?>"><?= ucfirst($segmen2); ?></a></li>
            <li class="breadcrumb-item active"><?= ucfirst($segmen3); ?></li>
          <?php endif; ?>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->