<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Main extends My_Controller {

    var $production;
    var $email_to;
    var $this_cookie;

    public function __construct() {
        parent::__construct();
        $this->load->model('gen_model', 'gm');
        $this->data['company'] = "BelajarUjian.com";
        $this->email_to = "leo.nagaputra@gmail.com";
        $this->this_cookie = 'belajarujian_remember';
    }

    //put your code here
    public function index() {
        //echo $this->data['base_url'];exit;
        if (strpos($this->data['base_url'],'beta') !== false && strpos($this->data['base_url'],'https') !== false) {
            header('location:http://beta.belajarujian.com');
        }
        $this->production = FALSE;
        if ($this->production)
            $this->_production();
        else
            $this->_under_development();
    }

    public function beta() {
        $this->_production();
    }

    /**
     * unused
     */
    private function _under_construction() {
        $this->load->view('construction', $this->data);
    }

    private function _under_development() {
        $this->_cek_user_login();
        $this->load->view('development', $this->data);
    }

    private function _production() {
        //cek login
        //$this->_cek_user_login();
        //$this->load->view('starter', $this->data);
        $this->frontpage();
    }

    /**
     * unused
     */
    public function register() {
        $this->load->view('register', $this->data);
    }

    /**
     * frontpage
     * signup
     */
    public function signup($paket_id = NULL) {
        $demo_packages = array(1,2,3);
        $this->data['paket_id'] = 4;
        if($paket_id != NULL && in_array($paket_id, $demo_packages)){
            $this->data['paket_id'] = $paket_id;
        }
        $this->data['remember_cookie'] = $this->_get_cookie();
        $this->data['captcha_error'] = FALSE;
        $this->load->view('signup', $this->data);
    }

    public function login() {
        $this->load->view('login', $this->data);
    }

    /**
     * frontpage
     * check
     */
    private function _front_check() {
        $this->_cek_user_login();
        $this->data['remember_cookie'] = $this->_get_cookie();
    }

    /**
     * frontpage
     */
    public function frontpage() {
        $this->_front_check();
        //echo $this->data['remember_cookie'];exit;
        $this->load->view('frontpage', $this->data);
    }

    private function _get_cookie() {
        return get_cookie($this->this_cookie);
    }

    private function _cek_user_login() {
        //echo "test". $this->session->userdata('username')." lalala";exit;
        if ($this->session->userdata('VNAMA')) {
            //echo "test";exit;            
            header('location:' . $this->data['base_url'] . "index.php/backend/home");
        }
        //$this->data['username'] = strtoupper($this->session->userdata('VUSERNAME'));
        //echo "test22". $this->session->userdata('username')." lalala";exit;
    }

    function logout() {
        $this->session->sess_destroy();
        header('location:' . $this->data['base_url'] . 'index.php/main/login');
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
     * fungsi insert new user
     */
    function join_belajar_ujian() {
        if(empty($_POST)){
            header('location:' . $this->data['base_url'] . "index.php/main/signup");
        }
        $result = $this->_check_captcha($_POST['g-recaptcha-response']);
        $result = json_decode($result);
        $demo_packages = array(1,2,3);
        $paket_id = in_array($this->input->post('paket_id', TRUE), $demo_packages) ? $this->input->post('paket_id', TRUE) : 4;
        
        //print_r($result);
        if ($result->success == 1) {
            //CAPTCHA sukses
            //registrasi
            $dcrea = date("Y-m-d H:i:s");
            $vcrea = "SYSTEM";
            $data = array(
                "VNAMA" => $this->security($this->input->post('nama', TRUE)),
                "VEMAIL" => strtolower($this->security($this->input->post('email', TRUE))),
                "VPASSWORD" => $this->security($this->input->post('password', TRUE)),
                "VPERUSAHAAN" => $this->security($this->input->post('perusahaan', TRUE)),
                "VHPNUM" => $this->security($this->input->post('hape', TRUE)),
                "VCREA" => $vcrea,
                "DCREA" => $dcrea
            );
            //print_r($data);
            $where = array(
                "VEMAIL" => $this->security($this->input->post('email', TRUE))
            );
            $cnt = $this->gm->get("users", $where, TRUE, TRUE);
            if ($cnt->cnt == 0) {
                //insert new user
                $id = $this->gm->insert("users", $data);
                if ($id) {
                    $this->data['msg'] = "Proses Registrasi Sukses";
                    //insert user paket
                    $userpaket = array(
                        'PAKET_ID' => 4, //paket demo
                        'USER_ID' => $id,
                        'DSTART' => $dcrea,
                        'DEND' => "2100-12-31 23:59:00",
                        'VTRIAL' => 'T',
                        'VCREA' => $vcrea,
                        'DCREA' => $dcrea
                    );
                    if($paket_id != 4){
                        $userpaket['PAKET_ID'] = $paket_id;
                        $userpaket['VTRIAL'] = "T";
                    }
                    
                    $this->gm->insert("userpaket", $userpaket);

                    //insert user role
                    $userrole = array(
                        'USER_ID' => $id,
                        'ROLE_ID' => 2, //role student
                        'VCREA' => $vcrea,
                        'DCREA' => $dcrea
                    );
                    $this->gm->insert("userrole", $userrole);
                    $this->_success();
                } else {
                    $this->data['error_msg'] = "Proses Penyimpanan Error";
                    $this->_failed();
                }
            } else {
                $this->data['error_msg'] = "Email Telah Terdaftar";
                $this->_failed();
            }
        } else {
            //CAPTCHA gagal
            //echo "error";exit;
            $this->data['paket_id'] = $paket_id;
            $this->data['captcha_error'] = TRUE;
            $this->load->view('signup', $this->data);
        }
        //echo 123;
    }

    /**
     * frontpage
     * success
     */
    private function _success() {
        $this->_front_check();
        $this->load->view('success', $this->data);
    }
    
    public function success(){
        $this->_success();        
    }

    /**
     * frontpage
     * failed
     */
    private function _failed() {
        $this->_front_check();

        //$this->data['error_msg'] = "Email Telah Terdaftar";
        $this->load->view('failed', $this->data);
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
     * contact me
     */
    function contact_me() {
        $result = $this->_check_captcha($_POST['captcha']);
        $result = json_decode($result);
        //print_r($result);
        if ($result->success == 1) {
            $data = array(
                'VNAME' => $this->security($this->input->post('name', TRUE)),
                'VHPNUM' => $this->security($this->input->post('phone', TRUE)),
                'VEMAIL' => $this->security($this->input->post('email', TRUE)),
                'VMSG' => $this->security($this->input->post('message', TRUE)),
                'VCREA' => 'SYSTEM',
                'DCREA' => date("Y-m-d H:i:s")
            );
            $this->gm->insert("contactus", $data);
            //SEND TO MY EMAIL
        }
    }

    /**
     * frontpage
     * forgot
     */
    function forgot() {
        $this->_front_check();
        $this->load->view('forgot', $this->data);
    }

    /**
     * frontpage
     * signin
     */
    function signin() {
        $this->_front_check();

        $email = $this->security($this->input->post('email', TRUE));
        $gagal_login = $this->security($this->input->get('gagal_login', TRUE));
        if ($email) {
            $this->data['email_success'] = TRUE;
            //email change password
            $new_password = $this->_generate_random_string(6);
            //change password
            $this->gm->update_data("users", array("VPASSWORD" => $new_password), 0, array("VEMAIL" => $email));
            //send email new password
            $this->load->library('email');
            $this->email->from('no-reply@belajarujian.com');
            $this->email->to($email);            
            $this->email->subject('Reset Password');
            $this->email->message('Password baru Anda: ' . $new_password . "\r\n\r\nRegards, \r\nBelajarUjian.com");
            $this->email->send();
            
        } else if ($gagal_login == 1) {
            $this->data['gagal_login'] = TRUE;
        }
        $this->load->view('signin', $this->data);
    }
    

    function _generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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

}
