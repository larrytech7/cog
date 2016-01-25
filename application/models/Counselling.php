<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counselling extends CI_Model{
        
    private $counsel_table = 'counselling';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function savecounsel_request($request){
        return $this->db
                    ->insert($this->counsel_table, $request);
    }
         
    public function deletecounsel_request($id){
        return $this->db->where('id', $id)
                    ->delete($this->counsel_table);
    }
    
    public function getrequest_byid($id){
        return $this->db->from($this->counsel_table)
                    ->where('id', $id)
                    ->get()
                    ->result_array();
    }
    
}  
?>