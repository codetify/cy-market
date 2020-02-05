<?php if(helper_kt_menu()){ ?>
<li class="nav-item dropdown drop_kategori">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Kategoriler
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php foreach(helper_kt_menu() as $kategoriler){ ?>
<a class="dropdown-item" href="<?php echo base_url("kategori/$kategoriler->kategori_url");?>"><?php echo $kategoriler->kategori_adi; ?></a>
<?php } ?>
</div>
</li>
<?php } ?>
<li class="nav-item">
<a class="nav-link" href="<?php echo base_url("ust-siralar");?>">Üst Sıralar</a>
</li>
<li class="nav-item">
<a class="nav-link" href="<?php echo base_url("yeni-cikanlar");?>">Yeni Çıkanlar</a>
</li>
<li class="nav-item">
<a class="nav-link" href="<?php echo base_url("guncellenenler");?>">Güncellenenler</a>
</li>