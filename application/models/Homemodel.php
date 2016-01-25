<?php

/**
 * This model handles all home operations from the admin
 * 
 */ 
defined('BASEPATH') OR exit('No direct script access allowed');

class Homemodel extends CI_Model{
        
    private $testimony_table = 'testimonies';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function add($table, $sermon){
        return $this->db
                    ->insert($table, $sermon);
    }
         
    public function delete($table,$id){
        return $this->db->where('id', $id)
                    ->delete($table);
    }
    
    public function update($table, $update, $id){
        return $this->db->from($table)
                    ->where('id', $id)
                    ->set($update)
                    ->update();
    }
    
    public function get_all($table){
        return $this->db
                    ->order_by('date', 'DESC')
                    ->get($table)
                    ->result_array();
    }
    
    public function get_by_id($table, $id){
        return $this->db
                ->where('id', $id)
                ->order_by('date', 'DESC')
                ->get($table)
                ->result_array();
    }
    
}  
?>