<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oyunlar_model extends CI_Model {

	public function get_all(){
		
        $result = $this->db->get("oyunlar")->result();
        
        return $result;
	}

    public function get($where){
        
		$result = $this->db->where($where)->get("oyunlar")->row();
        
        return $result;
	}

    public function insert($data){

        $insert = $this->db->insert("oyunlar", $data);
        return $insert;

    }
    
    public function update($where, $data){
		
        $update = $this->db->where($where)->update("oyunlar", $data);
        return $update;
	}
    
    public function delete($where){
		
        $delete = $this->db->where($where)->delete("oyunlar");
        return $delete;
	}
    
    //Ziyaretçi sayacı
    function update_counter($id) {
    // return current article views 
    $this->db->where('id', $id);
    $this->db->select('oyun_goruntulenme');
    $count = $this->db->get('oyunlar')->row();
    // then increase by one 
    $this->db->where('id', $id);
    $this->db->set('oyun_goruntulenme', ($count->oyun_goruntulenme + 1));
    $this->db->update('oyunlar');
    }

    public function kategoriler_v2(){
        $result = $this->db->get("kategoriler")->result();
        return $result;
    }
    public function yapimcilar_v2(){
        $result = $this->db->get("yapimcilar")->result();
        return $result;
    }

    public function admin_son_oyunlar(){
        $this->db->select('oyunlar.*');
        $this->db->where('oyunlar.oyun_durum', 1);
        $query = $this->db->get('oyunlar')->result();
        return $query;
    }
    public function ekran_goruntuleri_getir($where){
        
		$result = $this->db->where($where)->get("oy_ekran_goruntuleri")->result();
        return $result;
    }

    public function ekran_goruntu_sil($where){
		
        $delete = $this->db->where($where)->delete("oy_ekran_goruntuleri");
        return $delete;
	}
}
