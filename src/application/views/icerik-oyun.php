<?php
$metin = $oyun_icerik->oyun_aciklama;
$uzunluk = strlen($metin);
$sinir = 120;
if ($uzunluk> $sinir) {
$oyun_icerik_v2 = substr($metin,0,$sinir);
}
else if($uzunluk<$sinir){
$oyun_icerik_v2 = $metin;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $oyun_icerik->oyun_baslik; ?> | <?php echo strip_tags($ayarlar->site_title); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="<?php echo $ayarlar->site_adi; ?>" />
<meta name="description" content="<?php echo strip_tags($oyun_icerik_v2); ?>...">
<meta name="keywords" content="<?php echo strip_tags($ayarlar->site_keywords); ?>">
<meta name="owner" content="<?php echo $ayarlar->site_adi; ?>" />
<meta name="copyright" content="Copyright <?php echo $ayarlar->site_adi; ?> - Tüm Hakları Saklıdır." />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@codetify"/>
<meta name="twitter:url" content="<?php echo base_url(strip_tags("oyun/".$oyun_icerik->oyun_url)); ?>">
<meta name="twitter:title" content="<?php echo $oyun_icerik->oyun_baslik; ?>">
<meta name="twitter:description" content="<?php echo strip_tags($oyun_icerik_v2); ?>...">
<meta name="twitter:image" content="<?php echo base_url("uploads/$oyun_icerik->oyun_icon"); ?>">
<meta property="og:locale" content="tr_TR">
<meta property="og:title" content="<?php echo $oyun_icerik->oyun_baslik; ?>">
<meta property="og:site_name" content="<?php echo strip_tags($ayarlar->site_title); ?>">
<meta property="og:url" content="<?php echo base_url(strip_tags("oyun/".$oyun_icerik->oyun_url)); ?>">
<meta property="og:image" content="<?php echo base_url("uploads/$oyun_icerik->oyun_icon"); ?>">
<meta property="og:image:width" content="150">
<meta property="og:image:height" content="150">
<meta property="og:description" content="<?php echo strip_tags($oyun_icerik_v2); ?>...">
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/owlcarousel/assets/owl.carousel.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/owlcarousel/assets/owl.theme.default.min.css"); ?>">
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
<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 my-4 sol_icerik">
<img src="<?php echo base_url("uploads/$oyun_icerik->oyun_icon"); ?>" width="200" height="200" alt="<?php echo $oyun_icerik->oyun_baslik; ?>" title="<?php echo $oyun_icerik->oyun_baslik; ?>">
<p class="icerik_baslik"><?php echo $oyun_icerik->oyun_baslik; ?></p>   
<small><a href="<?php echo base_url("yapimci/$oyun_icerik->yapimci_url"); ?>" class="sol_icerik_sahip"><?php echo $oyun_icerik->yapimci_adi; ?></a></small> <small><a href="<?php echo base_url("kategori/$oyun_icerik->kategori_url"); ?>" class="sol_icerik_ktg"><?php echo $oyun_icerik->kategori_adi; ?></a></small><br>
<div class="icerik_bilgi">
<small>Boyut: <?php echo $oyun_icerik->oyun_boyut; ?></small>
<br>
<small>Mevcut Sürüm: <?php echo $oyun_icerik->oyun_surum; ?></small>
<br>
<small><?php echo $oyun_icerik->oyun_and_ios; ?></small>
<br>
</div><!-- icerik bilgi -->
<div class="icerik_btn" style="position:relative;top:2px;">
<a target="_blank" href="<?php echo $oyun_icerik->oyun_google_link; ?>"><button type="button" class="btn btn-success">Google Play Store</button></a>
<a target="_blank" href="<?php echo $oyun_icerik->oyun_apple_link; ?>"><button type="button" class="btn btn-info">Apple Store</button></a>
<a href="<?php echo $oyun_icerik->oyun_apk_link; ?>"><button type="button" class="btn btn-dark">APK</button></a>
</div><!-- icerik btn --><br>
<div class="icerik_resimler">
<h3 style="position:relative;left:10px"><span class="badge badge-secondary">Ekran Görüntüleri</span></h3>
<hr style="position:relative;left:10px">
<div class="owl-carousel">
<?php foreach ($ekran_goruntuleri as $ekran_goruntuleri) { ?>
<div class="ekran_grnt"><img src="<?php echo $ekran_goruntuleri->resim_url; ?>" alt="<?php echo $oyun_icerik->oyun_baslik; ?> ekran görüntüsü" title="<?php echo $oyun_icerik->oyun_baslik; ?> ekran görüntüsü"></div>
<?php } ?>
</div><!-- owl-carousel-->
</div><!-- icerik resimler -->
<div class="icerik_aciklama">
<h3><span class="badge badge-secondary">Açıklama</span></h3>
<hr>
<?php echo $oyun_icerik->oyun_aciklama; ?>
</div><!-- icerik_aciklama -->
<div class="icerik_yorumlar">
<h3><span class="badge badge-secondary">Yorumlar</span></h3>
<hr>
<div id="disqus_thread"></div>
</div><!-- icerik_yorumlar -->
</div><!-- col-8-sag -->
<?php if ($benzer_oyunlar) { ?>
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 my-4 sag_icerik">
<h3><span class="badge badge-secondary">Benzer Oyunlar</span></h3>
<div class="list-group">
<?php foreach($benzer_oyunlar as $benzer_oyunlar) { ?>
<a href="<?php echo $benzer_oyunlar->oyun_url; ?>" class="list-group-item"><img width="75" src="<?php echo base_url("uploads/$benzer_oyunlar->oyun_icon"); ?>" alt="<?php echo $benzer_oyunlar->oyun_baslik; ?>" title="<?php echo $benzer_oyunlar->oyun_baslik; ?>"><strong><?php echo $benzer_oyunlar->oyun_baslik; ?></strong></a>
<?php } ?>
</div>
</div><!-- col-4 sol -->
<?php } ?>
</div><!-- row -->
</div><!-- container -->
<?php $this->load->view("footer_copyright"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/plugins/owlcarousel/owl.carousel.min.js"); ?>"></script>
<script>
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    margin:10,
    autoWidth:false,
    items:4
  });
});
</script>
<script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://<?php echo $ayarlar->site_disqus_adres; ?>/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//<?php echo $ayarlar->site_disqus_adres; ?>/count.js" async></script>
</body>
</html>