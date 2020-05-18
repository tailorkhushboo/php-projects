<?php



    function send_notification($tokens,$body) {
     
                $url = "https://fcm.googleapis.com/fcm/send";
                $token = $tokens;
                $serverKey = 'AAAAA6f6Gq8:APA91bHEBSV1FelB4JIOqRqwRBE1jAjVnfI50Hkmia_Pl-93ns8EoD3ByfHKrXB4TKGANDuE2ylMAKjHnpUmsnz9-s5E8U8BvLkLT3uPuUXj_SsmhfQgGy4ZYQfq2h9Tz6SEXrrarW1c';
                $title = "Fortysix";
               
  
                $notification = array(
                    'title' =>$title , 
                    'body' => $body, 
                    'sound' => 'default',
                    'badge' => '1'
                    );
                
                $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
                        
                $json = json_encode($arrayToSend);
                $headers = array();
                $headers[] = 'Content-Type: application/json';
                $headers[] = 'Authorization: key='. $serverKey;
                $ch = curl_init();
             
               curl_setopt ( $ch, CURLOPT_URL, $url );
                curl_setopt ( $ch, CURLOPT_POST, true );
                curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
                curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
                curl_setopt ( $ch, CURLOPT_POSTFIELDS, $json );
    
                 $result = curl_exec($ch);
                 curl_close($ch);
     }
    
   function send_notification_test($tokens) {
     
            $url = "https://fcm.googleapis.com/fcm/send";
            $token = $tokens;
            $serverKey = 'AAAAA6f6Gq8:APA91bHEBSV1FelB4JIOqRqwRBE1jAjVnfI50Hkmia_Pl-93ns8EoD3ByfHKrXB4TKGANDuE2ylMAKjHnpUmsnz9-s5E8U8BvLkLT3uPuUXj_SsmhfQgGy4ZYQfq2h9Tz6SEXrrarW1c';
            $title = "Notification title";
            $body=	"this is for testing purpose";
            $type="sent";
            

 						
            $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
        
        
        $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high','type' => $type );
            
            $json = json_encode($arrayToSend);
            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key='. $serverKey;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        
       $result = curl_exec($ch );
	   $result = json_decode($result, true);
	   if($result['success'] == 1){
			$response['status'][] = array( 
 								  'status'	=>'1',
 								  'title' =>$title , 
 								  'body' => $body
 								);
	   }
	   else{
			$response['status'][] = array( 
 								  'status'	=>'0'
 								);
	   }
        curl_close( $ch );
        echo json_encode($response);
 
    }

?>
