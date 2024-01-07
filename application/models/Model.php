<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Model extends CI_Model {

	
    public function readData(){
        $query = $this->db->get('camprecord');

        if(!$query){
            echo " Data not found";
        }
        else{
            return $query->result();
        }
    }

    public function insertData($data){
        $query = $this->db->insert('camprecord', $data);
    
        return $query ? true : false;
    }
    

    public function getDataById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('camprecord');
        return $query->row(); 
    }
    
    
    public function updateData($data, $id) {
        $this->db->where('id', $id);
    
        if ($this->db->update('camprecord', $data)) {
            return true;
        } else {
            return false;
        }
    }
    
    
    

     public function deleteData($id){
        $query = $this->db->delete('camprecord', array('id' => $id));
        
        if($query){
            return true;
        }else{
            return false;
        }
    }

    
	
}
