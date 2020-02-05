<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uygulamalar_model extends CI_Model {

	public function get_all(){
		
        $result = $this->db->get("uygulamalar")->result();
        
        return $result;
	}

    public function get($where){
        
		$result = $this->db->where($where)->get("uygulamalar")->row();
        
        return $result;
	}

    public function insert($data){

        $insert = $this->db->insert("uygulamalar", $data);
        return $insert;

    }
    
    public function update($where, $data){
		
        $update = $this->db->where($where)->update("uygulamalar", $data);
        return $update;
	}
    
    public function delete($where){
		
        $delete = $this->db->where($where)->delete("uygulamalar");
        return $delete;
	}
    
    //Ziyaretçi sayacı
    function update_counter($id) {
    // return current article views 
    $this->db->where('id', $id);
    $this->db->select('uygulama_goruntulenme');
    $count = $this->db->get('uygulamalar')->row();
    // then increase by one 
    $this->db->where('id', $id);
    $this->db->set('uygulama_goruntulenme', ($count->uygulama_goruntulenme + 1));
    $this->db->update('uygulamalar');
    }

    public function kategoriler_v2(){
        $result = $this->db->get("kategoriler")->result();
        return $result;
    }
    public function yapimcilar_v2(){
        $result = $this->db->get("yapimcilar")->result();
        return $result;
    }

    public function admin_son_uygulamalar(){
        $this->db->select('uygulamalar.*');
        $this->db->where('uygulamalar.uygulama_durum', 1);
        $query = $this->db->get('uygulamalar')->result();
        return $query;
    }

    public function ekran_goruntuleri_getir($where){
        
		$result = $this->db->where($where)->get("uyg_ekran_goruntuleri")->result();
        return $result;
    }

    public function ekran_goruntu_sil($where){
		
        $delete = $this->db->where($where)->delete("uyg_ekran_goruntuleri");
        return $delete;
	}
}
