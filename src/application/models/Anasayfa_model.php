<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa_model extends CI_Model {

    /*public function anasayfa_son_oyunlar(){
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.*,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $query = $this->db->get('yazilar')->result();
        return $query;
    }*/

    //OYUN
    public function anasayfa_oyun_icerik($url){
        $this->db->join('yapimcilar', 'oyunlar.yapimci_id = yapimcilar.id');
        $this->db->join('kategoriler', 'oyunlar.kategori_id = kategoriler.id');
        $this->db->select('oyunlar.* , kategoriler.kategori_adi as kategori_adi, kategoriler.kategori_url as kategori_url, yapimcilar.yapimci_adi as yapimci_adi, yapimcilar.yapimci_url as yapimci_url');
        $this->db->where('oyunlar.oyun_durum', 1);
        $this->db->where('oyunlar.oyun_url', $url);
        $query = $this->db->get('oyunlar');
        return $query->row();
    }
    public function sayfalama_oyunlari($per_page, $offset){
        $this->db->select('oyunlar.*');
        $this->db->where('oyunlar.oyun_durum', 1);
        $this->db->order_by('oyunlar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('oyunlar');
        return $query->result();
    }
    public function oyun_sayisi(){
        $this->db->select('oyunlar.*');
        $this->db->where('oyunlar.oyun_durum', 1);
        $this->db->order_by('oyunlar.id', 'DESC');
        $query = $this->db->get('oyunlar');
        return $query->num_rows();
    }
    public function oyun_sayaci($id){
        $oyunlar = $this->anasayfa_model->anasayfa_oyun($id);

        if (get_cookie('oyun_goruntulenme_' . $id) != 1) {
            set_cookie('oyun_goruntulenme_' . $id, '1');
            $data = array(
                'oyun_goruntulenme' => $oyunlar->oyun_goruntulenme + 1
            );

            $this->db->where('id', $id);
            $this->db->update('oyunlar', $data);
        }

    }
    public function anasayfa_oyun($id){
        $this->db->where('oyunlar.id', $id);
        $query = $this->db->get('oyunlar');
        return $query->row();
    }
    public function benzer_oyunlar($kategori_id){
        
        $result = $this->db->where($kategori_id)->get("oyunlar")->result();
        return $result;
    }

    //UYGULAMA
    public function anasayfa_uygulama_icerik($url){
        $this->db->join('yapimcilar', 'uygulamalar.yapimci_id = yapimcilar.id');
        $this->db->join('kategoriler', 'uygulamalar.kategori_id = kategoriler.id');
        $this->db->select('uygulamalar.* , kategoriler.kategori_adi as kategori_adi, kategoriler.kategori_url as kategori_url, yapimcilar.yapimci_adi as yapimci_adi, yapimcilar.yapimci_url as yapimci_url');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $this->db->where('uygulamalar.uygulama_url', $url);
        $query = $this->db->get('uygulamalar');
        return $query->row();
    }
    public function uygulama_sayaci($id){
        $uygulamalar = $this->anasayfa_model->anasayfa_uygulama($id);

        if (get_cookie('uygulama_goruntulenme_' . $id) != 1) {
            set_cookie('uygulama_goruntulenme_' . $id, '1');
            $data = array(
                'uygulama_goruntulenme' => $uygulamalar->uygulama_goruntulenme + 1
            );

            $this->db->where('id', $id);
            $this->db->update('uygulamalar', $data);
        }

    }
    public function anasayfa_uygulama($id){
        $this->db->where('uygulamalar.id', $id);
        $query = $this->db->get('uygulamalar');
        return $query->row();
    }
    public function sayfalama_uygulamalari($per_page, $offset){
        $this->db->select('uygulamalar.*');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $this->db->order_by('uygulamalar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('uygulamalar');
        return $query->result();
    }

    
    public function uygulama_sayisi(){
        $this->db->select('uygulamalar.*');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $this->db->order_by('uygulamalar.id', 'DESC');
        $query = $this->db->get('uygulamalar');
        return $query->num_rows();
    }
    public function benzer_uygulamalar($kategori_id){

        $result = $this->db->where($kategori_id)->get("uygulamalar")->result();
        return $result;

    }


    
    //slider
    public function sayfalama_slider($per_page, $offset){
        $this->db->select('slider.*');
        $this->db->where('slider.slider_durum', 1);
        $this->db->order_by('slider.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('slider');
        return $query->result();
    }
    public function slider_sayisi(){
        $this->db->select('slider.*');
        $this->db->where('slider.slider_durum', 1);
        $this->db->order_by('slider.id', 'DESC');
        $query = $this->db->get('slider');
        return $query->num_rows();
    }

    public function insert($data){

        $insert = $this->db->insert("yazilar", $data);
        return $insert;

    }

    public function sayfalama_kategorileri_uyg($kategori_id, $per_page, $offset){
        $this->db->join('kategoriler', 'uygulamalar.kategori_id = kategoriler.id');
        $this->db->select('uygulamalar.*');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $this->db->where('uygulamalar.kategori_id', $kategori_id);
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('uygulamalar');
        return $query->result();
    }
    public function sayfalama_kategorileri_oyn($kategori_id, $per_page, $offset){
        $this->db->join('kategoriler', 'oyunlar.kategori_id = kategoriler.id');
        $this->db->select('oyunlar.*');
        $this->db->where('oyunlar.oyun_durum', 1);
        $this->db->where('oyunlar.kategori_id', $kategori_id);
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('oyunlar');
        return $query->result();
    }
    public function kategori_uyg_sayisi($kategori_id){
        $this->db->join('kategoriler', 'uygulamalar.kategori_id = kategoriler.id');
        $this->db->select('uygulamalar.*');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $this->db->where('uygulamalar.kategori_id', $kategori_id);
        $query = $this->db->get('uygulamalar');
        return $query->num_rows();
    }
    public function kategori_oyn_sayisi($kategori_id){
        $this->db->join('kategoriler', 'oyunlar.kategori_id = kategoriler.id');
        $this->db->select('oyunlar.*');
        $this->db->where('oyunlar.oyun_durum', 1);
        $this->db->where('oyunlar.kategori_id', $kategori_id);
        $query = $this->db->get('oyunlar');
        return $query->num_rows();
    }



    public function sayfalama_yapimcilari_uyg($yapimci_id, $per_page, $offset){
        $this->db->join('yapimcilar', 'uygulamalar.yapimci_id = yapimcilar.id');
        $this->db->select('uygulamalar.*');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $this->db->where('uygulamalar.yapimci_id', $yapimci_id);
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('uygulamalar');
        return $query->result();
    }
    public function sayfalama_yapimcilari_oyn($yapimci_id, $per_page, $offset){
        $this->db->join('yapimcilar', 'oyunlar.yapimci_id = yapimcilar.id');
        $this->db->select('oyunlar.*');
        $this->db->where('oyunlar.oyun_durum', 1);
        $this->db->where('oyunlar.yapimci_id', $yapimci_id);
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('oyunlar');
        return $query->result();
    }
    public function yapimci_uyg_sayisi($yapimci_id){
        $this->db->join('yapimcilar', 'uygulamalar.yapimci_id = yapimcilar.id');
        $this->db->select('uygulamalar.*');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $this->db->where('uygulamalar.yapimci_id', $yapimci_id);
        $query = $this->db->get('uygulamalar');
        return $query->num_rows();
    }
    public function yapimci_oyn_sayisi($yapimci_id){
        $this->db->join('yapimcilar', 'oyunlar.yapimci_id = yapimcilar.id');
        $this->db->select('oyunlar.*');
        $this->db->where('oyunlar.oyun_durum', 1);
        $this->db->where('oyunlar.yapimci_id', $yapimci_id);
        $query = $this->db->get('oyunlar');
        return $query->num_rows();
    }

    public function menu_sayfalar(){
        $result = $this->db->get("sayfalar")->result();
        return $result;
    }

    public function enckokunanlar(){
        $this->db->select('yazilar.*');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->order_by('yazilar.yazi_goruntulenme', 'DESC');
        $this->db->limit($this->ayarlar->enckokunan_yazi_sayisi);
        $query = $this->db->get('yazilar');
        return $query->result();
    }

    public function sayfa($sayfa_url)
    {
        $this->db->where('sayfa_url', $sayfa_url);
        $query = $this->db->get('sayfalar');
        return $query->row();
    }

    public function sayfalama_aramalari($q, $per_page, $offset){
        $this->db->join('uyeler', 'yazilar.yazar_id = uyeler.id');
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.*,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->like('yazilar.yazi_baslik', $q);
        $this->db->or_like('yazilar.yazi_icerik', $q);
        $this->db->order_by('yazilar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('yazilar');
        return $query->result();
    }
    public function arama_yazi_sayisi($q){
        $this->db->join('uyeler', 'yazilar.yazar_id = uyeler.id');
        $this->db->join('kategoriler', 'yazilar.kategori_id = kategoriler.id');
        $this->db->select('yazilar.*,uyeler.ad_soyad as uye_ad_soyad');
        $this->db->where('yazilar.yazi_durum', 1);
        $this->db->like('yazilar.yazi_baslik', $q);
        $this->db->or_like('yazilar.yazi_icerik', $q);
        $this->db->order_by('yazilar.id', 'DESC');
        $query = $this->db->get('yazilar');
        return $query->num_rows();
    }

    
    public function kategoriler_v2(){
        $result = $this->db->get("kategoriler")->result();
        return $result;
    }

    //ÜST SIRALAR
    public function sayfalama_oyun_ust_siralar($per_page, $offset){
        $this->db->select('oyunlar.*');
        $this->db->where('oyunlar.oyun_durum', 1);
        $this->db->order_by('oyunlar.oyun_goruntulenme', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('oyunlar');
        return $query->result();
    }
    public function sayfalama_uygulama_ust_siralar($per_page, $offset){
        $this->db->select('uygulamalar.*');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $this->db->order_by('uygulamalar.uygulama_goruntulenme', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('uygulamalar');
        return $query->result();
    }

    //YENİ ÇIKANLAR
    public function sayfalama_oyun_yeni_cikanlar($per_page, $offset){
        $this->db->select('oyunlar.*');
        $this->db->where('oyunlar.oyun_durum', 1);
        $this->db->order_by('oyunlar.createdAt', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('oyunlar');
        return $query->result();
    }
    public function sayfalama_uygulama_yeni_cikanlar($per_page, $offset){
        $this->db->select('uygulamalar.*');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $this->db->order_by('uygulamalar.createdAt', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('uygulamalar');
        return $query->result();
    }

    //GÜNCELLENENLER
    public function sayfalama_oyun_guncellenenler($per_page, $offset){
        $this->db->select('oyunlar.*');
        $this->db->where('oyunlar.oyun_durum', 1);
        $this->db->order_by('oyunlar.updatedAt', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('oyunlar');
        return $query->result();
    }
    public function sayfalama_uygulama_guncellenenler($per_page, $offset){
        $this->db->select('uygulamalar.*');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $this->db->order_by('uygulamalar.updatedAt', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('uygulamalar');
        return $query->result();
    }
}