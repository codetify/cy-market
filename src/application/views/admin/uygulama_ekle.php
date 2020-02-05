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
</head>
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
<?php $this->load->view("admin/menu");?>
<div class="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="<?php echo base_url("yonetim/anasayfa"); ?>">Panel</a>
</li>
<li class="breadcrumb-item active">Uygulama Ekle</li>
</ol>
<div class="card mb-3">
<div class="card-header">
<i class="fa fa-mobile"></i> Uygulama Ekle</div>
<div class="card-body">
<form action="<?php echo base_url("admin/uygulamalar/ekle/insert"); ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="yazar_id" value="<?php $user = $this->session->userdata("user"); echo $user["id"]; ?>">
<div class="form-group">
<label for="uygulama_baslik">Uygulama Adı</label>
<input type="text" class="form-control" id="uygulama_baslik" name="uygulama_baslik">
</div>
<div class="form-group">
<label for="uygulama_url">Kısa URL (Boş bırakırsanız, otomatik olarak oluşturulur)</label>
<input type="text" class="form-control" id="uygulama_url" name="uygulama_url">
</div>
<div class="form-group">
<label for="uygulama_boyut">Uygulama Boyutu</label>
<input type="text" class="form-control" id="uygulama_boyut" name="uygulama_boyut">
</div>
<div class="form-group">
<label for="uygulama_surum">Sürüm Numarası</label>
<input type="text" class="form-control" id="uygulama_surum" name="uygulama_surum">
</div>
<div class="form-group">
<label for="uygulama_and_ios">Android ve iOS için gereken sürüm</label>
<input type="text" class="form-control" id="uygulama_and_ios" name="uygulama_and_ios">
</div>
<div class="form-group">
<label for="uygulama_google_link">Google Play Store Link (Zorunlu Değil)</label>
<input type="text" class="form-control" id="uygulama_google_link" name="uygulama_google_link">
</div>
<div class="form-group">
<label for="uygulama_apple_link">Apple Store Link (Zorunlu Değil)</label>
<input type="text" class="form-control" id="uygulama_apple_link" name="uygulama_apple_link">
</div>
<div class="form-group">
<label for="uygulama_apk_link">APK Link (Zorunlu Değil)</label>
<input type="text" class="form-control" id="uygulama_apk_link" name="uygulama_apk_link">
</div>
<div class="form-group">
<label for="uygulama_puan">Uygulama Google Play Puanı</label>
<input type="text" class="form-control" id="uygulama_puan" name="uygulama_puan">
</div>
<div class="form-group">
<label for="uygulama_kategori">Kategori Seçiniz</label>
<select class="form-control" id="uygulama_kategori" name="uygulama_kategori">
<?php foreach ($kategori_list as $row) { ?>
<option value="<?php echo $row->id; ?>"><?php echo $row->kategori_adi; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="uygulama_yapimci">Yapımcı Seçiniz</label>
<select class="form-control" id="uygulama_yapimci" name="uygulama_yapimci">
<?php foreach ($yapimci_list as $row) { ?>
<option value="<?php echo $row->id; ?>"><?php echo $row->yapimci_adi; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="uygulama_icon">Uygulama İkon</label>
<input type="file" class="form-control-file" id="uygulama_icon" name="uygulama_icon">
</div>
<div class="form-group">
<label for="uygulama_ekran_goruntusu">Uygulama Ekran Görüntüleri</label>
(Ekran görüntülerini oyun düzenle sayfasından daha sonra ekleyebilirsiniz :))
</div>
<div class="form-group">
<label for="uygulama_aciklama">Uygulama Açıklaması</label>
<textarea rows="5" class="form-control" id="uygulama_aciklama" name="uygulama_aciklama"></textarea>
</div>
<div class="form-group">
<label for="uygulama_durum">Onaylı mı?</label>
<select class="form-control" id="uygulama_durum" name="uygulama_durum">
<option value="1">Onaylı</option>
<option value="0">Onaysız</option>
</select>
</div>
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
<script>
CKEDITOR.replace('uygulama_aciklama', {
extraPlugins: 'syntaxhighlight'
});
</script>
</div>
</body>
</html>