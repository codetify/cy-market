<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo strip_tags($sayfa_title); ?> | <?php echo strip_tags($ayarlar->site_title); ?></title>
<meta name="author" content="<?php echo $ayarlar->site_adi; ?>" />
<meta name="robots" content="all"/>
<meta name="description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="<?php echo $ayarlar->site_adi; ?>" />
<meta name="copyright" content="Copyright <?php echo $ayarlar->site_adi; ?> - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@codetify"/>
<meta name="twitter:url" content="<?php echo base_url($sayfa_url); ?>">
<meta name="twitter:title" content="<?php echo strip_tags($sayfa_title); ?> | <?php echo strip_tags($ayarlar->site_title); ?>">
<meta name="twitter:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="twitter:image" content="<?php echo base_url("uploads/$ayarlar->site_logo"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="<?php echo strip_tags($sayfa_title); ?> | <?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo base_url($sayfa_url); ?>">
<meta property="og:image" content="<?php echo base_url("uploads/$ayarlar->site_logo"); ?>">
<meta property="og:image:width" content="150">
<meta property="og:image:height" content="150">
<meta property="og:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
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
<div class="container sayfa">
<div class="row">
<div class="col-md-12">
<div class="card my-4">
<div class="card-header"><?php echo $sayfa_title; ?></div>
<div class="card-body">
<?php echo $sayfa_icerik; ?>
</div>
</div>
</div>

</div>
</div>
<?php $this->load->view("footer_copyright"); ?>
<script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
</body>
</html>