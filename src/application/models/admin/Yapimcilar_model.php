<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yapimcilar_model extends CI_Model {

	public function get_all(){
		
        $result = $this->db->get("yapimcilar")->result();
        
        return $result;
	}

    public function get($where){
        
		$result = $this->db->where($where)->get("yapimcilar")->row();
        
        return $result;
	}
    
    public function insert($data){
                
        $insert = $this->db->insert("yapimcilar", $data);
        return $insert;
		
	}
    
    public function update($where, $data){
		
        $update = $this->db->where($where)->update("yapimcilar", $data);
        return $update;
	}
    
    public function delete($where){
		
        $delete = $this->db->where($where)->delete("yapimcilar");
        return $delete;
	}

    public function yapimcilari_getir($yapimci_url)
    {
        $this->db->where('yapimcilar.yapimci_url', $yapimci_url);
        $query = $this->db->get('yapimcilar');
        return $query->row();
    }
    public function yapimcilari_getir_id($yapimci_id){
        $this->db->where('id', $yapimci_id);
        $query = $this->db->get('yapimcilar');
        return $query->row();
    }
}
