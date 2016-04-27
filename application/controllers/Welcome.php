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
                             'homemodel',
                             'eventmodel'));
        //$this->output->enable_profiler(true);
        
        $config['protocol'] = 'smtp';
    	$config['charset'] = 'iso-8859-1';
    	$config['wordwrap'] = TRUE;
    	$config['smtp_host'] = 'a2plcpnl0128.prod.iad2.secureserver.net';
    	$config['smtp_port'] = 465;
    	$config['smtp_user'] = 'larryakah@iceteck.com';
    	$config['smtp_pass'] = 'creationfox7';
    	$config['smtp_crypto'] = 'ssl';
    	$config['mailtype'] = 'html';
    	$this->email->initialize($config);
      //  $this->email->from('service@iceteck.com', 'City Of Grace');
        $this->email->to('larryakah@gmail.com');
        $this->email->cc('lakah@giftedmom.org,icep603@gmail.com,milefourwomen@yahoo.com');
      //  $this->email->subject('City of Grace Contact');
    }
	/**
	 * Index Page for this controller.
	 * Homepage showing all the items.
	 */
	public function index($extra = array()){
	   $this->data['current'] = 'home';
       $this->data['sermons'] = $this->homemodel->get_all('sermons');
       $this->data['events'] = $this->eventmodel->get_all('events');
       
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
            $this->data['message'] = 'You have successfully registered. Welcome to the community of saints';
             //send email after saving data
            $this->email->from("service@iceteck.com", "City Of Grace");
            $this->email->subject('New Member');
            $this->email->message('<h1>A new member just registered via the website</h1><br/> We have a new member. Send a welcome message by viewing here.
            <a href="http://cogministries.iceteck.com/index.php/home/members">NEW MEMBER</a>');
            $sent = $this->email->send(false);
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
        if($this->counselling->savecounsel_request($request)){
            $this->data['message']= 'Sent Successfully. We will get to you soon. God bless You';
            //send email after saving data
            $this->email->from("service@iceteck.com", "City Of Grace"); 
            $this->email->subject('Counselling Request from COG website');
            $this->email->message('<h1>User Sent a counselling request via the website</h1><br/> You have received a new counselling request via the church website. Click here to attend to it now.
            <a href="http://cogministries.iceteck.com/index.php/home/counsel">COUNSELLING REQUEST</a>');
            $sent = $this->email->send(false);
            }
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
        if($this->prayermodel->saveprayer_request($request)){
            $this->data['message']= 'Sent Successfully. We will get to you soon. God bless';
        
            //send email after saving data
            $this->email->from("service@iceteck.com", "City Of Grace"); 
            $this->email->subject('Prayer Request from COG website');
            $this->email->message('<h1>User Sent a prayer request via the website</h1><br/> You have received a new prayer request via the church website. Click here to attend to it now.
            <a href="http://cogministries.iceteck.com/index.php/home/notifications">PRAYER REQUEST</a>');
            $sent = $this->email->send(false);
        }
        else
            $this->data['error'] = 'Error occured. Please try requesting again. Thanks';
        $this->index();
    }
    
    //testimony
    public function testimony(){
        $this->form_validation->set_rules(
        'phone', 'phone number',
        'trim|required|min_length[9]',
        array(
                'required' => 'You have not provided a correct %s.',
                'min_length' => 'Phone number must be at least 9 digits long'
            )
        );
        
        if(!$this->form_validation->run()){
            $this->data['current'] = 'testimony';
            //get all confirmed testimonies
            $this->data['testimonies'] = $this->testimony->gettestimonies_bystatus(1);
            
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
        if($this->testimony->savetestimony_request($request)){
            $this->data['message']= 'Your testimony has been received. God bless you';
            //send email after saving data
            $this->email->from("service@iceteck.com", "City Of Grace"); 
            $this->email->subject('Testimony From COG website');
            $this->email->message('<h1>User Testifies on website</h1><br/> You have received a new testimony via the church website. Click here to open
            <a href="http://cogministries.iceteck.com/index.php/home/testimonies" target="_blank">Testimony</a>');
            $sent = $this->email->send(false);
        }
        else
            $this->data['error'] = 'Error occured. Please try again.';
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
        $this->form_validation->set_rules(
        'phone', 'phone',
        'trim|required|min_length[9]',
        array(
                'required' => 'You have not provided %s.',
                'min_length' => 'Phone number must be at least 9 digits long'
            )
        );
        if($this->form_validation->run()){
            //send email
            $name = $this->input->post('name');
            $number = $this->input->post('phone');
            $uemail = $this->input->post('email');
            $message =  $this->input->post('message');
            
            $this->email->from($uemail, $name);
            $this->email->subject('Contact from COG website');
            $this->email->message('<h1>User Inquiry from website</h1><br/>'.$message.'');
            $sent = $this->email->send(false);
            if($sent){
                $this->session->set_flashdata('success', 'Message was sent, we will get back to you soon');
            }else{
              $this->session->set_flashdata('error','Unable to deliver your message, Please try again');
            }
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
