<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prayermodel extends CI_Model{
        
    private $prayer_table = 'prayer';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function saveprayer_request($request){
        return $this->db
                    ->insert($this->prayer_table, $request);
    }
         
    public function deleteprayer_request($id){
        return $this->db->where('id', $id)
                    ->delete($this->prayer_table);
    }
    
    public function getrequest_byid($id){
        return $this->db->from($this->prayer_table)
                    ->where('id', $id)
                    ->order_by('dateadd', 'DESC')
                    ->get()
                    ->result_array();
    }
    public function getprayer_requests(){
        return $this->db
                    ->order_by('dateadd', 'DESC')
                    ->get($this->prayer_table)
                    ->result_array();
    }
    
}  
?>