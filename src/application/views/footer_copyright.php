<footer class="footer" style="position:relative;top:10px;"><div class="container">2020 <?php echo strip_tags($ayarlar->site_adi); ?> -
<?php foreach(helper_menu() as $sayfalar){ ?>
<a href="<?php echo base_url("sayfa/$sayfalar->sayfa_url");?>"><?php echo $sayfalar->sayfa_baslik; ?></a>
<?php } ?>
<a href="<?php echo base_url("/iletisim"); ?>">İletişim</a> | Created by <a target="_blank" href="https://codetify.net/">Codetify</a></div></div>