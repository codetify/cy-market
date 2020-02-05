<?php 
header('Content-type: text/xml'); 
echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>


    <!-- Sitemap -->
    
    <?php foreach($sayfa as $sayfa) { ?>
    <url>
        <loc><?php echo base_url().$sayfa->sayfa_url ?></loc>
        <priority>0.5</priority>
        <changefreq>daily</changefreq>
    </url>
    <?php } ?>
    
    
    <?php foreach($uygulama as $uygulama) { ?>
    <url>
        <loc><?php echo base_url().$uygulama->uygulama_url ?></loc>
        <priority>0.5</priority>
        <changefreq>daily</changefreq>
    </url>
    <?php } ?>

    <?php foreach($oyun as $oyun) { ?>
    <url>
        <loc><?php echo base_url().$oyun->oyun_url ?></loc>
        <priority>0.5</priority>
        <changefreq>daily</changefreq>
    </url>
    <?php } ?>
    
    <?php foreach($kategori as $kategori) { ?>
    <url>
        <loc><?php echo base_url().$kategori->kategori_url ?></loc>
        <priority>0.5</priority>
        <changefreq>daily</changefreq>
    </url>
    <?php } ?>


</urlset>