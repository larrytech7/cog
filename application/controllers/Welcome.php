<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'libs/swiftmailer5/lib/swift_required.php';

class Welcome extends CI_Controller {

    private $data = array();
    
    public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','email'));
        $this->load->helper(array('form', 'download'));
        $this->load->model(array('user',
                             'counselling',
                             'clientmodel',
                             'prayermodel',
                             'testimony',
                             'homemodel'));
        //$this->output->enable_profiler(true);
        
        $config['protocol'] = 'smtp';
    	$config['charset'] = 'iso-8859-1';
    	$config['wordwrap'] = TRUE;
    	$config['smtp_host'] = 'a2plcpnl0128.prod.iad2.secureserver.net';
    	$config['smtp_port'] = 465;
    	$config['smtp_user'] = 'larryakah@iceteck.com';
    	$config['smtp_pass'] = 'creationfox7';
    	$config['smtp_crypto'] = 'ssl';
//    	$config['mailtype'] = 'html';
    	$this->email->initialize($config);
        $this->email->from('service@iceteck.com', 'City Of Grace');
        $this->email->to('larryakah@gmail.com');
        $this->email->subject('City of Grace Service');
    }
	/**
	 * Index Page for this controller.
	 * Homepage showing all the items.
	 */
	public function index($extra = array()){
	   $this->data['current'] = 'home';
       $this->data['sermons'] = $this->homemodel->get_all('sermons');
	   if(isset($extra['message'])){
	       $this->data['subscriptioninfo'] = $extra['message'];
	   }
		$this->load->view('public/header', $this->data);
        $this->load->view('public/main', $this->data);
        $this->load->view('public/footer');
	}
    //register a new member for the commmunity remotely
    public function register(){
        $user = array(
                    'name' => $this->input->post('username'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'country' => $this->input->post('country'),
                    'dateadd' => date("Y-m-d H:i:s")
        );
        if($this->user->create_user($user)){
            $this->data['message'] = 'You have been successfully registered. Welcome to the community of saints';
            
        }else{
            $this->data['error']  = 'A member with the same credentials exists. Try again';
        }
        $this->index();
    }
    
    //counselling
    public function counsel(){
        $request = array(
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone'),
                    'message' => $this->input->post('message'),
                    'dateadd' => date("Y-m-d H:i:s")
        );
        if($this->counselling->savecounsel_request($request))
            $this->data['message']= 'Sent Successfully. We will get to you soon. God bless';
        else
            $this->data['error'] = 'Error occured. Please try requesting again. Thanks';
        $this->index();
    }
    
    //PRAYER request
    public function prayerrequest(){
        $request = array(
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone'),
                    'message' => $this->input->post('message'),
                    'dateadd' => date("Y-m-d H:i:s")
        );
        if($this->prayermodel->saveprayer_request($request))
            $this->data['message']= 'Sent Successfully. We will get to you soon. God bless';
        else
            $this->data['error'] = 'Error occured. Please try requesting again. Thanks';
        $this->index();
    }
    
    //testimony
    public function testimony(){
        if(!$this->form_validation->run()){
            $this->data['current'] = 'testimony';
    		$this->load->view('public/header', $this->data);
            $this->load->view('public/testimony', $this->data);
            $this->load->view('public/footer');
            return;
        }
        $request = array(
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone'),
                    'message' => $this->input->post('message'),
                    'dateadd' => date("Y-m-d H:i:s")
        );
        if($this->testimony->savetestimony_request($request))
            $this->data['message']= 'Your testimony has been received. God bless';
        else
            $this->data['error'] = 'Error occured. Please try again. Thanks';
        $this->index();
    }
    
    //mission page
    public function mission(){
        $this->data['current'] = 'mission';
		$this->load->view('public/header', $this->data);
        $this->load->view('public/mission', $this->data);
        $this->load->view('public/footer');
    }    
    //process contact message
    public function contacts(){
        if($this->form_validation->run()){
           return; 
        }
        $this->data['current'] = 'contact';
		$this->load->view('public/header', $this->data);
        $this->load->view('public/contactus', $this->data);
        $this->load->view('public/footer');
    }
    
    //login client
    public function login(){
      
            $status = $this->clientmodel->authenticate(
                    $this->input->post('userid', true), $this->input->post('userpass'));
                    if($status){
                        $muser = $this->clientmodel->get_username($this->input->post('userid'));
                        
                        $msession = array(
                                    'user'=>$muser[0]['client_id'],
                                    'user_name'=>base64_encode($muser[0]['username']));
                    $this->session->set_userdata($msession);
                    $this->session->set_flashdata('login', 'Successfully logged-in');
                    
                    redirect(site_url('home'),'location');
                        
                    }else{
                        $this->data['error'] = 'Wrong username or password';
                        $this->index($this->data);
                    }   
    }
    
    public function about(){
        $this->data['current'] = 'about';
        $this->load->view('public/header', $this->data);
        $this->load->view('public/about', $this->data);
        $this->load->view('public/footer');
    }
    public function terms(){
        $this->load->view('public/header');
        $this->load->view('public/terms', $this->data);
        $this->load->view('public/footer');
    }
    public function policy(){
        $this->load->view('public/header');
        $this->load->view('public/policy');
        $this->load->view('public/footer');
    }
}
