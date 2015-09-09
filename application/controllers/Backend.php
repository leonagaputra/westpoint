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
        $this->load->model('paket', 'pk');
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
        if (!$this->session->userdata('VNAMA')) {
            //echo "test2";exit;            
            header('location:' . $this->data['base_url'] . "index.php/main/frontpage");
        }
        //echo $this->session->userdata('VEMAIL');
        //exit;
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

    function do_signin() {
        $data = array();

        $data['VEMAIL'] = $this->security($this->input->post('email', TRUE));
        $data['VPASSWORD'] = $this->security($this->input->post('password', TRUE));
        $var_cookie = 'belajarujian_remember';
        if (isset($_POST['remember']) && $_POST['remember'] == 1) {
            //set cookie
            //1 year cookie
            $year = time() + 31536000;
            $cookie = array(
                'name' => $var_cookie,
                'value' => $data['VEMAIL'],
                'expire' => $year
            );
            $this->input->set_cookie($cookie);
        } else {
            delete_cookie($var_cookie);
        }

        if ($result = $this->gm->get("users", $data, TRUE)) {
            //print_r($result);exit;
            $this->data['username'] = strtoupper($data['VEMAIL']);
            $this->session->set_userdata((array) $result);
            header('location:' . $this->data['base_url'] . 'index.php/backend/home');
        } else {
            header('location:' . $this->data['base_url'] . 'index.php/main/signin?gagal_login=1');
        }
        $this->index();
    }

    function home() {
        //cek login
        $this->_cek_user_login();
        //cek user akses, jangan kasi cek hak akses, krn semua redirect ke sini jika tidak punya akses
        //$this->cek_hak_akses($this->session->userdata('ID'), "index.php/backend/home");
        //exit;

        $this->_get_backend_menu();
//        print_r($prep);exit;
//        print_r($this->data);exit;

        $this->data['backend_page'] = 'homepage.php';

        //print_r($this->data['menus']);exit;
        //get_user_class 
        $datas = NULL;
        $datas = $this->pk->get_user_paket($this->session->userdata('VEMAIL'));

        foreach ($datas as $data) {
            $data->SOAL_ID = 0;
            //cek apakah pada paket hanya 1 modul dan 1 soal, jika iya, isi SOAL_ID
            //cek jml modul
            $modul_id = $this->pk->cek_modul($data->ID);
            if ($modul_id) {
                //print_r($modul_id);exit;
                $soal_id = $this->pk->cek_soal($modul_id->MODUL_ID);
                //print_r($soal_id);exit;
                if ($soal_id) {
                    $data->SOAL_ID = $soal_id->ID;
                }
            }
        }
        //print_r ($datas);exit;
        $this->data['classes'] = $datas;

        $this->load->view('home', $this->data);
    }

    function paket_soal() {
        //cek login
        $this->_cek_user_login();
        //cek user akses
        $this->cek_hak_akses($this->session->userdata('ID'), "index.php/backend/paket_soal");
        //menu dan nama
        $this->_get_backend_menu();

        $this->data['backend_page'] = 'paket_soal.php';


        $datas = NULL;
        $datas = $this->pk->get_all_paket();
        //print_r($datas);exit;
        $this->data['classes'] = $datas;
        $this->load->view('home', $this->data);
    }

    function latihan($soal_id) {
        //cek login
        $this->_cek_user_login();

        //cek user soal
        $this->cek_user_soal($this->session->userdata('ID'), $soal_id);
        $this->_get_backend_menu();
        
        //get detail soal
        $this->data['soal_desc'] = $this->gm->get("soal", array("ID"=>$soal_id), TRUE);
        //print_r($this->data['soal_desc']);exit;
        
        //get detail questions        
        //random x jumlah soal dari seluruh soal yang ada
        $questions = $this->gm->get("questions", array("SOAL_ID", $soal_id), FALSE, FALSE);                
        $jml_soal = 60;
        $rand_questions = array_rand($questions,$jml_soal);
        $use_questions = array();
        for($i = 0; $i < count($rand_questions); $i++){
            array_push($use_questions, $questions[$rand_questions[$i]]);
        }
        //print_r($use_questions);exit;        
        
        $this->data['questions'] = $use_questions;
        //print_r($this->data['questions']);exit;
        
        $this->data['backend_page'] = 'form_soal/latihan.php';
        $this->load->view('home', $this->data);
    }

    function upload_soal2() {
        print_r($_FILES);
    }

    function upload_soal() {
        //cek login
        $this->_cek_user_login();
        //cek user akses
        $this->cek_hak_akses($this->session->userdata('ID'), "index.php/backend/upload_soal");
        $this->_get_backend_menu();

        //cek uploadfile
        //print_r($_FILES);
        $this->data['onupload'] = FALSE;
        $this->data['error'] = FALSE;
        $this->data['error_msg'] = "";
        if (!empty($_FILES)) {
            $this->data['onupload'] = TRUE;
            if ($_FILES["inputsoal"]["tmp_name"]) {
                $read_csv = $this->_read_csv($_FILES["inputsoal"]["tmp_name"]);
                $this->data['error'] = $read_csv['error'];
                $this->data['error_msg'] = $read_csv['error_msg'];
            }
        }

        $this->data['backend_page'] = 'admin/upload_soal.php';
        $this->load->view('home', $this->data);
    }

    function _get_backend_menu() {
//        $return = array(
//            'nama' => $this->session->userdata('VNAMA'),
//            'menus' => $this->get_user_menu($this->session->userdata('ID'))
//        );
//        return $return;
        $this->data['nama'] = $this->session->userdata('VNAMA');
        $this->data['menus'] = $this->get_user_menu($this->session->userdata('ID'));
    }

    private function _read_csv($file) {
        $return = array(
            "error" => "",
            "error_msg" => ""
        );
        $row = 1;
        $error = FALSE;
        $error_msg = "";

        $result = array();
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                //print_r($data);
                $num = count($data);
                //pengecekan row pertama harus sesuai
                if (count($data) != 7) {
                    $error = TRUE;
                    $error_msg .= "Format Salah, jumlah kolom tidak sesuai pada baris ke " . $row . ".<br/>";                    
                }
                else {
                    if ($row == 1) {
                        //print_r($data);exit;
                        //$row = array ( [0] => JENIS [1] => SOAL [2] => OPSI_A [3] => OPSI_B [4] => OPSI_C [5] => OPSI_D [6] => JAWAB ) 
                        if (strtoupper($data[0]) == "JENIS" &&
                                strtoupper($data[1]) == "SOAL" &&
                                strtoupper($data[2]) == "OPSI_A" &&
                                strtoupper($data[3]) == "OPSI_B" &&
                                strtoupper($data[4]) == "OPSI_C" &&
                                strtoupper($data[5]) == "OPSI_D" &&
                                strtoupper($data[6]) == "JAWAB") {
                            //do nothing
                        } else {
                            $error = TRUE;
                            $error_msg .= "Format Salah, title kolom tidak sesuai, harus bernilai JENIS;SOAL;OPSI_A;OPSI_B;OPSI_C;OPSI_D;JAWAB pada baris ke " . $row . ".<br/>";
                        }
                    } else {
                        //untuk row yang lain
                        //kolom 1, harus antara 1/2/3
                        $kolom1 = array(1, 2, 3);
                        if (!in_array($data[0], $kolom1)) {
                            $error = TRUE;
                            $error_msg .= "Format Salah, kolom 1 harus bernilai antara 1, 2 atau 3, pada baris ke " . $row . ".<br/>";
                        }

                        //kolom 7, harus antara A/B/C/D
                        $kolom7 = array("A", "B", "C", "D");
                        if (!in_array($data[6], $kolom7)) {
                            $error = TRUE;
                            $error_msg .= "Format Salah, kolom 7 harus bernilai antara A, B, C atau D, pada baris ke " . $row . ".<br/>";
                        }
                    }
                }

                //jika tidak ada yang error, masukkan ke result
                if (!$error  && $row > 1) {
                    array_push($result, $data);
                }
                $row++;
                //print_r($data);
            }
            fclose($handle);
        }
        
        //jika tidak ada error
        if(!$error){
            //print_r($result);exit;
            $dcrea = date("Y-m-d H:i:s");
            $table = "questions";
            foreach ($result as $res){
                $insert_data = array(
                    "SOAL_ID" => $res[0],
                    "VSOAL" => $res[1],
                    "VOPSIA" => $res[2],
                    "VOPSIB" => $res[3],
                    "VOPSIC" => $res[4],
                    "VOPSID" => $res[5],
                    "VJAWAB" => $res[6],
                    "VCREA" => $this->session->userdata('VEMAIL'),
                    "DCREA" => $dcrea
                );
                $this->gm->insert($table, $insert_data);
            }
        }
        $return["error"] = $error;
        $return["error_msg"] = $error_msg;
        //print_r($return);
        //exit;
        return $return;
    }

}
