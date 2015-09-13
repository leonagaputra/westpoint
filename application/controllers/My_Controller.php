<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_Controller extends CI_Controller {

    var $data;

    function __construct() {
        parent::__construct();
        $this->data['base_app'] = $this->config->item('base_app');
        $this->data['base_url'] = $this->config->item('base_url');
        $this->data['version'] = "0.3";
        $this->load->model('hak_akses', 'ha');
        $this->load->model('gen_model', 'gm');
        $this->load->model('paket', 'pk');
    }

    function index() {
        //echo $this->config->item('base_url');
    }

    function security($str) {
        if (is_array($str)) {
            $return = array();
            foreach ($str as $key => $val) {
                $return[$key] = htmlentities($val, ENT_QUOTES);
            }
            return $return;
        }
        return htmlentities($str, ENT_QUOTES);
    }

    function security_decode($str) {
        return html_entity_decode($str, ENT_QUOTES);
    }
    
    function get_input($str, $is_secure = TRUE){
        if($is_secure)
            return $this->security($this->input->post($str));
        else
            return $this->input->post($str);
        //return $this->input->post($str);
    }

    function testing() {
        $array = array("a", "b");
        $this->set_json($array);
    }

    function set_json($array) {
//		$this->output->set_header('Content-type: text/json');
        $this->output->set_header('Content-type: application/json');
        $this->output->set_output(json_encode($array));
    }

    function download_file($fullPath) {
        // Must be fresh start
        if (headers_sent())
            die('Headers Sent');

        // Required for some browsers
        if (ini_get('zlib.output_compression'))
            ini_set('zlib.output_compression', 'Off');

        // File Exists?
        if (file_exists($fullPath)) {

            // Parse Info / Get Extension
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);

            // Determine Content Type
            switch ($ext) {
                case "pdf": $ctype = "application/pdf";
                    break;
                case "exe": $ctype = "application/octet-stream";
                    break;
                case "zip": $ctype = "application/zip";
                    break;
                case "doc": $ctype = "application/msword";
                    break;
                case "xls": $ctype = "application/vnd.ms-excel";
                    break;
                case "ppt": $ctype = "application/vnd.ms-powerpoint";
                    break;
                case "gif": $ctype = "image/gif";
                    break;
                case "png": $ctype = "image/png";
                    break;
                case "jpeg":
                case "jpg": $ctype = "image/jpg";
                    break;
                default: $ctype = "application/force-download";
            }

            header("Pragma: public"); // required
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private", false); // required for certain browsers
            header("Content-Type: $ctype");
            header("Content-Disposition: attachment; filename=\"" . basename($fullPath) . "\";");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . $fsize);

            readfile($fullPath);
        } else
            die('File Not Found');
    }
    
    function cek_user_akses(){
        
    }
    
    protected function get_user_menu($user_id){
        //echo $user_id;
        $menus = $this->ha->get_user_menu($user_id);
        return $menus;
    }
    
    protected function cek_hak_akses($user_id, $menu_path){
        $akses = $this->ha->cek_hak_akses($user_id, $menu_path);
        if(!$akses){
            header('location:' . $this->data['base_url'] . "index.php/backend/home");
        }
        //print_r($akses);exit;
        //return $akses;
    }
    
    protected function cek_user_soal($user_id, $soal_id){
        if(!$this->pk->cek_user_soal($user_id, $soal_id)){
            header('location:' . $this->data['base_url'] . "index.php/backend/home");
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */