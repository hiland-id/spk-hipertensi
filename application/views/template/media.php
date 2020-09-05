<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('template/head.php');?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
	<?php $this->load->view('template/top.php');?>
	<?php $this->load->view('template/left.php');?>
	<div class="content-wrapper">
	<?php $this->load->view('template/content_heder.php');?>
	<?php $this->load->view('content/'.$tampilan);?>
	<?php $this->load->view('template/footer.php');?>
	<?php $this->load->view('template/js.php');?>
</div>
</body>
</html>