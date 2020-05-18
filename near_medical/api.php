<?php include("includes/connection.php");
 	  include("includes/function.php"); 	
	
	
	/*SELECT d_name , (6371 * acos (cos (radians(21.184291))* cos(radians(lattitude))* cos( radians(72.784814) - radians(longitude) )+ sin (radians(21.184291) )* sin(radians(lattitude)))) AS distance FROM tbl_doctor_list HAVING (distance < 5) ORDER BY `distance` ASC
*/
	
	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';

     if(isset($_GET['cat_id']))
	{
		$jsonObj= array();	
	
	    $query="SELECT * FROM `tbl_category` ORDER BY `tbl_category`.`cid` ASC ";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['cid'] = $data['cid'];
			$row['category_name'] = $data['category_name'];
			$row['category_image'] = $data['category_image'];
			$row['status'] = $data['status'];

			array_push($jsonObj,$row);
		
		}
		
		$set['MEDANZO'] = $jsonObj;	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	
	
	}
	
	else  if(isset($_GET['doc_cat']))
	{

		$jsonObj= array();	
	
	    $query="SELECT * FROM `tbl_doctor_cat` ORDER BY `tbl_doctor_cat`.`dc_id` ASC ";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['dc_id'] = $data['dc_id'];
			$row['dc_name'] = $data['dc_name'];
			$row['dc_image'] = $data['dc_image'];
			$row['dc_status'] = $data['dc_status'];
			

			array_push($jsonObj,$row);
		
		}
		
		$set['MEDANZO'] = $jsonObj;	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	
	}
	
		else if(isset($_GET['doc_list_catwise']))
	{


		$jsonObj= array();	
	
/*	    $query="SELECT * FROM `tbl_doctor_list` 
	    LEFT JOIN tbl_doctor_cat ON tbl_doctor_cat.dc_id = tbl_doctor_list.d_cat
	    ORDER BY `tbl_doctor_list`.`did` ASC ";*/
	    
	    $lattitude_to = $_GET['lattitude_to'];
	     $longitude_to = $_GET['longitude_to'];
	     $d_cat = $_GET['d_cat'];
	    
	     $query="SELECT tbl_doctor_cat.* , tbl_doctor_list.* , (6371 * acos (cos (radians(".$lattitude_to."))* cos(radians(lattitude))* cos( radians(".$longitude_to.") - radians(longitude) )+ 
	    sin (radians(".$lattitude_to.") )* sin(radians(lattitude)))) AS distance FROM tbl_doctor_list LEFT JOIN tbl_doctor_cat ON tbl_doctor_cat.dc_id = tbl_doctor_list.d_cat 
	    WHERE tbl_doctor_list.d_cat = '".$d_cat."' HAVING (distance < 5) ORDER BY `distance` ASC ";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['dc_id'] = $data['dc_id'];
			$row['dc_name'] = $data['dc_name'];
			$row['dc_image'] = $data['dc_image'];
		
			
			$row['did'] = $data['did'];
			$row['d_name'] = $data['d_name'];
			$row['d_image'] = $data['d_image'];
			$row['degree'] = $data['degree'];
			$row['experience'] = $data['experience'];
			$row['address'] = $data['address'];
			$row['postal_code'] = $data['postal_code'];
			$row['lattitude'] = $data['lattitude'];
			$row['longitude'] = $data['longitude'];
			$row['status'] = $data['status'];

			array_push($jsonObj,$row);
		
		}
		
		$set['MEDANZO'] = $jsonObj;	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	
	}
	
	else if(isset($_GET['user_register']))
	{
		
		$qry = "SELECT * FROM tbl_users WHERE   email = '".$_GET['email']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
		if($row['email']!="")
		{
			$set['MEDANZO'][]=array('msg' => "Email address already used!",'success'=>'0');
		}
		else
		{ 
  
			$qry1="INSERT INTO tbl_users (`user_type`,`name`,`email`,`password`,`phone`,`status`) VALUES ('Normal','".$_GET['name']."','".$_GET['email']."','".$_GET['password']."','".$_GET['phone']."','1')"; 
            
            $result1=mysqli_query($mysqli,$qry1);  									 
					 
				
			$set['MEDANZO'][]=array('msg' => "Register successflly...!",'success'=>'1');
					
		}
	  
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	
	}
	else if(isset($_GET['users_login']))
	{
		
	    $email = $_GET['email'];
 		$password = $_GET['password'];

	    $qry = "SELECT * FROM tbl_users WHERE  email = '".$email."' and password = '".$password."'";
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
 		$row = mysqli_fetch_assoc($result);
		
    if ($num_rows > 0)
		{ 
					 
			     $set['MEDANZO'][]=array('user_id' => $row['id'],'name'=>$row['name'],'email'=>$row['email'],'success'=>'1');
 			 
		}		 
		else
		{
				 
 				$set['MEDANZO'][]=array('msg' =>'Login failed','success'=>'0');
 		}


	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	
	}
	
	else if(isset($_GET['user_profile']))
	{
		
		$qry = "SELECT * FROM tbl_users WHERE id = '".$_GET['id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		 
		$row = mysqli_fetch_assoc($result);
	  				 
	    $set['MEDANZO'][]=array('user_id' => $row['id'],'name'=>$row['name'],'email'=>$row['email'],'phone'=>$row['phone'],'success'=>'1');


	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	
	}
	
	else if(isset($_GET['user_profile_update']))
	{
		if($_GET['password']!="")
		{
			$user_edit= "UPDATE tbl_users SET name='".$_GET['name']."',email='".$_GET['email']."',password='".$_GET['password']."',phone='".$_GET['phone']."' WHERE id = '".$_GET['user_id']."'";	 
		}
		else
		{
			$user_edit= "UPDATE tbl_users SET name='".$_GET['name']."',email='".$_GET['email']."',phone='".$_GET['phone']."' WHERE id = '".$_GET['user_id']."'";	 
		}
   		
   		$user_res = mysqli_query($mysqli,$user_edit);	
	  				 
		$set['MEDANZO'][]=array('msg'=>'Updated','success'=>'1');

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	
	}
	else if(isset($_GET['user_status']))
	{
		$user_id = $_GET['user_id'];
		 
		$qry = "SELECT * FROM tbl_users WHERE status='1' and id = '".$user_id."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    if ($num_rows > 0)
		{ 
					 
			     $set['MEDANZO'][]=array('message' => 'Enable','success'=>'1');
			 
		}		 
		else
		{
				 
 				$set['MEDANZO'][]=array('message' => 'Disable','success'=>'0');
		}


	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}	
	
	else if(isset($_GET['forgot_pass']))
	{
		$host = $_SERVER['HTTP_HOST'];
		preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
        $domain_name=$matches[0];
         
	 	 
		$qry = "SELECT * FROM tbl_users WHERE email = '".$_GET['email']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
		if($row['email']!="")
		{
 
			$to = $_GET['email'];
			// subject
			$subject = '[IMPORTANT] '.APP_NAME.' Forgot Password Information';
 			
			$message='<div style="background-color: #f9f9f9;" align="center"><br />
					  <table style="font-family: OpenSans,sans-serif; color: #666666;" border="0" width="600" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
					    <tbody>
					      <tr>
					        <td colspan="2" bgcolor="#FFFFFF" align="center"><img src="http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/images/'.APP_LOGO.'" alt="header" /></td>
					      </tr>
					      <tr>
					        <td width="600" valign="top" bgcolor="#FFFFFF"><br>
					          <table style="font-family:OpenSans,sans-serif; color: #666666; font-size: 10px; padding: 15px;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
					            <tbody>
					              <tr>
					                <td valign="top"><table border="0" align="left" cellpadding="0" cellspacing="0" style="font-family:OpenSans,sans-serif; color: #666666; font-size: 10px; width:100%;">
					                    <tbody>
					                      <tr>
					                        <td><p style="color: #262626; font-size: 28px; margin-top:0px;"><strong>Dear '.$row['name'].'</strong></p>
					                          <p style="color:#262626; font-size:20px; line-height:32px;font-weight:500;">Thank you for using '.APP_NAME.',<br>
					                            Your password is: '.$row['password'].'</p>
					                          <p style="color:#262626; font-size:20px; line-height:32px;font-weight:500;margin-bottom:30px;">Thanks you,<br />
					                            '.APP_NAME.'.</p></td>
					                      </tr>
					                    </tbody>
					                  </table></td>
					              </tr>
					               
					            </tbody>
					          </table></td>
					      </tr>
					      <tr>
					        <td style="color: #262626; padding: 20px 0; font-size: 20px; border-top:5px solid #52bfd3;" colspan="2" align="center" bgcolor="#ffffff">Copyright © '.APP_NAME.'.</td>
					      </tr>
					    </tbody>
					  </table>
					</div>';
 

			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.APP_NAME.' <'.APP_FROM_EMAIL.'>' . "\r\n";
			// Mail it
			@mail($to, $subject, $message, $headers);
 
			  
			$set['MEDANZO'][]=array('msg' => "Password has been sent on your mail!",'success'=>'1');
		}
		else
		{  	 
				
			$set['MEDANZO'][]=array('msg' => "Email not found in our database!",'success'=>'0');
					
		}

	
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
 
		$set['MEDANZO'] = $jsonObj;
		
	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}		
	 
	 
?>