<?php 
$szSecretKey = "ozfRhIck36KYwmeM";
$channel = "UPVOUCHER";

$mapMerchant = array();
$mapMerchant["guid"]		= "9571349C-EF2C-3889-3B40-DAEEE31F677B";
$mapMerchant["reference"]	= "YOUR_TRANSACTION_NO";
$mapMerchant["message"]		= "Hello UniPin, Welcome\\nLine 2\\nLine 3";
$mapMerchant["urlAck"]		= "http://www.belajarujian.com/unibox_demo/notification.php";
$mapMerchant["urlReturn"]	= ""; //optional, leave it empty if redirect no required 

$grDenom = array();
$grDenom[] = array("amount" => 10000, "description" => "8,000 Chips");
$grDenom[] = array("amount" => 25000, "description" => "20,000 Chips");
$grDenom[] = array("amount" => 50000, "description" => "40,000 Chips");
$grDenom[] = array("amount" => 100000, "description" => "80,000 Chips");

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

$fpHttp = curl_init("https://payment.unipin.co.id/unibox/new");
curl_setopt($fpHttp, CURLOPT_POST, 1);
//curl_setopt($fpHttp, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($fpHttp, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($fpHttp, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($fpHttp, CURLOPT_POSTFIELDS, $szJson);
curl_setopt($fpHttp, CURLOPT_RETURNTRANSFER, 1);
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