<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo strip_tags($ayarlar->site_title); ?></title>
<meta name="author" content="<?php echo $ayarlar->site_adi; ?>" />
<meta name="robots" content="all"/>
<meta name="description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="<?php echo $ayarlar->site_adi; ?>" />
<meta name="copyright" content="Copyright <?php echo $ayarlar->site_adi; ?> - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@codetify"/>
<meta name="twitter:url" content="<?php echo base_url(); ?>">
<meta name="twitter:title" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta name="twitter:description" content="<?php echo strip_tags($ayarlar->site_description); ?>">
<meta name="twitter:image" content="<?php echo base_url("uploads/$ayarlar->site_logo"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="<?php echo strip_tags($ayarlar->site_title); ?>">
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
<?php $baslangic = 0; if($slider_listesi) { ?>
<div class="row">
<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 my-4">
<div class="bd-example">
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
<?php foreach ($slider_listesi as $row) { ?>
<div class="carousel-item<?php if($baslangic == 0) echo " active"; $baslangic++; ?>">
<a target="_blank" rel="nofollow" href="<?php echo $row->slider_url; ?>"><img width="700" height="370" src="<?php echo base_url("uploads/$row->slider_resim"); ?>" class="d-block w-100" alt="<?php echo $row->slider_baslik; ?>" title="<?php echo $row->slider_baslik; ?>"></a>
<div class="carousel-caption d-none d-md-block">
<h5 style="background:#000;color:#fff;padding:5px;"><?php echo $row->slider_baslik; ?></h5>
</div>
</div>
<?php } ?>
</div>
<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Önceki</span>
</a>
<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Sonraki</span>
</a>
</div>
</div>
</div><!-- col-8-slider -->
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 gn_uygulama">
<h3><span class="badge badge-secondary">Sosyal Medya'da <?php echo strip_tags($ayarlar->site_adi); ?></span></h3>
<div class="card h-95">
<img class="card-img-top" src="<?php echo base_url("uploads/$ayarlar->site_logo"); ?>" alt="<?php echo strip_tags($ayarlar->site_adi); ?>" title="<?php echo strip_tags($ayarlar->site_adi); ?>">
<div class="card-body">
<h4 class="card-title"><strong style="font-size:16px;"><?php echo strip_tags($ayarlar->site_adi); ?></strong></h4>
<p class="card-text"><?php echo strip_tags($ayarlar->site_description); ?></p>
<div class="anasayfa_sosyal">
<strong class="iletisim_pass">
<a href="<?php echo strip_tags($ayarlar->site_facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
<a href="<?php echo strip_tags($ayarlar->site_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
<a href="<?php echo strip_tags($ayarlar->site_instagram); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
<a href="<?php echo strip_tags($ayarlar->site_youtube); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
</strong>
</div><!-- anasayfa sosyal -->
</div>
</div>
</div><!-- col-md -->
<!-- /.col-lg-3 -->
</div><!-- row -->
<?php } ?>
<div class="row" style="position:relative;top:10px;">
<?php if ($uygulama_listesi) { ?>
<!-- uygulamalar -->
<div class="apps col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
<h3><span class="badge badge-secondary">Uygulamalar</span></h3>
<div class="row">
<?php foreach ($uygulama_listesi as $row) { ?>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-6 mb-5">
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
<div class="games col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
<h3><span class="badge badge-secondary">Oyunlar</span></h3>
<div class="row">
<?php foreach ($oyun_listesi as $row) { ?>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 col-6 mb-5">
<div class="card h-100">
<a href="<?php echo base_url("oyun/".$row->oyun_url); ?>"><img class="card-img-top" width="120" height="150" style="padding:10px;"  src="<?php echo base_url("uploads/$row->oyun_icon"); ?>" alt="<?php echo $row->oyun_baslik; ?>" title="<?php echo $row->oyun_baslik; ?>"></a>
<div class="card-body">
<h4 class="card-title"><a href="<?php echo base_url("oyun/".$row->oyun_url); ?>"><?php echo $row->oyun_baslik; ?></a> <hr>Google Play Uygulama Puanı:<?php echo $row->oyun_puan; ?></h4>
</div>
</div>
</div><!-- col-md -->
<?php } ?>
<?php if(!$oyun_listesi && !$uygulama_listesi) { ?>
<span class="alert alert-danger">Şuan sitede oyun veya uygulama bulunamadı..!<br>Eğer oyun veya uygulama eklenmesini istiyorsanız <a target="_blank" href="<?php echo base_url("iletisim"); ?>">İletişim</a> sayfasından bizimle iletişime geçin :)</span>
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