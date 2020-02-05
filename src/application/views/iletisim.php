<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>İletişim | <?php echo strip_tags($ayarlar->site_title); ?></title>
<meta name="author" content="<?php echo $ayarlar->site_adi; ?>" />
<meta name="robots" content="all"/>
<meta name="description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="<?php echo $ayarlar->site_adi; ?>" />
<meta name="copyright" content="Copyright <?php echo $ayarlar->site_adi; ?> - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@codetify"/>
<meta name="twitter:url" content="<?php echo base_url(); ?>">
<meta name="twitter:title" content="İletişim | <?php echo strip_tags($ayarlar->site_title); ?>">
<meta name="twitter:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="twitter:image" content="<?php echo base_url("uploads/$ayarlar->site_logo"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="İletişim | <?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo base_url(); ?>">
<meta property="og:image" content="<?php echo base_url("uploads/$ayarlar->site_logo"); ?>">
<meta property="og:image:width" content="150">
<meta property="og:image:height" content="150">
<meta property="og:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/a/vendor/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/sweetalert2.min.css"); ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
<a class="navbar-brand" href="<?php echo base_url();?>"><?php echo strip_tags($ayarlar->site_adi); ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ml-auto">
<li class="nav-item">
<?php $this->load->view("menu"); ?></ul>
</div>
</div>
</nav>
<div class="container iletisim">
<div class="row">
<div class="col-md-12">
<div class="card mb-4">
<div class="card-header">
İletişim Formu <strong class="iletisim_pass" style="float:right"><a href="<?php echo strip_tags($ayarlar->site_facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a> | <a href="<?php echo strip_tags($ayarlar->site_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a> | <a href="<?php echo strip_tags($ayarlar->site_instagram); ?>" target="_blank"><i class="fa fa-instagram"></i></a> | <a href="<?php echo strip_tags($ayarlar->site_youtube); ?>" target="_blank"><i class="fa fa-youtube"></i></a></strong>
</div>
<div class="card-body">
<form action="<?php echo base_url("iletisim/gonder"); ?>" method="post">
<div class="form-group">
<label for="gonderen_ad_soyad">Adınız & Soyadınız</label>
<input type="text" name="gonderen_ad_soyad" class="form-control" id="gonderen_ad_soyad">
</div>
<div class="form-group">
<label for="gonderen_email">E-Mail Adresiniz</label>
<input type="email" name="gonderen_email" class="form-control" id="gonderen_email">
<small class="form-text text-muted">Yazmış olduğunuz e-mail üzerinden iletişime geçilecektir.</small>
</div>
<div class="form-group">
<label for="konu">Konu</label>
<input type="text" name="konu" class="form-control" id="konu">
</div>
<div class="form-group">
<label for="mesaj">Mesajınız</label>
<textarea class="form-control" name="mesaj" id="mesaj" rows="5"></textarea>
</div>
<button type="submit" class="btn btn-primary">Gönder</button>
</form>
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view("footer_copyright"); ?>
<script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/sweetalert2.all.js"); ?>"></script>
<?php $this->load->view("admin/alert"); ?>
</body>
</html>