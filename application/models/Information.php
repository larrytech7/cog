<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Model{
        
    private $infotable = 'information';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function create_message($message){
        return $this->db->insert($this->infotable, $message);
    }   
    public function delete_info($id){
        return $this->db->delete($this->infotable, 'info_id=\''.$id.'\'');
    }
    public function update_info($id, $info){
        $this->db->where('info_id', $id);
        $this->db->update($this->infotable, $info);
    }
    public function get_info(){
        return $this->db->get($this->infotable)->result_array();
    }
    //get infos from particular category
    public function get_info_bytype($type){
        return $this->db->like('info_type', $type)->get($this->infotable)->result_array();
    }
    public function get_myinfos($myid){
        $this->db->order_by('info_added_date', 'DESC');
        return $this->db->get_where($this->infotable, 'info_author = \''.$myid.'\'')->result_array();
    }
    
    public function get_infodetails($info_id){
        return $this->db->get_where($this->infotable, 'info_id= \''.$info_id.'\'', 1)->result_array();
    }
    
}

?>