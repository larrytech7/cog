<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimony extends CI_Model{
        
    private $testimony_table = 'testimonies';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function savetestimony_request($request){
        return $this->db
                    ->insert($this->testimony_table, $request);
    }
         
    public function deletetestimony_request($id){
        return $this->db->where('id', $id)
                    ->delete($this->testimony_table);
    }
    
    public function getrequest_byid($id){
        return $this->db->from($this->testimony_table)
                    ->where('id', $id)
                    ->get()
                    ->result_array();
    }
    
}  
?>