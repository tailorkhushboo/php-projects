<?php include("includes/connection.php");
 	  include("includes/function.php"); 	
 	   include("includes/GCM.php"); 	
	
	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
	

    //users update profile
     if(isset($_GET['postUserProfileUpdate']))
    {
    	
    		$sql = "SELECT * FROM tbl_users where id = '".$_POST['id']."' ";
    		$res = mysqli_query($mysqli,$sql);
    		$row = mysqli_fetch_assoc($res);
    		
    		if($_FILES['imageurl']['name'] != "")
    		{	
    			if($row['imageurl'] !== "") 
    			{
    			 	unlink('images/'.$row['imageurl']); 
    			 	unlink('images/thumbs/'.$row['imageurl']); 
    			}
    
    			$facility_image=rand(0,99999)."_".$_FILES['imageurl']['name'];
    		   //Main Image
    		   	$tpath1='images/'.$facility_image; 		
    			$pic1=compress_image($_FILES["imageurl"]["tmp_name"], $tpath1, 80);
    		 	$thumbpath='images/thumbs/'.$facility_image;		
    	       	$thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
     		}
     		else
     		{
     		     $facility_image = $row['imageurl'] ;
     		}
    
    			 $user_edit= "UPDATE tbl_users SET 
    			name='".$_POST['name']."',
    			imageurl = '".$facility_image."'
    			WHERE id = '".$_POST['id']."'";	 
    		
    		
       		$user_res = mysqli_query($mysqli,$user_edit);	
    	  	
    		$set['bike_service'][]=array('msg'=>'Updated','success'=>'1');
    		header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();
    }


	//user vlogin
	else if(isset($_GET['postuserlogin'])) 
	{
	   
      	    $phone_number = $_POST['phone_number'];
      	       $login_type = $_POST['login_type'];
            $text=rand(1000,9999);

	        if($_POST['phone_number']!=""   )
	        {
                 $qry1 = "SELECT * FROM tbl_users WHERE phone = '".$phone_number."' ";  
    			$result1 = mysqli_query($mysqli,$qry1);
    			$row1 = mysqli_fetch_assoc($result1);
    			$num_rows = mysqli_num_rows($result1);
    
    			
        	        if ($num_rows > 0 )
        			{
        			    
    		           $user_edit= "UPDATE tbl_users SET confirm_code='".$text."', token='".$_POST['token']."' 
    		           WHERE phone = '".$phone_number."' "; 	
    		           
    		           $user_res = mysqli_query($mysqli,$user_edit);	

    		           $api_key = '25CD9A36FA1FD3';
                        $contacts = $phone_number;
                        $from = 'TXTDMO';
                        $msg ="Your OTP for Foutysix app is ".$text. ". Please do not share this OTP with anyone.";
                        $sms_text = urlencode($msg);
                        
                        //Submit to server
                        
                        $ch = curl_init();
                        curl_setopt($ch,CURLOPT_URL, "https://sms.textmysms.com/app/smsapi/index.php");
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
                        $response = curl_exec($ch);
                        curl_close($ch);
    	            
        	
        			   $set['bike_service'][]=array('msg' => "OTP request sent",'success'=>'1');
        		
                    
        
        			}
    			   else{
    			    	$set['bike_service'][]=array('msg' => "Your Mobile Number is not Registered, Please Create Account to continue.",'success'=>'0');
    			   }
        			   
  
            	 	 header( 'Content-Type: application/json; charset=utf-8' );
        	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        	    	 die();
    
                		      
        	}
    	       
	        else
	        {
    			    	$set['bike_service'][]=array('msg' => "Invalid enter valid mobile Number.",'success'=>'0');
	        
        	 	 header( 'Content-Type: application/json; charset=utf-8' );
    	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    	    	 die();

	        }
	}
	
		
	//user registration
    	 if(isset($_GET['postUsermobileRegister'])) 
	{
	   
      	    $phone_number = $_POST['phone_number'];
      	   $login_type = $_POST['login_type'];
      	     $device_id = $_POST['device_id'];
            $text=rand(1000,9999);

            if($_POST['phone_number']!="" && $_POST['login_type']!=""  )
	        {
	            
    			    
                $qry1 = "SELECT * FROM tbl_users WHERE phone = '".$phone_number."' "; 	 
    			$result1 = mysqli_query($mysqli,$qry1);
    			$row1 = mysqli_fetch_assoc($result1);
    			$num_rows = mysqli_num_rows($result1);
    
    			
        	        if ($num_rows > 0 )
        			{
        			    
        			    	$set['bike_service'][]=array('msg' => "Your mobile number is already registered. Please click Login to continue.",'success'=>'0');
        		

                	 	 header( 'Content-Type: application/json; charset=utf-8' );
            	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            	    	 die();
                    
        
        			}else
        			{
        			    
        			    $qry2 = "SELECT * FROM tbl_users WHERE phone = '".$phone_number."' and status='0'"; 	 
            			$result2 = mysqli_query($mysqli,$qry2);
            			$row2 = mysqli_fetch_assoc($result2);
            			$num_rows2 = mysqli_num_rows($result2);
    
    			
        	        if ($num_rows2 > 0 )
        			{
            			    
            			   
    		                $user_edit= "UPDATE tbl_users SET confirm_code='".$text."' WHERE phone = '".$phone_number."' and login_type = '".$login_type."' and status ='0'"; 	
    		           
        		           $user_res = mysqli_query($mysqli,$user_edit);	
        		    
                       	     $api_key = '25CD9A36FA1FD3';
                            $contacts = $phone_number;
                            $from = 'TXTDMO';
                            $msg ="Your OTP for Foutysix app is ".$text. ". Please do not share this OTP with anyone.";
                            $sms_text = urlencode($msg);
                            
                            //Submit to server
                            
                            $ch = curl_init();
                            curl_setopt($ch,CURLOPT_URL, "https://sms.textmysms.com/app/smsapi/index.php");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
                            $response = curl_exec($ch);
                                 curl_close($ch);

        	
        				    $set['bike_service'][]=array('msg' => "OTP request sent",'success'=>'1');
        		
        			   	header( 'Content-Type: application/json; charset=utf-8' );
            	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            	    	 die();
            			
        			  
        			}else
        			{
        			    
        			    
                    			    		    
            		    if($_FILES['imageurl']['name'] != "")
                		{	
                			if($row['imageurl'] !== "") 
                			{
                			 	unlink('images/'.$row['imageurl']); 
                			 	unlink('images/thumbs/'.$row['imageurl']); 
                			}
                
                			$facility_image=rand(0,99999)."_".$_FILES['imageurl']['name'];
                		   //Main Image
                		   	$tpath1='images/'.$facility_image; 		
                			$pic1=compress_image($_FILES["imageurl"]["tmp_name"], $tpath1, 80);
                		 	$thumbpath='images/thumbs/'.$facility_image;		
                	       	$thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
                 		}
                 		else
                 		{
                 			 $facility_image = "";
                 		}

        			    
    			        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                         $date = date('d-m-Y H:i:s');
        
        		        
          			$insert_user1="INSERT INTO tbl_users 
        				  (
        				   `login_type`,
        				  `name`,
        				  `email`,
        				    `imageurl`,
        				  `password`,
        				   `phone`,
        				     `device_id`,
        				    `confirm_code`,
        				      `token`,
        				   `status`
        				) VALUES (
        					'".trim($_POST['login_type'])."',
        					'".trim($_POST['name'])."',
        					'".trim($_POST['email'])."',
        					'".$facility_image."',
        					'',
        						'".trim($_POST['phone_number'])."',
        							'".trim($_POST['device_id'])."',
        					    '".$text."',
        				    		'".trim($_POST['token'])."',
        								0
			            	)"; 	    
            
        	           
        	            $result1=mysqli_query($mysqli,$insert_user1); 
        	            $last_id = mysqli_insert_id($mysqli);
        	            
                          	     $api_key = '25CD9A36FA1FD3';
                            $contacts = $phone_number;
                            $from = 'TXTDMO';
                            $msg ="Your OTP for Foutysix app is ".$text. ". Please do not share this OTP with anyone.";
                            $sms_text = urlencode($msg);
                            
                            //Submit to server
                            
                            $ch = curl_init();
                            curl_setopt($ch,CURLOPT_URL, "https://sms.textmysms.com/app/smsapi/index.php");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
                            $response = curl_exec($ch);
                                 curl_close($ch);
        	
        				    $set['bike_service'][]=array('msg' => "OTP request sent",'success'=>'1');
        			
        			   	curl_close($ch);
  
            	 	 header( 'Content-Type: application/json; charset=utf-8' );
        	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        	    	 die();
        			
        			    
        			}
                
	        }
            

	}else{
        			    
	    	$set['bike_service'][]=array('msg' => "Please enter correct phone number...",'success'=>'0');


	 	 header( 'Content-Type: application/json; charset=utf-8' );
          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    	 die();
    
        
    }
}

	    //user verify otp
	else if(isset($_GET['mobilenumberverify_setting'])) 
	{
	   
      		$phone_number = $_POST['phone_number'];
      		$confirm_code = $_POST['confirm_code'];

             $qry1 = "SELECT * FROM tbl_users WHERE phone = '".$phone_number."'  and confirm_code='".$confirm_code."' ";	 
			$result1 = mysqli_query($mysqli,$qry1);
			$row = mysqli_fetch_assoc($result1);
			 $num_rows = mysqli_num_rows($result1);

	        
	        if ($num_rows > 0 )
			{
    		
           
	           $user_edit1= "UPDATE tbl_users SET status = 1 WHERE phone = '".$phone_number."' and confirm_code='".$confirm_code."' ";
	           $user_res1 = mysqli_query($mysqli,$user_edit1);	
         
			     $qry2 = "SELECT * FROM tbl_users WHERE phone = '".$phone_number."'  and status = 1 ";
    			  
    			$result2 = mysqli_query($mysqli,$qry2);
    			$row = mysqli_fetch_assoc($result2);

             $set['bike_service'][]	=	array(
                        'msg' 	=>	"succecesfull login",
			              'success'=>'1',
 						  'id' 	=>	$row['id'],
 						  'login_type' 	=>	$row['login_type'],
 						  'name'	=>	$row['name'],
 						  'email'	=>	$row['email'],
 						  'imageurl'	=>	$row['imageurl'],
 						   'password'	=>	$row['password'],
 						  'phone'	=>	$row['phone'],
 						   'device_id'	=>	$row['device_id'],
 						    'confirm_code'	=>	$row['confirm_code'],
 						  'token'	=>	$row['token'],
 						  'status'	=>	$row['status']
					);
	    							
				   
            		
        	}
	        else
	        {
	            $set['bike_service'][]=array('msg' => "Please enter a valid OTP",'success'=>'0');
	        
        

	        }
	        
	        	 	 header( 'Content-Type: application/json; charset=utf-8' );
    	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    	    	 die();
	}
	
    //get users profile with users id
    else if(isset($_GET['getUserProfile']))
    {
    
    		$qry = "SELECT * FROM tbl_users WHERE id = '".$_POST['id']."'"; 
    		$result = mysqli_query($mysqli,$qry);
    		 
    		$row = mysqli_fetch_assoc($result);
    	  				 
    	    $set['bike_service'][]	=	array(
    	    						   'msg' 	=>	"succecesfull login",
    			              'success'=>'1',
     						  'id' 	=>	$row['id'],
     						  'login_type' 	=>	$row['login_type'],
     						  'name'	=>	$row['name'],
     						  'email'	=>	$row['email'],
     						  'imageurl'	=>	$row['imageurl'],
     						   'password'	=>	$row['password'],
     						  'phone'	=>	$row['phone'],
     						   'device_id'	=>	$row['device_id'],
     						    'confirm_code'	=>	$row['confirm_code'],
     						  'token'	=>	$row['token'],
     						  'status'	=>	$row['status']
    	    	
    	    							);
    
    	   	header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();
    }


    else if(isset($_GET['PostSoicalLogin']))
 	{

		$email_id = $_POST['email'];
		$phone = $_POST['phone'];
		
		$qry = "SELECT * FROM tbl_users WHERE phone = '".$phone."' or email = '".$email_id."'  "; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    	if ($num_rows > 0)
		{
			$set['bike_service'][]	=	array(      
			              'msg' 	=>	"succecesfull login",
			              'success'=>'1',
 						  'id' 	=>	$row['id'],
 						  'login_type' 	=>	$row['login_type'],
 						  'name'	=>	$row['name'],
 						  'email'	=>	$row['email'],
 						  'imageurl'	=>	$row['imageurl'],
 						   'password'	=>	$row['password'],
 						  'phone'	=>	$row['phone'],
 						   'device_id'	=>	$row['device_id'],
 						    'confirm_code'	=>	$row['confirm_code'],
 						  'token'	=>	$row['token'],
 						  'status'	=>	$row['status']
		     								);
		}
		else
		{
		
		
	
		    	//id	login_type	name	email	imageurl	password	phone	device_id	status
		     $qry1="INSERT INTO tbl_users 
				  (`login_type`,
				  `name`,
				  `email`,
				   `imageurl`,
				   `password`,
				    `phone`,
				   `device_id`,
				   token,
				  `status`
				) VALUES (
			    	'".$_POST['login_type']."',
					'".trim($_POST['name'])."',
					'".trim($_POST['email'])."',
							'".trim($_POST['imageurl'])."',
							'',
						'".trim($_POST['phone'])."',
							'".$_POST['device_id']."',
							'".$_POST['token']."',
						'1'
				)"; 
            
            $result1 = mysqli_query($mysqli,$qry1);
            $last_id = mysqli_insert_id($mysqli);  
            
            $qrys = "SELECT * FROM tbl_users WHERE id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);
			$firstid=$row['id'];
												 
			$set['bike_service'][]	=	array(    
                   'msg' 	=>	"succecesfull login",
			              'success'=>'1',
 						  'id' 	=>	$row['id'],
 						  'login_type' 	=>	$row['login_type'],
 						  'name'	=>	$row['name'],
 						  'email'	=>	$row['email'],
 						  'imageurl'	=>	$row['imageurl'],
 						   'password'	=>	$row['password'],
 						  'phone'	=>	$row['phone'],
 						   'device_id'	=>	$row['device_id'],
 						    'confirm_code'	=>	$row['confirm_code'],
 						  'token'	=>	$row['token'],
 						  'status'	=>	$row['status']
		     								);
	    	}

				
        header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}

    else if(isset($_GET['postuserstatus']))
 	{
		

		$email_id = $_POST['email'];
		$device_id = $_POST['device_id'];
		
		$qry = "SELECT * FROM tbl_users WHERE email = '".$email_id."' or device_id='".$device_id."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    	if ($num_rows > 0)
		{
			$set['bike_service'][]	=	array( 
 						  
 					 'user_status'		=>'1',	  
 	                     'msg' 	=>	"succecesfull login",
			              'success'=>'1',
 						  'id' 	=>	$row['id'],
 						  'login_type' 	=>	$row['login_type'],
 						  'name'	=>	$row['name'],
 						  'email'	=>	$row['email'],
 						  'imageurl'	=>	$row['imageurl'],
 						   'password'	=>	$row['password'],
 						  'phone'	=>	$row['phone'],
 						   'device_id'	=>	$row['device_id'],
 						    'confirm_code'	=>	$row['confirm_code'],
 						  'token'	=>	$row['token'],
 						  'status'	=>	$row['status']
		     								
		     								
		     								
		   );
		   
		}		 
		else
		{
		    	$set['bike_service'][]	=	array( 
		     								  'user_status'	=>'0'
		     								);
		    		 
			
        }

        header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}




    //get all settings
    else if(isset($_GET['settings']))
 	{
  		 $jsonObj4= array();	

		$query="SELECT * FROM tbl_settings WHERE id='1'";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['app_name'] = $data['app_name'];
			$row['app_logo'] = $data['app_logo'];
			$row['app_version'] = $data['app_version'];
			$row['app_author'] = $data['app_author'];
			$row['app_contact'] = $data['app_contact'];
			$row['app_email'] = $data['app_email'];
			$row['app_website'] = $data['app_website'];
			$row['app_description'] = $data['app_description'];
			$row['app_developed_by'] = $data['app_developed_by'];

			$row['app_privacy_policy'] = stripslashes($data['app_privacy_policy']);
 			
 			$row['publisher_id'] = $data['publisher_id'];
 			$row['interstital_ad'] = $data['interstital_ad'];
			$row['interstital_ad_id'] = $data['interstital_ad_id'];
 			$row['banner_ad'] = $data['banner_ad'];
 			$row['banner_ad_id'] = $data['banner_ad_id'];
			$row['rewarded_ad_id'] = $data['rewarded_ad_id'];
			
			array_push($jsonObj4,$row); 
			}
		
		$set['bike_service'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }




	else if(isset($_GET['send_email']))
	{
	
	 	 
		$qry = "SELECT * FROM tbl_users WHERE email_id = '".$_GET['email_id']."' and phone_number='".$_GET['phone_number']."' "; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
		if($row['email_id']!="")
		{
        $passwprd=  $row['password'];
            
        
			$to = $_GET['email_id'];
			// subject
		//	$subject = '[IMPORTANT] '.APP_NAME.' Forgot Password Information';
 			
            require_once('phpmailer/class.phpmailer.php');

            require 'phpmailer/PHPMailerAutoload.php';
            
            $mail = new PHPMailer;
            
            //$mail->SMTPDebug = 3;                               // Enable verbose debug output
            
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'khushboo.vbinfotech@gmail.com';                 // SMTP username
            $mail->Password = 'khushboo111';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            
            $mail->From = 'khushboo.vbinfotech@gmail.com';
            $mail->FromName = 'WonderFood';
            $mail->addAddress($to, 'khush');     // Add a recipient
            //$mail->addAddress('recipient1@yahoo.com');               // Name is optional
            //$mail->addReplyTo('reply@ymail.com', 'Information');
            //$mail->addCC('cc@hotmail.com');
            //$mail->addBCC('bcc@gmail.com');
            
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
            
            
            $mail->Subject = 'Customer Satisfaction Feedback';
            
            //$mail->Subject = 'Feedback from Customer';
            $mail->Body    = "Your Password:=$passwprd <br>";
            $mail->AltBody = 'Thisha'
                    . 'ha'
                    . ' is the body in plain text for non-HTML mail clients';
            
            if(!$mail->send()) 
                {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                } 
                else
                {
                echo 'Message has been sent';
                }
           
			  
			$set['bike_service'][]=array('msg' => "Password has been sent on your mail!",'success'=>'1');
		}
		else
		{  	 
				
			$set['bike_service'][]=array('msg' => "Email not found in our database!",'success'=>'0');
					
		}

	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}	




    else if(isset($_GET['add_service']))
 	{

 			if($_POST['s_name']!='' )
 			{



 				$image=rand(0,99999)."_".$_FILES['s_image']['name'];
			 	 
    		       //Main Image
    			   $tpath1='images/'.$image; 			 
    		       $pic1=compress_image($_FILES["s_image"]["tmp_name"], $tpath1, 80);
    			 
    				//Thumb Image 
    			   $thumbpath='images/thumbs/'.$image;		
    		       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200'); 
    		       
    		       //banner image
    		       	$image1=rand(0,99999)."_".$_FILES['s_banner_image']['name'];
			 	 
    		       //Main Image
    			   $tpath1='images/'.$image1; 			 
    		       $pic1=compress_image($_FILES["s_banner_image"]["tmp_name"], $tpath1, 80);
    			 
    				//Thumb Image 
    			   $thumbpath='images/thumbs/'.$image1;		
    		       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200'); 

		    $qry1="INSERT INTO tbl_service 
				  (`s_name`,
				  s_post_type,
				  `s_image`,
				   s_spec,
				   s_banner_image,
				   `s_email`,
				   `s_password`,
				    `s_lat`,
				   `s_long`,
				   `s_postal_code`,
				   `s_adderss`,
				   `s_phone`,
				   s_description,
				   `s_o_time`,
				   `s_c_time`,
				    `s_token`,
				   `s_type`,
				   `s_puncture`,
				   `s_breakdown`,
				   `s_outoffuel`,
				   `s_engineservices`,
				   `s_oilservice`,
				   `s_bikespares`,
				   `s_bikepainting`,
				   `s_generalservice`,
				   `s_bikewashpolish`,
				   `s_electricwork`,
				    `s_stickering`,
				  `s_status`
				) VALUES (
			    	'".$_POST['s_name']."',
			    	'".$_POST['s_post_type']."',
					'".$image."',
					'".trim($_POST['s_spec'])."',
					'".$image1."',
					'".trim($_POST['s_email'])."',
					'".trim($_POST['s_password'])."',
					'".$_POST['s_lat']."',
					'".$_POST['s_long']."',
					'".$_POST['s_postal_code']."',
					'".$_POST['s_adderss']."',
					'".$_POST['s_phone']."',
					'".$_POST['s_description']."',
					'".$_POST['s_o_time']."',
					'".$_POST['s_c_time']."',
					'',
					'".$_POST['s_type']."',
					'".$_POST['s_puncture']."',
					'".$_POST['s_breakdown']."',
					'".$_POST['s_outoffuel']."',
					'".$_POST['s_engineservices']."',
					'".$_POST['s_oilservice']."',
					'".$_POST['s_bikespares']."',
					'".$_POST['s_bikepainting']."',
					'".$_POST['s_generalservice']."',
					'".$_POST['s_bikewashpolish']."',
					'".$_POST['s_electricwork']."',
					'".$_POST['s_stickering']."',
						'1'
				)"; 
            
            $result1 = mysqli_query($mysqli,$qry1);
            $last_id = mysqli_insert_id($mysqli);  
            
            $qrys = "SELECT * FROM tbl_service WHERE s_id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);

			

												 
			$set['bike_service'][]	=	array(    
                           'msg' 	=>	"succecesfully",
                           'success'=>'1',
                           's_id' 	=>	$row['s_id'],
 						  's_post_type' 	=>	$row['s_post_type'],
 						  's_name' 	=>	$row['s_name'],
 						  's_image'	=>	$file_path.'images/'.$row['s_image'],
 						  's_email'	=>	$row['s_email'],
 						   's_spec'	=>	$row['s_spec'],
 						   's_banner_image'	=>	$file_path.'images/'.$row['s_banner_image'],
 						  's_password'	=>	$row['s_password'],
 						  's_lat'	=>	$row['s_lat'],
 						  's_long'	=>	$row['s_long'],
 						  's_postal_code'	=>	$row['s_postal_code'],
 						  's_adderss'	=>	$row['s_adderss'],
 						  's_phone'	=>	$row['s_phone'],
 						  's_description'	=>	$row['s_description'],
 						  's_o_time'	=>	$row['s_o_time'],
 						  's_c_time'	=>	$row['s_c_time'],
 						  's_puncture'	=>	$row['s_puncture'],
 						  's_breakdown'	=>	$row['s_breakdown'],
 						  's_outoffuel'	=>	$row['s_outoffuel'],
 						  's_engineservices'	=>	$row['s_engineservices'],
 						  's_oilservice'	=>	$row['s_oilservice'],
 						  's_bikespares'	=>	$row['s_bikespares'],
 						  's_bikepainting'	=>	$row['s_bikepainting'],
 						  's_generalservice'	=>	$row['s_generalservice'],
 						  's_bikewashpolish'	=>	$row['s_bikewashpolish'],
 						  's_electricwork'	=>	$row['s_electricwork'],
 						  's_stickering'	=>	$row['s_stickering'],
 						   's_status'	=>	$row['s_status']
		     								);

				}else
				{
					$set['bike_service'][]=array('msg' => "SomeThigns Want to wrong",'success'=>'0');
				}
				
				
				
        header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}

    //users update profile
    else if(isset($_GET['edit_service']))
    {
    	
    	    		$sql = "SELECT * FROM tbl_service where s_id = '".$_POST['s_id']."' ";
    		$res = mysqli_query($mysqli,$sql);
    		$row = mysqli_fetch_assoc($res);
    		
    		if($_FILES['s_image']['name'] != "")
    		{	
    			if($row['s_image'] !== "") 
    			{
    			 	unlink('images/'.$row['s_image']); 
    			 	unlink('images/thumbs/'.$row['s_image']); 
    			}
    
    			$facility_image=rand(0,99999)."_".$_FILES['s_image']['name'];
    		   //Main Image
    		   	$tpath1='images/'.$facility_image; 		
    			$pic1=compress_image($_FILES["s_image"]["tmp_name"], $tpath1, 80);
    		 	$thumbpath='images/thumbs/'.$facility_image;		
    	       	$thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
     		}
     		else
     		{
     		     $facility_image = $row['s_image'] ;
     		}
     		
     		
     		
     			if($_FILES['s_banner_image']['name'] != "")
    		{	
    			if($row['s_banner_image'] !== "") 
    			{
    			 	unlink('images/'.$row['s_banner_image']); 
    			 	unlink('images/thumbs/'.$row['s_banner_image']); 
    			}
    
    			$facility_image1=rand(0,99999)."_".$_FILES['s_banner_image']['name'];
    		   //Main Image
    		   	$tpath1='images/'.$facility_image1; 		
    			$pic1=compress_image($_FILES["s_banner_image"]["tmp_name"], $tpath1, 80);
    		 	$thumbpath='images/thumbs/'.$facility_image1;		
    	       	$thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
     		}
     		else
     		{
     		     $facility_image1 =  $row['s_banner_image'] ;
     		}
        		       
    		    //name image banner speci desc opening time close time
    		    $user_edit= "UPDATE tbl_service SET 
    			s_name='".$_POST['s_name']."',
    			s_image='".$facility_image."',
    			s_banner_image='".$facility_image1."',
    		    s_email='".$_POST['s_email']."',
    		    s_phone='".$_POST['s_phone']."',
    		    s_lat='".$_POST['s_lat']."',
    		    s_long='".$_POST['s_long']."',
    		    s_postal_code='".$_POST['s_postal_code']."',
    		    s_adderss='".$_POST['s_adderss']."',
    			s_spec='".$_POST['s_spec']."',
    			s_description='".$_POST['s_description']."',
    			s_o_time='".$_POST['s_o_time']."',
    			s_c_time = '".$_POST['s_c_time']."',
    			 `s_puncture`  = '".$_POST['s_puncture']."',
				   `s_breakdown`  = '".$_POST['s_breakdown']."',
				   `s_outoffuel` = '".$_POST['s_outoffuel']."',
				   `s_engineservices` = '".$_POST['s_engineservices']."',
				   `s_oilservice`  = '".$_POST['s_oilservice']."',
				   `s_bikespares`  = '".$_POST['s_bikespares']."',
				   `s_bikepainting`  = '".$_POST['s_bikepainting']."',
				   `s_generalservice`  = '".$_POST['s_generalservice']."',
				   `s_bikewashpolish`  = '".$_POST['s_bikewashpolish']."',
				   `s_electricwork`  = '".$_POST['s_electricwork']."',
				    `s_stickering`  = '".$_POST['s_stickering']."'
				    
    			WHERE s_id = '".$_POST['s_id']."'";	 
    		
    		
       		$user_res = mysqli_query($mysqli,$user_edit);	
       		$set['bike_service'][]=array('msg'=>'Updated','success'=>'1');
       	
    		
    		header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();
    }

    else if(isset($_GET['get_service']))
 	{
 		

 		 $jsonObj4= array();	

	    $lattitude_to = $_POST['lattitude_to'];
	     $longitude_to = $_POST['longitude_to'];
	    
	       $query="SELECT tbl_service.* , (6371 * acos (cos (radians(".$lattitude_to."))* cos(radians(s_lat))* cos( radians(".$longitude_to.") - radians(s_long) )+ 
	    sin (radians(".$lattitude_to.") )* sin(radians(s_lat)))) AS distance FROM tbl_service 
	         where tbl_service.s_status = 1 HAVING (distance < 10 ) ORDER BY `distance` ASC ";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
 //tbl_service s_id	s_f_name	s_l_name	s_image	s_email	s_password	s_lat	s_long	s_postal_code	s_adderss	s_phone	s_o_time	s_c_time	s_status 

		while($data = mysqli_fetch_assoc($sql))
		{
			 
			 
			$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
					$row['s_spec'] = $data['s_spec'];
			        	$row['s_banner_image'] = $file_path.'images/'.$data['s_banner_image'];
 			$row['s_description'] = $data['s_description'];
	        $row['s_post_type'] = $data['s_post_type'];

			$row['s_email'] = $data['s_email'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];
 			$row['distance'] = $data['distance'];
 				$row['s_token'] = $data['s_token'];
 			$row['s_type'] = $data['s_type'];
			$row['s_puncture'] = $data['s_puncture'];
 			$row['s_breakdown'] = $data['s_breakdown'];
 			$row['s_outoffuel'] = $data['s_outoffuel'];
 			$row['s_engineservices'] = $data['s_engineservices'];
			$row['s_oilservice'] = $data['s_oilservice'];
			$row['s_bikespares'] = $data['s_bikespares'];
 			$row['s_bikepainting'] = $data['s_bikepainting'];
 			$row['s_generalservice'] = $data['s_generalservice'];
 			$row['s_bikewashpolish'] = $data['s_bikewashpolish'];
 			$row['s_electricwork'] = $data['s_electricwork'];
 			$row['s_stickering'] = $data['s_stickering'];
 			$row['s_status'] = $data['s_status'];

			array_push($jsonObj4,$row); 
		
		    
		}
		
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}

 	//Login with ussername and password
    else if(isset($_GET['service_login']))
    {
    	if($_POST['s_email']!=="" and $_POST['s_password']!=="")
    	{
    
    	
    		$email_id = $_POST['s_email'];
    		$password = $_POST['s_password'];
    		
    		//echo $password;die;
    	  $qry = "SELECT * FROM tbl_service WHERE s_email = '".$email_id."' and s_password = '".$password."'"; 
    		
    		$result = mysqli_query($mysqli,$qry);
    		$num_rows = mysqli_num_rows($result);
    		$row = mysqli_fetch_assoc($result);
    		
        	if ($num_rows > 0)
    		{ 
    		    
    		    
    		       $user_edit= "UPDATE tbl_service SET s_token='".$_POST['s_token']."' WHERE s_email = '".$email_id."' and s_password = '".$password."' ";	 
                    $result = mysqli_query($mysqli,$user_edit);
    
    		    
    			$set['bike_service'][]	= array(  
    										  'msg'			=>	'Successflly Logged in',
    										  'success'=>'1',
    										   's_id' 	=>	$row['s_id'],
                     						  's_name' 	=>	$row['s_name'],
                     						  's_image'	=>	$file_path.'images/'.$row['s_image'],
                     						  's_email'	=>	$row['s_email'],
                     						   's_spec'	=>	$row['s_spec'],
                     						   's_banner_image'	=>	$file_path.'images/'.$row['s_banner_image'],
                     						  's_password'	=>	$row['s_password'],
                     						  's_lat'	=>	$row['s_lat'],
                     						  's_long'	=>	$row['s_long'],
                     						  's_postal_code'	=>	$row['s_postal_code'],
                     						  's_adderss'	=>	$row['s_adderss'],
                     						  's_phone'	=>	$row['s_phone'],
                     						  's_description'	=>	$row['s_description'],
                     						  's_o_time'	=>	$row['s_o_time'],
                     						  's_c_time'	=>	$row['s_c_time'],
                     						   's_status'	=>	$row['s_status']
    										  
    	     								);
    		  
    		}		 
    		else
    		{
    			$set['bike_service'][]=array('msg' =>'Invalid username and password','success'=>'0');
     	
    		}
    	}
    
    			header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();
    }


    else if(isset($_GET['add_book']))
 	{

 			if($_POST['u_id']!='' && $_POST['s_id']!=''  )
 			{

            
            date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
            $date = date('Y-m-d');


		    $qry1="INSERT INTO `tbl_book`(`u_id`,
		   `rate`, 
		   `remark_comment`, 
		   `s_id`, 
		   `invoice_id`, 
		   `date`, 
		   `bike_id`,
		   `service_type`, 
		   `o_puncture`,
		   `o_breakdown`,
		   `o_outoffuel`,
		   `o_engineservices`,
		   `o_oilservice`,
		   `o_bikespares`,
		   `o_bikepainting`,
		   `o_generalservice`,
		   `o_bikewashpolish`,
		   `o_electricwork`,
		   `o_stickering`,
		   `o_others`,
		   b_type,
		   `o_remark`,
		   `b_status`
				) VALUES (
			    	'".$_POST['u_id']."',
			    	0,
			    	'',
					'".trim($_POST['s_id'])."',
					0,
					'".$date."',
					'".trim($_POST['bike_id'])."',
					'".trim($_POST['service_type'])."',
					'".$_POST['o_puncture']."',
					'".$_POST['o_breakdown']."',
					'".$_POST['o_outoffuel']."',
					'".$_POST['o_engineservices']."',
					'".$_POST['o_oilservice']."',
					'".$_POST['o_bikespares']."',
					'".$_POST['o_bikepainting']."',
					'".$_POST['o_generalservice']."',
					'".$_POST['o_bikewashpolish']."',
					'".$_POST['o_electricwork']."',
					'".$_POST['o_stickering']."',
					'".$_POST['o_others']."',
					1,
					'',
				   1
				)"; 
            
            $result1 = mysqli_query($mysqli,$qry1);
            $last_id = mysqli_insert_id($mysqli);  
            
            $qrys = "SELECT * FROM tbl_book WHERE b_id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);

               
                $qry2 = "SELECT * FROM `tbl_service`
                WHERE tbl_service.s_id='".$_POST['s_id']."' ";
        
        		$result2 = mysqli_query($mysqli,$qry2);
        		$row2 = mysqli_fetch_assoc($result2);
        	
               
                 $tokens = $row2['s_token'];
                $body = "Congrats ! You have got New Booking ! Please Update the Status Soon.";
                send_notification($tokens,$body);
        

												 
			$set['bike_service'][]	=	array(    
                           'msg' 	=>	"succecesfully",
                           'success'=>'1',
                           'b_id' 	=>	$row['b_id'],
                            's_id' 	=>	$row['s_id'],
                             'u_id' 	=>	$row['u_id'],
 						  'invoice_id' 	=>	$row['invoice_id'],
 						  'date' 	=>	$row['date'],
 						  'bike_id' 	=>	$row['bike_id'],
 						    'service_type' 	=>	$row['service_type'],
 						  'o_puncture' 	=>	$row['o_puncture'],
 						  'o_breakdown' 	=>	$row['o_breakdown'],
 						 
 						  'o_outoffuel'	=>  $row['o_outoffuel'],
 						  'o_engineservices'	=>	$row['o_engineservices'],
 						  'o_oilservice'	=>	$row['o_oilservice'],
 					      'o_bikespares'	=>	$row['o_bikespares'],
 						  'o_bikepainting'	=>	$row['o_bikepainting'],
 						  'o_generalservice'	=>	$row['o_generalservice'],
 						  'o_bikewashpolish'	=>	$row['o_bikewashpolish'],
 						  'o_electricwork'	=>	$row['o_electricwork'],
 						  'o_stickering'	=>	$row['o_stickering'],
 						  'o_others'	=>	$row['o_others'],
 						  'o_remark'	=>	$row['o_remark'],
 						  'b_type'	=>	$row['b_type'],
 						  'b_status'	=>	$row['b_status'],
 
		     								);

				}else
				{
					$set['bike_service'][]=array('msg' => "SomeThigns Want to wrong",'success'=>'0');
				}
header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}



	else if(isset($_GET['get_book_user']))
 	{


 		$jsonObj4= array();	

 		$query="SELECT * FROM tbl_book 
 		left join tbl_users on tbl_users.id = tbl_book.u_id
 		left join tbl_service on tbl_service.s_id = tbl_book.s_id
 		left join tbl_bike on tbl_bike.bk_id = tbl_book.bike_id
		left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
        left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
 		WHERE tbl_book.u_id='".$_POST['u_id']."'
 		ORDER BY tbl_book.b_id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
	
			$row['b_id'] = $data['b_id'];
		
			$row['u_id'] = $data['u_id'];
			$row['name'] = $data['name'];
			$row['rate'] = $data['rate'];
			$row['remark_comment'] = $data['remark_comment'];
			$row['email'] = $data['email'];
			$row['phone'] = $data['phone'];
			
			$row['bk_id'] = $data['bk_id'];
			$row['bk_type'] = $data['bk_type'];
			
			$row['bb_id'] = $data['bb_id'];
			$row['bb_name'] = $data['bb_name'];
			$row['bb_image'] = $file_path.'images/'.$data['bb_image'];
			
			$row['bn_id'] = $data['bn_id'];
			$row['bn_name'] = $data['bn_name'];
	    	$row['bn_image'] = $file_path.'images/'.$data['bn_image'];
			$row['bk_number'] = $data['bk_number'];
			
			$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
			$row['s_email'] = $data['s_email'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];

			$row['date'] = $data['date'];
            $row['service_type'] = $data['service_type'];
			$row['o_puncture'] = $data['o_puncture'];
			$row['o_breakdown'] = $data['o_breakdown'];
			$row['o_outoffuel'] = $data['o_outoffuel'];
			$row['o_engineservices'] = $data['o_engineservices'];
			$row['o_oilservice'] = $data['o_oilservice'];
			$row['o_bikespares'] = $data['o_bikespares'];
			$row['o_bikepainting'] = $data['o_bikepainting'];
			$row['o_generalservice'] = $data['o_generalservice'];
			$row['o_bikewashpolish'] = $data['o_bikewashpolish'];
			$row['o_electricwork'] = $data['o_electricwork'];
			$row['o_stickering'] = $data['o_stickering'];
			$row['o_others'] = $data['o_others'];
			$row['o_remark'] = $data['o_remark'];
		
			   
             $qry1 = "SELECT * FROM `tbl_invoice`
            WHERE tbl_invoice.i_id='".$data['invoice_id']."' ";
    
    		$result1 = mysqli_query($mysqli,$qry1);
    		$row2 = mysqli_fetch_assoc($result1);

                if($row2['i_status'] == 0 )
                {
                    
                    $row['invoice_id'] = 0 ;

                }else
                {
                    	$row['invoice_id'] = $data['invoice_id'];
                }
			
			
			
			$row['b_type'] = $data['b_type'];
			$row['b_status'] = $data['b_status'];
			
			array_push($jsonObj4,$row); 
			
			
			}
		
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}	

 	else if(isset($_GET['get_book']))
 	{
 		

 		$jsonObj4= array();	
 		
 			  $tableName="tbl_book";   
	      $limit = 10; 
	      
	      $query = "SELECT COUNT(*) as num FROM $tableName 
	 	left join tbl_users on tbl_users.id = tbl_book.u_id
 		left join tbl_service on tbl_service.s_id = tbl_book.s_id
 		 				left join tbl_bike on tbl_bike.bk_id = tbl_book.bike_id
			left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
            left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
 		ORDER BY tbl_book.b_id DESC";
	      
	      $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
	      $total_pages = $total_pages['num'];
	      
	      $stages = 3;
	      $page=0;
	      if(isset($_GET['page'])){
	      $page = mysqli_real_escape_string($mysqli,$_GET['page']);
	      }
	      if($page){
	        $start = ($page - 1) * $limit; 
	      }else{
	        $start = 0; 
	        } 
	        

 		$query="SELECT * FROM tbl_book 

 		left join tbl_users on tbl_users.id = tbl_book.u_id
 		left join tbl_service on tbl_service.s_id = tbl_book.s_id
 		 				left join tbl_bike on tbl_bike.bk_id = tbl_book.bike_id
			left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
            left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
 		ORDER BY tbl_book.b_id DESC LIMIT $start, $limit";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
		

		$row['b_id'] = $data['b_id'];
		
			$row['u_id'] = $data['u_id'];
			$row['name'] = $data['name'];
						$row['bk_id'] = $data['bk_id'];
			$row['bk_type'] = $data['bk_type'];
			
				$row['bb_id'] = $data['bb_id'];
			$row['bb_name'] = $data['bb_name'];
			$row['bb_image'] = $file_path.'images/'.$data['bb_image'];
			
				$row['bn_id'] = $data['bn_id'];
			$row['bn_name'] = $data['bn_name'];
		$row['bn_image'] = $file_path.'images/'.$data['bn_image'];
			
			$row['bk_number'] = $data['bk_number'];
			
				$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
			$row['s_email'] = $data['s_email'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];

			$row['date'] = $data['date'];
			
		  $row['service_type'] = $data['service_type'];
			$row['o_puncture'] = $data['o_puncture'];
			$row['o_breakdown'] = $data['o_breakdown'];
			$row['o_outoffuel'] = $data['o_outoffuel'];
			$row['o_engineservices'] = $data['o_engineservices'];
			$row['o_oilservice'] = $data['o_oilservice'];
			$row['o_bikespares'] = $data['o_bikespares'];
			$row['o_bikepainting'] = $data['o_bikepainting'];
			$row['o_generalservice'] = $data['o_generalservice'];
			$row['o_bikewashpolish'] = $data['o_bikewashpolish'];
			$row['o_electricwork'] = $data['o_electricwork'];
			$row['o_stickering'] = $data['o_stickering'];
			$row['o_others'] = $data['o_others'];
			$row['o_remark'] = $data['o_remark'];
			$row['b_type'] = $data['b_type'];
			
			
			array_push($jsonObj4,$row); 
			}
		$set['page'] = $_GET['page'];
		$set['totalimage'] = $total_pages;
		$set['limit'] = $limit;
		$set['success'] = '1';
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}


 	else if(isset($_GET['get_book_type']))
 	{
 		
 		//tbl_book b_id	u_id	s_id	bnd_id	b_price	b_dis_price	b_modification	b_type	b_status

 		$jsonObj4= array();	
 			  $tableName="tbl_book";   
	      $limit = 10; 
	      
	      $query = "SELECT COUNT(*) as num FROM $tableName 
	 	left join tbl_users on tbl_users.id = tbl_book.u_id
 		left join tbl_service on tbl_service.s_id = tbl_book.s_id
 		left join tbl_bike on tbl_bike.bk_id = tbl_book.bike_id
		left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
        left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
 		WHERE tbl_book.b_type='".$_GET['b_type']."' and tbl_book.s_id='".$_GET['s_id']."'
 		and tbl_book.date BETWEEN '".$_GET['s_date']."' AND '".$_GET['e_date']."'
 		ORDER BY tbl_book.b_id DESC";
	      
	      $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
	      $total_pages = $total_pages['num'];
	      
	      $stages = 3;
	      $page=0;
	      if(isset($_GET['page'])){
	      $page = mysqli_real_escape_string($mysqli,$_GET['page']);
	      }
	      if($page){
	        $start = ($page - 1) * $limit; 
	      }else{
	        $start = 0; 
	        } 
 		

 		$query="SELECT * FROM tbl_book 
 		left join tbl_users on tbl_users.id = tbl_book.u_id
 		left join tbl_service on tbl_service.s_id = tbl_book.s_id
 		left join tbl_bike on tbl_bike.bk_id = tbl_book.bike_id
	    left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
        left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
 		WHERE tbl_book.b_type='".$_GET['b_type']."' and tbl_book.s_id='".$_GET['s_id']."'
 			and tbl_book.date BETWEEN '".$_GET['s_date']."' AND '".$_GET['e_date']."'
 		ORDER BY tbl_book.b_id DESC LIMIT $start, $limit";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
		

			$row['b_id'] = $data['b_id'];
		
				$row['u_id'] = $data['id'];
				$row['email'] = $data['email'];
				$row['name'] = $data['name'];
				$row['phone'] = $data['phone'];
				
					$row['bk_id'] = $data['bike_id'];
			$row['bk_type'] = $data['bk_type'];
			
				$row['bb_id'] = $data['bb_id'];
			$row['bb_name'] = $data['bb_name'];
			$row['bb_image'] = $file_path.'images/'.$data['bb_image'];
			
				$row['bn_id'] = $data['bn_id'];
			$row['bn_name'] = $data['bn_name'];
		$row['bn_image'] = $file_path.'images/'.$data['bn_image'];
			
			$row['bk_number'] = $data['bk_number'];
				$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
			$row['s_email'] = $data['s_email'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];

			$row['date'] = $data['date'];
		    $row['service_type'] = $data['service_type'];
			$row['o_puncture'] = $data['o_puncture'];
			$row['o_breakdown'] = $data['o_breakdown'];
			$row['o_outoffuel'] = $data['o_outoffuel'];
			$row['o_engineservices'] = $data['o_engineservices'];
			$row['o_oilservice'] = $data['o_oilservice'];
			$row['o_bikespares'] = $data['o_bikespares'];
			$row['o_bikepainting'] = $data['o_bikepainting'];
			$row['o_generalservice'] = $data['o_generalservice'];
			$row['o_bikewashpolish'] = $data['o_bikewashpolish'];
			$row['o_electricwork'] = $data['o_electricwork'];
			$row['o_stickering'] = $data['o_stickering'];
			$row['o_others'] = $data['o_others'];
			$row['b_type'] = $data['b_type'];
		 	$row['invoice_id'] = $data['invoice_id'];
		 			 	$row['o_remark'] = $data['o_remark'];

			$row['b_status'] = $data['b_status'];
			
			array_push($jsonObj4,$row); 
			}
		$set['page'] = $_GET['page'];
		$set['totalimage'] = $total_pages;
		$set['limit'] = $limit;
		$set['success'] = '1';
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}

 	else if(isset($_GET['get_book_service_brand']))
 	{
 		
 		//tbl_book b_id	u_id	s_id	bnd_id	b_price	b_dis_price	b_modification	b_type	b_status

 		$jsonObj4= array();	
 		
 			  $tableName="tbl_book";   
	      $limit = 10; 
 		
 		   $query = "SELECT COUNT(*) as num FROM $tableName 
	left join tbl_users on tbl_users.id = tbl_book.u_id
 		left join tbl_service on tbl_service.s_id = tbl_book.s_id
 		 				left join tbl_bike on tbl_bike.bk_id = tbl_book.bike_id
			left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
            left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
 		WHERE tbl_book.s_id='".$_GET['s_id']."'
 		ORDER BY tbl_book.b_id DESC";
	      
	      $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
	      $total_pages = $total_pages['num'];
	      
	      $stages = 3;
	      $page=0;
	      if(isset($_GET['page'])){
	      $page = mysqli_real_escape_string($mysqli,$_GET['page']);
	      }
	      if($page){
	        $start = ($page - 1) * $limit; 
	      }else{
	        $start = 0; 
	        } 

 		$query="SELECT * FROM tbl_book 
 		left join tbl_users on tbl_users.id = tbl_book.u_id
 		left join tbl_service on tbl_service.s_id = tbl_book.s_id
 		 				left join tbl_bike on tbl_bike.bk_id = tbl_book.bike_id
			left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
            left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
 		WHERE tbl_book.s_id='".$_GET['s_id']."'
 		ORDER BY tbl_book.b_id DESC LIMIT $start, $limit";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
		

			$row['b_id'] = $data['b_id'];
		
			$row['u_id'] = $data['u_id'];
			$row['name'] = $data['name'];
					$row['bk_id'] = $data['bk_id'];
			$row['bk_type'] = $data['bk_type'];
			
				$row['bb_id'] = $data['bb_id'];
			$row['bb_name'] = $data['bb_name'];
			$row['bb_image'] = $file_path.'images/'.$data['bb_image'];
			
				$row['bn_id'] = $data['bn_id'];
			$row['bn_name'] = $data['bn_name'];
		$row['bn_image'] = $file_path.'images/'.$data['bn_image'];
			
			$row['bk_number'] = $data['bk_number'];
				$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
			$row['s_email'] = $data['s_email'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];

			$row['date'] = $data['date'];
			 $row['service_type'] = $data['service_type'];
			$row['o_puncture'] = $data['o_puncture'];
			$row['o_breakdown'] = $data['o_breakdown'];
			$row['o_outoffuel'] = $data['o_outoffuel'];
			$row['o_engineservices'] = $data['o_engineservices'];
			$row['o_oilservice'] = $data['o_oilservice'];
			$row['o_bikespares'] = $data['o_bikespares'];
			$row['o_bikepainting'] = $data['o_bikepainting'];
			$row['o_generalservice'] = $data['o_generalservice'];
			$row['o_bikewashpolish'] = $data['o_bikewashpolish'];
			$row['o_electricwork'] = $data['o_electricwork'];
			$row['o_stickering'] = $data['o_stickering'];
			$row['o_others'] = $data['o_others'];
			$row['b_type'] = $data['b_type'];
			$row['b_status'] = $data['b_status'];
			
			array_push($jsonObj4,$row); 
			
			}
			
		$set['page'] = $_GET['page'];
		$set['totalimage'] = $total_pages;
		$set['limit'] = $limit;
		$set['success'] = '1';
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}
 	

 	else if(isset($_GET['change_type']))
    {
	
	
   $qry = "SELECT * FROM `tbl_book`
   WHERE tbl_book.u_id='".$_POST['u_id']."' AND tbl_book.b_id='".$_POST['b_id']."' ";

		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row1 = mysqli_fetch_assoc($result);
		
         if ($num_rows > 0)
		{
		    
    		    $user_edit= "UPDATE tbl_book SET b_type='".$_POST['b_type']."' ,o_remark='".$_POST['o_remark']."'  
    		    WHERE tbl_book.u_id='".$_POST['u_id']."' AND tbl_book.b_id='".$_POST['b_id']."' ";	 
    		    
                $result = mysqli_query($mysqli,$user_edit);
                
                $qry1 = "SELECT * FROM `tbl_users`
                WHERE tbl_users.id='".$_POST['u_id']."' ";
        
        		$result1 = mysqli_query($mysqli,$qry1);
        		$row2 = mysqli_fetch_assoc($result1);
        	
               
                     if($_POST['b_type'] == 2)
                    {
                         $tokens = $row2['token'];
                        $body = "Thanks for Using FortySix - Your Booking to Service the Bike is Accepted . Your Booking ID is : ". $_POST['b_id'];
                        send_notification($tokens,$body);
        
            			   
                    }
        
        
                     if($_POST['b_type'] == 3)
                    {
                         $tokens = $row2['token'];
                        $body = "Alert ! Your Booking ID : ".$_POST['b_id']." has been Cancelled By the Garage / Shop. Reason may be Unavailable Today or Booking is Full.";
                        send_notification($tokens,$body);
        
            			   
                    }
                    
                    if($_POST['b_type'] == 4)
                    {
                         $tokens = $row2['token'];
                        $body = "Thanks for using FortySix - Your Booking ID : ".$_POST['b_id']." Service has done and Delivered .";
                        send_notification($tokens,$body);
        
            			   
                    }

    	 
			$set['bike_service'][]=array('msg'=>'Successfully Updated','success'=>'1');
		}
		else
		{
				$set['bike_service'][]=array('msg'=>'Updated Fail','success'=>'0');	 
				
		}
			
		 	header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

}

	else if(isset($_GET['add_rating']))
    {
    	    
	$qry = "SELECT * FROM tbl_book WHERE u_id = '".$_POST['u_id']."' and rate = '".$_POST['rate']."' and remark_comment = '".$_POST['remark_comment']."' and  s_id = '".$_POST['s_id']."' and b_id = '".$_POST['b_id']."'"; 

    // 	$qry = "SELECT * FROM tbl_book WHERE u_id = '".$_POST['u_id']."' and s_id = '".$_POST['s_id']."' and b_id = '".$_POST['b_id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
			$num_rows = mysqli_num_rows($result);

		if ($num_rows > 0)
		{

			$set['bike_service'][]=array('msg' => "You have to only one time rate this order!...",'success'=>'0');
		}
		else
		{ 
		       $qry11="UPDATE `tbl_book` SET `rate` = '".$_POST['rate']."', `remark_comment` = '".$_POST['remark_comment']."'
		       WHERE u_id = '".$_POST['u_id']."' and s_id = '".$_POST['s_id']."' and b_id = '".$_POST['b_id']."' ";
			  
			  	$result1 = mysqli_query($mysqli,$qry11);
			  	


	           	
			    $set['bike_service'][]	=	array(    
                             'msg'=>'Successfully Updated',
                             'success'=>'1'
 	
		     								);
		
		}

    	   	
       header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	   	  
    
    	    
    }
    	
    
    else if(isset($_GET['get_service_rate']))
 	{

 		 $jsonObj4= array();	

	    $lattitude_to = $_POST['lattitude_to'];
	     $longitude_to = $_POST['longitude_to'];
	  
	      $query="SELECT tbl_service.* , (6371 * acos (cos (radians(".$lattitude_to."))* cos(radians(s_lat))* cos( radians(".$longitude_to.") - radians(s_long) )+ 
	    sin (radians(".$lattitude_to.") )* sin(radians(s_lat)))) AS distance FROM tbl_service HAVING (distance < 5)
	          ORDER BY `distance` ASC ";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
		    
		    $doctor_rate="SELECT *, avg(rate) as total_rate
		FROM tbl_book
		where tbl_book.s_id='".$data['s_id']."' and tbl_book.u_id='".$_POST['u_id']."'   ";

		   $doc_result = mysqli_query($mysqli,$doctor_rate)or die(mysqli_error());

            

		   $doc1=mysqli_fetch_assoc($doc_result);
		   
		  
		   
        	if($doc1['total_rate']== NULL && $doc1['total_rate']=="")
			{
		           
		              $row['total_rate'] = "";
		             
		          
			}else
			{	
			  
		
			    
			    	$row['total_rate'] = 	$doc1['total_rate'];
			    
   
			}
		    
			 
			    $query1="SELECT * FROM tbl_book
            left join tbl_users on tbl_users.id= tbl_book.u_id
		where tbl_book.s_id='".$data['s_id']."' and tbl_book.u_id='".$_POST['u_id']."'  ";

		    $result1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

		   $row1=mysqli_fetch_assoc($result1);
    

			if($row1['rate']== NULL && $row1['rate']=="")
			{
			     $row['u_id'] = "";
		             $row['name'] = "";
		             $row['rate'] = "0";
		             $row['remark_comment'] = "";
		             
			}else
			{	
			    	$row['u_id'] = 	$row1['u_id'];
			    	$row['name'] = 	$row1['name'];
			  	    $row['rate'] = 	$row1['rate'];
			  	     $row['remark_comment'] = 	$row1['remark_comment'];
			    
			}
			
			
			$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
			$row['s_spec'] = $data['s_spec'];
        	$row['s_banner_image'] = $file_path.'images/'.$data['s_banner_image'];
 			$row['s_description'] = $data['s_description'];
	        $row['s_post_type'] = $data['s_post_type'];

			$row['s_email'] = $data['s_email'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];
 			$row['s_type'] = $data['s_type'];
 			$row['distance'] = $data['distance'];
 				$row['s_token'] = $data['s_token'];
 				
 			$row['service_type'] = $data['service_type'];
 				
			$row['s_puncture'] = $data['s_puncture'];
 			$row['s_breakdown'] = $data['s_breakdown'];
 			$row['s_outoffuel'] = $data['s_outoffuel'];
 			$row['s_engineservices'] = $data['s_engineservices'];
			$row['s_oilservice'] = $data['s_oilservice'];
			$row['s_bikespares'] = $data['s_bikespares'];
 			$row['s_bikepainting'] = $data['s_bikepainting'];
 			$row['s_generalservice'] = $data['s_generalservice'];
 			$row['s_bikewashpolish'] = $data['s_bikewashpolish'];
 			$row['s_electricwork'] = $data['s_electricwork'];
 			$row['s_stickering'] = $data['s_stickering'];
 			$row['b_type'] = $data['b_type'];
 			$row['s_status'] = $data['s_status'];
 			
			
			array_push($jsonObj4,$row); 
			}
		
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}
 	
 	
 	    //get all Banner 
    else if(isset($_GET['get_banner']))
    {
    
    		$jsonObj1= array();
    			
    
    		 $query="SELECT * FROM tbl_banner ORDER BY tbl_banner.b_id ASC";
    		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());
    
    		while($data = mysqli_fetch_assoc($sql))
    		{
    
    			$row['b_id'] = $data['b_id'];
    			$row['b_name'] = $data['b_name'];
    			$row['b_image'] = $file_path.'images/'.$data['b_image'];
    
    			$row['b_status'] = $data['b_status'];
    		
     
    			array_push($jsonObj1,$row);
    
    		
    		}
    		
    		$set['bike_service'] = $jsonObj1;	
    
    		
    		header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();
    }	


	else if(isset($_GET['cancel_book']))
    	{
    	    


    	$qry = "SELECT * FROM tbl_book WHERE u_id = '".$_POST['u_id']."' and b_id = '".$_POST['b_id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
			$num_rows = mysqli_num_rows($result);

		if ($num_rows > 0)
		{
		    
		       $qry11="UPDATE `tbl_book` SET `b_type` = '".$_POST['b_type']."'
		       WHERE u_id = '".$_POST['u_id']."' and b_id = '".$_POST['b_id']."' ";
			  
			  	$result1 = mysqli_query($mysqli,$qry11);
			  	


	           	
			    $set['bike_service'][]	=	array(    
                             'msg'=>'Successfully Updated',
                             'success'=>'1'
 	
		     								);
		
		}else
		{
		    $set['bike_service'][]=array('msg'=>'Updated Fail','success'=>'0');	 
		}

    	   	
       header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	   	  
    	}
    	
    	 	    //get all Banner 
    else if(isset($_GET['get_blog']))
    {
    
    		$jsonObj1= array();
    			
    
    		 $query="SELECT * FROM tbl_blog ORDER BY tbl_blog.bog_id ASC";
    		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());
    
    		while($data = mysqli_fetch_assoc($sql))
    		{
    
     
    			$row['blog_id'] = $data['blog_id'];
    			$row['blog_name'] = $data['bog_name'];
    			$row['blog_image'] = $file_path.'images/'.$data['bog_image'];
                $row['blog_desc'] = $data['bog_desc'];
    			$row['blog_status'] = $data['bog_status'];
    		
     
    			array_push($jsonObj1,$row);
    
    		
    		}
    		
    		$set['bike_service'] = $jsonObj1;	
    
    		
    		header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();
    }

	else if(isset($_GET['settings']))
	{
		  
		 $jsonObj= array();	

		$query="SELECT * FROM tbl_settings WHERE id='1'";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['app_name'] = $data['app_name'];
			$row['app_logo'] = $data['app_logo'];
			$row['app_version'] = $data['app_version'];
			$row['app_author'] = $data['app_author'];
			$row['app_contact'] = $data['app_contact'];
			$row['app_email'] = $data['app_email'];
			$row['app_website'] = $data['app_website'];
			$row['app_description'] = $data['app_description'];
			$row['app_developed_by'] = $data['app_developed_by'];

			$row['app_privacy_policy'] = stripslashes($data['app_privacy_policy']);
 			
 			$row['publisher_id'] = $data['publisher_id'];
 			$row['interstital_ad'] = $data['interstital_ad'];
			$row['interstital_ad_id'] = $data['interstital_ad_id'];
 			$row['banner_ad'] = $data['banner_ad'];
 			$row['banner_ad_id'] = $data['banner_ad_id'];
 			$row['interstital_ad_click'] = $data['interstital_ad_click'];

 			$row['publisher_id_ios'] = $data['publisher_id_ios'];
 			$row['app_id_ios'] = $data['app_id_ios'];
			$row['interstital_ad_ios'] = $data['interstital_ad_ios'];
			$row['interstital_ad_id_ios'] = $data['interstital_ad_id_ios'];
			$row['interstital_ad_click_ios'] = $data['interstital_ad_click_ios'];
 			$row['banner_ad_ios'] = $data['banner_ad_ios'];
 			$row['banner_ad_id_ios'] = $data['banner_ad_id_ios'];

			array_push($jsonObj,$row);
		
		}
 
		$set['bike_service'] = $jsonObj;
		
	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}
	
	
		else if(isset($_GET['get_notification']))
	{
		  
		 $jsonObj= array();	

		$query="SELECT * FROM tbl_notification order by id desc";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['id'] = $data['id'];
			$row['date'] = $data['date'];
			$row['title'] = $data['title'];
			$row['msg'] = $data['msg'];
			$row['link'] = $data['link'];
			$row['image'] = $data['image'];
	
			array_push($jsonObj,$row);
		
		}
 
		$set['bike_service'] = $jsonObj;
		
	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}
	
	
	
	//add_blog
else if(isset($_GET['add_bike']))
 	{

 		if($_POST['u_id']!='' && $_POST['bk_type']!=''  )
 			{



		    $qry1="INSERT INTO `tbl_bike`( 
		    `u_id`, 
		    `bk_type`, 
		    `bk_brand`,
		    `bk_name`,
		    `bk_number`, 
		    `bk_status`)  VALUES (
					'".trim($_POST['u_id'])."',
					'".trim($_POST['bk_type'])."',
					'".trim($_POST['bk_brand'])."',
					'".trim($_POST['bk_name'])."',
					'".$_POST['bk_number']."',
				   '1'
				)"; 
            
            $result1 = mysqli_query($mysqli,$qry1);
            $last_id = mysqli_insert_id($mysqli);  
            
            $qrys = "SELECT * FROM tbl_bike WHERE `bk_id` = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);

												 
			$set['bike_service'][]	=	array(    
                           'msg' 	=>	"succecesfully",
                           'success'=>'1',
                           'bk_id' 	=>	$row['bk_id'],
                           'u_id' 	=>	$row['u_id'],
                            'bk_type' 	=>	$row['bk_type'],
                             'bk_brand' 	=>$row['bk_brand'],
 						  'bk_name' 	=>	$row['bk_name'],
 						  'bk_number'	=>	$row['bk_number'],
 						  'bk_status'	=>	$row['bk_status'],
 
		     								);

				}else
				{
					$set['bike_service'][]=array('msg' => "SomeThigns Want to wrong",'success'=>'0');
				}
header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	
			else if(isset($_GET['get_bike']))
	{
		  
		 $jsonObj= array();	

		$query="SELECT * FROM tbl_bike 
		 		left join tbl_users on tbl_users.id = tbl_bike.u_id
			left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
            left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
            where tbl_bike.u_id='".$_POST['u_id']."'
		order by bk_id desc";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
		    
		    
			$row['bk_id'] = $data['bk_id'];
			$row['bk_type'] = $data['bk_type'];
			
					$row['u_id'] = $data['u_id'];
			$row['name'] = $data['name'];
			
				$row['bb_id'] = $data['bb_id'];
			$row['bb_name'] = $data['bb_name'];
			$row['bb_image'] = $file_path.'images/'.$data['bb_image'];
			
				$row['bn_id'] = $data['bn_id'];
			$row['bn_name'] = $data['bn_name'];
		$row['bn_image'] = $file_path.'images/'.$data['bn_image'];
			
			$row['bk_number'] = $data['bk_number'];
			$row['bk_status'] = $data['bk_status'];
	
			array_push($jsonObj,$row);
		
		}
 
		$set['bike_service'] = $jsonObj;
		
	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}
	
	else if(isset($_GET['get_bikebrand']))
	{
		  
		 $jsonObj= array();	

//`tbl_bikebrand`(`bb_id`, `bb_name`, `bb_image`, `bb_status`)
		$query="SELECT * FROM tbl_bikebrand 
		order by tbl_bikebrand.bb_id desc";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
		    
		    
			$row['bb_id'] = $data['bb_id'];
			$row['bb_name'] = $data['bb_name'];
			$row['bb_image'] = $file_path.'images/'.$data['bb_image'];
		
			$row['bb_status'] = $data['bb_status'];
	
			array_push($jsonObj,$row);
		
		}
 
		$set['bike_service'] = $jsonObj;
		
	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}
	
				else if(isset($_GET['get_bikename']))
	{
		  
		 $jsonObj= array();	

//`tbl_bikename`(`bn_id`, `bb_id`, `bn_name`, `bn_image`, `bn_status`)

$query="SELECT * FROM tbl_bikename 
		left join  tbl_bikebrand on tbl_bikebrand.bb_id = tbl_bikename.bb_id
		where tbl_bikename.bb_id='".$_POST['bb_id']."'
		order by tbl_bikebrand.bb_id desc";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
		    
		    $row['bn_id'] = $data['bn_id'];
			$row['bb_id'] = $data['bb_id'];
			$row['bb_name'] = $data['bb_name'];
				$row['bn_name'] = $data['bn_name'];
			$row['bn_image'] = $file_path.'images/'.$data['bn_image'];
		
			$row['bn_status'] = $data['bn_status'];
	
			array_push($jsonObj,$row);
		
		}
 
		$set['bike_service'] = $jsonObj;
		
	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}
	
		else if(isset($_GET['search_service']))
 	{
 		



 		 $jsonObj4= array();	

	    $lattitude_to = $_POST['lattitude_to'];
	     $longitude_to = $_POST['longitude_to'];
	  
	  
	    
	      $query="SELECT tbl_service.* , (6371 * acos (cos (radians(".$lattitude_to."))* cos(radians(s_lat))* cos( radians(".$longitude_to.") - radians(s_long) )+ 
	    sin (radians(".$lattitude_to.") )* sin(radians(s_lat)))) AS distance FROM tbl_service 
	    where tbl_service.s_spec like '%".addslashes($_POST['search_value'])."%' or tbl_service.s_name like '%".addslashes($_POST['search_value'])."%' 
	    HAVING (distance < 5)
	          ORDER BY `distance` ASC ";


 		// $query="SELECT * FROM tbl_service 
 		// WHERE tbl_service.s_id='".$_POST['s_id']."'
 		// ORDER BY tbl_service.s_id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
 //tbl_service s_id	s_f_name	s_l_name	s_image	s_email	s_password	s_lat	s_long	s_postal_code	s_adderss	s_phone	s_o_time	s_c_time	s_status 

		while($data = mysqli_fetch_assoc($sql))
		{
		    
		    $doctor_rate="SELECT *, avg(rate) as total_rate
		FROM tbl_book
		where tbl_book.s_id='".$data['s_id']."' and tbl_book.u_id='".$_POST['u_id']."'   ";

		   $doc_result = mysqli_query($mysqli,$doctor_rate)or die(mysqli_error());

            

		   $doc1=mysqli_fetch_assoc($doc_result);
		   
		  
		   
        	if($doc1['total_rate']== NULL && $doc1['total_rate']=="")
			{
		           
		              $row['total_rate'] = "";
		             
		          
			}else
			{	
			  
		
			    
			    	$row['total_rate'] = 	$doc1['total_rate'];
			    
   
			}
		    
			 
			    $query1="SELECT * FROM tbl_book
            left join tbl_users on tbl_users.id= tbl_book.u_id
		where tbl_book.s_id='".$data['s_id']."' and tbl_book.u_id='".$_POST['u_id']."' ";

		    $result1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

		   $row1=mysqli_fetch_assoc($result1);
    

			if($row1['rate']== NULL && $row1['rate']=="")
			{
			     $row['u_id'] = "";
		             $row['name'] = "";
		             $row['rate'] = "0";
		             $row['remark_comment'] = "";
		             
			}else
			{	
			    
			    	$row['u_id'] = 	$row1['u_id'];
			    	$row['name'] = 	$row1['name'];
			  	    $row['rate'] = 	$row1['rate'];
			  	     $row['remark_comment'] = 	$row1['remark_comment'];
			    
			    
			   	
			    
			}
			
			
			 $query2="SELECT * FROM tbl_service                   
            WHERE tbl_service.s_spec like '%".addslashes($_POST['search_value'])."%' or tbl_service.s_name like '%".addslashes($_POST['search_value'])."%'
            ORDER BY tbl_service.s_id DESC";



		 $sql1 = mysqli_query($mysqli,$query2)or die(mysqli_error());
 
        
			$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
			$row['s_email'] = $data['s_email'];
				$row['s_spec'] = $data['s_spec'];
			$row['s_banner_image'] = $file_path.'images/'.$data['s_banner_image'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
 			$row['s_description'] = $data['s_description'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];
 			$row['distance'] = $data['distance'];
 			
 			$row['s_status'] = $data['s_status'];
			
			array_push($jsonObj4,$row); 
			}
		
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}
 	
 	
 	//add_blog
    else if(isset($_GET['add_invoice']))
 	{

 		if($_POST['srprovider_id']!='' && $_POST['bikedetails_id']!=''  )
 			{

        date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
        $date = date('d-m-Y');


		     $qry1="INSERT INTO `tbl_invoice`(
		    `srprovider_id`,
		    `bikedetails_id`, 
		    `u_id`, 
		    `o_id`, 
		    `order_details`,
		    `i_total_amount`,
		    `i_date`,
		    `i_status`)  VALUES (
					'".trim($_POST['srprovider_id'])."',
					'".trim($_POST['bikedetails_id'])."',
					'".trim($_POST['u_id'])."',
					'".trim($_POST['o_id'])."',
					'".$_POST['order_details']."',
					'".$_POST['i_total_amount']."',
					'".$date."',
				   '0'
				)"; 
            
            $result1 = mysqli_query($mysqli,$qry1);           
            $last_id = mysqli_insert_id($mysqli);  
            
                     $qrys1 = "SELECT * FROM tbl_invoice WHERE `i_id` = '".$last_id."'"; 
			$results1 = mysqli_query($mysqli,$qrys1);
			$row = mysqli_fetch_assoc($results1);
            
        
		     $user_edit= "UPDATE tbl_book SET 
			invoice_id = '".$row['i_id']."'
			WHERE b_id = '".$row['o_id']."' ";	 
    		 $user_edit2 = mysqli_query($mysqli,$user_edit);      
   
            
	 
			$set['bike_service'][]	=	array(    
                           'msg' 	=>	"succecesfully",
                           'success'=>'1',
                           'i_id' 	=>	$row['i_id'],
                           'bikedetails_id' 	=>	$row['bikedetails_id'],
                            'u_id' 	=>	$row['u_id'],
                             'o_id' 	=>$row['o_id'],
 						  'order_details' 	=>	$row['order_details'],
 						  'i_total_amount'	=>	$row['i_total_amount'],
 						  'i_date'	=>	$row['i_date'],
 						  'i_status'	=>	$row['i_status'],
 
		     								);

				}else
				{
					$set['bike_service'][]=array('msg' => "SomeThigns Want to wrong",'success'=>'0');
				}
header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	
	//get invoice
		else if(isset($_GET['get_invoice']))
	{
		  
		 $jsonObj= array();	




 $query="SELECT * FROM tbl_invoice 
		left join tbl_service on tbl_service.s_id = tbl_invoice.srprovider_id
			left join tbl_bike on tbl_bike.bk_id = tbl_invoice.bikedetails_id
		left join tbl_users on tbl_users.id = tbl_invoice.u_id
			left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
            left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
		where tbl_invoice.i_id='".$_POST['i_id']."'
		order by tbl_invoice.i_id desc";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
		    
 		
		    
		    $row['i_id'] = $data['i_id'];
		    
			$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
 			
 			
			$row['bk_id'] = $data['bk_id'];
			$row['bk_type'] = $data['bk_type'];
			
			
			$row['bb_id'] = $data['bb_id'];
			$row['bb_name'] = $data['bb_name'];
			$row['bb_image'] = $file_path.'images/'.$data['bb_image'];
			
			$row['bn_id'] = $data['bn_id'];
			$row['bn_name'] = $data['bn_name'];
	    	$row['bn_image'] = $file_path.'images/'.$data['bn_image'];
			$row['bk_number'] = $data['bk_number'];

			
			$row['u_id'] = $data['u_id'];
			$row['name'] = $data['name'];
			$row['phone'] = $data['phone'];
			$row['o_id'] = $data['o_id'];
			$row['order_details'] = $data['order_details'];
			$row['i_total_amount'] = $data['i_total_amount'];
			$row['i_date'] = $data['i_date'];
			$row['i_status'] = $data['i_status'];
	
			array_push($jsonObj,$row);
		
		}
 
		$set['bike_service'] = $jsonObj;
		
	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}
	
     // edit invoice
    else if(isset($_GET['edit_invoice']))
    {
    	
    		if($_POST['u_id']!='' )
    		{
    
    
    		    $user_edit= "UPDATE tbl_invoice SET 
    			srprovider_id='".$_POST['srprovider_id']."',
    			bikedetails_id='".$_POST['bikedetails_id']."',
    			u_id = '".$_POST['u_id']."',
    			o_id = '".$_POST['o_id']."',
    			order_details = '".$_POST['order_details']."',
    			i_total_amount = '".$_POST['i_total_amount']."'
    
    			WHERE i_id = '".$_POST['i_id']."'";	 
    		
    		
       		$user_res = mysqli_query($mysqli,$user_edit);	
       		$set['bike_service'][]=array('msg'=>'Updated','success'=>'1');
       	}else
       	{
    		$set['bike_service'][]=array('msg'=>'SomeThigns Want to wrong','success'=>'0');
       	}
    		
    		header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();
    }
    
    
        // edit invoice
    else if(isset($_GET['publish_invoice']))
    {
    	
    		if($_POST['o_id']!='' and $_POST['i_id']!='' and $_POST['u_id']!='' )
    		{
    
    
            $user_edit= "UPDATE tbl_invoice SET i_status= 1  WHERE tbl_invoice.i_id='".$_POST['i_id']."' ";	 
           $result = mysqli_query($mysqli,$user_edit);
          
           $qry1 = "SELECT * FROM `tbl_users`
                WHERE tbl_users.id='".$_POST['u_id']."' ";
        
        		$result1 = mysqli_query($mysqli,$qry1);
        		$row2 = mysqli_fetch_assoc($result1);
        	
               
                         $tokens = $row2['token'];
                        $body = "Hi, For Your Booking ID : ".$_POST['o_id'] . " Job Sheet has been Released for your Reference. Review the service to help us.";
                        send_notification($tokens,$body);
        
        
    		
       		$set['bike_service'][]=array('msg'=>'Invoice Published','success'=>'1');
       	}else
       	{
    		$set['bike_service'][]=array('msg'=>'SomeThigns Want to wrong','success'=>'0');
       	}
    		
    		header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();
    }


	

else if(isset($_GET['test']))
{
    
    $tokens = "fR5a0WSUxWM:APA91bFDh_cBl9ybdzKyh5oevgIFXIu9Sg10eg48uNIWgJw2H4fb60Pg9T2Xb8pjq2PxkfUi5Eah_LZN7PgF2NoMkoAkdkUBJyHyquTrLqYViIWQQkAz2Abbn83j439qOy9JhYPoQyhp";
	
    send_notification_test($tokens);
    
		$set['bike_service'][]=array('msg'=>'SomeThigns Want to wrong','success'=>'0');
   	
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}



else if(isset($_GET['test1']))
{
    

$api_key = '25CD9A36FA1FD3';
$contacts = '7567005767';
$from = 'TXTDMO';
$sms_text = urlencode('Hello People, have a great day');

//Submit to server

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "https://sms.textmysms.com/app/smsapi/index.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
$response = curl_exec($ch);
curl_close($ch);

    
		$set['bike_service'][]=array('msg'=>'SomeThigns Want to wrong','success'=>'0');
   	
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


  else if(isset($_GET['get_service_details']))
 	{
 		
 		 $jsonObj4= array();	

	 
 		$query="SELECT * FROM tbl_service 
 		WHERE tbl_service.s_id='".$_POST['s_id']."'
 		ORDER BY tbl_service.s_id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			
			 
			$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
						$row['s_spec'] = $data['s_spec'];
        	$row['s_banner_image'] = $file_path.'images/'.$data['s_banner_image'];
 			$row['s_description'] = $data['s_description'];
	        $row['s_post_type'] = $data['s_post_type'];

			$row['s_email'] = $data['s_email'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];
 			$row['distance'] = $data['distance'];
 				$row['s_token'] = $data['s_token'];
 			$row['service_type'] = $data['service_type'];
			$row['s_puncture'] = $data['s_puncture'];
 			$row['s_breakdown'] = $data['s_breakdown'];
 			$row['s_outoffuel'] = $data['s_outoffuel'];
 			$row['s_engineservices'] = $data['s_engineservices'];
			$row['s_oilservice'] = $data['s_oilservice'];
			$row['s_bikespares'] = $data['s_bikespares'];
 			$row['s_bikepainting'] = $data['s_bikepainting'];
 			$row['s_generalservice'] = $data['s_generalservice'];
 			$row['s_bikewashpolish'] = $data['s_bikewashpolish'];
 			$row['s_electricwork'] = $data['s_electricwork'];
 			$row['s_stickering'] = $data['s_stickering'];
 			$row['b_type'] = $data['b_type'];
 			$row['s_status'] = $data['s_status'];

			array_push($jsonObj4,$row); 
			}
		
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}
 	
 	
 else if(isset($_GET['add_service_vendor']))
 	{

 			if($_POST['s_name']!='' )
 			{


		$image=rand(0,99999)."_".$_FILES['s_image']['name'];
			 	 
    		       //Main Image
    			   $tpath1='images/'.$image; 			 
    		       $pic1=compress_image($_FILES["s_image"]["tmp_name"], $tpath1, 80);
    			 
    				//Thumb Image 
    			   $thumbpath='images/thumbs/'.$image;		
    		       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200'); 
    		       
    		       //banner image
    		       	$image1=rand(0,99999)."_".$_FILES['s_banner_image']['name'];
			 	 
    		       //Main Image
    			   $tpath1='images/'.$image1; 			 
    		       $pic1=compress_image($_FILES["s_banner_image"]["tmp_name"], $tpath1, 80);
    			 
    				//Thumb Image 
    			   $thumbpath='images/thumbs/'.$image1;		
    		       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200'); 

             


		    $qry1="INSERT INTO tbl_service 
				  (`s_name`,
				  `s_image`,
				   s_spec,
				   s_banner_image,
				   `s_email`,
				   `s_password`,
				    `s_lat`,
				   `s_long`,
				   `s_postal_code`,
				   `s_adderss`,
				   `s_phone`,
				   s_description,
				   `s_o_time`,
				   `s_c_time`,
				   	   `s_puncture`,
				   `s_breakdown`,
				   `s_outoffuel`,
				   `s_engineservices`,
				   `s_oilservice`,
				   `s_bikespares`,
				   `s_bikepainting`,
				   `s_generalservice`,
				   `s_bikewashpolish`,
				   `s_electricwork`,
				    `s_stickering`,
				   s_token,
				  `s_status`
				) VALUES (
			    	'".$_POST['s_name']."',
					'".$image."',
					'".trim($_POST['s_spec'])."',
					'".$image1."',
					'".trim($_POST['s_email'])."',
					'".trim($_POST['s_password'])."',
					0,
					0,
		        	0,
					'',
					'".$_POST['s_phone']."',
					'".$_POST['s_description']."',
					'".$_POST['s_o_time']."',
					'".$_POST['s_c_time']."',
							'".$_POST['s_puncture']."',
					'".$_POST['s_breakdown']."',
					'".$_POST['s_outoffuel']."',
					'".$_POST['s_engineservices']."',
					'".$_POST['s_oilservice']."',
					'".$_POST['s_bikespares']."',
					'".$_POST['s_bikepainting']."',
					'".$_POST['s_generalservice']."',
					'".$_POST['s_bikewashpolish']."',
					'".$_POST['s_electricwork']."',
					'".$_POST['s_stickering']."',
					'',
					0
				)"; 
				
            	//	image spec banner email pass phone desc openingtime closetime 
            	
            $result1 = mysqli_query($mysqli,$qry1);
         

			

												 
			$set['bike_service'][]	=	array(    
                           'msg' 	=>	"You will Continue in 14 hrs......",
                           'success'=>'1',
                       
		     								);

				}else
				{
					$set['bike_service'][]=array('msg' => "SomeThigns Want to wrong",'success'=>'0');
				}
header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	
	
	// deliveryboy dashboad

else if(isset($_GET['dashboad']))
 	{

	    $jsonObj= array();	

	date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
		$date = date('d-m-Y H:i:s');
		$date1 = date('d-m-Y');
		$date2 = date('H:i:s');

		$query1 = "SELECT COUNT(*)
 as num FROM tbl_book where tbl_book.s_id='".$_GET['s_id']."' ";
		$total_pages1 = mysqli_fetch_array(mysqli_query($mysqli,$query1));
		$total_order = $total_pages1['num'];

    	 $query2 = "SELECT COUNT(*)
 as num FROM tbl_book 
 where tbl_book.s_id='".$_GET['s_id']."' and tbl_book.date BETWEEN '".$_GET['s_date']."' AND '".$_GET['e_date']."' ";
		$total_pages2 = mysqli_fetch_array(mysqli_query($mysqli,$query2));
		$today_order = $total_pages2['num'];

     	$query3 = "SELECT COUNT(*)
 as num FROM tbl_book where tbl_book.s_id='".$_GET['s_id']."' and tbl_book.b_type = 1 and tbl_book.date BETWEEN '".$_GET['s_date']."' AND '".$_GET['e_date']."' ";
		$total_pages3 = mysqli_fetch_array(mysqli_query($mysqli,$query3));
		$total_todaypending_order = $total_pages3['num'];     
		
			$query4 = "SELECT COUNT(*)
 as num FROM tbl_book where tbl_book.s_id='".$_GET['s_id']."' and tbl_book.b_type = 2 and tbl_book.date BETWEEN '".$_GET['s_date']."' AND '".$_GET['e_date']."' ";
		$total_pages4 = mysqli_fetch_array(mysqli_query($mysqli,$query4));
		$total_todayaccept_order = $total_pages4['num'];  
		
			$query5 = "SELECT COUNT(*)
 as num FROM tbl_book where tbl_book.s_id='".$_GET['s_id']."' and tbl_book.b_type = 3 and tbl_book.date BETWEEN '".$_GET['s_date']."' AND '".$_GET['e_date']."' ";
		$total_pages5 = mysqli_fetch_array(mysqli_query($mysqli,$query5));
		$total_todayreject_order = $total_pages5['num'];  
		
		
			$query7 = "SELECT COUNT(*)
 as num FROM tbl_book where tbl_book.s_id='".$_GET['s_id']."' and tbl_book.b_type = 4 and tbl_book.date BETWEEN '".$_GET['s_date']."' AND '".$_GET['e_date']."' ";
		$total_pages7 = mysqli_fetch_array(mysqli_query($mysqli,$query7));
		$total_todaydelivered_order = $total_pages7['num'];  
		
		$query6 = "SELECT COUNT(*)
 as num FROM tbl_book where tbl_book.s_id='".$_GET['s_id']."' and tbl_book.b_type = 5 and tbl_book.date BETWEEN '".$_GET['s_date']."' AND '".$_GET['e_date']."' ";
		$total_pages6 = mysqli_fetch_array(mysqli_query($mysqli,$query6));
		$total_todaycancle_order = $total_pages6['num'];     
 
      
        $set['total_order'] = $total_order;
        $set['today_order'] = $today_order;
        $set['total_todaypending_order'] = $total_todaypending_order;
         $set['total_todayaccept_order'] = $total_todayaccept_order;
        $set['total_todayreject_order'] = $total_todayreject_order;
         $set['total_todaydelivered_order'] = $total_todaydelivered_order;
        $set['total_todaycancle_order'] = $total_todaycancle_order;


 	
			header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

	}
	
	 else if(isset($_GET['add_service_customer']))
 	{

 			if($_POST['if_name']!='' )
 			{

 	//	tbl_inquiryform	if_id	if_name	if_garage_name	if_email	if_phone	if_adderss	if_status


		    $qry1="INSERT INTO tbl_inquiryform 
				  (`if_name`,
				  `if_garage_name`,
				   if_email,
				   if_phone,
				   `if_adderss`,
				   `if_status`
				) VALUES (
			    	'".$_POST['if_name']."',
					'".trim($_POST['if_garage_name'])."',
					'".trim($_POST['if_email'])."',
					'".trim($_POST['if_phone'])."',
					'".trim($_POST['if_adderss'])."',
					1
				)"; 
            
            $result1 = mysqli_query($mysqli,$qry1);
         
										 
			$set['bike_service'][]	=	array(    
                            'msg' 	=>	"succecesfully......",
                           'success'=>'1',
                       
		     								);

				}else
				{
					$set['bike_service'][]=array('msg' => "SomeThigns Want to wrong",'success'=>'0');
				}
header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	
	
	else if(isset($_GET['get_service_rate_desc']))
 	{
 		



 		 $jsonObj4= array();	

	    $lattitude_to = $_POST['lattitude_to'];
	     $longitude_to = $_POST['longitude_to'];
	  
	  
	    
	      $query="SELECT tbl_service.* , (6371 * acos (cos (radians(".$lattitude_to."))* cos(radians(s_lat))* cos( radians(".$longitude_to.") - radians(s_long) )+ 
	    sin (radians(".$lattitude_to.") )* sin(radians(s_lat)))) AS distance FROM tbl_service HAVING (distance < 5)
	          ";


 		// $query="SELECT * FROM tbl_service 
 		// WHERE tbl_service.s_id='".$_POST['s_id']."'
 		// ORDER BY tbl_service.s_id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
 //tbl_service s_id	s_f_name	s_l_name	s_image	s_email	s_password	s_lat	s_long	s_postal_code	s_adderss	s_phone	s_o_time	s_c_time	s_status 

		while($data = mysqli_fetch_assoc($sql))
		{
		    
		    $doctor_rate="SELECT *, avg(rate) as total_rate
		FROM tbl_book
		where tbl_book.s_id='".$data['s_id']."' and tbl_book.u_id='".$_POST['u_id']."'   ";

		   $doc_result = mysqli_query($mysqli,$doctor_rate)or die(mysqli_error());

            

		   $doc1=mysqli_fetch_assoc($doc_result);
		   
		  
		   
        	if($doc1['total_rate']== NULL && $doc1['total_rate']=="")
			{
		           
		              $row['total_rate'] = "";
		             
		          
			}else
			{	
			  
		
			    
			    	$row['total_rate'] = 	$doc1['total_rate'];
			    
   
			}
		    
			 
			    $query1="SELECT * FROM tbl_book
            left join tbl_users on tbl_users.id= tbl_book.u_id
		where tbl_book.s_id='".$data['s_id']."' and tbl_book.u_id='".$_POST['u_id']."'  
		ORDER BY `rate` DESC 
		";

		    $result1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

		   $row1=mysqli_fetch_assoc($result1);
    

			if($row1['rate']== NULL && $row1['rate']=="")
			{
			     $row['u_id'] = "";
		             $row['name'] = "";
		             $row['rate'] = "0";
		             $row['remark_comment'] = "";
		             
			}else
			{	
			    
			    	$row['u_id'] = 	$row1['u_id'];
			    	$row['name'] = 	$row1['name'];
			  	    $row['rate'] = 	$row1['rate'];
			  	     $row['remark_comment'] = 	$row1['remark_comment'];
			    
			}
			
			
			$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
						$row['s_spec'] = $data['s_spec'];
        	$row['s_banner_image'] = $file_path.'images/'.$data['s_banner_image'];
 			$row['s_description'] = $data['s_description'];
	        $row['s_post_type'] = $data['s_post_type'];

			$row['s_email'] = $data['s_email'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];
 			$row['distance'] = $data['distance'];
 				$row['s_token'] = $data['s_token'];
 			$row['s_type'] = $data['s_type'];
			$row['s_puncture'] = $data['s_puncture'];
 			$row['s_breakdown'] = $data['s_breakdown'];
 			$row['s_outoffuel'] = $data['s_outoffuel'];
 			$row['s_engineservices'] = $data['s_engineservices'];
			$row['s_oilservice'] = $data['s_oilservice'];
			$row['s_bikespares'] = $data['s_bikespares'];
 			$row['s_bikepainting'] = $data['s_bikepainting'];
 			$row['s_generalservice'] = $data['s_generalservice'];
 			$row['s_bikewashpolish'] = $data['s_bikewashpolish'];
 			$row['s_electricwork'] = $data['s_electricwork'];
 			$row['s_stickering'] = $data['s_stickering'];
 			$row['s_status'] = $data['s_status'];

			array_push($jsonObj4,$row); 
			}
		
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}
 	
 	
 	
 		else if(isset($_GET['get_service_catwise']))
 	{
 		

 		 $jsonObj4= array();	

		 $lattitude_to = $_POST['lattitude_to'];
	     $longitude_to = $_POST['longitude_to'];
        $service_name = $_POST['service_name'] ;
        
	       $query="SELECT tbl_service.* , (6371 * acos (cos (radians(".$lattitude_to."))* cos(radians(s_lat))* cos( radians(".$longitude_to.") - radians(s_long) )+ 
	    sin (radians(".$lattitude_to.") )* sin(radians(s_lat)))) AS distance FROM tbl_service 
	         where tbl_service.$service_name = 1 HAVING (distance < 5) ORDER BY `distance` ASC ";


		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
		    
		    $doctor_rate="SELECT *, avg(rate) as total_rate
		FROM tbl_book
		where tbl_book.s_id='".$data['s_id']."' and tbl_book.u_id='".$_POST['u_id']."'   ";

		   $doc_result = mysqli_query($mysqli,$doctor_rate)or die(mysqli_error());

            

		   $doc1=mysqli_fetch_assoc($doc_result);
		   
		  
		   
        	if($doc1['total_rate']== NULL && $doc1['total_rate']=="")
			{
		           
		              $row['total_rate'] = "";
		             
		          
			}else
			{	
			  
		
			    
			    	$row['total_rate'] = 	$doc1['total_rate'];
			    
   
			}
		    
			 
			    $query1="SELECT * FROM tbl_book
            left join tbl_users on tbl_users.id= tbl_book.u_id
		where tbl_book.s_id='".$data['s_id']."' and tbl_book.u_id='".$_POST['u_id']."'  
		ORDER BY `rate` DESC 
		";

		    $result1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

		   $row1=mysqli_fetch_assoc($result1);
    

			if($row1['rate']== NULL && $row1['rate']=="")
			{
			         $row['u_id'] = "";
		             $row['name'] = "";
		             $row['rate'] = "0";
		             $row['remark_comment'] = "";
		             
			}else
			{	
			    
			    	$row['u_id'] = 	$row1['u_id'];
			    	$row['name'] = 	$row1['name'];
			  	    $row['rate'] = 	$row1['rate'];
			  	     $row['remark_comment'] = 	$row1['remark_comment'];
			    
			}
			
			
			$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
						$row['s_spec'] = $data['s_spec'];
        	$row['s_banner_image'] = $file_path.'images/'.$data['s_banner_image'];
        	 			$row['s_description'] = $data['s_description'];
	        $row['s_post_type'] = $data['s_post_type'];
			$row['s_email'] = $data['s_email'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];
 			$row['distance'] = $data['distance'];
 				$row['s_token'] = $data['s_token'];
 			$row['s_type'] = $data['s_type'];
			$row['s_puncture'] = $data['s_puncture'];
 			$row['s_breakdown'] = $data['s_breakdown'];
 			$row['s_outoffuel'] = $data['s_outoffuel'];
 			$row['s_engineservices'] = $data['s_engineservices'];
			$row['s_oilservice'] = $data['s_oilservice'];
			$row['s_bikespares'] = $data['s_bikespares'];
 			$row['s_bikepainting'] = $data['s_bikepainting'];
 			$row['s_generalservice'] = $data['s_generalservice'];
 			$row['s_bikewashpolish'] = $data['s_bikewashpolish'];
 			$row['s_electricwork'] = $data['s_electricwork'];
 			$row['s_stickering'] = $data['s_stickering'];
 			$row['s_status'] = $data['s_status'];

			array_push($jsonObj4,$row); 
			}
		
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}
 	

 	else if(isset($_GET['get_book_user1']))
 	{


 		$jsonObj4= array();	

 		$query="SELECT * FROM tbl_book 
 		left join tbl_users on tbl_users.id = tbl_book.u_id
 		left join tbl_service on tbl_service.s_id = tbl_book.s_id
 		left join tbl_bike on tbl_bike.bk_id = tbl_book.bike_id
		left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
        left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
 		WHERE tbl_book.u_id='".$_POST['u_id']."'
 		ORDER BY tbl_book.b_id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
	
	   $doctor_rate="SELECT * 
		FROM tbl_invoice
		where tbl_invoice.bikedetails_id='".$data['s_id']."' and tbl_invoice.u_id='".$_POST['u_id']."' and tbl_invoice.o_id='".$data['b_id']."'  ORDER BY tbl_invoice.bikedetails_id DESC";

		   $doc_result = mysqli_query($mysqli,$doctor_rate)or die(mysqli_error());

            

		   $doc1=mysqli_fetch_assoc($doc_result);
		   
		  
		   
        	if($doc1['i_date']== NULL && $doc1['i_date']==""  && $doc1['i_total_amount']==NULL && $doc1['i_total_amount']=="")
			{
		           
		              $row['i_date'] = "";
		              $row['i_total_amount'] = 0;
		              
		             
		          
			}else
			{	
			  
		
			    
			    	$row['i_date'] = 	$doc1['i_date'];
			    	$row['i_total_amount'] = 	$doc1['i_total_amount'];
			    
   
			}
		    
			$row['b_id'] = $data['b_id'];
		
			$row['u_id'] = $data['u_id'];
			$row['name'] = $data['name'];
			$row['rate'] = $data['rate'];
			$row['remark_comment'] = $data['remark_comment'];
			$row['email'] = $data['email'];
			$row['phone'] = $data['phone'];
			
			$row['bk_id'] = $data['bk_id'];
			$row['bk_type'] = $data['bk_type'];
			
			$row['bb_id'] = $data['bb_id'];
			$row['bb_name'] = $data['bb_name'];
			$row['bb_image'] = $file_path.'images/'.$data['bb_image'];
			
			$row['bn_id'] = $data['bn_id'];
			$row['bn_name'] = $data['bn_name'];
	    	$row['bn_image'] = $file_path.'images/'.$data['bn_image'];
			$row['bk_number'] = $data['bk_number'];
			
			$row['s_id'] = $data['s_id'];
			$row['s_name'] = $data['s_name'];
			$row['s_image'] = $file_path.'images/'.$data['s_image'];
			$row['s_email'] = $data['s_email'];
			$row['s_password'] = $data['s_password'];
			$row['s_lat'] = $data['s_lat'];
			$row['s_long'] = $data['s_long'];
			$row['s_postal_code'] = $data['s_postal_code'];		
 			$row['s_adderss'] = $data['s_adderss'];
 			$row['s_phone'] = $data['s_phone'];
			$row['s_o_time'] = $data['s_o_time'];
 			$row['s_c_time'] = $data['s_c_time'];

			$row['date'] = $data['date'];

			$row['o_puncture'] = $data['o_puncture'];
			$row['o_breakdown'] = $data['o_breakdown'];
			$row['o_outoffuel'] = $data['o_outoffuel'];
			$row['o_engineservices'] = $data['o_engineservices'];
			$row['o_oilservice'] = $data['o_oilservice'];
			$row['o_bikespares'] = $data['o_bikespares'];
			$row['o_bikepainting'] = $data['o_bikepainting'];
			$row['o_generalservice'] = $data['o_generalservice'];
			$row['o_bikewashpolish'] = $data['o_bikewashpolish'];
			$row['o_electricwork'] = $data['o_electricwork'];
			$row['o_stickering'] = $data['o_stickering'];
			$row['o_others'] = $data['o_others'];
			$row['o_remark'] = $data['o_remark'];
		
			   
             $qry1 = "SELECT * FROM `tbl_invoice`
            WHERE tbl_invoice.i_id='".$data['invoice_id']."' ";
    
    		$result1 = mysqli_query($mysqli,$qry1);
    		$row2 = mysqli_fetch_assoc($result1);

                if($row2['i_status'] == 0 )
                {
                    
                    $row['invoice_id'] = 0 ;

                }else
                {
                    	$row['invoice_id'] = $data['invoice_id'];
                }
			
			
			
			$row['b_type'] = $data['b_type'];
			$row['b_status'] = $data['b_status'];
			
			array_push($jsonObj4,$row); 
			
			
			}
		
		$set['bike_service'] = $jsonObj4;	

 		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 	}
 	
 	
 	 //get all settings
    else if(isset($_GET['get_specialist']))
 	{
  		 $jsonObj4= array();	

		$query="SELECT * FROM tbl_specialist order by tbl_specialist.st_id desc";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['st_id'] = $data['st_id'];
			$row['st_name'] = $data['st_name'];
			$row['st_status'] = $data['st_status'];
	
	
			
			array_push($jsonObj4,$row); 
			}
		
		$set['bike_service'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }
?>