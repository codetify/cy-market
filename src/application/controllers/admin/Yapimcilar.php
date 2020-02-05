<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yapimcilar extends CI_Controller {

    public function __construct(){
         parent::__construct();
         
        $user = $this->session->userdata("user");
        if(!$user){
        redirect(base_url("admin"));
        }
        
      
     }
    
	public function index(){

        $list = $this->yapimcilar_model->get_all();
        $viewData["list"] = $list;
        $data = array(
        'list' => $list,
        'title' => "Yapımcılar | Admin Paneli",
        );
        $this->load->view("admin/yapimcilar",  $data);
        
	} 
    
    public function insert_form(){

        $data = array(
        'title' => "Yapımcı Ekle | Admin Paneli",
        );
        $this->load->view("admin/yapimci_ekle", $data);
    }
    public function insert(){        
        $yapimci_adi = $this->input->post("yapimci_adi");
        if($this->input->post("yapimci_url") == '') {
            $yapimci_url = str_slug($this->input->post("yapimci_adi"));
        } else {
            $yapimci_url = $this->input->post("yapimci_url");
        }
        $yapimci_durum = $this->input->post("yapimci_durum");
        $yazar_id = $this->input->post("yazar_id");
        $createdAt   = date("Y-m-d H:i:s");
        
        if($yapimci_adi && $yapimci_durum && $yazar_id){
            
            $data = array(
                "yapimci_adi"   => $yapimci_adi,
                "yapimci_url"   => $yapimci_url,
                "yapimci_durum"   => $yapimci_durum,
                "yazar_id"   => $yazar_id,
                "createdAt"     => $createdAt
            );
            $insert = $this->yapimcilar_model->insert($data);
                        
            if($insert){
            $alert = array(
                "title" => "İşlem Başarılıdır",
                "text" => "Ekleme işlemi başarılıdır...",
                "type" => "success"
            );
            }
            else{
            $alert = array(
                "title" => "İşlem Başarısızdır!!",
                "text" => "Ekleme işlemi başarısızdır...",
                "type" => "error"
            );
            } 
        }else{
            
            $alert = array(
                "title" => "İşlem Başarısızdır!!",
                "text" => "Lütfen boş alan bırakmayınız...",
                "type" => "error"
            );
        }
        
        
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("admin/yapimcilar"));
        

    }
    
    public function update_form($id){
        
        $where = array(
            "id" => $id
        );
        
        $yapimcilar = $this->yapimcilar_model->get($where);


        $data = array(
        'yapimcilar' => $yapimcilar,
        'title' => "Yapımcı Düzenle | Admin Paneli"
        );

        $data['yapimcilar'] = $this->yapimcilar_model->get($where);
        if (is_null($data['yapimcilar']->yapimci_durum) || ($id == '')) {
            redirect(base_url("admin/yapimcilar"));
        }

        $this->load->view("admin/yapimci_duzenle", $data);
    }
    
    public function update($id){

        $yapimci_adi = $this->input->post("yapimci_adi");
        if($this->input->post("yapimci_url") == '') {
            $yapimci_url = str_slug($this->input->post("yapimci_adi"));
        } else {
            $yapimci_url = $this->input->post("yapimci_url");
        }
        $yapimci_durum = $this->input->post("yapimci_durum");
        $yazar_id = $this->input->post("yazar_id");
        $createdAt   = date("Y-m-d H:i:s");

        $data = array(
            "yapimci_adi"   => $yapimci_adi,
            "yapimci_url"   => $yapimci_url,
            "yapimci_durum"   => $yapimci_durum,
            "yazar_id"   => $yazar_id,
            "createdAt"     => $createdAt
        );

        $where = array(
            "id" => $id,
        );
        
        $update = $this->yapimcilar_model->update($where, $data);
        
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
        redirect(base_url("admin/yapimcilar"));
    }
    
    public function delete($id){
        
        $where = array(
            "id" => $id
        );
        
        $delete = $this->yapimcilar_model->delete($where);
        
        if($delete){
            
            $alert = array(
                "title" => "İşlem Başarılıdır!!",
                "text" => "Silme işlemi başarılıdır...",
                "type" => "success"
            );
        }else {
            
            $alert = array(
                "title" => "İşlem Başarısızdır!!",
                "text" => "Silme işlemi başarısızdır...",
                "type" => "error"
            );
        }
        
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("admin/yapimcilar"));
    }
    

}