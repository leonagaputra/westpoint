<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Payment extends My_Controller {

    var $production;
    var $email_to;

    public function __construct() {
        parent::__construct();
        $this->load->model('gen_model', 'gm');
//        $this->load->model('paket', 'pk');
//        $this->load->model('question', 'qs');
//        $this->load->model('hak_akses', 'ha');
        $this->data['company'] = "BelajarUjian.com";
        $this->email_to = "leo.nagaputra@gmail.com";
    }

    //put your code here
    public function index() {
        header('location:' . $this->data['base_url'] . "index.php/backend/home");
    }
    
    public function test(){
        $this->load->helper('file');
        $data = array("test"=>1,"test2"=>2);
        $data = json_encode($data);

        if ( !write_file('file.txt', $data)){
             echo 'Unable to write the file';
        }
        else echo "can write";
        //write_file('file.txt', "masuk sini2");
        /*$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        $txt = "John Doe\n";
        fwrite($myfile, $txt);
        $txt = "Jane Doe\n";
        fwrite($myfile, $txt);
        fclose($myfile);*/
    }
    
    public function notification(){
        $this->load->helper('file');
        //write_file('file.txt', "masuk sini");
        
        $szJson = file_get_contents("php://input");
        write_file('file.txt', $szJson);
        
        //write_file('file.txt', $szJson);
                
        $pJson = json_decode($szJson, true);
        
        
        
        $vcrea= $this->session->userdata('VEMAIL');
        $dcrea = date("Y-m-d H:i:s");
        
        $data = array(
            "VGUID" => $pJson["merchant"]["guid"],
            "VNAME" => $pJson["merchant"]["name"],
            "VURL" => $pJson["merchant"]["url"],
            "ISTATUS" => $pJson["transaction"]["status"],
            "IAMOUNT" => $pJson["transaction"]["amount"],
            "VTYPE" => $pJson["transaction"]["type"],
            "VCURRENCY" => $pJson["transaction"]["currency"],
            "VMSG" => $pJson["transaction"]["message"],
            "VTRXNO" => $pJson["transaction"]["trxNo"],
            "VTIME" => $pJson["transaction"]["time"],
            "VREF" => $pJson["transaction"]["reference"],
            "VITEM" => $pJson["transaction"]["item"],
            "VSIGNATURE" => $pJson["signature"],
            "VPAYLOAD" => $pJson["payload"],
            "VCREA" => $vcrea,
            "DCREA" => $dcrea
        );
        
        $this->gm->insert("txnunipin", $data);
        
        // return the status in partner side to UniPin for complete the transaction.
        $return = array();
        $return['status'] = '0';
        $return['message'] = 'Reload Successful.';

        $json_return = json_encode($return);
        echo $json_return;

    }

    

}
