<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//
$route['sitemap\.xml'] = "Sitemap/index";
//
$route['admin'] = 'admin/Admin/index';
$route['admin/index'] = 'admin/Admin/index';
$route['admin/giris'] = 'admin/Admin/giris_yap';
$route['admin/cikis'] = 'admin/Admin/cikis_yap';
//
$route['default_controller'] = 'Anasayfa';
$route['anasayfa'] = 'Anasayfa/index';
$route['yorum-ekle'] = 'Anasayfa/yorum_ekle/insert';
$route['iletisim'] = 'Piletisim/index';
$route['iletisim/gonder'] = 'Piletisim/form_gonder';
$route['oyun/(:any)'] = 'Anasayfa/oyun_icerik/$1';
$route['uygulama/(:any)'] = 'Anasayfa/uygulama_icerik/$1';
$route['kategori/(:any)'] = 'Anasayfa/kategori/$1';
$route['yapimci/(:any)'] = 'Anasayfa/yapimci/$1';
$route['ust-siralar'] = 'Anasayfa/ust_siralar';
$route['yeni-cikanlar'] = 'Anasayfa/yeni_cikanlar';
$route['guncellenenler'] = 'Anasayfa/guncellenenler';
$route['sayfa/(:any)'] = 'Anasayfa/sayfa/$1';
$route['arama'] = 'Anasayfa/arama';
//
$route['admin/uygulamalar'] = 'admin/uygulamalar/index';
$route['admin/uygulamalar/ekle'] = 'admin/uygulamalar/insert_form';
$route['admin/uygulamalar/ekle/insert'] = 'admin/uygulamalar/insert';
$route['admin/uygulamalar/duzenle'] = 'admin/uygulamalar/update_form';
$route['admin/uygulamalar/duzenle/(:any)'] = 'admin/uygulamalar/update_form/$1';
$route['admin/uygulamalar/duzenle/update/(:any)'] = 'admin/uygulamalar/update/$1';
$route['admin/uygulamalar/sil/(:any)'] = 'admin/uygulamalar/delete/$1';
$route['admin/uygulamalar/ekran-goruntuleri/(:any)'] = 'admin/uygulamalar/ekran_goruntuleri/$1';
$route['admin/uygulamalar/ekran-goruntu/upload/(:any)'] = 'admin/uygulamalar/ekran_goruntuleri_upload/$1';
$route['admin/uygulamalar/ekran-goruntuleri/sil/(:any)'] = 'admin/uygulamalar/ekran_goruntuleri_sil/$1';
//
$route['admin/oyunlar'] = 'admin/oyunlar/index';
$route['admin/oyunlar/ekle'] = 'admin/oyunlar/insert_form';
$route['admin/oyunlar/ekle/insert'] = 'admin/oyunlar/insert';
$route['admin/oyunlar/duzenle'] = 'admin/oyunlar/update_form';
$route['admin/oyunlar/duzenle/(:any)'] = 'admin/oyunlar/update_form/$1';
$route['admin/oyunlar/duzenle/update/(:any)'] = 'admin/oyunlar/update/$1';
$route['admin/oyunlar/sil/(:any)'] = 'admin/oyunlar/delete/$1';
$route['admin/oyunlar/ekran-goruntuleri/(:any)'] = 'admin/oyunlar/ekran_goruntuleri/$1';
$route['admin/oyunlar/ekran-goruntu/upload/(:any)'] = 'admin/oyunlar/ekran_goruntuleri_upload/$1';
$route['admin/oyunlar/ekran-goruntuleri/sil/(:any)'] = 'admin/oyunlar/ekran_goruntuleri_sil/$1';
//
//
$route['admin/slider'] = 'admin/anasayfaslider/index';
$route['admin/slider/ekle'] = 'admin/anasayfaslider/insert_form';
$route['admin/slider/ekle/insert'] = 'admin/anasayfaslider/insert';
$route['admin/slider/duzenle'] = 'admin/anasayfaslider/update_form';
$route['admin/slider/duzenle/(:any)'] = 'admin/anasayfaslider/update_form/$1';
$route['admin/slider/duzenle/update/(:any)'] = 'admin/anasayfaslider/update/$1';
$route['admin/slider/sil/(:any)'] = 'admin/anasayfaslider/delete/$1';
//
$route['admin/yoneticiler'] = 'admin/yoneticiler/index';
$route['admin/yoneticiler/ekle'] = 'admin/yoneticiler/insert_form';
$route['admin/yoneticiler/ekle/insert'] = 'admin/yoneticiler/insert';
$route['admin/yoneticiler/duzenle'] = 'admin/yoneticiler/update_form';
$route['admin/yoneticiler/duzenle/(:any)'] = 'admin/yoneticiler/update_form/$1';
$route['admin/yoneticiler/duzenle/update/(:any)'] = 'admin/yoneticiler/update/$1';
$route['admin/yoneticiler/sil/(:any)'] = 'admin/yoneticiler/delete/$1';
//
$route['admin/ayarlar'] = 'admin/ayarlar/index';
$route['admin/ayarlar/update'] = 'admin/ayarlar/update';

//
$route['admin/iletisim'] = 'admin/piletisim/index';
$route['admin/iletisim/(:num)'] = 'admin/piletisim/iletisim_icerik/$1';
$route['admin/iletisim/sil/(:any)'] = 'admin/piletisim/delete/$1';

//Kategoriler
$route['admin/kategoriler'] = 'admin/kategoriler/index';
$route['admin/kategoriler/ekle'] = 'admin/kategoriler/insert_form';
$route['admin/kategoriler/ekle/insert'] = 'admin/kategoriler/insert';
$route['admin/kategoriler/duzenle'] = 'admin/kategoriler/update_form';
$route['admin/kategoriler/duzenle/(:any)'] = 'admin/kategoriler/update_form/$1';
$route['admin/kategoriler/duzenle/update/(:any)'] = 'admin/kategoriler/update/$1';
$route['admin/kategoriler/sil/(:any)'] = 'admin/kategoriler/delete/$1';
//Kategoriler

//Yapımcılar
$route['admin/yapimcilar'] = 'admin/yapimcilar/index';
$route['admin/yapimcilar/ekle'] = 'admin/yapimcilar/insert_form';
$route['admin/yapimcilar/ekle/insert'] = 'admin/yapimcilar/insert';
$route['admin/yapimcilar/duzenle'] = 'admin/yapimcilar/update_form';
$route['admin/yapimcilar/duzenle/(:any)'] = 'admin/yapimcilar/update_form/$1';
$route['admin/yapimcilar/duzenle/update/(:any)'] = 'admin/yapimcilar/update/$1';
$route['admin/yapimcilar/sil/(:any)'] = 'admin/yapimcilar/delete/$1';
//Yapımcılar

//Sayfalar
$route['admin/sayfalar'] = 'admin/sayfalar/index';
$route['admin/sayfalar/ekle'] = 'admin/sayfalar/insert_form';
$route['admin/sayfalar/ekle/insert'] = 'admin/sayfalar/insert';
$route['admin/sayfalar/duzenle'] = 'admin/sayfalar/update_form';
$route['admin/sayfalar/duzenle/(:any)'] = 'admin/sayfalar/update_form/$1';
$route['admin/sayfalar/duzenle/update/(:any)'] = 'admin/sayfalar/update/$1';
$route['admin/sayfalar/sil/(:any)'] = 'admin/sayfalar/delete/$1';
//Sayfalar
