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
    var $secret_key;
    var $guid;

    public function __construct() {
        parent::__construct();
        $this->load->model('gen_model', 'gm');
        $this->load->model('transaksi', 'tx');
//        $this->load->model('paket', 'pk');
//        $this->load->model('question', 'qs');
//        $this->load->model('hak_akses', 'ha');
        $this->data['company'] = "BelajarUjian.com";
        $this->data['expired'] = "1 tahun";
        $this->email_to = "leo.nagaputra@gmail.com";
        $this->secret_key = "ozfRhIck36KYwmeM";
        $this->guid = "9571349C-EF2C-3889-3B40-DAEEE31F677B";
    }

    //put your code here
    public function index() {
        header('location:' . $this->data['base_url'] . "index.php/backend/home");
    }

    public function test() {
        $this->load->helper('file');
        $data = array("test" => 1, "test2" => 2);
        $data = json_encode($data);

        if (!write_file('file.txt', $data)) {
            echo 'Unable to write the file';
        } else
            echo "can write";
        //write_file('file.txt', "masuk sini2");
        /* $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
          $txt = "John Doe\n";
          fwrite($myfile, $txt);
          $txt = "Jane Doe\n";
          fwrite($myfile, $txt);
          fclose($myfile); */
    }

    public function notification() {
        $this->load->helper('file');
        //write_file('file.txt', "masuk sini");

        $szJson = file_get_contents("php://input");
        write_file('file.txt', $szJson);

        //write_file('file.txt', $szJson);                
        $pJson = json_decode($szJson, true);

        $vcrea = "UNIPIN";
        $dcrea = date("Y-m-d H:i:s");
        $dcrea_1year = date('Y-m-d H:i:s', strtotime("+1 years"));

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
        //$json_return = json_encode($return);
        //echo $json_return;exit;
        //UPDATE KUITANSI
        //if success, update data
        if ($pJson["transaction"]["status"] == 0) {                        
            $txn = $this->gm->get("txnpaket", array("ID" => $pJson["transaction"]["reference"]), TRUE);                                
            $invoice = "INV/".date("Y",strtotime($txn->DTRANS))."/".date("m",strtotime($txn->DTRANS))."/".date("d",strtotime($txn->DTRANS))."/".$pJson["transaction"]["reference"];                                  
            $data2 = array(
                'VUNISTAT' => 'T',
                'IAMOUNT' => $pJson["transaction"]["amount"],
                'VMODI' => $vcrea,
                'DMODI' => $dcrea,
                'VIDKUITANSI' => $invoice//FORMAT : INV/YYYY/MM/DD/X[1...]
            );                 
            
            $this->gm->update_data("txnpaket", $data2, $pJson["transaction"]["reference"]);   
            
            //TAMBAHKAN ke USERPAKET
            
            //jika belum ada insert, else update
            $ada = FALSE;
            if($cek = $this->pk->cek_user_paket($txn->USER_ID, $txn->PAKET_ID, TRUE)){
                if($cek->cnt > 0) $ada = TRUE;
            }
            if(!$ada){
                $insert = array(
                    'PAKET_ID' => $txn->PAKET_ID,
                    'USER_ID' => $txn->USER_ID,
                    'DSTART' => $dcrea,
                    'DEND' => $dcrea_1year,
                    'VTRIAL' => "F",
                    'VCREA' => 'SYSTEM',
                    'DCREA' => $dcrea
                );
                $this->gm->insert("userpaket", $insert);
            } 
            else {
                $update  = array(
                    'DEND' =>$dcrea_1year,
                    'VTRIAL' => 'F',
                    'VMODI' => 'SYSTEM',
                    'DMODI' => $dcrea
                );
                $where = array(
                    'PAKET_ID' => $txn->PAKET_ID,
                    'USER_ID' => $txn->USER_ID
                );
                $this->gm->update_data("userpaket", $update, 0, $where);
            }
            
            
            //jika sukses EMAIL KUITANSI, jika gagal, EMAIL GAGAL
            $this->_send_email($pJson["transaction"]["reference"], $dcrea_1year);
        }       

        $json_return = json_encode($return);
        echo $json_return;
    }
    
    public function kuitansi($transaksi_id){
        
        $txn = $this->gm->get("txnpaket", array("ID" => $transaksi_id), TRUE);                                        
        
        echo date('Y-m-d', strtotime("+1 years"));exit;
        
        $txn = $this->tx->get($transaksi_id);
        $this->data['transaksi'] = $txn;
        $this->load->view('email/invoice', $this->data);
    }

    private function _send_email($transaksi_id, $expired) {
        $txn = $this->tx->get($transaksi_id);
        $this->data['transaksi'] = $txn;
        $this->data['expired'] = date('d-M-Y', strtotime($expired));
        //exit;
        $this->load->library('email');
        $fromemail = "no-reply@belajarujian.com";
        $toemail = $txn->VEMAIL;
        $subject = "BelajarUjian - Invoice ";
        $mesg = $this->load->view('email/invoice', $this->data, TRUE);

        $this->load->library('email');

        $config = array(
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'mailtype' => 'html'
        );

        $this->email->initialize($config);

        $this->email->to($toemail);
        $this->email->from($fromemail);
        $this->email->subject($subject);
        $this->email->message($mesg);
        $mail = $this->email->send();
        //$this->load->view("email/invoice", $this->data);
    }

    public function pay_unipin($payment = FALSE, $paket_id = 0) {
        if (!in_array($payment, array('unipin', 'xl', 'indosat', 'telkomsel'))) {
            echo "Metode Pembayaran Tidak Dikenali";
            exit;
        }

        //INSERT TRANSAKSI
        $reference_id = 0;
        if ($paket_id > 0) {
            $dcrea = date("Y-m-d H:i:s");
            $insert = array(
                'USER_ID' => $this->session->userdata('ID'),
                'PAKET_ID' => $paket_id,
                'VUNISTAT' => 'F',
                'DTRANS' => $dcrea,
                'IAMOUNT' => 0,
                'VCREA' => $this->session->userdata('ID'),
                'DCREA' => $dcrea
            );
            $reference_id = $this->gm->insert('txnpaket', $insert);
        }

        $szSecretKey = $this->secret_key;

        $mapMerchant = array();
        $mapMerchant["guid"] = $this->guid;
        $mapMerchant["reference"] = $reference_id;
        //$mapMerchant["message"] = "Hello UniPin, Welcome\\nLine 2\\nLine 3";
        $mapMerchant["message"] = "Silakan melakukan pembayaran";
        $host = "http://beta.belajarujian.com/";
        if(!strpos($this->data['base_url'],"localhost")){
            $host = $this->data['base_url'];   
            //echo "here";exit;
        }
                
        $mapMerchant["urlAck"] = $host."index.php/payment/notification";
        //echo $mapMerchant["urlAck"];exit;
        //$mapMerchant["urlAck"] = $this->data['base_url'] . "index.php/payment/notification";
        $mapMerchant["urlReturn"] = ""; //optional, leave it empty if redirect no required 

        if ($payment == 'unipin') {
            $channel = ''; //leave it empty if requesting UniPin Express or UniPin Wallet
            $grDenom = array();
            $grDenom[] = array("amount" => 10000, "description" => "Paket BelajarUjian");
            /* $grDenom[] = array("amount" => 20000, "description" => "20.000");
              $grDenom[] = array("amount" => 50000, "description" => "50.000");
              $grDenom[] = array("amount" => 100000, "description" => "100.000");
              $grDenom[] = array("amount" => 300000, "description" => "300.000");
              $grDenom[] = array("amount" => 500000, "description" => "500.000"); */
        } else if ($payment == 'xl') {
            $channel = 'XL'; //leave it empty if requesting UniPin Express or UniPin Wallet
            $grDenom = array();
            $grDenom[] = array("amount" => 16500, "description" => "Paket BelajarUjian");
        } else if ($payment == 'telkomsel') {
            $channel = 'UPOINT'; //leave it empty if requesting UniPin Express or UniPin Wallet
            $grDenom = array();
            $grDenom[] = array("amount" => 10000, "description" => "Paket BelajarUjian");
        } else if ($payment == 'indosat') {
            $channel = 'INDOSAT'; //leave it empty if requesting UniPin Express or UniPin Wallet
            $grDenom = array();
            $grDenom[] = array("amount" => 16500, "description" => "Paket BelajarUjian");
        }


        $hashIn = "";
        foreach ($mapMerchant as $val)
            $hashIn .= $val;

        foreach ($grDenom as $eleDenom)
            $hashIn .= $eleDenom["amount"] . $eleDenom["description"];

        $hashIn .= $channel;
        $hashIn .= $szSecretKey;

        $hashOut = md5($hashIn);

        $mapJson = array();
        $mapJson["merchant"] = $mapMerchant;
        $mapJson["denominations"] = $grDenom;
        $mapJson["channel"] = $channel;
        $mapJson["signature"] = $hashOut;

        $szJson = json_encode($mapJson);
        /*
          $fpHttp = curl_init("https://payment.unipin.co.id/unibox/new");
          curl_setopt($fpHttp, CURLOPT_POST, 1);
          //curl_setopt($fpHttp, CURLOPT_SSL_VERIFYHOST, 0);
          //curl_setopt($fpHttp, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($fpHttp, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
          curl_setopt($fpHttp, CURLOPT_POSTFIELDS, $szJson);
          curl_setopt($fpHttp, CURLOPT_RETURNTRANSFER, 1);
         */

        $fpHttp = curl_init();
        curl_setopt($fpHttp, CURLOPT_URL, "https://payment.unipin.co.id/unibox/new");
        curl_setopt($fpHttp, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($fpHttp, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
        curl_setopt($fpHttp, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($fpHttp, CURLOPT_HEADER, 0);
        curl_setopt($fpHttp, CURLOPT_POSTFIELDS, $szJson);
        curl_setopt($fpHttp, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($fpHttp, CURLOPT_TIMEOUT, 10);


        $jsonResult = curl_exec($fpHttp);
        curl_close($fpHttp);

        $jsnResult = json_decode($jsonResult, true);

        if ($jsnResult["status"] != "0") {
            echo var_dump($jsnResult);
            return;
        }


        header('location:' . $jsnResult["url"]); // redirect user to UniBox
    }

}
