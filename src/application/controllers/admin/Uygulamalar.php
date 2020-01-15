<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uygulamalar extends CI_Controller {

public function __construct(){
     parent::__construct();

    $user = $this->session->userdata("user");

    if(!$user){
        redirect(base_url("admin"));
    }
}

public function index(){

    $list = $this->uygulamalar_model->get_all();

    $viewData["list"] = $list;

    //2 Adet data gönderme
    $data = array(
    'list' => $list,
    'title' => "Uygulamalar | Admin Paneli",
    );
    $this->load->view("admin/uygulamalar", $data);
}

public function update_form($id){
    $where = array("id" => $id);
    $where_ekran = array("uygulama_id" => $id);

    $kategori_list = $this->uygulamalar_model->kategoriler_v2();
    $yapimci_list = $this->uygulamalar_model->yapimcilar_v2();
    $viewData["kategori_list"] = $kategori_list;
    $viewData["yapimci_list"] = $yapimci_list;
    $ekran_goruntuleri = $this->uygulamalar_model->ekran_goruntuleri_getir($where_ekran);

    $uygulamalar = $this->uygulamalar_model->get($where);


    $data = array(
    'uygulamalar' => $uygulamalar,
    'kategori_list' => $kategori_list,
    'yapimci_list' => $yapimci_list,
    'ekran_goruntuleri' => $ekran_goruntuleri,
    'title' => "Uygulama Düzenle | Admin Paneli"
    );
    $data['uygulama_aciklama'] = $this->uygulamalar_model->get($where);
    if (is_null($data['uygulama_aciklama']->uygulama_durum) || ($id == '')) {
        redirect(base_url("admin/uygulamalar"));
    }

    $this->load->view("admin/uygulama_duzenle", $data);
}

public function update($id){

    $uygulama_icon = $_FILES["uygulama_icon"]["name"];

    if($uygulama_icon){

        $config["upload_path"]   = "uploads/";
        $config["allowed_types"] = "gif|jpg|png";

        $this->load->library("upload", $config);       

        if($this->upload->do_upload("uygulama_icon")){

            if($this->input->post("uygulama_url") == '') {
                $uygulama_url = str_slug($this->input->post("uygulama_baslik"));
            } else {
                $uygulama_url = $this->input->post("uygulama_url");
            }

            $uygulama_icon = $_FILES["uygulama_icon"]["name"];

            //Resim varsa
            $data = array(
                "uygulama_baslik" => $this->input->post("uygulama_baslik"),
                "uygulama_icon" => $uygulama_icon,
                "kategori_id" => $this->input->post("uygulama_kategori"),
                "yapimci_id" => $this->input->post("uygulama_yapimci"),
                "uygulama_aciklama" => $this->upload->data("uygulama_aciklama"),
                "uygulama_boyut" => $this->input->post("uygulama_boyut"),
                "uygulama_surum" => $this->input->post("uygulama_surum"),
                "uygulama_and_ios" => $this->input->post("uygulama_and_ios"),
                "uygulama_google_link" => $this->input->post("uygulama_google_link"),
                "uygulama_apple_link" => $this->input->post("uygulama_apple_link"),
                "uygulama_apk_link" => $this->input->post("uygulama_apk_link"),
                "uygulama_puan" => $this->input->post("uygulama_puan"),
                "uygulama_url" => $uygulama_url,
                "uygulama_durum" => $this->input->post("uygulama_durum"),
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
        if($this->input->post("uygulama_url") == '') {
            $uygulama_url = str_slug($this->input->post("uygulama_baslik"));
        } else {
            $uygulama_url = $this->input->post("uygulama_url");
        }
        //Resim yoksa
        $data = array(
            "uygulama_baslik" => $this->input->post("uygulama_baslik"),
            "kategori_id" => $this->input->post("uygulama_kategori"),
            "yapimci_id" => $this->input->post("uygulama_yapimci"),
            "uygulama_aciklama" => $this->input->post("uygulama_aciklama"),
            "uygulama_boyut" => $this->input->post("uygulama_boyut"),
            "uygulama_surum" => $this->input->post("uygulama_surum"),
            "uygulama_and_ios" => $this->input->post("uygulama_and_ios"),
            "uygulama_google_link" => $this->input->post("uygulama_google_link"),
            "uygulama_apple_link" => $this->input->post("uygulama_apple_link"),
            "uygulama_apk_link" => $this->input->post("uygulama_apk_link"),
            "uygulama_puan" => $this->input->post("uygulama_puan"),
            "uygulama_url" => $uygulama_url,
            "uygulama_durum" => $this->input->post("uygulama_durum"),
            "updatedAt" => date("Y-m-d H:i:s")
        );

    }
    $where = array(
        "id" => $id,
    );
    $update = $this->uygulamalar_model->update($where, $data);

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
    redirect(base_url("admin/uygulamalar"));
}

public function insert_form(){

    $kategori_list = $this->uygulamalar_model->kategoriler_v2();
    $yapimci_list = $this->uygulamalar_model->yapimcilar_v2();
    $viewData["kategori_list"] = $kategori_list;
    $viewData["yapimci_list"] = $yapimci_list;
    $data = array(
        'kategori_list' => $kategori_list,
        'yapimci_list' => $yapimci_list,
        'title' => "Uygulama Ekle | Admin Paneli"
    );

    $this->load->view("admin/uygulama_ekle", $data);
}

public function insert(){

        $uygulama_baslik = $this->input->post("uygulama_baslik");
        $kategori_id = $this->input->post("uygulama_kategori");
        $yapimci_id = $this->input->post("uygulama_yapimci");
        $uygulama_aciklama = $this->input->post("uygulama_aciklama");
        $uygulama_boyut = $this->input->post("uygulama_boyut");
        $uygulama_surum = $this->input->post("uygulama_surum");
        $uygulama_and_ios = $this->input->post("uygulama_and_ios");
        $uygulama_google_link = $this->input->post("uygulama_google_link");
        $uygulama_apple_link = $this->input->post("uygulama_apple_link");
        $uygulama_apk_link = $this->input->post("uygulama_apk_link");
        $uygulama_puan = $this->input->post("uygulama_puan");
        $yazar_id    = $this->input->post("yazar_id"); 
        if($this->input->post("uygulama_url") == '') {
            $uygulama_url = str_slug($this->input->post("uygulama_baslik"));
        } else {
            $uygulama_url = $this->input->post("uygulama_url");
        }
        $uygulama_durum  = $this->input->post("uygulama_durum");
        $createdAt   = date("Y-m-d H:i:s");
        $uygulama_icon = $_FILES["uygulama_icon"]["name"];

        if($uygulama_baslik && $kategori_id && $yazar_id && $yapimci_id && $uygulama_aciklama){

            if($uygulama_icon){

            $config["upload_path"]   = "uploads/";
            $config["allowed_types"] = "gif|jpg|png";

            $this->load->library("upload", $config);

            if($this->upload->do_upload("uygulama_icon")){

                $uygulama_icon = $_FILES["uygulama_icon"]["name"];

                $data = array(
                    "uygulama_baslik"   => $uygulama_baslik,
                    "kategori_id"   => $kategori_id,
                    "yapimci_id"    => $yapimci_id,
                    "yazar_id"      => $yazar_id,
                    "uygulama_aciklama"    => $uygulama_aciklama,
                    "uygulama_boyut"    => $uygulama_boyut,
                    "uygulama_surum"   => $uygulama_surum,
                    "uygulama_and_ios"    => $uygulama_and_ios,
                    "uygulama_google_link"   => $uygulama_google_link,
                    "uygulama_apple_link"   => $uygulama_apple_link,
                    "uygulama_apk_link" => $uygulama_apk_link,
                    "uygulama_puan" => $uygulama_puan,
                    "uygulama_url"      => $uygulama_url,
                    "uygulama_durum"    => $uygulama_durum,
                    "uygulama_icon"   => $uygulama_icon,
                    "createdAt"     => $createdAt
                );

                $insert = $this->uygulamalar_model->insert($data);



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
                    "uygulama_baslik"   => $uygulama_baslik,
                    "kategori_id"   => $kategori_id,
                    "yapimci_id"    => $yapimci_id,
                    "yazar_id"      => $yazar_id,
                    "uygulama_aciklama"    => $uygulama_aciklama,
                    "uygulama_boyut"    => $uygulama_boyut,
                    "uygulama_surum"   => $uygulama_surum,
                    "uygulama_and_ios"    => $uygulama_and_ios,
                    "uygulama_google_link"   => $uygulama_google_link,
                    "uygulama_apple_link"   => $uygulama_apple_link,
                    "uygulama_apk_link" => $uygulama_apk_link,
                    "uygulama_puan" => $uygulama_puan,
                    "uygulama_url"      => $uygulama_url,
                    "uygulama_durum"    => $uygulama_durum,
                    "createdAt"     => $createdAt
                );

                $insert = $this->uygulamalar_model->insert($data);

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
        redirect(base_url("admin/uygulamalar"));


    }

public function delete($id){

    $where = array(
        "id" => $id
    );

    $delete = $this->uygulamalar_model->delete($where);

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
    redirect(base_url("admin/uygulamalar"));
}

public function ekran_goruntuleri($id){

    $where = array("id" => $id);
    $where_ekran = array("uygulama_id" => $id);

    $uygulamalar = $this->uygulamalar_model->get($where);
    $ekran_goruntuleri = $this->uygulamalar_model->ekran_goruntuleri_getir($where_ekran);

    $data = array(
    'uygulamalar' => $uygulamalar,
    'ekran_goruntuleri' => $ekran_goruntuleri,
    'title' => "Ekran Görüntülerini Düzenle | Admin Paneli"
    );
    $data['uygulama_aciklama'] = $this->uygulamalar_model->get($where);
    if (is_null($data['uygulama_aciklama']->uygulama_durum) || ($id == '')) {
        redirect(base_url("admin/uygulamalar"));
    }

    $this->load->view("admin/uygulama_ekran_goruntuleri", $data);

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
            "uygulama_id" => $id
        );
        $insert = $this->db->insert("uyg_ekran_goruntuleri", $data);

    }else {

        echo "Başarısız";
        
    }
}

public function ekran_goruntuleri_sil($id){

    $where = array(
        "id" => $id
    );

    $delete = $this->uygulamalar_model->ekran_goruntu_sil($where);

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
    redirect(base_url("admin/uygulamalar"));

}


}