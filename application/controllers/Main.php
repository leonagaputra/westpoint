<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Main extends My_Controller {
    
    var $production;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('gen_model', 'gm');   
        $this->data['company'] = "BelajarUjian.com";
    }
    
    //put your code here
    public function index(){  
        $this->production = TRUE;
        if($this->production) $this->_production();
        else $this->_under_construction();                
    }
    
    public function beta(){
        $this->_production();
    }
    
    private function _under_construction(){
        $this->load->view('construction', $this->data);
    }  
    
    private function _production(){
        $this->_cek_user_login();
        $this->load->view('starter', $this->data);
        //$this->_cek_user_login();
        //echo "prod";
    }
    
    public function register(){
        $this->load->view('register', $this->data);
    }
    
    public function login(){
        $this->load->view('login', $this->data);
    }
    
    public function frontpage(){
        $this->load->view('frontpage', $this->data);
    }
    
    private function _cek_user_login(){
        //echo "test". $this->session->userdata('username')." lalala";exit;
        if(!$this->session->userdata('VUSERNAME')){
            //echo "test";exit;            
            header('location:'.$this->data['base_url']."index.php/main/frontpage");
        }
        $this->data['username'] = strtoupper($this->session->userdata('VUSERNAME'));
        //echo "test22". $this->session->userdata('username')." lalala";exit;
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        header('location:'.$this->data['base_url'] . 'index.php/main/login');
    }
        
}
