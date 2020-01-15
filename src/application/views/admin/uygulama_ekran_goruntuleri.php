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
<link href="<?php echo base_url("assets/plugins/dropzonejs/dropzone.min.css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url("assets/plugins/dropzonejs/custom.css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url("assets/a/vendor/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<h2 class="text-center">"<?php echo $uygulamalar->uygulama_baslik; ?>" ekran görüntüleri</h2>
<form action="<?php echo base_url("admin/uygulamalar/ekran-goruntu/upload/$uygulamalar->id"); ?>" class="dropzone" id="dropForm"></form>
<hr>
<h3>Kayıtlı Ekran Görüntüleri</h3>
<table class="table table-bordered table-striped table-hover">
<thead>
<th>Önizleme</th>
<th>Dosya Adı</th>
<th>Oyun Linki</th>
<th>İşlemler</th>
</thead>
<tbody>
<?php 
if($ekran_goruntuleri){
foreach($ekran_goruntuleri as $ekran_goruntuleri){ ?>
<tr>
<td><img src="<?php echo $ekran_goruntuleri->resim_url; ?>"></td>
<td><?php echo $ekran_goruntuleri->resim; ?></td>
<td><a target="_blank" style="text-decoration:none;" href="<?php echo base_url("uygulama/$uygulamalar->uygulama_url"); ?>"><?php echo $uygulamalar->uygulama_baslik; ?> <i class="fa fa-external-link"></i></a></td>
<td><a href="<?php echo base_url("admin/uygulamalar/ekran-goruntuleri/sil/$ekran_goruntuleri->id"); ?>" class="btn btn-sm btn-danger">Sil</a></td>
</tr>
<?php } } else { ?>
<tr>
<td>Henüz ekran görüntüsü eklenmemiştir!</td>
<td></td><td></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<script src="<?php echo base_url("assets/a/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/plugins/dropzonejs/dropzone.min.js"); ?>"></script>
</div>
</body>
</html>