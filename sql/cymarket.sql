-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 15 Oca 2020, 13:43:35
-- Sunucu sürümü: 5.7.26
-- PHP Sürümü: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cymarket`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genel_ayarlar`
--

DROP TABLE IF EXISTS `genel_ayarlar`;
CREATE TABLE IF NOT EXISTS `genel_ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_description` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_keywords` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_uygulama_sayisi` int(11) NOT NULL,
  `anasayfa_oyun_sayisi` int(11) NOT NULL,
  `arama_uy_oy_sayisi` int(11) NOT NULL,
  `anasayfa_kategori_sayisi` int(11) NOT NULL,
  `anasayfa_slider_sayisi` int(11) NOT NULL,
  `anasayfa_ust_siralar_sayisi` int(11) NOT NULL,
  `anasayfa_yeni_cikanlar_sayisi` int(11) NOT NULL,
  `anasayfa_guncellenenler_sayisi` int(11) NOT NULL,
  `anasayfa_yapimci_sayisi` int(11) NOT NULL,
  `site_facebook` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_twitter` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_youtube` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_disqus_adres` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `guncelleyen_id` int(11) NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `genel_ayarlar`
--

INSERT INTO `genel_ayarlar` (`id`, `site_logo`, `site_title`, `site_adi`, `site_description`, `site_keywords`, `anasayfa_uygulama_sayisi`, `anasayfa_oyun_sayisi`, `arama_uy_oy_sayisi`, `anasayfa_kategori_sayisi`, `anasayfa_slider_sayisi`, `anasayfa_ust_siralar_sayisi`, `anasayfa_yeni_cikanlar_sayisi`, `anasayfa_guncellenenler_sayisi`, `anasayfa_yapimci_sayisi`, `site_facebook`, `site_twitter`, `site_instagram`, `site_youtube`, `site_disqus_adres`, `guncelleyen_id`, `updatedAt`) VALUES
(1, 'default_image.png', 'CY Market - Uygulama ve Oyun Marketi', 'CY Market', 'Uygulama ve Oyun Marketi', 'CY Market, google, android, apple, ios, play store', 10, 10, 10, 10, 5, 10, 10, 10, 10, 'https://facebook.com/codetifysoftware', 'https://twitter.com/codetify', 'https://instagram.com/codetify', '#', 'cy-market.disqus.com', 1, '2020-01-15 13:21:11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

DROP TABLE IF EXISTS `iletisim`;
CREATE TABLE IF NOT EXISTS `iletisim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gonderen_ad_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gonderen_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_durum` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `gonderen_ad_soyad`, `gonderen_email`, `konu`, `mesaj`, `iletisim_durum`, `createdAt`, `updatedAt`) VALUES
(1, 'angelo', 'asdas@gmail.com', 'denasd', 'sadn', 1, '2020-01-15 13:36:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_durum` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategori_adi`, `kategori_url`, `kategori_durum`, `yazar_id`, `createdAt`, `updatedAt`) VALUES
(1, 'Alışveriş', 'alisveris', 1, 1, '2020-01-15 12:47:01', '0000-00-00 00:00:00'),
(2, 'Araçlar', 'araclar', 1, 1, '2020-01-15 12:47:05', '0000-00-00 00:00:00'),
(3, 'Arkadaşlık', 'arkadaslik', 1, 1, '2020-01-15 12:47:19', '0000-00-00 00:00:00'),
(4, 'Arttırılmış Gerçeklik', 'arttirilmis-gerceklik', 1, 1, '2020-01-15 12:47:26', '0000-00-00 00:00:00'),
(5, 'Daydream', 'daydream', 1, 1, '2020-01-15 12:47:35', '0000-00-00 00:00:00'),
(6, 'Etkinlik', 'etkinlik', 1, 1, '2020-01-15 12:47:38', '0000-00-00 00:00:00'),
(7, 'Ev', 'ev', 1, 1, '2020-01-15 12:47:47', '0000-00-00 00:00:00'),
(8, 'Eğitim', 'egitim', 1, 1, '2020-01-15 12:47:55', '0000-00-00 00:00:00'),
(9, 'Eğlence', 'eglence', 1, 1, '2020-01-15 12:48:01', '0000-00-00 00:00:00'),
(10, 'Finans', 'finans', 1, 1, '2020-01-15 12:48:05', '0000-00-00 00:00:00'),
(11, 'Fotoğrafçılık', 'fotografcilik', 1, 1, '2020-01-15 12:48:10', '0000-00-00 00:00:00'),
(12, 'Güzellik', 'guzellik', 1, 1, '2020-01-15 12:48:20', '0000-00-00 00:00:00'),
(13, 'Haberler ve Dergiler', 'haberler-ve-dergiler', 1, 1, '2020-01-15 12:48:30', '0000-00-00 00:00:00'),
(14, 'Haberleşme', 'haberlesme', 1, 1, '2020-01-15 12:48:38', '0000-00-00 00:00:00'),
(15, 'Haritalar ve Nagivasyon', 'haritalar-ve-nagivasyon', 1, 1, '2020-01-15 12:48:45', '0000-00-00 00:00:00'),
(16, 'Hava Durumu', 'hava-durumu', 1, 1, '2020-01-15 12:48:53', '0000-00-00 00:00:00'),
(17, 'Karikatür', 'karikatur', 1, 1, '2020-01-15 12:48:57', '0000-00-00 00:00:00'),
(18, 'Kitaplar ve Referans', 'kitaplar-ve-referans', 1, 1, '2020-01-15 12:49:06', '0000-00-00 00:00:00'),
(19, 'Kitaplıklar ve Kısa Sunum', 'kitapliklar-ve-kisa-sunum', 1, 1, '2020-01-15 12:49:17', '0000-00-00 00:00:00'),
(20, 'Kişiselleştirme', 'kisisellestirme', 1, 1, '2020-01-15 12:49:38', '0000-00-00 00:00:00'),
(21, 'Müzik ve Ses', 'muzik-ve-ses', 1, 1, '2020-01-15 12:49:53', '0000-00-00 00:00:00'),
(22, 'Otomobil ve Araçlar', 'otomobil-ve-araclar', 1, 1, '2020-01-15 12:49:59', '0000-00-00 00:00:00'),
(23, 'Sanat ve Tasarım', 'sanat-ve-tasarim', 1, 1, '2020-01-15 12:50:06', '0000-00-00 00:00:00'),
(24, 'Sağlık  ve Fitness', 'saglik-ve-fitness', 1, 1, '2020-01-15 12:50:14', '0000-00-00 00:00:00'),
(25, 'Seyahat ve Yerel', 'seyahat-ve-yerel', 1, 1, '2020-01-15 12:50:23', '0000-00-00 00:00:00'),
(26, 'Sosyal', 'sosyal', 1, 1, '2020-01-15 12:50:42', '0000-00-00 00:00:00'),
(27, 'Tıp', 'tip', 1, 1, '2020-01-15 12:50:35', '0000-00-00 00:00:00'),
(28, 'Spor', 'spor', 1, 1, '2020-01-15 12:50:45', '0000-00-00 00:00:00'),
(29, 'Verimlilik', 'verimlilik', 1, 1, '2020-01-15 12:50:57', '0000-00-00 00:00:00'),
(30, 'Video oynatıcılar ve Düzenleyiciler', 'video-oynaticilar-ve-duzenleyiciler', 1, 1, '2020-01-15 12:51:10', '0000-00-00 00:00:00'),
(31, 'Yaşam Tarzı', 'yasam-tarzi', 1, 1, '2020-01-15 12:51:23', '0000-00-00 00:00:00'),
(32, 'Yeme İçme', 'yeme-icme', 1, 1, '2020-01-15 12:51:30', '0000-00-00 00:00:00'),
(33, 'Çocuk Yetiştirme', 'cocuk-yetistirme', 1, 1, '2020-01-15 12:51:36', '0000-00-00 00:00:00'),
(34, 'İş', 'is', 1, 1, '2020-01-15 12:51:39', '0000-00-00 00:00:00'),
(35, 'Aksiyon', 'aksiyon', 1, 1, '2020-01-15 12:51:45', '0000-00-00 00:00:00'),
(36, 'Arcade', 'arcade', 1, 1, '2020-01-15 12:51:49', '0000-00-00 00:00:00'),
(37, 'Bulmaca', 'bulmaca', 1, 1, '2020-01-15 12:51:55', '0000-00-00 00:00:00'),
(38, 'Eğitici', 'egitici', 1, 1, '2020-01-15 12:51:58', '0000-00-00 00:00:00'),
(39, 'Eğlencelik Bilgi Oyunları', 'eglencelik-bilgi-oyunlari', 1, 1, '2020-01-15 12:52:09', '0000-00-00 00:00:00'),
(40, 'Kağıt', 'kagit', 1, 1, '2020-01-15 12:52:17', '0000-00-00 00:00:00'),
(41, 'Kelime', 'kelime', 1, 1, '2020-01-15 12:52:21', '0000-00-00 00:00:00'),
(42, 'Klasik', 'klasik', 1, 1, '2020-01-15 12:52:28', '0000-00-00 00:00:00'),
(43, 'Kumarhane Oyunları', 'kumarhane-oyunlari', 1, 1, '2020-01-15 12:52:33', '0000-00-00 00:00:00'),
(44, 'Macera Oyunları', 'macera-oyunlari', 1, 1, '2020-01-15 12:52:40', '0000-00-00 00:00:00'),
(45, 'Masa Oyunları', 'masa-oyunlari', 1, 1, '2020-01-15 12:52:44', '0000-00-00 00:00:00'),
(46, 'Müzik', 'muzik', 1, 1, '2020-01-15 12:52:51', '0000-00-00 00:00:00'),
(47, 'Rol Oyunu', 'rol-oyunu', 1, 1, '2020-01-15 12:52:57', '0000-00-00 00:00:00'),
(48, 'Simülasyon', 'simulasyon', 1, 1, '2020-01-15 12:53:01', '0000-00-00 00:00:00'),
(49, 'Spor', 'spor', 1, 1, '2020-01-15 12:53:06', '0000-00-00 00:00:00'),
(50, 'Strateji Oyunları', 'strateji-oyunlari', 1, 1, '2020-01-15 12:53:11', '0000-00-00 00:00:00'),
(51, 'Yarış', 'yaris', 1, 1, '2020-01-15 12:53:18', '0000-00-00 00:00:00'),
(52, 'Zeka Oyunları', 'zeka-oyunlari', 1, 1, '2020-01-15 12:53:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oyunlar`
--

DROP TABLE IF EXISTS `oyunlar`;
CREATE TABLE IF NOT EXISTS `oyunlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oyun_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_icon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `yapimci_id` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `oyun_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `oyun_boyut` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_surum` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_and_ios` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_google_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_apple_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_apk_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_puan` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_goruntulenme` int(11) NOT NULL,
  `oyun_durum` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `oyunlar`
--

INSERT INTO `oyunlar` (`id`, `oyun_baslik`, `oyun_icon`, `kategori_id`, `yapimci_id`, `yazar_id`, `oyun_aciklama`, `oyun_boyut`, `oyun_surum`, `oyun_and_ios`, `oyun_google_link`, `oyun_apple_link`, `oyun_apk_link`, `oyun_puan`, `oyun_url`, `oyun_goruntulenme`, `oyun_durum`, `createdAt`, `updatedAt`) VALUES
(1, 'Tacticool - 5v5 PvP Takım Savaşı', 'ezgif-1-ec0368d600a2.png', 35, 7, 1, '<p>şimdi sende Tacticool indir, klanlara katıl, tek gir veya 5 kişiye kadar takım kur. Mobil PVP takım savaşı ile online TPS keyfini, ger&ccedil;ek zamanlı fiziksel &ouml;ğelerle, imha edilebilir ortamlarda yaşa! Hızlı savaş surelerine sahip bu &ccedil;arpıcı oyunda bir araba al, arkadaşlarını bindir ve ikili &ccedil;atışma ile d&uuml;şmanlarını yen. Bu &uuml;cretsiz taktik oyunda fatih sen ol.<br />\r\n<br />\r\nFarklı ajan sınıfları ile oyna, eşsiz multiplayer PvP 5 kisilik takım oyuncuları 50 silah ve destek ekipmanı se&ccedil;eneği ile takımına liderlik et. Bu &uuml;cretsiz savaş oynu ile 7 heyecanlı haritada y&uuml;zlerce eşsiz taktik keşfet. Hatırla: takım savaşı, şaşırtma, hız ve cesaret kazanmanın temel ilkeleridir.<br />\r\n<br />\r\nL&Uuml;TFEN UNUTMA! Tacticool &uuml;cretsiz olarak indirilip oynanabilir online takım savaşı oyunudur. Ancak oyundaki takım oyuncuları veya rakiplerin bazı &ouml;ğeleri online macerayı arttırmak adına ger&ccedil;ek para karşılığında satın alınabilir. Bu &ouml;zelliği kullanmak istemiyorsanız l&uuml;tfen Google Play Store uygulamanızın ayarlarında satın almalar i&ccedil;in parola korumasını ayarlayın.<br />\r\n<br />\r\nOYUN &Ouml;ZELLİKLERİ<br />\r\nEşyalar: T&uuml;fekler, pompalı t&uuml;fekler, tabancalar, makineli t&uuml;fekler, bı&ccedil;aklar, el bombaları, mayınlar, roketatar, C4, Adrenalin ve &uuml;nl&uuml; Landau Emit&ouml;r&uuml;.<br />\r\nAJANLAR: Eşsiz becerilere ve kıyafetlere sahip 20&rsquo;den fazla karakterin kilidini a&ccedil;ıp y&uuml;kselt, takım savaşı ve klanlara g&ouml;reve g&ouml;ndermek i&ccedil;in kadronu genişlet.<br />\r\nFİZİK: Tel &ouml;rg&uuml;leri kes, arabalar ve diğer nesneleri patlat, karşı takım oyuncuları enkazın altına g&ouml;m.<br />\r\nARABALAR: Takım oyuncuları ve arabalar ile online maceraya &ccedil;ık, d&uuml;şmana doğrudan camdan ateş et veya onların &uuml;zerinden ge&ccedil;.<br />\r\nDikkat! Y&uuml;ksek miktarda PvP i&ccedil;in hazır ol. Takım savaşı ile &uuml;st liglerde 5v5 heycanını paylaş.<br />\r\nNot: Online TPS oyunları oynamak i&ccedil;in g&uuml;venilir bir ağ bağlantısı gerekir.<br />\r\nKlanlara katıl, takım savaşı deneyimlerinizi paylaş ve discord sohbetinde diğer oyuncularla konuş:<br />\r\nhttps://discordapp.com/invite/yb5dGSe<br />\r\n<br />\r\nT&uuml;m d&uuml;nyadan milyonlarca yetenekli oyuncunun arasına katılmak i&ccedil;in sende Tacticool indir klanlara katıl ve savaşa hazır ol.<br />\r\nHaberler , g&uuml;ncellemeler , PvP videoları ve oyunun gizemleri i&ccedil;in online adreslerimiz:<br />\r\nFacebook : https://www.facebook.com/TacticoolGame/w<br />\r\nTwitter : https://twitter.com/TacticoolGame<br />\r\nWWW : https://www.panzerdog.com/<br />\r\nGizlilik Politikası:<br />\r\nhttps://www.panzerdog.com/privacy<br />\r\nHizmet Koşulları:<br />\r\nhttps://www.panzerdog.com/terms<br />\r\n<br />\r\n&quot;Grab a car, pick up your friends, and beat your foes in this intense 5v5 mobile shooter with real-time physics, destructible environment, and fast-paced battles.<br />\r\n<br />\r\nPlay different classes of operators, buy and upgrade over 50 weapons and support equipment. Discover hundreds of unique pvp tactics on 7 dramatic maps. Remember: surprise, speed, and courage of action are key principles to win the game.<br />\r\n<br />\r\nPLEASE NOTE! Tacticool is 5v5 pvp shooter game, free to download and play. However, some game items can also be purchased for real money. If you don&#39;t want to use this feature, please disable in-app purchases in your device&#39;s settings.<br />\r\n<br />\r\nFEATURES<br />\r\nWEAPONS &amp; SHOOTER: Rifles, shotguns, pistols, machine guns, knives, grenades, mines, RPG, C4, Adrenaline, and notorious Landau Emitter.<br />\r\nOPERATORS: Unlock and upgrade 20+ characters with unique skills and outfits.<br />\r\nPHYSICS: Break fences, blow up cars, and other objects.<br />\r\nCARS: Ride cars with pvp teammates, attack right from the windows.<br />\r\n<br />\r\nNote: A reliable network connection is required to play 5v5.<br />\r\n<br />\r\nJoin clans, share pvp experience and talk to other players on Discord chat in the game:<br />\r\nhttps://discordapp.com/invite/yb5dGSe<br />\r\n<br />\r\nNews, updates and the game&#39;s secrets:<br />\r\nFacebook : https://www.facebook.com/TacticoolGame/<br />\r\nTwitter : https://twitter.com/TacticoolGame<br />\r\nWWW: https://www.panzerdog.com/<br />\r\n<br />\r\nGame Privacy Policy:<br />\r\nhttps://www.panzerdog.com/privacy<br />\r\n<br />\r\nTerms of Service:<br />\r\nhttps://www.panzerdog.com/terms</p>\r\n', '69M', '1.13.4', 'Android için 5.0 ve sonrası & iOS için 10.0 veya üst sürüm sonrası', 'https://play.google.com/store/apps/details?id=com.panzerdog.tacticool', 'https://apps.apple.com/tr/app/tacticool/id1240200305?l=tr', '', '4,1', 'tacticool-5v5-pvp-takim-savasi', 3, 1, '2020-01-15 12:59:19', '0000-00-00 00:00:00'),
(2, 'Minecraft', 'ezgif-1-499f4ca4be9e.png', 36, 10, 1, '<p>Sonsuz d&uuml;nyaları keşfedin ve en basit evlerden en b&uuml;y&uuml;k kalelere kadar her şeyi inşa edin. Sınırsız kaynaklarla yaratıcı modunda oynayın veya hayatta kalma modunda d&uuml;nyanın derinliklerine kadar kazarken tehlikeli yaratıkları savuşturmak i&ccedil;in silah ve zırh yapın. Mobil cihazlar veya Windows 10&#39;da ister tek başınıza ister arkadaşlarınızla yaratın, keşfedin ve hayatta kalın.<br />\r\n<br />\r\nOYUNUNUZU GENİŞLETİN:<br />\r\nMarket - Marketteki en yeni topluluk eserlerini keşfedin! Sevdiğiniz oluşturucuların eşsiz harita, dış g&ouml;r&uuml;n&uuml;ş ve doku paketlerini alın.<br />\r\n<br />\r\nEğik &ccedil;izgi komutları - Oyunda ince ayarlar yapın: Hediyeler verebilir, yaratıkları &ccedil;ağırabilir, g&uuml;n&uuml;n saatini değiştirebilir ve daha fazlasını yapabilirsiniz.<br />\r\n<br />\r\nEklentiler - &Uuml;cretsiz Eklentilerle deneyiminizi daha da kişiselleştirin! Teknolojiye eğilimliyseniz, yeni kaynak paketleri oluşturmak i&ccedil;in oyundaki veri temelli davranışları değiştirebilirsiniz.<br />\r\n<br />\r\n&Ccedil;OK OYUNCULU<br />\r\nRealms - Sizin i&ccedil;in barındırdığımız kendi &ouml;zel sunucunuz Realms &uuml;zerinde, platformlar arasında dilediğiniz zaman ve dilediğiniz yerde 10 arkadaşa kadar birlikte oynayın. Uygulama i&ccedil;inde &uuml;cretisz 30 g&uuml;nl&uuml;k denemeden yararlanın.<br />\r\n<br />\r\n&Ccedil;ok oyunculu - &Uuml;cretsiz bir &ccedil;evrimi&ccedil;i Xbox Live hesabı ile 4 arkadaşa kadar birlikte oynayın.<br />\r\nSunucular - &Uuml;cretsiz, b&uuml;y&uuml;k, &ccedil;ok oyunculu sunuculara katılın ve binlerce oyuncu ile birlikte oynayın! Topluluğun y&ouml;netimindeki dev d&uuml;nyaları keşfedin, benzersiz mini oyunlarda yarışın ve yeni arkadaşlarla dolu lobilerde sosyalleşin.<br />\r\n<br />\r\nDESTEK: https:///www.minecraft.net/help<br />\r\nDAHA FAZLA BİLGİ: https:///www.minecraft.net/</p>\r\n', 'Cihaza göre değişir', '1.14.1.5', 'Android için 4.2 ve sonrası & iOS için iOS 8.0 veya üst sürüm', 'https://play.google.com/store/apps/details?id=com.mojang.minecraftpe', 'https://apps.apple.com/tr/app/minecraft/id479516143?l=tr', '', '4,5', 'minecraft', 0, 1, '2020-01-15 13:12:33', '2020-01-15 13:12:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oy_ekran_goruntuleri`
--

DROP TABLE IF EXISTS `oy_ekran_goruntuleri`;
CREATE TABLE IF NOT EXISTS `oy_ekran_goruntuleri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

DROP TABLE IF EXISTS `sayfalar`;
CREATE TABLE IF NOT EXISTS `sayfalar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sayfa_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_durum` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`id`, `sayfa_baslik`, `sayfa_url`, `sayfa_icerik`, `sayfa_durum`, `yazar_id`, `createdAt`, `updatedAt`) VALUES
(1, 'Hakkımızda', 'hakkimizda', '<p>İ&ccedil;erik</p>\r\n', 1, 1, '2020-01-15 13:40:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slider_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `slider_resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slider_durum` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `slider_baslik`, `slider_url`, `yazar_id`, `slider_resim`, `slider_durum`, `createdAt`, `updatedAt`) VALUES
(1, 'Android Duvar Kağıtları', '', 1, '3-1555965192.jpg', 1, '2020-01-15 13:23:29', '0000-00-00 00:00:00'),
(2, 'En iyi 5 Android virüs programı', '', 1, '1-1497025038.jpg', 1, '2020-01-15 13:23:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` int(11) NOT NULL,
  `user_role` int(11) NOT NULL,
  `isActive` int(11) NOT NULL,
  `ekleyen_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `ad_soyad`, `email`, `sifre`, `telefon`, `cinsiyet`, `user_role`, `isActive`, `ekleyen_id`, `createdAt`, `updatedAt`) VALUES
(1, 'Codetify', 'demo@codetify.net', '25f9e794323b453885f5181f1b624d0b', '03723162633', 1, 4, 1, 1, '2020-01-15 12:37:00', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uygulamalar`
--

DROP TABLE IF EXISTS `uygulamalar`;
CREATE TABLE IF NOT EXISTS `uygulamalar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uygulama_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_icon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `yapimci_id` int(11) NOT NULL,
  `uygulama_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_boyut` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_surum` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_and_ios` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_google_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_apple_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_apk_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_puan` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_goruntulenme` int(11) NOT NULL,
  `uygulama_durum` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uygulamalar`
--

INSERT INTO `uygulamalar` (`id`, `uygulama_baslik`, `uygulama_icon`, `kategori_id`, `yapimci_id`, `uygulama_aciklama`, `uygulama_boyut`, `uygulama_surum`, `uygulama_and_ios`, `uygulama_google_link`, `uygulama_apple_link`, `uygulama_apk_link`, `uygulama_puan`, `uygulama_url`, `uygulama_goruntulenme`, `uygulama_durum`, `yazar_id`, `createdAt`, `updatedAt`) VALUES
(1, 'WhatsApp Messenger', 'whatsapp.png', 14, 5, '<p>WhatsApp from Facebook<br />\r\n<br />\r\nWhatsApp Messenger, Android ve diğer akıllı telefonlarda kullanılabilen &Uuml;CRETSİZ bir mesajlaşma uygulamasıdır. WhatsApp, aileniz ve arkadaşlarınıza mesaj alıp g&ouml;ndermenizi sağlamak i&ccedil;in telefonunuzun İnternet bağlantısını (4G/3G/2G/EDGE veya varsa Wi-Fi) kullanır. Mesaj, sesli arama, fotoğraf, video, belge ve Sesli Mesaj g&ouml;nderip alabilmek i&ccedil;in SMS&#39;ten WhatsApp&#39;a ge&ccedil;iş yapın.<br />\r\n<br />\r\nNEDEN WHATSAPP KULLANMALISINIZ:<br />\r\n<br />\r\n&bull; WHATSAPP &Uuml;CRETSİZDİR: WhatsApp, arkadaşlarınız ve ailenizle mesajlaşabilmeniz veya onları arayabilmeniz i&ccedil;in telefonunuzun İnternet bağlantısını (4G/3G/2G/EDGE veya varsa Wi-Fi) kullanır. WhatsApp kullanmak i&ccedil;in herhangi bir &uuml;yelik &uuml;creti &ouml;demenize gerek yoktur.<br />\r\n<br />\r\n&bull; MULTİMEDYA: Fotoğraf, video, belge ve sesli mesaj g&ouml;nderip alabilirsiniz.<br />\r\n<br />\r\n&bull; &Uuml;CRETSİZ ARAMALAR: Ailenizi ve arkadaşlarınızı, başka bir &uuml;lkede olsalar bile, WhatsApp Araması kullanarak &uuml;cretsiz arayabilirsiniz.* WhatsApp aramaları, telefonunuzun konuşma paketindeki dakikalarınız yerine İnternet bağlantınızı kullanır. (Not: Veri &uuml;creti uygulanabilir. Ayrıntılar i&ccedil;in sağlayıcınıza başvurun. Ayrıca, 155 Polis İmdat ve diğer acil servis numaralarına WhatsApp aracılığıyla ulaşılamamaktadır).<br />\r\n<br />\r\n&bull; GRUP SOHBETİ: Kişilerinizle grup sohbetlerinin tadını &ccedil;ıkarabilir, b&ouml;ylece ailenizle ve arkadaşlarınızla kolayca haberleşebilirsiniz.<br />\r\n<br />\r\n&bull; WHATSAPP WEB: Bilgisayarınızın tarayıcısından da WhatsApp mesajı alıp g&ouml;nderebilirsiniz.<br />\r\n<br />\r\n&bull; ULUSLARARASI &Uuml;CRET YOK: Uluslararası WhatsApp mesajı g&ouml;ndermek i&ccedil;in ek bir &uuml;cret &ouml;demenize gerek yoktur. D&uuml;nyanın d&ouml;rt bir yanındaki arkadaşlarınızla sohbet edebilir, uluslararası SMS &uuml;cretinden kurtulabilirsiniz.*<br />\r\n<br />\r\n&bull; KULLANICI ADI VE PIN KULLANMANIZA GEREK YOK: Başka bir PIN veya kullanıcı adı hatırlamayı neden kafanıza takacaksınız ki? WhatsApp, tıpkı SMS gibi, telefon numaranızla &ccedil;alışır ve var olan telefon rehberinizle kolayca eşleşir.<br />\r\n<br />\r\n&bull; OTURUMUNUZ HEP A&Ccedil;IK: WhatsApp ile her zaman bağlı olacağınız i&ccedil;in hi&ccedil;bir mesajı ka&ccedil;ırmayacaksınız. Ve oturumunuzun a&ccedil;ık mı yoksa kapalı mı olduğunu d&uuml;ş&uuml;nmek zorunda kalmayacaksınız.<br />\r\n<br />\r\n&bull; KİŞİLERİNİZLE KOLAYCA İLETİŞİME GE&Ccedil;İN: Telefon rehberiniz, WhatsApp kullanan kişilerinizle kolayca ve hızlıca iletişime ge&ccedil;menizi sağlar. Bu sayede hatırlaması zor kullanıcı adlarını eklemenize gerek kalmaz.<br />\r\n<br />\r\n&bull; &Ccedil;EVRİMDIŞI MESAJLAR: Bildirimleri ka&ccedil;ırdığınızda veya telefonunuz kapalı olduğunda WhatsApp, uygulamayı kullanacağınız bir sonraki sefere kadar son mesajlarınızı saklar.<br />\r\n<br />\r\n&bull; VE &Ccedil;OK DAHA FAZLASI: Konumunuzu paylaşın, kişi bilgisi g&ouml;nderip alın, &ouml;zel arka planlar belirleyin, bildirim seslerini ayarlayın, sohbet ge&ccedil;mişinizi e-postalayın, tek seferde bir&ccedil;ok kişiye toplu mesaj g&ouml;nderin ve &ccedil;ok daha fazlasını yapın!<br />\r\n<br />\r\n\\*Veri &uuml;creti uygulanabilir. Ayrıntılar i&ccedil;in sağlayıcınıza başvurun.<br />\r\n<br />\r\n---------------------------------------------------------<br />\r\nSizden haber almak bizi her zaman mutlu eder! Eğer bir &ouml;neriniz, sorunuz veya merak ettiğiniz konu varsa l&uuml;tfen bize e-posta ile ulaşın:<br />\r\n<br />\r\nandroid-support@whatsapp.com<br />\r\n<br />\r\nVeya bizi twitter&#39;da takip edin:<br />\r\n<br />\r\nhttp://twitter.com/WhatsApp<br />\r\n@WhatsApp<br />\r\n---------------------------------------------------------</p>\r\n', 'Cihaza göre değişir', 'Cihaza göre değişir', 'Android ve iOS için cihaza göre değişir', 'https://play.google.com/store/apps/details?id=com.whatsapp', 'https://apps.apple.com/tr/app/whatsapp-messenger/id310633997?l=tr', '', '4,3', 'whatsapp-messenger', 2, 1, 1, '2020-01-15 13:05:35', '0000-00-00 00:00:00'),
(2, 'Spotify - Müzik ve Podcast\'ler', 'ezgif-1-18ed7917cd17.png', 21, 8, '<p>Spotify şimdi cep telefonu ve tabletlerde &uuml;cretsiz. Nerede olursan ol doğru m&uuml;zikleri ve podcast&#39;leri dinle.<br />\r\n<br />\r\nSpotify&#39;la bir d&uuml;nya dolusu m&uuml;ziğe ve podcast&#39;e erişimin olur. Sanat&ccedil;ıları ve alb&uuml;mleri dinleyebilir veya en sevdiğin şarkılardan oluşan kendi &ccedil;alma listelerini oluşturabilirsin. Yeni m&uuml;zikleri keşfetmek ister misin? Ruh haline uygun hazır &ccedil;alma listelerinden birini se&ccedil; veya kişiye &ouml;zel &ouml;neriler al.<br />\r\n<br />\r\nSpotify, hi&ccedil;bir yerde bulamayacağın orijinal podcast&#39;ler de dahil binlerce Podcast sunar.<br />\r\n<br />\r\nCep telefonunda &uuml;cretsiz dinle<br />\r\n&bull; İstediğin sanat&ccedil;ı, alb&uuml;m veya &ccedil;alma listesini karışık modunda &ccedil;al.<br />\r\n<br />\r\nTablette &uuml;cretsiz dinle<br />\r\nİstediğin şarkıyı istediğin zaman &ccedil;al.<br />\r\n<br />\r\nSpotify Premium &ouml;zellikleri<br />\r\n&bull; İstediğin şarkıyı istediğin zaman istediğin cihazda dinle: cep telefonunda, tabletinde veya bilgisayarında.<br />\r\n&bull; Harika ses kalitesinin tadını &ccedil;ıkar.<br />\r\n&bull; Reklam yok, sadece sınırsız m&uuml;zik var.<br />\r\n&bull; Taahh&uuml;t yok, istediğin zaman iptal et.<br />\r\n<br />\r\n<br />\r\nSpotify&#39;ı seviyor musun?<br />\r\nBizi Facebook&#39;da beğen: http://www.facebook.com/spotify<br />\r\nBizi Twitter&#39;da takip et: http://twitter.com/spotify</p>\r\n', 'Cihaza göre değişir', '8.5.40.195', 'Cihaza göre değişir', 'https://play.google.com/store/apps/details?id=com.spotify.music', 'https://apps.apple.com/tr/app/spotify-m%C3%BCzik-ve-podcastler/id324684580?l=tr', '', '4,5', 'spotify-muzik-ve-podcastler', 2, 1, 1, '2020-01-15 13:08:16', '0000-00-00 00:00:00'),
(3, 'Twitter', 'ezgif-1-47e63fec6184.png', 1, 1, '<p>Son dakika haberleri ve eğlenceden spor, politika ve g&uuml;nl&uuml;k ilgi alanlarına kadar d&uuml;nyada olup biten her şey &ouml;nce Twitter&#39;da g&ouml;r&uuml;l&uuml;r. Hikayeyi t&uuml;m y&ouml;nleriyle g&ouml;r. Sohbete katıl. Twitter d&uuml;nyada olup bitenlerin ve insanların şu anda konuştuklarının nabzının tutulduğu yerdir.<br />\r\n<br />\r\nDiğer &ouml;ne &ccedil;ıkanlar:<br />\r\nZaman Akışı<br />\r\n- Spor, haber, politika ve eğlence alanlarındaki en sevdiğin d&uuml;ş&uuml;nce liderlerinin nelerden bahsettiğini keşfet<br />\r\n- Fotoğraf, video ve GIF&#39;ler gibi dinamik medyaları deneyimle<br />\r\n- Zaman akışındaki Tweetleri Retweetle, paylaş, beğen veya yanıtla<br />\r\n- Hayatında olup bitenleri d&uuml;nyaya bildirmek i&ccedil;in Tweet yaz<br />\r\n<br />\r\nKeşfet<br />\r\n- Şu anda hangi konu ve etiketlerin g&uuml;ndemde olduğuna bak<br />\r\n- G&uuml;n&uuml;m&uuml;z&uuml;n en b&uuml;y&uuml;k etkinliklerinin en iyilerini sergileyen Anları ve d&uuml;zenlenmiş hikayeleri keşfet<br />\r\n- Haber başlıklarına ve videolara dal<br />\r\n- Spordaki en son &ouml;nemli anları yeniden yaşa<br />\r\n- Pop&uuml;ler k&uuml;lt&uuml;r ve eğlence hakkında bilgi sahibi ol<br />\r\n- Eğlenceli viral hikayelere bak<br />\r\n<br />\r\nBildirimler<br />\r\n- Seni kimin takip etmeye başladığını &ouml;ğren<br />\r\n- Hangi Tweetlerinin beğenildiğini veya Retweetlendiğini keşfet<br />\r\n- Yanıtlara karşılık ver veya bahsedildiğin Tweetler i&ccedil;in uyarı al<br />\r\n<br />\r\nMesajlar<br />\r\n- Arkadaşların ve takip&ccedil;ilerinle &ouml;zel olarak sohbet et<br />\r\n- Tweetleri ve diğer medyaları paylaş<br />\r\n- Seni takip edenlerle grup sohbeti oluştur<br />\r\n<br />\r\nProfil<br />\r\n- Fotoğraf, a&ccedil;ıklama, konum ve arka plan fotoğrafıyla profilini &ouml;zelleştir<br />\r\n- Tweet, Retweet, yanıt, medya ve beğenilerine d&ouml;n&uuml;p tekrar bak</p>\r\n', 'Cihaza göre değişir', 'Cihaza göre değişir', 'Cihaza göre değişir', 'https://play.google.com/store/apps/details?id=com.twitter.android', 'https://apps.apple.com/tr/app/twitter/id333903271?l=tr', '', '4,5', 'twitter', 0, 1, 1, '2020-01-15 13:10:03', '0000-00-00 00:00:00'),
(4, 'Codetify Yazılım', 'ezgif_com-webp-to-png', 34, 1, '<p>Codetify ekibi olarak yaşam tarzınızı kodluyoruz;<br />\r\n<br />\r\n-Yazılım<br />\r\nEn yeni ve g&uuml;ncel teknolojileri kullanarak profesyonel bir ekiple &ouml;zg&uuml;n yazılımlar yapıyoruz.!<br />\r\n<br />\r\n-Tasarım<br />\r\nG&uuml;ncel tasarım trendlerini g&ouml;z &ouml;n&uuml;nde bulundurarak profesyonel bir ekiple &ouml;zg&uuml;n tasarımlar yapıyoruz.!<br />\r\n<br />\r\n-Eğitim<br />\r\nG&uuml;ncel tasarım trendlerini g&ouml;z &ouml;n&uuml;nde bulundurarak profesyonel bir ekiple &ouml;zg&uuml;n tasarımlar yapıyoruz.!<br />\r\n<br />\r\nDaha detaylı bilgi i&ccedil;in l&uuml;tfen https://codetify.net adresinde bulunan iletişim formundan veya bilgi@codetify.net e-posta adresini kullanarak bizimle iletişime ge&ccedil;ebilirsiniz...</p>\r\n', '1,2MB', '1.1', 'Android için 4.0.3 ve sonrası', 'https://play.google.com/store/apps/details?id=com.mobile.codetify', '', '', '', 'codetify-yazilim', 24, 1, 1, '2020-01-15 13:14:21', '2020-01-15 13:15:32'),
(5, 'Shazam', 'ezgif-1-c6752a680d383.png', 21, 11, '<p>Shazam d&uuml;nyanın en pop&uuml;ler uygulamalarından biridir. M&uuml;zik tanımlamak, şarkı s&ouml;z&uuml; edinmek ve şimdi de sanat&ccedil;ıların kendilerinin keşfettikleri m&uuml;zikleri keşfetmek i&ccedil;in her ay 100 milyondan fazla kişi tarafından kullanılmaktadır.<br />\r\n<br />\r\nM&uuml;ziği anında tespit ve sevdiğin sanat&ccedil;ılarla m&uuml;zik keşfetme heyecanını paylaş.<br />\r\n<br />\r\n&bull; Şarkı s&ouml;zlerini ve videoları keşfet<br />\r\n&bull; Şarkıları &ouml;n izle ve Spotify &ccedil;alma listelerine ekle<br />\r\n&bull; Yeni m&uuml;zikleri keşfetmek i&ccedil;in tavsiye edilen şarkılara bak<br />\r\n&bull; Shazam&#39;ın ger&ccedil;ek zamanlı listeleriyle g&uuml;ncel kal<br />\r\n&bull; Takip ettiğin sanat&ccedil;ılarıa ait yeni single&#39;lar, alb&uuml;mler ve klipler hakkında en son bilgileri al.<br />\r\n<br />\r\nBAĞLAN VE PAYLAŞ<br />\r\n<br />\r\n&bull; Facebook hesabını bağladığında arkadaşlarının neleri Shazamladığını g&ouml;r.<br />\r\n&bull; Bulduklarını Facebook, Twitter, WhatsApp, Pinterest, ve diğer mecralarda paylaş...<br />\r\n<br />\r\nG&Ouml;R&Uuml;NENDEN FAZLA<br />\r\n<br />\r\n&bull; Shazam g&ouml;rsel tanıma, sana daha fazlasını veriyor. Shazam posterleri, dergi veya kitaplar &uuml;zerinde, Shazam kamera logosunu g&ouml;rd&uuml;ğ&uuml;n her yerde kamera simgesine dokun<br />\r\n<br />\r\nShazam&#39;ı istediğin kadar kullan. Sınırsızdır.<br />\r\n<br />\r\nBazı &ouml;zellikler yer, cihaz ve uygulama versiyonundan bağımsızdır</p>\r\n', 'Cihaza göre değişir', 'Cihaza göre değişir', 'Cihaza göre değişir', 'https://play.google.com/store/apps/details?id=com.shazam.android', 'https://apps.apple.com/tr/app/shazam/id284993459?l=tr', '', '4,4', 'shazam', 1, 1, 1, '2020-01-15 13:17:31', '0000-00-00 00:00:00'),
(6, 'YouTube Go', 'yt.png', 30, 6, '<p><strong>Karşınızda YouTube Go ', 'Cihaza göre değişir', '2.49.53', 'Android için 4.2 ve sonrası', 'https://play.google.com/store/apps/details?id=com.google.android.apps.youtube.mango', '', '', '4,1', 'youtube-go', 0, 1, 1, '2020-01-15 13:20:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyg_ekran_goruntuleri`
--

DROP TABLE IF EXISTS `uyg_ekran_goruntuleri`;
CREATE TABLE IF NOT EXISTS `uyg_ekran_goruntuleri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uygulama_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyg_ekran_goruntuleri`
--

INSERT INTO `uyg_ekran_goruntuleri` (`id`, `resim`, `resim_url`, `uygulama_id`) VALUES
(1, '1.png', 'http://localhost/cymarket/uploads/1.png', 4),
(2, '3.png', 'http://localhost/cymarket/uploads/3.png', 4),
(3, '2.png', 'http://localhost/cymarket/uploads/2.png', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yapimcilar`
--

DROP TABLE IF EXISTS `yapimcilar`;
CREATE TABLE IF NOT EXISTS `yapimcilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yapimci_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yapimci_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yapimci_durum` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yapimcilar`
--

INSERT INTO `yapimcilar` (`id`, `yapimci_adi`, `yapimci_url`, `yapimci_durum`, `yazar_id`, `createdAt`, `updatedAt`) VALUES
(1, 'Codetify', 'codetify', 1, 1, '2020-01-15 12:54:11', '0000-00-00 00:00:00'),
(2, 'Supercell', 'supercell', 1, 1, '2020-01-15 12:54:18', '0000-00-00 00:00:00'),
(3, 'Netflix, Inc', 'netflix-inc', 1, 1, '2020-01-15 12:54:32', '0000-00-00 00:00:00'),
(4, 'Outfit7 Limited', 'outfit7-limited', 1, 1, '2020-01-15 12:54:53', '0000-00-00 00:00:00'),
(5, 'WhatsApp Inc.', 'whatsapp-inc', 1, 1, '2020-01-15 12:55:01', '0000-00-00 00:00:00'),
(6, 'Google LLC.', 'google-llc', 1, 1, '2020-01-15 12:55:11', '0000-00-00 00:00:00'),
(7, 'Panzerdog', 'panzerdog', 1, 1, '2020-01-15 12:55:21', '0000-00-00 00:00:00'),
(8, 'Spotify Ltd.', 'spotify-ltd', 1, 1, '2020-01-15 13:07:18', '0000-00-00 00:00:00'),
(9, 'Twitter, Inc.', 'twitter-inc', 1, 1, '2020-01-15 13:09:28', '0000-00-00 00:00:00'),
(10, 'Mojang', 'mojang', 1, 1, '2020-01-15 13:12:42', '0000-00-00 00:00:00'),
(11, 'Apple, Inc', 'apple-inc', 1, 1, '2020-01-15 13:16:07', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
