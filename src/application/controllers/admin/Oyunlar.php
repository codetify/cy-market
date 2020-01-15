<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oyunlar extends CI_Controller {

public function __construct(){
     parent::__construct();

    $user = $this->session->userdata("user");

    if(!$user){
        redirect(base_url("admin"));
    }
}

public function index(){

    $list = $this->oyunlar_model->get_all();

    $viewData["list"] = $list;

    //2 Adet data gönderme
    $data = array(
    'list' => $list,
    'title' => "Oyunlar | Admin Paneli",
    );
    $this->load->view("admin/oyunlar", $data);
}

public function update_form($id){
    $where = array("id" => $id);
    $where_ekran = array("oyun_id" => $id);

    $kategori_list = $this->oyunlar_model->kategoriler_v2();
    $yapimci_list = $this->oyunlar_model->yapimcilar_v2();
    $ekran_goruntuleri = $this->oyunlar_model->ekran_goruntuleri_getir($where_ekran);

    $oyunlar = $this->oyunlar_model->get($where);


    $data = array(
    'oyunlar' => $oyunlar,
    'kategori_list' => $kategori_list,
    'yapimci_list' => $yapimci_list,
    'ekran_goruntuleri' => $ekran_goruntuleri,
    'title' => "Oyun Düzenle | Admin Paneli"
    );
    $data['oyun_aciklama'] = $this->oyunlar_model->get($where);
    if (is_null($data['oyun_aciklama']->oyun_durum) || ($id == '')) {
        redirect(base_url("admin/oyunlar"));
    }

    $this->load->view("admin/oyun_duzenle", $data); 
}

public function update($id){

    $oyun_icon = $_FILES["oyun_icon"]["name"];

    if($oyun_icon){

        $config["upload_path"]   = "uploads/";
        $config["allowed_types"] = "gif|jpg|png";

        $this->load->library("upload", $config);       

        if($this->upload->do_upload("oyun_icon")){

            if($this->input->post("oyun_url") == '') {
                $oyun_url = str_slug($this->input->post("oyun_baslik"));
            } else {
                $oyun_url = $this->input->post("oyun_url");
            }

            $oyun_icon = $_FILES["oyun_icon"]["name"];

            //Resim varsa
            $data = array(
                "oyun_baslik" => $this->input->post("oyun_baslik"),
                "oyun_icon" => $oyun_icon,
                "kategori_id" => $this->input->post("oyun_kategori"),
                "yapimci_id" => $this->input->post("oyun_yapimci"),
                "oyun_aciklama" => $this->upload->data("oyun_aciklama"),
                "oyun_boyut" => $this->input->post("oyun_boyut"),
                "oyun_surum" => $this->input->post("oyun_surum"),
                "oyun_and_ios" => $this->input->post("oyun_and_ios"),
                "oyun_google_link" => $this->input->post("oyun_google_link"),
                "oyun_apple_link" => $this->input->post("oyun_apple_link"),
                "oyun_apk_link" => $this->input->post("oyun_apk_link"),
                "oyun_puan" => $this->input->post("oyun_puan"),
                "oyun_url" => $oyun_url,
                "oyun_durum" => $this->input->post("oyun_durum"),
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
        if($this->input->post("oyun_url") == '') {
            $oyun_url = str_slug($this->input->post("oyun_baslik"));
        } else {
            $oyun_url = $this->input->post("oyun_url");
        }
        //Resim yoksa
        $data = array(
            "oyun_baslik" => $this->input->post("oyun_baslik"),
            "kategori_id" => $this->input->post("oyun_kategori"),
            "yapimci_id" => $this->input->post("oyun_yapimci"),
            "oyun_aciklama" => $this->input->post("oyun_aciklama"),
            "oyun_boyut" => $this->input->post("oyun_boyut"),
            "oyun_surum" => $this->input->post("oyun_surum"),
            "oyun_and_ios" => $this->input->post("oyun_and_ios"),
            "oyun_google_link" => $this->input->post("oyun_google_link"),
            "oyun_apple_link" => $this->input->post("oyun_apple_link"),
            "oyun_apk_link" => $this->input->post("oyun_apk_link"),
            "oyun_puan" => $this->input->post("oyun_puan"),
            "oyun_url" => $oyun_url,
            "oyun_durum" => $this->input->post("oyun_durum"),
            "updatedAt" => date("Y-m-d H:i:s")
        );

    }
    $where = array(
        "id" => $id,
    );
    $update = $this->oyunlar_model->update($where, $data);

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
    redirect(base_url("admin/oyunlar"));
}

public function insert_form(){

    $kategori_list = $this->oyunlar_model->kategoriler_v2();
    $yapimci_list = $this->oyunlar_model->yapimcilar_v2();
    $viewData["kategori_list"] = $kategori_list;
    $viewData["yapimci_list"] = $yapimci_list;
    $data = array(
        'kategori_list' => $kategori_list,
        'yapimci_list' => $yapimci_list,
        'title' => "Oyun Ekle | Admin Paneli"
    );

    $this->load->view("admin/oyun_ekle", $data);
}

public function insert(){

        $oyun_baslik = $this->input->post("oyun_baslik");
        $kategori_id = $this->input->post("oyun_kategori");
        $yapimci_id = $this->input->post("oyun_yapimci");
        $oyun_aciklama = $this->input->post("oyun_aciklama");
        $oyun_boyut = $this->input->post("oyun_boyut");
        $oyun_surum = $this->input->post("oyun_surum");
        $oyun_and_ios = $this->input->post("oyun_and_ios");
        $oyun_google_link = $this->input->post("oyun_google_link");
        $oyun_apple_link = $this->input->post("oyun_apple_link");
        $oyun_apk_link = $this->input->post("oyun_apk_link");
        $yazar_id    = $this->input->post("yazar_id"); 
        $oyun_puan = $this->input->post("oyun_puan");
        if($this->input->post("oyun_url") == '') {
            $oyun_url = str_slug($this->input->post("oyun_baslik"));
        } else {
            $oyun_url = $this->input->post("oyun_url");
        }
        $oyun_durum  = $this->input->post("oyun_durum");
        $createdAt   = date("Y-m-d H:i:s");
        $oyun_icon = $_FILES["oyun_icon"]["name"];

    

        if($oyun_baslik && $kategori_id && $yazar_id && $yapimci_id && $oyun_aciklama){

            if($oyun_icon){

            $config["upload_path"]   = "uploads/";
            $config["allowed_types"] = "gif|jpg|png";

            $this->load->library("upload", $config);

            if($this->upload->do_upload("oyun_icon")){

                $oyun_icon = $_FILES["oyun_icon"]["name"];

                $data = array(
                    "oyun_baslik"   => $oyun_baslik,
                    "kategori_id"   => $kategori_id,
                    "yapimci_id"    => $yapimci_id,
                    "yazar_id"      => $yazar_id,
                    "oyun_aciklama"    => $oyun_aciklama,
                    "oyun_boyut"    => $oyun_boyut,
                    "oyun_surum"   => $oyun_surum,
                    "oyun_and_ios"    => $oyun_and_ios,
                    "oyun_google_link"   => $oyun_google_link,
                    "oyun_apple_link"   => $oyun_apple_link,
                    "oyun_apk_link" => $oyun_apk_link,
                    "oyun_puan" => $oyun_puan,
                    "oyun_url"      => $oyun_url,
                    "oyun_durum"    => $oyun_durum,
                    "oyun_icon"   => $oyun_icon,
                    "createdAt"     => $createdAt
                );

                $insert = $this->oyunlar_model->insert($data);



                if($insert){
                    $alert = array(
                        "title" => "İşlem Başarılıdır",
                        "text" => "Ekleme işlemi başarılıdır...",
                        "type" => "success"
                    );
                    $last_id = $this->db->insert_id();
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
                    "oyun_baslik"   => $oyun_baslik,
                    "kategori_id"   => $kategori_id,
                    "yapimci_id"    => $yapimci_id,
                    "yazar_id"      => $yazar_id,
                    "oyun_aciklama"    => $oyun_aciklama,
                    "oyun_boyut"    => $oyun_boyut,
                    "oyun_surum"   => $oyun_surum,
                    "oyun_and_ios"    => $oyun_and_ios,
                    "oyun_google_link"   => $oyun_google_link,
                    "oyun_apple_link"   => $oyun_apple_link,
                    "oyun_apk_link" => $oyun_apk_link,
                    "oyun_puan" => $oyun_puan,
                    "oyun_url"      => $oyun_url,
                    "oyun_durum"    => $oyun_durum,
                    "createdAt"     => $createdAt
                );

                $insert = $this->oyunlar_model->insert($data);

                if($insert){
                    $alert = array(
                        "title" => "İşlem Başarılıdır",
                        "text" => "Ekleme işlemi başarılıdır...",
                        "type" => "success"
                    );
                    $last_id = $this->db->insert_id();
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
        redirect(base_url("admin/oyunlar"));


    }

public function delete($id){

    $where = array(
        "id" => $id
    );

    $delete = $this->oyunlar_model->delete($where);

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
    redirect(base_url("admin/oyunlar"));
}

public function ekran_goruntuleri($id){

    $where = array("id" => $id);
    $where_ekran = array("oyun_id" => $id);

    $oyunlar = $this->oyunlar_model->get($where);
    $ekran_goruntuleri = $this->oyunlar_model->ekran_goruntuleri_getir($where_ekran);

    $data = array(
    'oyunlar' => $oyunlar,
    'ekran_goruntuleri' => $ekran_goruntuleri,
    'title' => "Ekran Görüntülerini Düzenle | Admin Paneli"
    );
    $data['oyun_aciklama'] = $this->oyunlar_model->get($where);
    if (is_null($data['oyun_aciklama']->oyun_durum) || ($id == '')) {
        redirect(base_url("admin/oyunlar"));
    }

    $this->load->view("admin/oyun_ekran_goruntuleri", $data);

}

public function ekran_goruntuleri_upload($id){

    $config["allowed_types"] = "jpg|gif|png";
    $config["upload_path"] = "uploads/";

    $this->load->library("upload", $config);

    if($this->upload->do_upload("file")){

        $file_name = $this->upload->data("file_name");

        $data = array(
            "resim" => $file_name,
            "resim_url" => base_url("uploads/$file_name"),
            "oyun_id" => $id
        );
        $insert = $this->db->insert("oy_ekran_goruntuleri", $data);

    }else {

        echo "Başarısız";
        
    }
}

public function ekran_goruntuleri_sil($id){

    $where = array(
        "id" => $id
    );

    $delete = $this->oyunlar_model->ekran_goruntu_sil($where);

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
    redirect(base_url("admin/oyunlar"));

}


}