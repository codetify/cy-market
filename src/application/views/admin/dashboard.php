<?php $admin = $this->session->userdata("admin"); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title; ?></title>
<link href="<?php echo base_url("assets/a/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/vendor/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/css/sb-admin.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/sweetalert2.min.css"); ?>" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
<?php $this->load->view("admin/menu");?>
<div class="content-wrapper">
<div class="container-fluid">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="<?php echo base_url("admin"); ?>">Panel</a>
</li>
<li class="breadcrumb-item active">Anasayfa</li>
</ol>
<!-- Icon Cards-->
<div class="row">
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-primary o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-mobile"></i>
</div>
<div class="mr-5"><?php echo $istatistikler['uygulama_sayisi']; ?> Uygulama</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url("admin/uygulamalar"); ?>">
<span class="float-left">Detayları görüntüle</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-success o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-gamepad"></i>
</div>
<div class="mr-5"><?php echo $istatistikler['oyun_sayisi']; ?> Oyun</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url("admin/oyunlar"); ?>">
<span class="float-left">Detayları görüntüle</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-warning o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-support"></i>
</div>
<div class="mr-5"><?php echo $istatistikler['iletisim_mesaj_sayisi']; ?> İletişim Mesajı</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url("admin/iletisim"); ?>">
<span class="float-left">Detayları görüntüle</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-danger o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-eye"></i>
</div>
<div class="mr-5"><?php echo $istatistikler['uygulama_goruntulenme']+$istatistikler['oyun_goruntulenme']; ?> Görüntülenme Sayısı</div>
</div>
<a class="card-footer text-white clearfix small z-1">
<span class="float-left">Uygulama ve Oyun Görüntülenme Sayısı</span>
</span>
</a>
</div>
</div>
<div class="col-lg-12">
<!-- son yazilar-->
<div class="mb-0 mt-4">
<i class="fa fa-newspaper-o"></i> Son paylaşılan uygulama ve oyunlar</div>
<hr class="mt-2">
<div class="col-6 float-left">
<strong>Uygulamalar</strong><hr>
<div class="card-columns">
<?php foreach ($uygulama_listesi as $row) { ?>
<!-- son uygulamalar -->
<div class="card">
<div class="card-body">
<h6 class="card-title mb-1"><a target="_blank" href="<?php echo base_url("uygulama/$row->uygulama_url"); ?>"><?php echo $row->uygulama_baslik; ?></a></h6>
<p class="card-text small"><?php echo substr(strip_tags($row->uygulama_aciklama), 0 , 250); ?>...</p>
</div>
</div>
<!-- son uygulamalar -->
<?php } ?>
</div><!-- card-columns-->
</div><!-- col-6 -->
<div class="col-6 float-right">
<strong>Oyunlar</strong><hr>
<div class="card-columns">
<?php foreach ($oyun_listesi as $row) { ?>
<!-- son uygulamalar -->
<div class="card">
<div class="card-body">
<h6 class="card-title mb-1"><a target="_blank" href="<?php echo base_url("oyun/$row->oyun_url"); ?>"><?php echo $row->oyun_baslik; ?></a></h6>
<p class="card-text small"><?php echo substr(strip_tags($row->oyun_aciklama), 0 , 250); ?>...</p>
</div>
</div>
<!-- son uygulamalar -->
<?php } ?>
</div><!-- card-columns-->
</div><!-- col-6 -->
</div>
</div>
<footer class="sticky-footer">
<div class="container">
<div class="text-center">
<small>Copyright © Codetify 2020</small>
</div>
</div>
</footer>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fa fa-angle-up"></i>
</a>
<?php $this->load->view("admin/cikis_yap");?>
</div>
</body>
<script src="<?php echo base_url("assets/a/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/jquery.dataTables.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin-datatables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/sweetalert2.all.js"); ?>"></script>
</html>