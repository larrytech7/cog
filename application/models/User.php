<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Model{
    //field variables
    private $usertable = 'users'; //table name for the client registered on the platform via web
    private $messagetable = 'messages';
        
    public function __construct(){
        parent::__construct();
        $this->load->database();        
    }
    
    public function create_user($user){
            return $this->db->insert($this->usertable, $user); 
    }
    public function list_users(){
        return $this->db
                ->order_by('date', 'ASC')
                ->get($this->usertable)->result_array();
    }   
    public function delete_user($id){
        return $this->db->where('id', $id)
                    ->delete($this->usertable);
    }
    
    public function update_user($id, $me){
        $this->db->where('userid', $id);
        $this->db->set($me);
        return $this->db->update($this->usertable);
    }
    public function getuser_byid($id){
        return $this->db->from($this->usertable)->where('userid', $id)->get()->result_array();
    }

    public function authenticate($username, $password){
        $this->db->from($this->usertable);
                $usr = $this->db
                            ->where(array('username'=>$username,'password'=>md5('_'.$password.'_')))
                            ->get()
                            ->result_array();
        return is_array($usr) && !empty($usr);
    }
    
    public function savemessage($message){
        return $this->db->insert($this->messagetable, $message);
    }
    
    //retrieve user data
    public function get_usermessages($id){
        return $this->db->get_where($this->messagetable, 'msg_destination = \''.$id.'\'')->result_array();
    }
    
}

?>