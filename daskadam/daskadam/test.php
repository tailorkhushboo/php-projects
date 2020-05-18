<?php
  // JSON string


  $someJSON = '{"user_id":"53881","email":"vabz.vbinfotech@gmail.com","orderid":"53881_25025","checksum":"t5sUsRnGB4bM5zkEMaZSdGx93W+EEFrqlUtxUpke7m+CDB89sCGKYVRfmy8dOngxzlxptw5Dl76eNRf3exZiXaymZsMRGrQhHo33Zteg\/7Q=","bankname":"AXIS","txtstatus":"TXN_SUCCESS","txtid":"20200316111212800110168502301357132","date":"16-03-2020","txtamount":"25.00","currency":"INR","payment_mode":"NB","res_code":"01","res_msg":"Txn Success"}';

  // Convert JSON string to Array
  $someArray = json_decode($someJSON, true);
  print_r($someArray);        // Dump all data of the Array
  echo $someArray["user_id"]; // Access Array data

  // Convert JSON string to Object
 
  $someObject = json_decode($someJSON);
  print_r($someObject);      // Dump all data of the Object
  echo $someObject[0]->user_id; // Access Object data
  
  
?>