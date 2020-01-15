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
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/owlcarousel/assets/owl.carousel.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/owlcarousel/assets/owl.theme.default.min.css"); ?>">
</head>
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
<?php $this->load->view("admin/menu");?>
<div class="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="<?php echo base_url("yonetim/anasayfa"); ?>">Panel</a>
</li>
<li class="breadcrumb-item active">Oyun Düzenle</li>
</ol>
<div class="card mb-3">
<div class="card-header">
<i class="fa fa-gamepad"></i> Oyun Düzenle</div>
<div class="card-body">
<form action="<?php echo base_url("admin/oyunlar/duzenle/update/$oyunlar->id"); ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="yazar_id" value="<?php $user = $this->session->userdata("user"); echo $user["id"]; ?>">
<div class="form-group">
<label for="oyun_baslik">Oyun Adı</label>
<input type="text" class="form-control" id="oyun_baslik" name="oyun_baslik" value="<?php echo $oyunlar->oyun_baslik; ?>">
</div>
<div class="form-group">
<label for="oyun_url">Kısa URL (Boş bırakırsanız, otomatik olarak oluşturulur)</label>
<input type="text" class="form-control" id="oyun_url" name="oyun_url" value="<?php echo $oyunlar->oyun_url; ?>">
</div>
<div class="form-group">
<label for="oyun_boyut">Oyun Boyutu</label>
<input type="text" class="form-control" id="oyun_boyut" name="oyun_boyut" value="<?php echo $oyunlar->oyun_boyut; ?>">
</div>
<div class="form-group">
<label for="oyun_surum">Sürüm Numarası</label>
<input type="text" class="form-control" id="oyun_surum" name="oyun_surum" value="<?php echo $oyunlar->oyun_surum; ?>">
</div>
<div class="form-group">
<label for="oyun_and_ios">Android ve iOS için gereken sürüm</label>
<input type="text" class="form-control" id="oyun_and_ios" name="oyun_and_ios" value="<?php echo $oyunlar->oyun_and_ios; ?>">
</div>
<div class="form-group">
<label for="oyun_google_link">Google Play Store Link (Zorunlu Değil)</label>
<input type="text" class="form-control" id="oyun_google_link" name="oyun_google_link" value="<?php echo $oyunlar->oyun_google_link; ?>">
</div>
<div class="form-group">
<label for="oyun_apple_link">Apple Store Link (Zorunlu Değil)</label>
<input type="text" class="form-control" id="oyun_apple_link" name="oyun_apple_link" value="<?php echo $oyunlar->oyun_apple_link; ?>">
</div>
<div class="form-group">
<label for="oyun_apk_link">APK Link (Zorunlu Değil)</label>
<input type="text" class="form-control" id="oyun_apk_link" name="oyun_apk_link" value="<?php echo $oyunlar->oyun_apk_link; ?>">
</div>
<div class="form-group">
<label for="oyun_puan">Oyun Google Play Puanı</label>
<input type="text" class="form-control" id="oyun_puan" name="oyun_puan" value="<?php echo $oyunlar->oyun_puan; ?>">
</div>
<div class="form-group">
<label for="oyun_kategori">Kategori Seçiniz</label>
<select class="form-control" id="oyun_kategori" name="oyun_kategori">
<?php foreach ($kategori_list as $row) {
($row->id == $oyunlar->kategori_id) ? $selected = "selected":$selected = "";
?>
<option value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->kategori_adi; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="oyun_yapimci">Yapımcı Seçiniz</label>
<select class="form-control" id="oyun_yapimci" name="oyun_yapimci">
<?php foreach ($yapimci_list as $row) {
($row->id == $oyunlar->yapimci_id) ? $selected = "selected":$selected = "";
?>
<option value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->yapimci_adi; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="oyun_icon">Oyun İkon</label>
<input type="file" class="form-control-file" id="oyun_icon" name="oyun_icon">
</div>
<img src="<?php echo base_url("uploads/$oyunlar->oyun_icon"); ?>" width="120" height="120">
<br><br>
<div class="form-group">
<a target="_blank" href="<?php echo base_url("admin/oyunlar/ekran-goruntuleri/$oyunlar->id"); ?>" class="form-control btn btn-primary">Oyun ekran görüntüleri</a>
</div>
<div class="owl-carousel">
<?php foreach ($ekran_goruntuleri as $ekran_goruntuleri) { ?>
<div class="ekran_grnt"><img src="<?php echo $ekran_goruntuleri->resim_url; ?>"></div>
<?php } ?>
</div><!-- owl-carousel-->
<div class="form-group">
<label for="oyun_aciklama">Oyun Açıklaması</label>
<textarea rows="5" class="form-control" id="oyun_aciklama" name="oyun_aciklama"><?php echo html_escape($oyunlar->oyun_aciklama); ?></textarea>
</div>
<div class="form-group">
<label for="oyun_durum">Onaylı mı?</label>
<select class="form-control" id="oyun_durum" name="oyun_durum">
<option value="1" <?php if($oyunlar->oyun_durum=="1"){echo "selected";}; ?>>Onaylı</option>
<option value="0" <?php if($oyunlar->oyun_durum=="0"){echo "selected";}; ?>>Onaysız</option>
</select>
</div>
<input type="hidden" name="id" value="<?php echo $oyunlar->id; ?>">
<div class="form-group">
<button type="submit" class="btn btn-primary">Kaydet</button>
</div>
</form>
</div>
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
<script src="<?php echo base_url("assets/a/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/jquery.dataTables.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/vendor/datatables/dataTables.bootstrap4.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin.js"); ?>"></script>
<script src="<?php echo base_url("assets/a/js/sb-admin-datatables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/sweetalert2.all.js"); ?>"></script>
<?php $this->load->view("admin/alert"); ?>
<script src="<?php echo base_url("assets/plugins/ckeditor/ckeditor.js"); ?>"></script>
<script src="<?php echo base_url("assets/plugins/owlcarousel/owl.carousel.min.js"); ?>"></script>
<script>
CKEDITOR.replace('oyun_aciklama', {
extraPlugins: 'syntaxhighlight'
});
</script>
<script>
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    margin:10,
    autoWidth:true,
    items:4
  });
});
</script>
</div>
</body>
</html>