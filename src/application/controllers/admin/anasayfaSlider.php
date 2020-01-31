<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfaslider extends CI_Controller {

public function __construct(){
     parent::__construct();

    $user = $this->session->userdata("user");

    if(!$user){
        redirect(base_url("admin"));
    }
}

public function index(){

    $list = $this->anasayfaslider_model->get_all();

    $viewData["list"] = $list;

    //2 Adet data gönderme
    $data = array(
    'list' => $list,
    'title' => "Anasayfa Slider | Admin Paneli",
    );
    $this->load->view("admin/anasayfaslider", $data);
}

public function update_form($id){
    $where = array(
        "id" => $id
    );
    $slider = $this->anasayfaslider_model->get($where);


    $data = array(
    'slider' => $slider,
    'title' => "Slider Düzenle | Admin Paneli"
    );
    $data['slider_icerik'] = $this->anasayfaslider_model->get($where);
    if (is_null($data['slider_icerik']->slider_durum) || ($id == '')) {
        redirect(base_url("admin/slider"));
    }

    $this->load->view("admin/anasayfaslider_duzenle", $data);
}

public function update($id){

    $img = $_FILES["slider_resim"]["name"];

    if($img){

        $config["upload_path"]   = "uploads/";
        $config["allowed_types"] = "gif|jpg|png";

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("slider_resim");

        if($upload){

            //Resim varsa
            $data = array(
                "slider_baslik" => $this->input->post("slider_baslik"),
                "slider_url" => $this->input->post("slider_url"),
                "yazar_id" => $this->input->post("yazar_id"),
                "slider_resim" => $this->upload->data("file_name"),
                "slider_durum" => $this->input->post("slider_durum"),
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
            "slider_baslik" => $this->input->post("slider_baslik"),
            "slider_url" => $this->input->post("slider_url"),
            "yazar_id" => $this->input->post("yazar_id"),
            "slider_durum" => $this->input->post("slider_durum"),
            "updatedAt" => date("Y-m-d H:i:s")
        );

    }
    $where = array(
        "id" => $id,
    );
    $update = $this->anasayfaslider_model->update($where, $data);

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
    redirect(base_url("admin/slider"));
}

public function insert_form(){

    $data = array(
        'title' => "Slider Ekle | Admin Paneli"
    );

    $this->load->view("admin/anasayfaslider_ekle", $data);
}

public function insert(){

        $slider_baslik = $this->input->post("slider_baslik");
        $yazar_id    = $this->input->post("yazar_id");
        $slider_url = $this->input->post("slider_url");
        $slider_durum  = $this->input->post("slider_durum");
        $createdAt   = date("Y-m-d H:i:s");
        $img         = $_FILES["slider_resim"]["name"];

        if($slider_baslik && $yazar_id){

            if($img){

            $config["upload_path"]   = "uploads/";
            $config["allowed_types"] = "gif|jpg|png";

            $this->load->library("upload", $config);

            if($this->upload->do_upload("slider_resim")){

                $slider_resim = $this->upload->data("file_name");

                $data = array(
                    "slider_baslik"   => $slider_baslik,
                    "slider_url" => $slider_url,
                    "yazar_id"      => $yazar_id,
                    "slider_resim"    => $slider_resim,
                    "slider_durum"    => $slider_durum,
                    "createdAt"     => $createdAt
                );

                $insert = $this->anasayfaslider_model->insert($data);



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
                    "text" => "Resim yükleme işlemi başarısızdır...",
                    "type" => "error"
                );
            }
            } else {

                $data = array(
                    "slider_baslik"   => $slider_baslik,
                    "slider_url" => $slider_url,
                    "yazar_id"      => $yazar_id,
                    "slider_durum"    => $slider_durum,
                    "createdAt"     => $createdAt
                );

                $insert = $this->anasayfaslider_model->insert($data);

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

            }

        }else{

            $alert = array(
                "title" => "İşlem Başarısızdır!!",
                "text" => "Lütfen boş alan bırakmayınız...",
                "type" => "error"
            );
        }


        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("admin/slider"));


    }

public function delete($id){

    $where = array(
        "id" => $id
    );

    $delete = $this->anasayfaslider_model->delete($where);

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
    redirect(base_url("admin/slider"));
}


}