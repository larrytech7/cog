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
    /**
     * Get testimonies having a status of published(1) from the database
     * 
     */  
    public function gettestimonies_bystatus($status){
        return $this->db->from($this->testimony_table)
                    ->where('status', $status)
                    ->get()
                    ->result_array();
    }
    
    public function updateTestimony($id){
        return $this->db
                    ->set('status', 1)
                    ->where('id', $id)
                    ->update($this->testimony_table);
    }
    
    public function list_testimonies(){
        return $this->db->from($this->testimony_table)
                    ->get()
                    ->result_array();
    }
    
}  
?>