<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientModel extends CI_Model{
        
    private $purchase_table = 'purchases';
    private $usertable = 'clients'; //table name for the client registered on the platform via web
    private $messagetable = 'messages';
       
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function savepurchase($purchase){
        return $this->db->insert($this->purchase_table, $purchase);
    }
        
    public function create_user($user){
        return $this->db->insert($this->usertable, $user);
    }   
    public function delete_user(){
        
    }
    public function update_user($id, $me){
        $this->db->where('client_id', $id);
        $this->db->set($me);
        return $this->db->update($this->usertable);
    }
    public function getuser_byid($id){
        return $this->db->from($this->usertable)->where('client_id', $id)->get()->result_array();
    }
    public function get_username($name){
        $this->db->from($this->usertable);
        $user = $this->db->where(array('username'=>$name))->get(NULL, '1','0');
        return $user->result_array();
    }
    public function get_useremail($email){
        $this->db->from($this->usertable);
        $user = $this->db->where(array('client_email'=>$email))->get(NULL,'1','0');
        return $user->result_array();
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
    
     //add user credits
    public function addCredits($user, $credits){
       
    	return $this->db->update($this->usertable, array('credits'=>'credits +'.$credits), array('client_id'=>$user));
    }
    
    //deduct credits from user account
    public function removeCredits($user, $credit){
    
    }
    
}  
?>