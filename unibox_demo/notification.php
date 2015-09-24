<?php

// for step 9 (Asynchronous Acknowledgement)

$szJson = file_get_contents("php://input");
$pJson = json_decode($szJson, true);




/* ----------------------------------------------
  upon received the callback/notify from UniPin, 
  please proceed to perform logical statement 
  including add user credit, keep log, and etc.
-------------------------------------------------  */






// return the status in partner side to UniPin for complete the transaction.
$return = array();
$return['status'] = '0';
$return['message'] = 'Reload Successful.';

$json_return = json_encode($return);
echo $json_return;


?>