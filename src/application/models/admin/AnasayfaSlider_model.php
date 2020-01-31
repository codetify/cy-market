<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfaslider_model extends CI_Model {

	public function get_all(){
		
        $result = $this->db->get("slider")->result();
        
        return $result;
	}

    public function get($where){
        
		$result = $this->db->where($where)->get("slider")->row();
        
        return $result;
	}
    
    public function insert($data){
                
        $insert = $this->db->insert("slider", $data);
        return $insert;
		
	}
    
    public function update($where, $data){
		
        $update = $this->db->where($where)->update("slider", $data);
        return $update;
	}
    
    public function delete($where){
		
        $delete = $this->db->where($where)->delete("slider");
        return $delete;
	}
}
