<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Güncellenenler | <?php echo strip_tags($ayarlar->site_title); ?></title>
<meta name="author" content="<?php echo $ayarlar->site_adi; ?>" />
<meta name="robots" content="all"/>
<meta name="description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="<?php echo $ayarlar->site_adi; ?>" />
<meta name="copyright" content="Copyright <?php echo $ayarlar->site_adi; ?> - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@codetify"/>
<meta name="twitter:url" content="<?php echo base_url(); ?>">
<meta name="twitter:title" content="Güncellenenler | <?php echo strip_tags($ayarlar->site_title); ?>">
<meta name="twitter:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="twitter:image" content="<?php echo base_url("uploads/$ayarlar->site_logo"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="Güncellenenler | <?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo base_url(); ?>">
<meta property="og:image" content="<?php echo base_url("uploads/$ayarlar->site_logo"); ?>">
<meta property="og:image:width" content="150">
<meta property="og:image:height" content="150">
<meta property="og:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title><?php echo strip_tags($ayarlar->site_adi); ?></title>
</head>
<body style="padding-top:70px;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
<a class="navbar-brand" href="<?php echo base_url();?>"><?php echo strip_tags($ayarlar->site_adi); ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Menü">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ml-auto">
<?php $this->load->view("menu"); ?>
</ul>
</div>
</div>
</nav>
<!-- Page Content -->
<div class="container">
<div class="row">
<?php if ($uygulama_listesi) { ?>
<!-- uygulamalar -->
<div class="apps <?php if ($oyun_listesi) { ?>col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12<?php } else { ?>col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12<?php } ?>">
<h3><span class="badge badge-secondary">Güncellenen uygulamalar</span></h3>
<div class="row">
<?php foreach ($uygulama_listesi as $row) { ?>
<div class="<?php if ($oyun_listesi) { ?>col-xl-4 col-lg-4 col-md-3 col-sm-4 col-4<?php } else { ?>col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4<?php } ?> mb-5">
<div class="card h-100">
<a href="<?php echo base_url("uygulama/".$row->uygulama_url); ?>"><img width="120" height="150" style="padding:10px;" class="card-img-top" src="<?php echo base_url("uploads/$row->uygulama_icon"); ?>" alt="<?php echo $row->uygulama_baslik; ?>" title="<?php echo $row->uygulama_baslik; ?>"></a>
<div class="card-body">
<h4 class="card-title"><a href="<?php echo base_url("uygulama/".$row->uygulama_url); ?>"><?php echo $row->uygulama_baslik; ?></a><hr>Google Play Uygulama Puanı:<?php echo $row->uygulama_puan; ?></h4>
</div>
</div>
</div><!-- col-md -->
<?php } ?>
</div><!-- row -->
</div><!-- col -md-6 -->
<!-- uygulamalar -->
<?php } ?>
<?php if ($oyun_listesi) { ?>
<!-- oyunlar -->
<div class="games <?php if ($uygulama_listesi) { ?>col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12<?php } else { ?>col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12<?php } ?>">
<h3><span class="badge badge-secondary">Güncellenen oyunlar</span></h3>
<div class="row">
<?php foreach ($oyun_listesi as $row) { ?>
<div class="<?php if ($uygulama_listesi) { ?>col-xl-4 col-lg-4 col-md-3 col-sm-4 col-4<?php } else { ?>col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4<?php } ?> mb-5">
<div class="card h-100">
<a href="<?php echo base_url("oyun/".$row->oyun_url); ?>"><img class="card-img-top" width="120" height="150" style="padding:10px;"  src="<?php echo base_url("uploads/$row->oyun_icon"); ?>" alt="<?php echo $row->oyun_baslik; ?>" title="<?php echo $row->oyun_baslik; ?>"></a>
<div class="card-body">
<h4 class="card-title"><a href="<?php echo base_url("oyun/".$row->oyun_url); ?>"><?php echo $row->oyun_baslik; ?></a><hr>Google Play Uygulama Puanı:<?php echo $row->oyun_puan; ?></h4>
</div>
</div>
</div><!-- col-md -->
<?php } ?>
</div><!-- row -->
</div><!-- col -md-6 -->
<!-- oyunlar -->
<?php } ?>
</div><!-- row -->
<nav>
<?php echo $this->pagination->create_links(); ?>
</nav>
</div><!-- container -->
<?php $this->load->view("footer_copyright"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>" ></script>
</body>
</html>