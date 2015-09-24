<?php 
$szSecretKey = "ozfRhIck36KYwmeM";
$channel = ''; //leave it empty if requesting UniPin Express or UniPin Wallet

$mapMerchant = array();
$mapMerchant["guid"]		= "9571349C-EF2C-3889-3B40-DAEEE31F677B";
$mapMerchant["reference"]	= "YOUR_TRANSACTION_NO";
$mapMerchant["message"]		= "Hello UniPin, Welcome\\nLine 2\\nLine 3";
$mapMerchant["urlAck"]		= "http://www.belajarujian.com/index.php/payment/notification";
$mapMerchant["urlReturn"]	= ""; //optional, leave it empty if redirect no required 

$grDenom = array();
$grDenom[] = array("amount" => 10000, "description" => "10.000");
$grDenom[] = array("amount" => 20000, "description" => "20.000");
$grDenom[] = array("amount" => 50000, "description" => "50.000");
$grDenom[] = array("amount" => 100000, "description" => "100.000");
$grDenom[] = array("amount" => 300000, "description" => "300.000");
$grDenom[] = array("amount" => 500000, "description" => "500.000");

$hashIn = "";
foreach ($mapMerchant as $val)
	$hashIn .= $val;

foreach ($grDenom as $eleDenom)
	$hashIn .= $eleDenom["amount"] . $eleDenom["description"];

$hashIn .= $channel;
$hashIn .= $szSecretKey;

$hashOut = md5($hashIn);

$mapJson = array();
$mapJson["merchant"]		= $mapMerchant;
$mapJson["denominations"]	= $grDenom;
$mapJson["channel"]			= $channel;
$mapJson["signature"]		= $hashOut;

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
curl_setopt($fpHttp, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
curl_setopt($fpHttp, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($fpHttp, CURLOPT_HEADER, 0);
curl_setopt($fpHttp, CURLOPT_POSTFIELDS, $szJson);
curl_setopt($fpHttp, CURLOPT_RETURNTRANSFER, true);
curl_setopt($fpHttp, CURLOPT_TIMEOUT, 10);


$jsonResult = curl_exec($fpHttp);
curl_close($fpHttp);

$jsnResult = json_decode($jsonResult, true);

if ($jsnResult["status"] != "0")
{
	echo var_dump($jsnResult);
	return;
}

header('location:'.$jsnResult["url"]); // redirect user to UniBox

?>