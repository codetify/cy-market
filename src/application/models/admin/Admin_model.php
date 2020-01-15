<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    public function get($where = array()){
		$row = $this->db->where($where)->get("uyeler")->row();
        return $row;
	}
    
    function istatistikler(){
        $data['uygulama_sayisi'] = $this->db->count_all('uygulamalar');
        $data['oyun_sayisi'] = $this->db->count_all('oyunlar');
        $data['iletisim_mesaj_sayisi'] = $this->db->count_all('iletisim');
        ## Oyun Görüntülenme Sayısı ##
        $this->db->select_sum('oyun_goruntulenme');
        $result = $this->db->get('oyunlar')->row();
        $data['oyun_goruntulenme'] =  $result->oyun_goruntulenme;
        ## Oyun Görüntülenme Sayısı ##

        ## Uygulama Görüntülenme Sayısı ##
        $this->db->select_sum('uygulama_goruntulenme');
        $result = $this->db->get('uygulamalar')->row();
        $data['uygulama_goruntulenme'] =  $result->uygulama_goruntulenme;
        ## Uygulama Görüntülenme Sayısı ##

        return $data;
        
        
        
    }
}
