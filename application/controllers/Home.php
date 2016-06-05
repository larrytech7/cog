<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sending emails fromt his class is yet not possible until the recent version if pulled from the server
 */
class Home extends CI_Controller {

    private $muser = array();
    private $project;
    private $data;
    static $APPLICATION_ACCESS_TOKEN = "740fbcf6c549994029d0bdcc53340";
    
    public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','email'));
        $this->load->helper(array('form','text'));
        $this->load->model(array('clientmodel',
        'user',
         'information',
         'homemodel',
         'prayermodel',
         'counselling',
         'testimony',
         'eventmodel'));
     //   $this->output->enable_profiler(true);
        $login = $this->session->userdata('user');
        
        if(!isset($login)){
            redirect(site_url(), 'location');
        }else{
            $this->muser = $this->clientmodel->getuser_byid($login);
            $this->data['user'] = $this->muser[0];
        }
        //configure email
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
        $this->email->from('service@iceteck.com', 'City Of Grace');
        //$this->email->to('larryakah@gmail.com');
        $this->email->cc('icep603@gmail.com');//,milefourwomen@yahoo.com');
    }
    
    public function index(){
        $mymessages = $this->homemodel->get_all('sermons');
        $this->data['mymessages'] = $mymessages;
        
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/main',$this->data);
        $this->load->view('authentic/footer');
    }
    //manage(add/list) banners
    public function banner(){
        //get all banners and display results
        $banners = $this->homemodel->get_all('banners');
        $this->data['banners'] = $banners;
                
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/slideshow',$this->data);
        $this->load->view('authentic/footer');
    }
    //upload banner images
    public function addbanner(){
         //upload pic for banner and save
            $banner  = array('name'=>'',
                            'url'=>'',
                            'date'=>'');
                            
            $config['upload_path'] = './assets/img/';
    		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
    
    		$this->load->library('upload', $config);
    
    		if ( ! $this->upload->do_upload())
    		{
    			$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', 'Failed to upload image. Try again. '.$error['error']);
    		}
    		else
    		{
    			$data = array('upload_data' => $this->upload->data());
                $banner['name'] = $data['upload_data']['file_name'];
	           $banner['url'] = $data['upload_data']['full_path'];
               $banner['date'] = date("Y-m-d H:i:s");
               $this->session->set_flashdata('success','Banner uploaded successfully');
            }
            
            $this->homemodel->add('banners', $banner);
            $this->banner();
    }
    //remove banners
    public function bannerremove($id){
        $this->homemodel->delete('banners', $id);
        $this->session->set_flashdata('success', 'Banner image removed successfully');
        redirect(site_url('home/banner'),'location');
    }
    //manage(add/list) gallery
    public function gallery(){
        //get all banners and display results
        $gallery = $this->homemodel->get_all('gallery');
        $this->data['galleries'] = $gallery;
                
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/gallery',$this->data);
        $this->load->view('authentic/footer');
    }
    
    //upload gallery image
    public function addgallery(){
         //upload pic for gallery and save
            $gimage  = array('title'=>'',
                            'caption'=>'',
                            'date'=>'');
                            
            $config['upload_path'] = './assets/gallery/';
    		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
    
    		$this->load->library('upload', $config);
    
    		if ( ! $this->upload->do_upload())
    		{
    			$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', 'Failed to upload image. Try again. '.$error['error']);
    		}
    		else
    		{
    			$data = array('upload_data' => $this->upload->data());
                $fname = $data['upload_data']['file_name']; //with extension
                
                $gimage['title'] = $this->input->post('title');
                $gimage['caption'] = $this->input->post('caption');//['upload_data']['full_path'];
                $gimage['name'] = $data['upload_data']['file_name'];
                $gimage['date'] = date("Y-m-d H:i:s");
                
                $status = $this->homemodel->add('gallery', $gimage);
                if($status){
                    $gimages = $this->homemodel->get_all('gallery');
                    //set data in image gallery widget config xml file
                    $bigf = fopen('assets/big.xml', 'w+'); //write main images here
                    $smallf = fopen('assets/thumbs.xml', 'w+'); //write thumbs here
                    //create open config header
                    fwrite($bigf, '<images>');
                    fwrite($smallf, '<gallery>');
                    //loop through results and populate the gallery
                    foreach($gimages as $gimage){
                        fwrite($smallf, '<photo image="gallery/thumbs/'.$gimage['name'].'"><![CDATA[Download it for FREE]]></photo>');
                        fwrite($bigf, '<photo image="gallery/'.$gimage['name'].'"><![CDATA[<head>'.$gimage['title'].'</head><body>'.$gimage['caption'].'</body>]]></photo>');
                    }
                    //write end tags
                    fwrite($bigf, '</images>');
                    fwrite($smallf, '</gallery>');
                    //close resources
                    fclose($bigf);
                    fclose($smallf);
                }
               $this->session->set_flashdata('success','Gallery image uploaded successfully');
            }
            
            
            $this->gallery();
    }
    //TODO function for remove a gallery item.
    
    //view a particular sermon
    public function announcement($id){
       // $this->data['user'] = $this->muser[0];
        $this->data['projectdetails'] = $this->projects->get_projectdetails($id);
        
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/content',$this->data);
        $this->load->view('authentic/footer');   
    }
    //show prayer requests page
    public function notifications($start_at = 0){
        $prequests = $this->prayermodel->getprayer_requests();
        $this->data['prayerrequests'] = $prequests;
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/notifications',$this->data);
        $this->load->view('authentic/footer');
    }
    //list testimonies to publish to site or remove as invalid
    public function testimonies(){
        //list of testimonies (pending/confirmed))
        $this->data['testimonies'] = $this->testimony->list_testimonies();
        
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/testimonies', $this->data);
        $this->load->view('authentic/footer');
    }
    //action on a testimony
    public function actiontestimony($action = 'confirm', $id){
        if($action == 'refute'){
            $this->testimony->deletetestimony_request($id);
        }else{
            $this->testimony->updateTestimony($id);
        }
        $this->session->set_flashdata('message', 'Action confirmed');
        redirect(site_url('home/testimonies'), 'location');
    }
    
    //list quotes and publish on site
    public function quotes(){
        $this->form_validation->set_rules(
        'message', 'Quote',
        'trim|required|min_length[4]',
        array(
                'required' => '<p class="fade in alert bg-danger">You have not provided %s.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>',
                'min_length' => '<p class="fade in alert bg-danger">Quote must be atleast 4 characters long<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>'
            )
        );
        
        if($this->form_validation->run() == true){
            $unix = strtotime(str_replace(',','',$this->input->post('pubdate')));
            $quote = array(
                        'message'   =>$this->input->post('message', true),
                        'date'      => date("Y-m-d H:i:s")
                        );
            $result = $this->homemodel->add('quotes',$quote);
            if($result){
                $this->session->set_flashdata('success','Your quote was created succcessfully.');
                redirect(site_url('home/quotes'),'location');
            }else{
                $this->session->set_flashdata('error','Quote could not be saved. Please try again');
                redirect(site_url('home/quotes'),'location');
                }
        }else{
            $this->data['quotes'] = $this->homemodel->get_all('quotes');
            $this->load->view('authentic/header', $this->data);
            $this->load->view('authentic/quotes', $this->data);
            $this->load->view('authentic/footer');
        }
    }
    
    //activate or deactivate quotes
    public function actionquote($action = "activate", $id){
        $message = '';
        if($action == "activate"){
            //activate
            $this->homemodel->update('quotes', array('status'=>1), $id);
            $message = "Quote activated";
        }else{
            //deactivate
            $this->homemodel->update('quotes', array('status'=>0), $id); 
            $message = "Quote deactivated";           
        }
        $this->session->set_flashdata('success',$message);
        redirect(site_url('home/quotes'),'location');
    }
    //delete a prayer request entry
    public function deleteprayer_request($id){
        $deleted = $this->prayermodel->deleteprayer_request($id);
        if($deleted){
            $this->session->set_flashdata('success', 'Deleted Successfully');
        }else{
            $this->session->set_flashdata('error', 'Delete Failed. Please try again');            
        }
        header('Location: '.site_url('home/notifications'));
    }
    
    //TODO::// delete a counselling request
    public function deletecounsel_request($id){
        $st  = $this->counselling->deletecounsel_request($id);
        if($st){
            $this->session->set_flashdata('success', 
                'Request successfully Removed.');
        }else{
             $this->session->set_flashdata('error',
            'Error, the counsel request was not deleted. Try again.');
        }
        redirect(site_url('home/counsel'), 'location');
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
                $this->session->set_flashdata('error','Error ocurred while trying to update message');                
            
            redirect(site_url('home'), 'location');
            
        }else{
            $this->load->view('authentic/header', $this->data);
            $this->load->view('authentic/editmsg',$this->data);
            $this->load->view('authentic/footer');
        }
    }
    
    public function events(){
           
        $this->form_validation->set_rules(
        'message', 'Message',
        'trim|required|min_length[4]',
        array(
                'required' => 'You have not provided %s.',
                'min_length' => 'Message must be atleast 4 characters long'
            )
        );
        
        if($this->form_validation->run() == true){
            $event = array(
                        'date'     =>$this->input->post('date', true),
                        'time'      => $this->input->post('time'),
                        'message'   =>$this->input->post('message', true)
                        );
            $status = $this->eventmodel->add('events', $event);
            if($status)
                $this->session->set_flashdata('success','Event created succcessfully.');
            else
                $this->session->set_flashdata('error','Error ocurred while trying to update event. Please try again');                
            
            redirect(site_url('home'), 'location');
            
        }else{
            $this->load->view('authentic/header', $this->data);
            $this->load->view('authentic/events',$this->data);
            $this->load->view('authentic/footer');
        }
    }
    
    //TODO:: //send out mass announcements via email/sms
    public function announce(){
        $message = $this->input->post('message');
       // $message = strip_quotes($message);
        $message = ($message);
        //get all users registered via email
        $users = $this->homemodel->get_all('users');
        $emails = 'icep603@gmail.com,';
        foreach($users as $user){
            $emails .= $user['email'].',';
        }
        //prepare email string
        $emails = substr($emails, 0, strlen($emails)-1);
        //send emails
         $this->email->to($emails);
         $this->email->from("service@iceteck.com", "City Of Grace");
         $this->email->subject('General Announcement');
         $this->email->message($message);
         $sent = $this->email->send(false);
         if($sent){
            $this->session->set_flashdata('success', 'Messages all sent out to everyone');
         }else{
            
            $this->session->set_flashdata('error', 'Error! Everyone may not have received the message');
         }
         redirect(site_url('home'), 'location');
        // echo $emails;
    }
    //list members in a table
    public function members(){
        $this->data['users'] = $this->user->list_users();
        
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/members',$this->data);
        $this->load->view('authentic/footer');
    }
    
    public function counsel(){
        //retrieve requests from the db
        $requests = $this->counselling->getallrequests();
        $this->data['counselrequests'] =  $requests;
        
        $this->load->view('authentic/header', $this->data);
        $this->load->view('authentic/counselling', $this->data);
        $this->load->view('authentic/footer');
    }
    //reply to counselling requests using a form
    public function reply_crequest(){
        ///send email reply if available
        if(strlen($this->input->post('email')) > 0){
            //send email reply to this contact
            $e = $this->input->post('email', true);
            $reply = $this->input->post('message');
            $this->email->to($e);
            $this->email->subject('Reply to Counsel request');
            $this->email->message($reply);
            $r = $this->email->send();
            if($r){
                $this->session->set_flashdata('success','Your reply was sent succcessfully.');
            }else{
                $this->session->set_flashdata('error','Reply not sent.Please try again');
            }
        }else{
            //email not valid or absent
            $this->session->set_flashdata('error','Sender email was invalid or not available. Only emails are sent for now');   
        }
        redirect(site_url('home/counsel'),'location');
    }
    //reply to prayer requests
    public function reply_prequest(){
        if(strlen($this->input->post('email')) > 0){
            //send email reply to this contact
            $e = $this->input->post('email', true);
            $reply = $this->input->post('message');
            $this->email->to($e);
            $this->email->subject('Reply to Prayer request');
            $this->email->message($reply);
            $r = $this->email->send();
            if($r){
                $this->session->set_flashdata('success','Your reply was sent succcessfully.');
            }else{
                $this->session->set_flashdata('error','Reply not sent.Please try again');
            }
        }else{
            //email not valid or absent
            $this->session->set_flashdata('error','Sender email was invalid or not available. Only emails are sent for now');   
        }
        redirect(site_url('home/notifications'),'location');
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