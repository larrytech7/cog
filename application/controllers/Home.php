<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    private $muser = array();
    private $project;
    private $data;
    static $APPLICATION_ACCESS_TOKEN = "740fbcf6c549994029d0bdcc53340";
    
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model(array('clientmodel','user', 'information','homemodel'));
     //   $this->output->enable_profiler(true);
        $login = $this->session->userdata('user');
        
        if(!isset($login)){
            redirect(site_url(), 'location');
        }else{
            $this->muser = $this->clientmodel->getuser_byid($login);
            $this->data['user'] = $this->muser[0];
        }
        
    }
    
    public function index(){
        $mymessages = $this->homemodel->get_all('sermons');
        $this->data['mymessages'] = $mymessages;
        
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/main',$this->data);
        $this->load->view('authentic/footer');
    }
    //view a particular sermon
    public function announcement($id){
       // $this->data['user'] = $this->muser[0];
        $this->data['projectdetails'] = $this->projects->get_projectdetails($id);
        
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/content',$this->data);
        $this->load->view('authentic/footer');   
    }
    //show notification page
    public function notifications(){
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/notifications',$this->data);
        $this->load->view('authentic/footer');
    }
    //delete a given sermon
    public function delete_sermon($pid){
        $deleted = $this->homemodel->delete('sermons',$pid);
        if($deleted)
            $this->session->set_flashdata('success', 
                'Message has been successfully deleted.');
        else
            $this->session->set_flashdata('error',
            'Error, message may not have been deleted. Try again.');
    
            redirect(site_url('home'), 'location');
    }
    //count the number of items in a set
    private function count($dataset){
        $i = 0;
        foreach($dataset as $item)
            $i++;
            
        return $i;
    }
  
    public function logout(){
        $this->session->unset_userdata(array('user', 'user_name'));
        $this->session->sess_destroy();
        redirect(site_url(), 'location');
    }
    //edit user profile
    public function me(){
        $this->data['user'] = $this->muser[0];
        $this->form_validation->set_rules(
        'portfolio', 'Portfolio',
        'trim|required|min_length[4]',
        array(
                'required' => '<p class="fade in alert bg-danger">You have not provided %s.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>',
                'min_length' => '<p class="fade in alert bg-danger">Portfolio must be atleast 4 characters long<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>'
            )
        );
        
        if($this->form_validation->run() == true){
            if($this->upload->do_upload('profilepic')){
            $me = array(
                        'aboutme'=>$this->input->post('portfolio', true),
                        'profile'=>$this->upload->file_name
                        );
            $this->user->update_user($this->session->userdata('user'),$me);
            $this->data['message'] = '<p class="fade in alert bg-success">Profile updated succcessfully<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>';
            $this->load->view('authentic/header', $this->data);
            $this->load->view('authentic/edit',$this->data);
            $this->load->view('authentic/footer');
            }else{
            $this->data['message'] = '<p class="fade in alert bg-danger">Error occured. '.$this->upload->display_errors().'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>';
            $this->load->view('authentic/header', $this->data);
            $this->load->view('authentic/edit',$this->data);
            $this->load->view('authentic/footer');
            }
        }else{
            $this->load->view('authentic/header', $this->data);
            $this->load->view('authentic/edit',$this->data);
            $this->load->view('authentic/footer');
        }
    }
    
    public function edit($msgid){
        $message = $this->homemodel->get_by_id('sermons',$msgid);
//        $this->data['user'] = $this->muser[0];
        $this->data['message'] = $message;
        $this->form_validation->set_rules(
        'message', 'Message',
        'trim|required|min_length[4]',
        array(
                'required' => 'You have not provided %s.',
                'min_length' => 'Message must be atleast 4 characters long'
            )
        );
        
        if($this->form_validation->run() == true){
            $sermon = array(
                        'title'     =>$this->input->post('title', true),
                        'message'   =>$this->input->post('message', true),
                        'author_id' =>$this->session->userdata('user')
                        );
            $update = $this->homemodel->update('sermons', $sermon, $this->input->post('id'));
            if($update)
                $this->session->set_flashdata('success','Message updated succcessfully.');
            else
                $this->session->set_flashdata('error','Error occuered while trying to update message');                
            
            redirect(site_url('home'), 'location');
            
        }else{
            $this->load->view('authentic/header', $this->data);
            $this->load->view('authentic/editmsg',$this->data);
            $this->load->view('authentic/footer');
        }
    }
    //create and upload a new sermon message
    public function createmessage(){
        $this->form_validation->set_rules(
        'message', 'Message',
        'trim|required|min_length[4]',
        array(
                'required' => 'You have not provided %s.',
                'min_length' =>'Your message must be atleast 4 characters long'
            )
        );        
        if($this->form_validation->run() == true){
            $unix = strtotime(str_replace(',','',$this->input->post('pubdate')));
            $sermon = array(
                        'id'        =>md5(time().$this->session->userdata('user')),
                        'title'     =>$this->input->post('title', true),
                        'message'   =>$this->input->post('message', true),
                        'watch_word' => $this->input->post('watchword', true),
                        'date'      => date("Y-m-d H:i:s"),
                        'author_id' =>$this->session->userdata('user')
                        );
            $result = $this->homemodel->add('sermons',$sermon);
            if($result){
                $this->session->set_flashdata('success','Your message was created succcessfully. You can view it on the homepage');
                redirect(site_url('home'),'location');
            }else{
                $this->session->set_flashdata('error','Message could not be saved. Please try again');
                redirect(site_url('home'),'location');
                }
        }else{
                $this->session->set_flashdata('error','Error Occured. Please try again');
                redirect(site_url('home'),'location');
            }
        }
        //instantly resend the message to all appropriate subscribers
        public function resend($messageid){
            $this->sendSMS("+99900000018402","Hello, Welcome to RT-Tymer", "RT-Tymer",'Subscription Request',Home::$APPLICATION_ACCESS_TOKEN);
        }
        
    /**
     * Send SMS to a subscriber or user 
     * @param $msisdn Represents the subscriber's phone or gsm number
     * @param $msg Represents the message to send to the subscriber
     * @param $senderName represents the username of the user sending the message
     * @param $callbackdata A parameter used to preserve data accross requests
     * @param $token Represents the developer token generated for the application on the developer portal
     *
    */ 
    function sendSMS($msisdn, $msg, $senderName, $callbackdata, $token){
    //Orange APIs endpoints
    $ip_apis = "https://api.sdp.orange.com";    

    $urlSendSMS = $ip_apis . "/smsmessaging/v1/outbound/200/requests";
    //$urlSendSMS = "http://appointment.piarsolutions.com/index.php/rt/sms";
    //$urlSendSMS = $ip_apis . "/smsmessaging/v1/outbound/tel%3A%2B99900000018402/requests";
    $urlChargeAmount = $ip_apis . "/payment/v1/200/transactions/amount";
    
	$msisdn = str_replace("+","",$msisdn);

	$url = $urlSendSMS;
	date_default_timezone_set('UTC');
	$thisDateMsg = date("Y-m-dTH:i:s");
	//$data = '{"address":["tel:+'.$msisdn.'"],"message":"'.$msg.'","senderName":"'.$senderName.'","callbackData":"'.$callbackdata.'"}';
    $data = '{"address":"+'.$msisdn.'","message":"'.$msg.'","senderName":"'.$senderName.'","token":"'.$token.'"}';
	$headerAuth = 'Authorization: Bearer '.$token;
	$data_string = $data;  //json_encode($data);
	$ch = curl_init();	//  Initiate curl
	curl_setopt($ch, CURLOPT_SSLVERSION, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 300); //timeout in seconds
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, 1);                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                              
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',$headerAuth));
	curl_setopt($ch, CURLOPT_HEADER, 0);  //TRUE to include the header in the output.
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	// Will return the response, if false it print the response
	curl_setopt($ch, CURLOPT_URL,$url);	// Set the url
	$result=curl_exec($ch);	// Execute
	$parsed_json = json_decode($result, true);
	$httpstatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
	$curl_errno = curl_errno($ch);
	if ($curl_errno > 0) {
		if (isset($_GET["debug"]) && $_GET["debug"]==1){
		   echo "<br/>cURL Error ($curl_errno): $curl_error\n<br/><br/>";
		}
	}

	$data_array[0]=$httpstatus;
	$data_array[1]=$result;
	
	echo '<span STYLE="color: white; font-size: 10pt">POST to <b></span><span STYLE="color: orange; font-size: 10pt">' . $url . '</span></b>';
	echo '<br/>';
	echo '<span STYLE="color: white; font-size: 10pt">with Headers <b></span><span STYLE="color: orange; font-size: 10pt">MContent-Type: application/json<br/>' . $headerAuth . '</span></b>';
	echo '<br/><br/>';
	echo '<span STYLE="color: white; font-size: 10pt">and with Body <b></span><span STYLE="color: orange; font-size: 10pt">' . $data . '</span></b>';
	echo '<br/>';
	print_r($parsed_json);
    
	curl_close($ch);	// Closing
	//return $data_array;
    }
}   
     
?>        