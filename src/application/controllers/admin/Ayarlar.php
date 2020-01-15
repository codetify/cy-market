<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayarlar extends CI_Controller {

    public function __construct(){
         parent::__construct();

        $user = $this->session->userdata("user");

        if(!$user){
            redirect(base_url("admin"));
        }
    }
    
	public function index(){
        
        //Ayarları veritabanından getirme
        $genel_ayarlar = $this->ayarlar_model->get_all();
        
        //2 Adet data gönderme
        $data = array(
        'genel_ayarlar' => $genel_ayarlar,
        'title' => "Genel Ayarlar | Admin Paneli",
        );
        $this->load->view("admin/ayarlar", $data);
	}

    
    public function update(){

            $site_logo = $_FILES["site_logo"]["name"];

            if($site_logo){

                $config["upload_path"]   = "uploads/";
                $config["allowed_types"] = "gif|jpg|png";
        
                $this->load->library("upload", $config);       
        
                if($this->upload->do_upload("site_logo")){
        
                    $site_logo = $_FILES["site_logo"]["name"];
        
                    //Resim varsa
                    $data = array(
                        "site_logo" => $site_logo,
                        "site_title" => $this->input->post("site_title"),
                        "site_adi" => $this->input->post("site_adi"),
                        "site_description" => $this->input->post("site_description"),
                        "site_keywords" => $this->input->post("site_keywords"),
                        "anasayfa_uygulama_sayisi" => $this->input->post("anasayfa_uygulama_sayisi"),
                        "anasayfa_oyun_sayisi" => $this->input->post("anasayfa_oyun_sayisi"),
                        "arama_uy_oy_sayisi" => $this->input->post("arama_uy_oy_sayisi"),
                        "anasayfa_kategori_sayisi" => $this->input->post("anasayfa_kategori_sayisi"),
                        "anasayfa_slider_sayisi" => $this->input->post("anasayfa_slider_sayisi"),
                        "anasayfa_ust_siralar_sayisi" => $this->input->post("anasayfa_ust_siralar_sayisi"),
                        "anasayfa_yeni_cikanlar_sayisi" => $this->input->post("anasayfa_yeni_cikanlar_sayisi"),
                        "anasayfa_guncellenenler_sayisi" => $this->input->post("anasayfa_guncellenenler_sayisi"),
                        "anasayfa_yapimci_sayisi" => $this->input->post("anasayfa_yapimci_sayisi"),
                        "site_facebook" => $this->input->post("site_facebook"),
                        "site_twitter" => $this->input->post("site_twitter"),
                        "site_instagram" => $this->input->post("site_instagram"),
                        "site_youtube" => $this->input->post("site_youtube"),
                        "site_disqus_adres" => $this->input->post("site_disqus_adres"),
                        "guncelleyen_id" => $this->input->post("guncelleyen_id"),
                        "updatedAt" => date("Y-m-d H:i:s")
                        );

                } else {
        
                    $alert = array(
                        "title" => "İşlem Başarısızdır!!",
                        "text" => "Upload işlemi sırasında bir hata oluştu...",
                        "type" => "error"
                    );
                }
        
        
        
            } else {
                //Resim yoksa
                $data = array(
                    "site_title" => $this->input->post("site_title"),
                    "site_adi" => $this->input->post("site_adi"),
                    "site_description" => $this->input->post("site_description"),
                    "site_keywords" => $this->input->post("site_keywords"),
                    "anasayfa_uygulama_sayisi" => $this->input->post("anasayfa_uygulama_sayisi"),
                    "anasayfa_oyun_sayisi" => $this->input->post("anasayfa_oyun_sayisi"),
                    "arama_uy_oy_sayisi" => $this->input->post("arama_uy_oy_sayisi"),
                    "anasayfa_kategori_sayisi" => $this->input->post("anasayfa_kategori_sayisi"),
                    "anasayfa_slider_sayisi" => $this->input->post("anasayfa_slider_sayisi"),
                    "anasayfa_ust_siralar_sayisi" => $this->input->post("anasayfa_ust_siralar_sayisi"),
                    "anasayfa_yeni_cikanlar_sayisi" => $this->input->post("anasayfa_yeni_cikanlar_sayisi"),
                    "anasayfa_guncellenenler_sayisi" => $this->input->post("anasayfa_guncellenenler_sayisi"),
                    "anasayfa_yapimci_sayisi" => $this->input->post("anasayfa_yapimci_sayisi"),
                    "site_facebook" => $this->input->post("site_facebook"),
                    "site_twitter" => $this->input->post("site_twitter"),
                    "site_instagram" => $this->input->post("site_instagram"),
                    "site_youtube" => $this->input->post("site_youtube"),
                    "site_disqus_adres" => $this->input->post("site_disqus_adres"),
                    "guncelleyen_id" => $this->input->post("guncelleyen_id"),
                    "updatedAt" => date("Y-m-d H:i:s")
                );
        
            }

            
        
        $update = $this->ayarlar_model->update($data);
        
        if($update){
            
            $alert = array(
                "title" => "İşlem Başarılıdır",
                "text" => "Güncelleme işlemi başarılıdır...",
                "type" => "success"
            );
        }
        else{
            $alert = array(
                "title" => "İşlem Başarısızdır!!",
                "text" => "Güncelleme işlemi başarısızdır...",
                "type" => "error"
            );
        }
        
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("admin/ayarlar"));
    }
        

}