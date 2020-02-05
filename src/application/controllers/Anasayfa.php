<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends Genel_MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('fonksiyonlar');
    }

    public function index(){

        //sayfalama
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $config['base_url'] = base_url();

        //uygulama
        $config_uyg['total_rows'] = $this->anasayfa_model->uygulama_sayisi();
        $config_uyg['per_page'] = $this->ayarlar->anasayfa_uygulama_sayisi;

        //oyun
        $config_oy['total_rows'] = $this->anasayfa_model->oyun_sayisi();
        $config_oy['per_page'] = $this->ayarlar->anasayfa_oyun_sayisi;

        $oyunlar_pag = $this->pagination->initialize($config_oy);
        $uygulamalar_pag = $this->pagination->initialize($config_uyg);

        //Ayarları veritabanından getirme
        $genel_ayarlar = $this->ayarlar_model->get_all();
        //Yazıların listesini veritabanından getirme
        $oyun_listesi = $this->anasayfa_model->sayfalama_oyunlari($config_uyg['per_page'], $sayfa * $config_uyg['per_page']);
        $uygulama_listesi = $this->anasayfa_model->sayfalama_uygulamalari($config_oy['per_page'], $sayfa * $config_oy['per_page']);


        //Slider listesi
        $config_sl['total_rows'] = $this->anasayfa_model->slider_sayisi();
        $config_sl['per_page'] = $this->ayarlar->anasayfa_slider_sayisi;
        $oyunlar_pag = $this->pagination->initialize($config_oy);
        $slider_listesi = $this->anasayfa_model->sayfalama_slider($config_sl['per_page'], $sayfa * $config_sl['per_page']);


        $ktg_list = $this->oyunlar_model->kategoriler_v2();
        $viewData["list"] = $ktg_list;

        $data = array(
            'kategoriler' => $ktg_list,
            'slider_listesi' => $slider_listesi,
            'slider_sayisi' => $config_sl['per_page'],
            'oyun_listesi' => $oyun_listesi,
            'uygulama_listesi' => $uygulama_listesi,
            'genel_ayarlar' => $genel_ayarlar
        );
        $this->load->view("anasayfa", $data);

    }

    public function oyun_icerik($url){

        $data["kategoriler"] = $this->oyunlar_model->kategoriler_v2();

        $oyun_url = $this->security->xss_clean($url);
        $data['oyun_icerik'] = $this->anasayfa_model->anasayfa_oyun_icerik($oyun_url);

        $id = $data['oyun_icerik']->id;
        $kategori_id = $data['oyun_icerik']->kategori_id;
        $url = $data['oyun_icerik']->oyun_url;

        $where_ekran = array("oyun_id" => $id);
        $data['ekran_goruntuleri'] = $this->oyunlar_model->ekran_goruntuleri_getir($where_ekran);

        $where_benzer = array("kategori_id" => $kategori_id);
        $data['benzer_oyunlar'] = $this->anasayfa_model->benzer_oyunlar($where_benzer);

        if (empty($data['oyun_icerik']->oyun_durum) || ($url == '')) {
            redirect(base_url());
        }

        $this->load->view("icerik-oyun", $data);

        $this->load->helper('cookie');
        $this->anasayfa_model->oyun_sayaci($id);
    }

    public function uygulama_icerik($url){

        $data["kategoriler"] = $this->uygulamalar_model->kategoriler_v2();

        $uygulama_url = $this->security->xss_clean($url);
        $data['uygulama_icerik'] = $this->anasayfa_model->anasayfa_uygulama_icerik($uygulama_url);

        $id = $data['uygulama_icerik']->id;
        $kategori_id = $data['uygulama_icerik']->kategori_id;
        $url = $data['uygulama_icerik']->uygulama_url;

        $where_ekran = array("uygulama_id" => $id);
        $data['ekran_goruntuleri'] = $this->uygulamalar_model->ekran_goruntuleri_getir($where_ekran);

        $where_benzer = array("kategori_id" => $kategori_id);
        $data['benzer_uygulamalar'] = $this->anasayfa_model->benzer_uygulamalar($where_benzer);

        if (empty($data['uygulama_icerik']->uygulama_durum) || ($url == '')) {
            redirect(base_url());
        }

        $this->load->view("icerik-uygulama", $data);

        $this->load->helper('cookie');
        $this->anasayfa_model->uygulama_sayaci($id);
    }


    public function kategori($kategori_url){

        $kategori_url = $this->security->xss_clean($kategori_url);

        $data['kategori'] = $this->kategoriler_model->kategori_getir($kategori_url);

        if (empty($data['kategori'])) {
            redirect(base_url());
        }

        $kategori_id = $data['kategori']->id;
        $kategori_title = $data['kategori']->kategori_adi;

        $data["kategoriler"] = $this->oyunlar_model->kategoriler_v2();

        $data['uygulamalar_kategori_title'] = html_escape('"'.$data['kategori']->kategori_adi).'"'.' kategorisine ait uygulamalar';
        $data['uyg_oyun_kategori_title'] = html_escape('"'.$data['kategori']->kategori_adi).'"'.' kategorisine ait uygulama ve oyunlar';
        $data['oyunlar_kategori_title'] = html_escape('"'.$data['kategori']->kategori_adi).'"'.' kategorisine ait oyunlar';
        $data['kategori_url'] = $data['kategori']->kategori_url;
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }

        $config['base_url'] = base_url() . '/kategori/' . $kategori_url;
        $config['uyg_total_rows'] = $this->anasayfa_model->kategori_uyg_sayisi($kategori_id);
        $config['oyn_total_rows'] = $this->anasayfa_model->kategori_oyn_sayisi($kategori_id);
        $config['per_page'] = $this->ayarlar->anasayfa_kategori_sayisi;
        $this->pagination->initialize($config);

        $data['oyun_listesi'] = $this->anasayfa_model->sayfalama_kategorileri_oyn($kategori_id, $config['per_page'], $sayfa * $config['per_page']);
        $data['uygulama_listesi'] = $this->anasayfa_model->sayfalama_kategorileri_uyg($kategori_id, $config['per_page'], $sayfa * $config['per_page']);


        $this->load->view('kategori', $data);

    }

    public function yapimci($yapimci_url){

        $yapimci_url = $this->security->xss_clean($yapimci_url);

        $data['yapimci'] = $this->yapimcilar_model->yapimcilari_getir($yapimci_url);

        if (empty($data['yapimci'])) {
            redirect(base_url());
        }

        $yapimci_id = $data['yapimci']->id;

        $data["yapimcilar"] = $this->oyunlar_model->yapimcilar_v2();

        $data['uygulamalar_yapimci_title'] = html_escape('"'.$data['yapimci']->yapimci_adi).'"'.' isimli yapımcıya ait uygulamalar';
        $data['uyg_oyun_yapimci_title'] = html_escape('"'.$data['yapimci']->yapimci_adi).'"'.' isimli yapımcıya ait uygulama ve oyunlar';
        $data['oyunlar_yapimci_title'] = html_escape('"'.$data['yapimci']->yapimci_adi).'"'.' isimli yapımcıya ait oyunlar';
        $data['yapimci_url'] = $data['yapimci']->yapimci_url;
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }

        $config['base_url'] = base_url() . '/yapimci/' . $yapimci_url;
        $config['uyg_total_rows'] = $this->anasayfa_model->yapimci_uyg_sayisi($yapimci_id);
        $config['oyn_total_rows'] = $this->anasayfa_model->yapimci_oyn_sayisi($yapimci_id);
        $config['per_page'] = $this->ayarlar->anasayfa_yapimci_sayisi;
        $this->pagination->initialize($config);

        $data['oyun_listesi'] = $this->anasayfa_model->sayfalama_yapimcilari_oyn($yapimci_id, $config['per_page'], $sayfa * $config['per_page']);
        $data['uygulama_listesi'] = $this->anasayfa_model->sayfalama_yapimcilari_uyg($yapimci_id, $config['per_page'], $sayfa * $config['per_page']);


        $this->load->view('yapimci', $data);

    }


    public function sayfa($sayfa_url){

        $sayfa_url = $this->security->xss_clean($sayfa_url);

        //index page
        if (empty($sayfa_url)) {
            redirect(base_url());
        }

        $data['sayfa'] = $this->anasayfa_model->sayfa($sayfa_url);

        if ($data['sayfa']->sayfa_durum == 0 || $data['sayfa']->sayfa_url == '') {
            redirect(base_url());
        } else {
            $data['sayfa_title'] = $data['sayfa']->sayfa_baslik;
            $data['sayfa_icerik'] = $data['sayfa']->sayfa_icerik;
            $data['sayfa_url'] = $data['sayfa']->sayfa_url;
            $this->load->view('sayfa', $data);

        }
    }

    public function arama(){

        $q = $this->input->get('q', TRUE);

        $data['q'] = $q;
        $data['arama_title'] = "'".$q. "' ". html_escape("için arama sonuçları");
        $data['arama_description'] = "'".$q. "' ". html_escape("için arama sonuçları");

        $data["kategoriler"] = $this->yazilar_model->kategoriler_v2();

        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $data['arama_yazi_sayisi'] = $this->anasayfa_model->arama_yazi_sayisi($q);

        $config['base_url'] = base_url() . '/arama?q=' . $q;
        $config['total_rows'] = $data['arama_yazi_sayisi'];
        $config['per_page'] = $this->ayarlar->anasayfa_yazi_sayisi;
        $this->pagination->initialize($config);

        $data['yazilar'] = $this->anasayfa_model->sayfalama_aramalari($q, $config['per_page'], $sayfa * $config['per_page']);

        $this->load->view('arama', $data);
    }

    public function ust_siralar(){

        //sayfalama
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $config['base_url'] = base_url();

        //uygulama
        $config_uyg['total_rows'] = $this->anasayfa_model->uygulama_sayisi();
        $config_uyg['per_page'] = $this->ayarlar->anasayfa_ust_siralar_sayisi;

        //oyun
        $config_oy['total_rows'] = $this->anasayfa_model->oyun_sayisi();
        $config_oy['per_page'] = $this->ayarlar->anasayfa_ust_siralar_sayisi;

        $oyunlar_pag = $this->pagination->initialize($config_oy);
        $uygulamalar_pag = $this->pagination->initialize($config_uyg);

        //Ayarları veritabanından getirme
        $genel_ayarlar = $this->ayarlar_model->get_all();
        //Yazıların listesini veritabanından getirme
        $oyun_listesi = $this->anasayfa_model->sayfalama_oyun_ust_siralar($config_uyg['per_page'], $sayfa * $config_uyg['per_page']);
        $uygulama_listesi = $this->anasayfa_model->sayfalama_uygulama_ust_siralar($config_oy['per_page'], $sayfa * $config_oy['per_page']);

        $data = array(
            'oyun_listesi' => $oyun_listesi,
            'uygulama_listesi' => $uygulama_listesi,
            'genel_ayarlar' => $genel_ayarlar
        );
        $this->load->view("ust-siralar", $data);

    }

    public function yeni_cikanlar(){

        //sayfalama
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $config['base_url'] = base_url();

        //uygulama
        $config_uyg['total_rows'] = $this->anasayfa_model->uygulama_sayisi();
        $config_uyg['per_page'] = $this->ayarlar->anasayfa_yeni_cikanlar_sayisi;

        //oyun
        $config_oy['total_rows'] = $this->anasayfa_model->oyun_sayisi();
        $config_oy['per_page'] = $this->ayarlar->anasayfa_yeni_cikanlar_sayisi;

        $oyunlar_pag = $this->pagination->initialize($config_oy);
        $uygulamalar_pag = $this->pagination->initialize($config_uyg);

        //Ayarları veritabanından getirme
        $genel_ayarlar = $this->ayarlar_model->get_all();
        //Yazıların listesini veritabanından getirme
        $oyun_listesi = $this->anasayfa_model->sayfalama_oyun_yeni_cikanlar($config_uyg['per_page'], $sayfa * $config_uyg['per_page']);
        $uygulama_listesi = $this->anasayfa_model->sayfalama_uygulama_yeni_cikanlar($config_oy['per_page'], $sayfa * $config_oy['per_page']);

        $data = array(
            'oyun_listesi' => $oyun_listesi,
            'uygulama_listesi' => $uygulama_listesi,
            'genel_ayarlar' => $genel_ayarlar
        );
        $this->load->view("yeni-cikanlar", $data);

    }

    public function guncellenenler(){

        //sayfalama
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $config['base_url'] = base_url();

        //uygulama
        $config_uyg['total_rows'] = $this->anasayfa_model->uygulama_sayisi();
        $config_uyg['per_page'] = $this->ayarlar->anasayfa_guncellenenler_sayisi;

        //oyun
        $config_oy['total_rows'] = $this->anasayfa_model->oyun_sayisi();
        $config_oy['per_page'] = $this->ayarlar->anasayfa_guncellenenler_sayisi;

        $oyunlar_pag = $this->pagination->initialize($config_oy);
        $uygulamalar_pag = $this->pagination->initialize($config_uyg);

        //Ayarları veritabanından getirme
        $genel_ayarlar = $this->ayarlar_model->get_all();
        //Yazıların listesini veritabanından getirme
        $oyun_listesi = $this->anasayfa_model->sayfalama_oyun_guncellenenler($config_uyg['per_page'], $sayfa * $config_uyg['per_page']);
        $uygulama_listesi = $this->anasayfa_model->sayfalama_uygulama_guncellenenler($config_oy['per_page'], $sayfa * $config_oy['per_page']);

        $data = array(
            'oyun_listesi' => $oyun_listesi,
            'uygulama_listesi' => $uygulama_listesi,
            'genel_ayarlar' => $genel_ayarlar
        );
        $this->load->view("guncellenenler", $data);

    }
}
