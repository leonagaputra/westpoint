<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Backend extends My_Controller {

    var $production;
    var $email_to;

    public function __construct() {
        parent::__construct();
        $this->load->model('gen_model', 'gm');
        $this->data['company'] = "BelajarUjian.com";
        $this->email_to = "leo.nagaputra@gmail.com";
    }

    //put your code here
    public function index() {
        $this->production = FALSE;
        if ($this->production)
            $this->_production();
        else
            $this->_under_development();
    }

    
    private function _cek_user_login() {
        //echo "test". $this->session->userdata('username')." lalala";exit;
        if (!$this->session->userdata('VEMAIL')) {
            //echo "test";exit;            
            header('location:' . $this->data['base_url'] . "index.php/main/frontpage");
        }
        $this->data['username'] = strtoupper($this->session->userdata('VUSERNAME'));
        //echo "test22". $this->session->userdata('username')." lalala";exit;
    }

    function logout() {
        $this->session->sess_destroy();
        header('location:' . $this->data['base_url'] . 'index.php/main/frontpage');
    }

    private function _check_captcha($recaptcha) {
        //phpinfo();
        //exit;
        //print_r($_POST);exit;
        ini_set('display_errors', '1');
        $fields_string = "";
        $url = "https://www.google.com/recaptcha/api/siteverify";

        $fields = array(
            'secret' => "6LfosgsTAAAAACVaKwPBahJcK2sk8EGBhZMpk7iL",
            'response' => $recaptcha,
            'remoteip' => ''
        );

        //url-ify the data for the POST
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
        //print_r($result);exit;
        return $result;
    }

    
    /**
     * sample curl function
     */
    function curl_download() {
        $Url = "https://www.google.com/recaptcha/api/siteverify";
        // is cURL installed yet?
        if (!function_exists('curl_init')) {
            die('Sorry cURL is not installed!');
        }

        // OK cool - then let's create a new cURL resource handle
        $ch = curl_init();

        // Now set some options (most are optional)
        // Set URL to download
        curl_setopt($ch, CURLOPT_URL, $Url);
        // Set a referer
        curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // User agent
        curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        // Download the given URL, and return output
        $output = curl_exec($ch);

        // Close the cURL resource, and free system resources
        curl_close($ch);
        echo $output;

        //print_r($output);
    }        

    /**
     * sample function to send mail
     */
    function sendmail() {
        $this->load->library('email'); // load email library
        $this->email->from('xand3r.leo@gmail.com', 'Leo Naga');
        $this->email->to('leo.nagaputra@gmail.com');
        
        $this->email->subject('Your Subject');
        $this->email->message('Your Message');
        
        if ($this->email->send())
            echo "Mail Sent!";
        else
            echo "There is error in sending mail!";
    }
    
    function do_signin(){
        $data = array();
        
        $data['VEMAIL'] = $this->security($this->input->post('email', TRUE));
        $data['VPASSWORD'] = $this->security($this->input->post('password', TRUE));
        $var_cookie = 'belajarujian_remember';
        if(isset($_POST['remember']) && $_POST['remember'] ==1){
            //set cookie
            //1 year cookie
            $year = time() + 31536000;
            $cookie = array(
                'name'   => $var_cookie,
                'value'  => $data['VEMAIL'],
                'expire' => $year                
            );
            $this->input->set_cookie($cookie); 
        } else {
            delete_cookie($var_cookie);
        }        
       
        if($result = $this->gm->get("users", $data, TRUE))
        {            
            //print_r($result);exit;
            $this->data['username'] = strtoupper($data['VEMAIL']);           
            $this->session->set_userdata((array)$result);
            header('location:'.$this->data['base_url'] .'index.php/backend/home');            
        }
        else{
            header('location:'.$this->data['base_url'] .'index.php/main/signin?gagal_login=1');
        }
        $this->index();
    }
    
    function home() {
        //cek login
        $this->_cek_user_login();
        $this->data['nama'] = $this->session->userdata('VNAMA');
        $this->data['backend_page'] = 'homepage.php';
        $this->load->view('home', $this->data);
    }
    
    function paket_soal(){
        //cek login
        $this->_cek_user_login();
        $this->data['nama'] = $this->session->userdata('VNAMA');
        $this->data['backend_page'] = 'paket_soal.php';
        $this->load->view('home', $this->data);
    }

}


