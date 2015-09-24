<?php 
$szSecretKey = "ozfRhIck36KYwmeM";
$channel = "XL";

$mapMerchant = array();
//$mapMerchant["guid"]		= "YOUR_GUID";//starngage16september2015
$mapMerchant["guid"]		= "9571349C-EF2C-3889-3B40-DAEEE31F677B";
$mapMerchant["reference"]	= "1";
$mapMerchant["message"]		= "Hello UniPin";
$mapMerchant["urlAck"]		= "http://www.belajarujian.com/unibox_demo/notification.php";
$mapMerchant["urlReturn"]	= ""; //optional, leave it empty if redirect no required 

$grDenom = array();
$grDenom[] = array("amount" => 5500, "description" => "5.500");
/*
$grDenom[] = array("amount" => 5500, "description" => "5.500");
$grDenom[] = array("amount" => 16500, "description" => "16.500");
$grDenom[] = array("amount" => 49500, "description" => "49.500");
$grDenom[] = array("amount" => 82500, "description" => "82.500");
$grDenom[] = array("amount" => 110000, "description" => "110.000");
 
 */

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
//print_r($szJson);exit;

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
        // Set a referer        
curl_setopt($fpHttp, CURLOPT_SSL_VERIFYPEER, false);
        // User agent
curl_setopt($fpHttp, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
        // Include header in result? (0 = yes, 1 = no)
curl_setopt($fpHttp, CURLOPT_HEADER, 0);
       // Should cURL return or print out the data? (true = return, false = print)
curl_setopt($fpHttp, CURLOPT_POSTFIELDS, $szJson);
curl_setopt($fpHttp, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
curl_setopt($fpHttp, CURLOPT_TIMEOUT, 10);

$jsonResult = curl_exec($fpHttp);
curl_close($fpHttp);

$jsnResult = json_decode($jsonResult, true);
//print_r($jsnResult);exit;
if ($jsnResult["status"] != "0")
{
	echo var_dump($jsnResult);
	return;
}

header('location:'.$jsnResult["url"]); // redirect user to UniBox

?>