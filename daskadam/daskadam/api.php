<?php 

	include("includes/connection.php");
 	 include("includes/function.php"); 	
	
	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
	
	function get_user_info($user_id,$field_name) 
	{
		global $mysqli;

		$qry_user="SELECT * FROM tbl_users WHERE id='".$user_id."'";
		$query1=mysqli_query($mysqli,$qry_user);
		$row_user = mysqli_fetch_array($query1);

		$num_rows1 = mysqli_num_rows($query1);
		
		if ($num_rows1 > 0)
		{		 	
			return $row_user[$field_name];
		}
		else
		{
			return "";
		}
	}


	if(isset($_GET['all_video']))
	{

    	$limit=API_LATEST_LIMIT;
    
		$jsonObj_2= array();	

		$tableName="tbl_video";		

		$query = "SELECT COUNT(*) as num FROM $tableName WHERE tbl_video.status=1";
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

	
		$query_3="SELECT * FROM tbl_video
				WHERE tbl_video.status=1 ORDER BY tbl_video.id DESC LIMIT $start, $limit";

			$sql_all = mysqli_query($mysqli,$query_3)or die(mysqli_error());

		while($data_all = mysqli_fetch_assoc($sql_all))
		{
			$row2['id'] = $data_all['id'];
			$row2['video_title'] = $data_all['video_title'];
			$row2['video_url'] = $data_all['video_url'];
			$row2['video_thumbnail_b'] = $data_all['video_thumbnail'];
			$row2['video_thumbnail_s'] = $data_all['video_thumbnail'];
			
			$row2['totel_viewer'] = $data_all['totel_viewer'];
			$row2['totel_likes'] = $data_all['totel_likes'];
			$row2['totel_down'] = $data_all['totel_down'];
			$row2['status'] = $data_all['status'];
			
	
			array_push($jsonObj_2,$row2);
		
		}
		
		$set['totalvideo'] = $total_pages;
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj_2;	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

	}
	
	

	
	else if(isset($_GET['video_id']))
 	{
 		$jsonObj= array();	

		$query="SELECT * FROM tbl_video
		WHERE tbl_video.id='".$_GET['video_id']."' ";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			 
			
			$row['id'] = $data['id'];
 			$row['video_title'] = $data['video_title'];
			$row['video_url'] = $data['video_url'];
			
			$row['video_thumbnail_b'] = $data['video_thumbnail'];
			$row['video_thumbnail_s'] = $data['video_thumbnail'];
			
		
			$row['totel_viewer'] = $data['totel_viewer']; 
			$row['totel_likes'] = $data['totel_likes'];
			$row['totel_down'] = $data['totel_down'];
			$row['status'] = $data['status'];
			
			
			

			//Related Videos
			$query_2="SELECT * FROM tbl_video
			WHERE  tbl_video.status='1' AND tbl_video.id!='".$data['id']."' LIMIT 10";

			$sql2 = mysqli_query($mysqli,$query_2)or die(mysqli_error());
 			
 			if($sql2->num_rows > 0)
		     {
     			while($data_2 = mysqli_fetch_assoc($sql2))
    			{
    
    				$row2['id'] = $data_2['id'];
    				$row2['video_title'] = $data_2['video_title'];
    				$row2['video_url'] = $data_2['video_url'];
    
    				$row2['video_thumbnail_b'] = $data_2['video_thumbnail'];
    				$row2['video_thumbnail_s'] = $data_2['video_thumbnail'];
    			
    				
        			$row2['totel_viewer'] = $data_2['totel_viewer']; 
        			$row2['totel_likes'] = $data_2['totel_likes'];
        			$row2['totel_down'] = $data_2['totel_down'];
        			
        			
        			
        			$row2['status'] = $data_2['status'];			
        			
    				$related_data[]=$row2;

			}
			
			$row['related']=$related_data;
			
		   }
		   else
		   {
		       
		       $row['related']=array();
		   }
			
			
			array_push($jsonObj,$row);
		
		}
		
		$view_qry=mysqli_query($mysqli,"UPDATE tbl_video SET totel_viewer= totel_viewer + 1 WHERE id = '".$_GET['video_id']."'");
		
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	
	}
	


	else if(isset($_GET['video_id_download']))
 	{

		 $query="SELECT * FROM tbl_video
		WHERE tbl_video.id='".$_GET['video_id_download']."'";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
    	$row = mysqli_fetch_assoc($sql);
        
		
		if($row['id']!="")
		{
		    $updatequery= "UPDATE tbl_video SET totel_down= totel_down + 1 WHERE id = '".$_GET['video_id_download']."'";
		    
			$view_qry=mysqli_query($mysqli,$updatequery);												 
				
			$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Video Download count add successflly...!",'success'=>'1');
		
		}
		else
		{ 
		    
  				$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Some thing went wrong...!!",'success'=>'0');
					
		}


		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	
	}


	else if(isset($_GET['video_id_like']))
 	{

		$query="SELECT * FROM tbl_video
		WHERE tbl_video.id='".$_GET['video_id_like']."'";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
		$row = mysqli_fetch_assoc($sql);
		
		if($row['id']!="")
		{
			$view_qry=mysqli_query($mysqli,"UPDATE tbl_video SET totel_likes= totel_likes + 1 WHERE id = '".$_GET['video_id_like']."'");												 
				
			$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Video likes count add successflly...!",'success'=>'1');
		
		}
		else
		{
  				$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Some thing went wrong...!!",'success'=>'0');
					
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

			$row['onesignal_app_id'] = $data['onesignal_app_id'];
			$row['onesignal_rest_key'] = $data['onesignal_rest_key'];

			$row['app_description'] = $data['app_description'];
			$row['app_developed_by'] = $data['app_developed_by'];

			$row['app_privacy_policy'] = stripslashes($data['app_privacy_policy']);
 			
 			$row['publisher_id'] = $data['publisher_id'];
 			
 			$row['banner_ad'] = $data['banner_ad'];
 			$row['banner_ad_id'] = $data['banner_ad_id'];
 			
 			$row['interstital_ad'] = $data['interstital_ad'];
			$row['interstital_ad_id'] = $data['interstital_ad_id'];
		    $row['interstital_ad_click'] = $data['interstital_ad_click'];

 			$row['Rewarded_ad'] = $data['Rewarded_ad'];
 			$row['Rewarded_ad_id'] = $data['Rewarded_ad_id'];
 			$row['points'] = $data['points'];
 			$row['coin'] = $data['coin'];
 			$row['price'] = $data['price'];
 			
 			$row['payment'] = $data['payment'];
 			$row['payment_desc'] = $data['payment_desc'];
 			 $row['activeidtext'] = $data['activeidtext'];

			array_push($jsonObj,$row);
		
		}
 
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;
		
	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}	
	

	
	else if(isset($_GET['post_user_social_login']))
	{
	    
	   if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
         	{
         	$set['ALL_IN_ONE_VIDEO'][]=array('msg' =>'Something went wrong. Login with valid email id...','success'=>'0');
         	}
         elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
           	{
         	$set['ALL_IN_ONE_VIDEO'][]=array('msg' =>'Something went wrong. Login with valid email id...','success'=>'0');
         	}
         elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
           	{
         	$set['ALL_IN_ONE_VIDEO'][]=array('msg' =>'Something went wrong. Login with valid email id...','success'=>'0');
         	}
         elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
           	{
         	$set['ALL_IN_ONE_VIDEO'][]=array('msg' =>'Something went wrong. Login with valid email id...','success'=>'0');
         	}
         elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
          	{
         	$set['ALL_IN_ONE_VIDEO'][]=array('msg' =>'Something went wrong. Login with valid email id...','success'=>'0');
         	}
         elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
          	{
         	$set['ALL_IN_ONE_VIDEO'][]=array('msg' =>'Something went wrong. Login with valid email id...','success'=>'0');
         	}
         elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
          	{
         	$set['ALL_IN_ONE_VIDEO'][]=array('msg' =>'Something went wrong. Login with valid email id...','success'=>'0');
         	}
         else
{
        
		$email_id = $_POST['email'];
		$device_id = $_POST['device_id'];
		
		$qry = "SELECT * FROM tbl_users WHERE email = '".$email_id."' or device_id = '".$device_id."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    	if ($num_rows > 0)
		{

		    
		    	$qry1 = "SELECT * FROM tbl_users WHERE email = '".$email_id."' or device_id = '".$device_id."'"; 
            	$result1 = mysqli_query($mysqli,$qry1);
            	$num_rows1 = mysqli_num_rows($result1);
            	$row1 = mysqli_fetch_assoc($result1);
		    
            	if ($num_rows1 > 0)
        		{
        			$set['ALL_IN_ONE_VIDEO'][]	=	array(      
                                     'msg' 	=>	"succecesfull login",
                            'success' 	=>	1,
 						  'id' 	=>	$row['id'],
 						    'login_type' 	=>	$row['login_type'],
 						  'name'	=>	$row['name'],
 						  'email'	=>	$row['email'],
 						   'imageurl'	=>	$row['imageurl'],
 						  'phone'	=>	$row['phone'],
 						   'device_id'	=>	$row['device_id'],
 						    'wallet'	=>	$row['wallet'],
 						     'code'	=>	$row['code'],
 						  'refferal_code'	=>	$row['refferal_code'],
 						   'network'	=>	$row['network'],
 						    'total_followers'	=>	$row['total_followers'],
 						     'total_following'	=>	$row['total_following'],
 						  'status'	=>	$row['status']
        		     								);
        		     								

        		    
        		}else
            	{
        	    	$set['ALL_IN_ONE_VIDEO'][]=array('msg' =>'Something went wrong. Login with valid email id...','success'=>'0');
        		    	
        		          	
            	    
            	}
		    
		}		 
		else
		{
		    
		    
		    		    
			$refferal_code = $_POST['refferal_code'];
		    $rand=rand(1000,9999);

		     $qry1="INSERT INTO tbl_users 
				  (`login_type`,
				  `name`,
				  `email`,
				   `imageurl`,
				     `password`,
				   `phone`,
				    `device_id`,
				       `wallet`,
				        `refer_wallet`,
				      `code`,
				         `refferal_code`,
				          `network`,
				         `payment_verify`,
				  `status`
				) VALUES (
			    	'".$_POST['login_type']."',
					'".trim($_POST['name'])."',
					'".trim($_POST['email'])."',
					'".$_POST['imageurl']."',
						'',
			    	'".trim($_POST['phone'])."',
					'".$_POST['device_id']."',
				    	0,
						'0',
				    	'".$rand."',
						'".$refferal_code."',
						'0',
						'0',
						'1'
				)"; 
				

            $result1 = mysqli_query($mysqli,$qry1);
            $last_id = mysqli_insert_id($mysqli);  
            
            $qrys = "SELECT * FROM tbl_users WHERE id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);
			$firstid=$row['id'];
												 
			$set['ALL_IN_ONE_VIDEO'][]	=	array(   
                           'msg' 	=>	"succecesfull login",
                            'success' 	=>	1,
 						  'id' 	=>	$row['id'],
 						    'login_type' 	=>	$row['login_type'],
 						  'name'	=>	$row['name'],
 						  'email'	=>	$row['email'],
 						   'imageurl'	=>	$row['imageurl'],
 						  'phone'	=>	$row['phone'],
 						   'device_id'	=>	$row['device_id'],
 						    'wallet'	=>	$row['wallet'],
 						      'refer_wallet'	=>	$row['refer_wallet'],
 						     'code'	=>	$row['code'],
 						  'refferal_code'	=>	$row['refferal_code'],
 						   'network'	=>	$row['network'],
 						     'payment_verify'	=>	$row['payment_verify'],
 						  'status'	=>	$row['status']
		     								);



	              //first level

		    if($_POST['refferal_code'] !="")
		    {
			   $qry = "SELECT * FROM tbl_users WHERE code = '".$_POST['refferal_code']."'";	 
	    		$result = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 	       $id=$row['id'];
	 	     
		        if ($num_rows > 0)
	    		{
	    		     $id=$row['id'];
	    		     $wallet=$row['wallet'];
	    		      $firstlevelearning=100;
	    		     $newwallet=$wallet+$firstlevelearning ;
	    		     
                    
                      //first level user wallet and network update
	                 $first_level_earn=$row['first_level_earn'];
	    		     $first_level_earn_new_wallet=$first_level_earn+$firstlevelearning ;
	    		     
                    
	                   $first_level_earn1= "UPDATE tbl_users SET wallet='".$newwallet."' , first_level_earn='".$first_level_earn_new_wallet."' WHERE id = '".$id."'";	 
	    		    $first_level_earn1 = mysqli_query($mysqli,$first_level_earn1);
	    		    
		
	    		}
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
        			$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
        			VALUES ('".$id."','','0','Direct Refer Bonus','".$date."','".$firstlevelearning."')"; 
    	            
    	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
	    	}
	    	
	    	

 		}
}
 		
	    	header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();

 		
	}
	
    else if(isset($_GET['post_user_network']))
	{
	
	

	 	$qry = "SELECT * FROM tbl_network WHERE user_id = '".$_POST['id']."' and level = '".$_POST['level']."'";  
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);

	   if ($num_rows > 0) 
	     {

	     $jsonObj= array();	
	      
	 
		 $query = "SELECT COUNT(*) as num , SUM(money) as money1  FROM tbl_network WHERE user_id = '".$_POST['id']."' and level = '".$_POST['level']."'";
		$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
		$total_user = $total_pages['num'];
		$money1 = $total_pages['money1'];

	 		while($row = $result->fetch_array())
            {
                $rows[] = $row;
            }

          $response = array();  

           $count = count($rows) - 1; 

            for ($x = 0; $x <= $count ; $x++) 
            {
                  $qry = "SELECT * FROM tbl_users WHERE id = '".$rows[$x]['refferal_user_id']."'";	 
	    		$result = mysqli_query($mysqli,$qry);
	    		$row1 = mysqli_fetch_assoc($result);
                                if($row1["name"] == "")
                                {
                                    
                                }else
                                {
                                    
                              
          $employees = array(
              'id'=> $row1["id"],
              'name'=> $row1["name"],
              'email'=> $row1["email"],
              'payment_verify'=> $row1["payment_verify"],
              );
                  array_push($response, $employees);
                                }
       	
            }    


    		$set['ALL_IN_ONE_VIDEO'] = array( 'status' => '1','total_user' =>$total_user,'money' =>$money1,'refferal_user_id' =>$response, 'message' => 'get record!');	

    		
    		


		}  else {
		
			 $set['ALL_IN_ONE_VIDEO'] = array( 'status' => '0', 'total_user' =>'0','money' =>'0','refferal_user_id' =>[],'message' => 'Pleas select valid data');
			
		
		
		}


        		    	header( 'Content-Type: application/json; charset=utf-8' );
                	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                		die();

	}
	
	
	else if(isset($_GET['post_user_status']))
	{

    	$email_id = $_POST['email'];
		$device_id = $_POST['device_id'];
		
		$qry = "SELECT * FROM tbl_users WHERE email = '".$email_id."' or device_id = '".$device_id."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    	if ($num_rows > 0)
		{
			$set['ALL_IN_ONE_VIDEO'][]	=	array( 
 						  
 					 'user_status'		=>'1',	  
 					     'msg' 	=>	"succecesfull login",
                            'success' 	=>	1,
 						  'id' 	=>	$row['id'],
 						    'login_type' 	=>	$row['login_type'],
 						  'name'	=>	$row['name'],
 						  'email'	=>	$row['email'],
 						   'imageurl'	=>	$row['imageurl'],
 						  'phone'	=>	$row['phone'],
 						   'device_id'	=>	$row['device_id'],
 						    'wallet'	=>	$row['wallet'],
 						     'code'	=>	$row['code'],
 						  'refferal_code'	=>	$row['refferal_code'],
 						   'network'	=>	$row['network'],
 						    'total_followers'	=>	$row['total_followers'],
 						     'total_following'	=>	$row['total_following'],
 						  'status'	=>	$row['status']
        		     								
		   );
		   
        		    	header( 'Content-Type: application/json; charset=utf-8' );
                	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                		die();
		}		 
		else
		{
		    	$set['ALL_IN_ONE_VIDEO'][]	=	array( 
		     								  'user_status'	=>'0'
		     								);
		    		 
        		    	header( 'Content-Type: application/json; charset=utf-8' );
                	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                		die();
        }
	}
	
	
	

	else if(isset($_GET['post_user_transaction_add']))
	{
      if($_POST['user_id']!="" and $_POST['score']!="")
      {
                $qry1="INSERT INTO tbl_transaction (`user_id`,`type`,`date`,`score`) 
    			VALUES ('".$_POST['user_id']."','".$_POST['type']."','".$_POST['date']."','".$_POST['score']."')"; 
                
                $result1=mysqli_query($mysqli,$qry1);  									 
    					 
    				
    			$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "transaction add successflly...!",'success'=>'1');
    					
    		}
    	  
            	header( 'Content-Type: application/json; charset=utf-8' );
                	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                		die();    	 	 
   

	}
	
	
	else if(isset($_GET['post_user_transaction_view']))
	{
	
	   $jsonObj= array();	

		$query="SELECT * FROM tbl_transaction WHERE user_id = '".$_GET['user_id']."'"; 

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
    
 				$row['id'] = $data['id'];
                $row['user_id'] = $data['user_id'];
               
                   if($data['v_type'] == 0)
                  {
                       
                        $row['type'] = $data['type'];
                        $row['video_thumbnail']= "" ;
                        $row['v_name'] = $data['type'];
                        
                  }
                  
                  if($data['v_type'] == 1)
                  {
                      
                        $qry1 = "SELECT * FROM tbl_video WHERE id = '".$data['v_id']."'"; 
        	        	$result1 = mysqli_query($mysqli,$qry1);
        	        	$row1 = mysqli_fetch_assoc($result1);
        	        	$row['type'] = $data['type'];
                		$row['v_name']=$row1['video_title'];
                		$row['video_thumbnail']=$row1['video_thumbnail'];
                  }
                   if($data['v_type'] == 2)
                  {
                       $qry1 = "SELECT * FROM tbl_fullscreen_video WHERE id = '".$data['v_id']."'"; 
        	        	$result1 = mysqli_query($mysqli,$qry1);
        	        	$row1 = mysqli_fetch_assoc($result1);
        	        	$row['type'] = $data['type'];
                		$row['v_name']=$row1['video_title'];
                		$row['video_thumbnail']=$row1['video_thumbnail'];
                  }
                    
                  
                 
 				$row['date'] = $data['date'];
 				$row['score'] = $data['score'];
		   
		   array_push($jsonObj,$row);
		
		}
 
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
                	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                		die();   

	}
	
	
	
	
/*	else if(isset($_GET['post_user_redeem_add']))
    {
	
		
		if($_POST['user_id']!="" and $_POST['type']!="" and $_POST['amount']!="" and $_POST['number']!="" )
		{
		 
	    	  if($_POST['type'] == 1 )
    		     {
            		         
        	            $qry = "SELECT * FROM tbl_users WHERE id = '".$_POST['user_id']."'"; 
        	         
        	        	$result = mysqli_query($mysqli,$qry);
        	        	$num_rows = mysqli_num_rows($result);
        	        	$row = mysqli_fetch_assoc($result);
                		       
        		         $id=$row['id'];
            		     $wallet=$row['wallet'];
            		     $update_amount=$_POST['amount'];
                		
                		if ($num_rows > 0 and $wallet >= 50 and $update_amount >= 50)
                		{
                		    if($_POST['section'] == 1)
                		    {
                		        $id=$row['id'];
                    		     $wallet=$row['wallet'];
                    		     $update_amount=$_POST['amount'];
        
                    		     if($wallet >= $update_amount)
                    		     {
                    		       
                        		     $newwallet=$wallet-$update_amount;   
                    		    
                    	    		 $user_edit= "UPDATE tbl_users SET wallet='".$newwallet."' WHERE id = '".$id."'";	 
                    		    	 
                    	    		  $result1=mysqli_query($mysqli,$user_edit);  
                                        date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
                                        $date = date('d-m-Y');

                                    			  
                                  	  $qry1="INSERT INTO tbl_redeem (`section`,`user_id`,`date`,`type`,`amount`,`number`,`status`) 
                            			VALUES ('".$_POST['section']."','".$_POST['user_id']."','".$date."','".$_POST['type']."','".$_POST['amount']."','".$_POST['number']."','0')"; 
                                        
                                        $result12=mysqli_query($mysqli,$qry1);  									 
                            			$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Redeem Request Your Request has been Submitted. Wait 24-48 Hours...!",'success'=>'1');
                                        		        
                    		     }
                
                		        
                		    }else if  ($_POST['section'] == 2)
                		    {
                		        $id=$row['id'];
                    		     $wallet=$row['refer_wallet'];
                    		     $update_amount=$_POST['amount'];
        
                    		     if($wallet >= $update_amount)
                    		     {
                    		       
                        		     $newwallet=$wallet-$update_amount;   
                    		    
                    	    		 $user_edit= "UPDATE tbl_users SET refer_wallet='".$newwallet."' WHERE id = '".$id."'";	 
                    		    	 
                    	    		  $result1=mysqli_query($mysqli,$user_edit);  
                                    date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
                                    $date = date('d-m-Y');			  
                                  	  $qry1="INSERT INTO tbl_redeem (`section`,`user_id`,`date`,`type`,`amount`,`number`,`status`) 
                            			VALUES ('".$_POST['section']."','".$_POST['user_id']."','".$date."','".$_POST['type']."','".$_POST['amount']."','".$_POST['number']."','0')"; 
                                        
                                        $result12=mysqli_query($mysqli,$qry1);  									 
                            			$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Redeem Request Your Request has been Submitted. Wait 24-48 Hours...!",'success'=>'1');
                                        		        
                    		     }
                		    }
                		    
                		    
                		         else
                    		     {
                    		         	$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "some thing went wrong1 ...!",'success'=>'0');
                    		     }
                    	
                		}else
            		     {
            		         	$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "some thing went wrong 2...!",'success'=>'0');
            		     }
    		         
    		     }	     

		}else
	     {
	         	$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "some thing went wrong 3...!",'success'=>'0');
	     }

		header( 'Content-Type: application/json; charset=utf-8' );
                	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                		die();   
	}*/
	
	
		
	else if(isset($_GET['post_user_redeem_add']))
    {
	
		
		if($_POST['user_id']!="" and $_POST['type']!="" and $_POST['amount']!="" and $_POST['number']!="" )
		{
		 
						if($_POST['section'] == 1)
						 {
									 
								$qry = "SELECT * FROM tbl_users WHERE id = '".$_POST['user_id']."'"; 
							 
								$result = mysqli_query($mysqli,$qry);
								$num_rows = mysqli_num_rows($result);
								$row = mysqli_fetch_assoc($result);
									   
								 $id=$row['id'];
								 $wallet=$row['wallet'];
								 $update_amount=$_POST['amount'];
								
								if ($num_rows > 0 )
								{
									
										$id=$row['id'];
										 $wallet=$row['wallet'];
										 $update_amount=$_POST['amount'];
				
										 if($wallet >= $update_amount)
										 {
										   
											 $newwallet=$wallet-$update_amount;   
										
											 $user_edit= "UPDATE tbl_users SET wallet='".$newwallet."' WHERE id = '".$id."'";	 
											 
											  $result1=mysqli_query($mysqli,$user_edit);  
												date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
												$date = date('d-m-Y');

														  
											  $qry1="INSERT INTO tbl_redeem (`section`,`user_id`,`date`,`type`,`amount`,`number`,`status`) 
												VALUES ('".$_POST['section']."','".$_POST['user_id']."','".$date."','".$_POST['type']."','".$_POST['amount']."','".$_POST['number']."','0')"; 
												
												$result12=mysqli_query($mysqli,$qry1);  									 
												$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Redeem Request Your Request has been Submitted. Wait 24-48 Hours...!",'success'=>'1');
																
										 }
						
								}       
							}

							if ($_POST['section'] == 2)
							{
								
								$qry = "SELECT * FROM tbl_users WHERE id = '".$_POST['user_id']."'"; 
							 
								$result = mysqli_query($mysqli,$qry);
								$num_rows = mysqli_num_rows($result);
								$row = mysqli_fetch_assoc($result);
									   
								 $id=$row['id'];
								 $wallet=$row['wallet'];
								 $update_amount=$_POST['amount'];
								
								if ($num_rows > 0 )
								{
								$id=$row['id'];
								 $wallet=$row['refer_wallet'];
								 $update_amount=$_POST['amount'];

								 if($wallet >= $update_amount)
								 {
								   
									 $newwallet=$wallet-$update_amount;   
								
									 $user_edit= "UPDATE tbl_users SET refer_wallet='".$newwallet."' WHERE id = '".$id."'";	 
									 
									  $result1=mysqli_query($mysqli,$user_edit);  
									date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
									$date = date('d-m-Y');			  
									  $qry1="INSERT INTO tbl_redeem (`section`,`user_id`,`date`,`type`,`amount`,`number`,`status`) 
										VALUES ('".$_POST['section']."','".$_POST['user_id']."','".$date."','".$_POST['type']."','".$_POST['amount']."','".$_POST['number']."','0')"; 
										
										$result12=mysqli_query($mysqli,$qry1);  									 
										
										$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Redeem Request Your Request has been Submitted. Wait 24-48 Hours...!",'success'=>'1');
														
								 }
								}
							}
                		    
                    	
		}else
		 {
				$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "some thing went wrong 2...!",'success'=>'0');
		 }
    		         
    		

		header( 'Content-Type: application/json; charset=utf-8' );
                	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                		die();   
	}
	
	
	else if(isset($_GET['post_user_redeem_view']))
	{
		
	
	   $jsonObj= array();	

		$query="SELECT * FROM tbl_redeem WHERE user_id = '".$_GET['id']."'"; 
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
    
 				$row['id'] = $data['id'];
 			    $row['type'] = $data['type'];
 				$row['amount'] = $data['amount'];
 				$row['number'] = $data['number'];
 				$row['section'] = $data['section'];
		    	$row['status'] = $data['status'];
		   
		   array_push($jsonObj,$row);
		
		}
 
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;
		
	header( 'Content-Type: application/json; charset=utf-8' );
                	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                		die();  
	}

// //refeer wallet update	
// 		else if(isset($_GET['post_user_refer_wallet_update']))
// 	{
	
// 	    //wallet update
// 		if($_POST['user_id']!="")
// 		{
// 		     $qry = "SELECT * FROM tbl_users WHERE id = '".$_POST['user_id']."'";	 
// 			$result = mysqli_query($mysqli,$qry);
// 			$num_rows = mysqli_num_rows($result);
// 			$row = mysqli_fetch_assoc($result);
// 			 $refferal_code=$row['refferal_code'];
			
// 			 $qry = "SELECT * FROM tbl_users WHERE id = '".$_POST['user_id']."' and status='1'";	 
// 			$result = mysqli_query($mysqli,$qry);
// 			$num_rows1 = mysqli_num_rows($result);

// 	        if ($num_rows1 > 0)
// 			{
			    
// 			         $id=$row['id'];
// 	    		     $wallet=$row['refer_wallet'];
// 	    		     $update_amount=$_POST['refer_wallet'];
// 	    		     $newwallet=$wallet+$update_amount;   
			    
// 				     $user_edit= "UPDATE tbl_users SET refer_wallet='".$newwallet."' WHERE id = '".$id."'";	 
// 				     $user_res = mysqli_query($mysqli,$user_edit);	

                
//                 	$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Refer Wallet updated...!",'success'=>'1');
// 			}
// 		}else
// 		{
// 		    	$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "some thing went wrong ...!",'success'=>'0');
// 		}
	
// 		header( 'Content-Type: application/json; charset=utf-8' );
//                 	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
//                 		die();  
// 	}
	
	
	
//user wallet update	
	else if(isset($_GET['post_user_wallet_update']))
	{
	
	    //wallet update
		if($_POST['user_id']!="")
		{
		     $qry = "SELECT * FROM tbl_users WHERE id = '".$_POST['user_id']."'";	 
			$result = mysqli_query($mysqli,$qry);
			$num_rows = mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result);

	        if ($num_rows > 0)
			{
			    
			         $id=$row['id'];
	    		     $wallet=$row['wallet'];
	    		     $update_amount=$_POST['wallet'];
	    		     $newwallet=$wallet+$update_amount;   
			    
				     $user_edit= "UPDATE tbl_users SET wallet='".$newwallet."' WHERE id = '".$id."'";	 
				     $user_res = mysqli_query($mysqli,$user_edit);	

                
                	$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Wallet updated...!",'success'=>'1');
			}
		}else
		{
		    	$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "some thing went wrong ...!",'success'=>'0');
		}
	
		header( 'Content-Type: application/json; charset=utf-8' );
                	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                		die();  
	}
	
	
// 	else if(isset($_GET['get_user_profile']))
// 	{
	
// 		$qry = "SELECT * FROM tbl_users WHERE id = '".$_GET['id']."'"; 
// 		$result = mysqli_query($mysqli,$qry);
// 		$row = mysqli_fetch_assoc($result);

// 	 		$jsonObj2= array();
//  		if(mysqli_num_rows($result) > 0){		
 		    
//  		    //Follower list
// 		 echo   $query2="SELECT * FROM tbl_follow
// 			WHERE tbl_follow.`user_id`='".$row['id']."' ORDER BY tbl_follow.`fid` DESC";

// 			$sql2 = mysqli_query($mysqli,$query2)or die(mysqli_error());

// 			while($data2 = mysqli_fetch_assoc($sql2))
// 			{	 

// 				$row2['user_id'] = $data2['follow_id'];			 
// 				$row2['user_name'] = get_user_info($data2['follow_id'],'name');
				
// 				if(get_user_info($data2['follow_id'],'imageurl')!='')
// 				{
// 					$row2['user_image'] = get_user_info($data2['follow_id'],'imageurl');
// 				}	
// 				else
// 				{
// 					$row2['user_image'] ='';
// 				} 
			 	 
// 				array_push($jsonObj2,$row2);
			
// 			}

// 			//Following list
// 			$jsonObj3= array();	

// 			$query3="SELECT * FROM tbl_follow
// 			WHERE tbl_follow.`follow_id`='".$row['id']."' ORDER BY tbl_follow.`fid` DESC";

// 			$sql3 = mysqli_query($mysqli,$query3)or die(mysqli_error());

// 			while($data3 = mysqli_fetch_assoc($sql3))
// 			{	 

// 				$row3['user_id'] = $data3['user_id'];			 
// 				$row3['user_name'] = get_user_info($data3['user_id'],'name');			 
				
// 				if(get_user_info($data3['user_id'],'imageurl')!='')
// 				{
// 					$row3['user_image'] = get_user_info($data3['user_id'],'imageurl');
// 				}	
// 				else
// 				{
// 					$row3['user_image'] ='';
// 				} 

			 	 
// 				array_push($jsonObj3,$row3);
			
// 			}
		

// 			$total_followers=mysqli_num_rows($sql2);
// 			$total_following=mysqli_num_rows($sql3);
			
			
// 			$qry1 = "SELECT * FROM tbl_video WHERE user_id = '".$row['id']."'"; 
// 	    	$result1 = mysqli_query($mysqli,$qry1);
//             $num_row1 = mysqli_num_rows($result1);
            
//             $qry2 = "SELECT * FROM tbl_fullscreen_video WHERE user_id = '".$row['id']."'"; 
// 	    	$result2 = mysqli_query($mysqli,$qry2);
//             $num_row2 = mysqli_num_rows($result2);
	 		
// 	 		$num_rowtotal = $num_row1 + $num_row2 ;
	 		
//         	$totallevelearning=$row['first_level_earn']+$row['second_level_earn']+$row['third_level_earn']+$row['four_level_earn']+$row['fifth_level_earn']+$row['six_level_earn']+$row['seven_level_earn']+$row['eight_level_earn']+$row['nine_level_earn']+$row['ten_level_earn']	;
	  				 
// 	    $set['ALL_IN_ONE_VIDEO'][]=array(
	        
// 	        'msg' 	=>	"succecesfull login",
//             'success' 	=>	1,
//  		    'id' 	=>	$row['id'],
//  		    'login_type' 	=>	$row['login_type'],
//  		    'name'	=>	$row['name'],
//  		    'email'	=>	$row['email'],
//  		    'imageurl'	=>	$row['imageurl'],
//  		    'phone'	=>	$row['phone'],
//  		    'device_id'	=>	$row['device_id'],
//  		    'wallet'	=>	$row['wallet'],
//  		    'code'	=>	$row['code'],
//  		    'refferal_code'	=>	$row['refferal_code'],
//  		    'network'	=>	$row['network'],
//  		    'totallevelearning'=>$totallevelearning,
//  		    'first_level_earn'=>$row['first_level_earn'],
// 	        'second_level_earn'=>$row['second_level_earn'],
// 	        'third_level_earn'=>$row['third_level_earn'],
// 	        'four_level_earn'=>$row['four_level_earn'],
// 	        'fifth_level_earn'=>$row['fifth_level_earn'],
// 	        'six_level_earn'=>$row['six_level_earn'],
// 	        'seven_level_earn'=>$row['seven_level_earn'],
// 	        'eight_level_earn'=>$row['eight_level_earn'],
// 	        'nine_level_earn'=>$row['nine_level_earn'],
// 	        'ten_level_earn'=>$row['ten_level_earn'],
//  		    'total_followers'	=>	$total_followers,
//  		    'total_followers_list'	=>	$jsonObj2,
//  		    'total_following'	=>	$total_following,
//  		    'total_following_list'	=>	$jsonObj3,
//  		    'num_rowtotal'	=>	$num_rowtotal,
//  		    'status'	=>	$row['status']
	        
// 	        );
	        
//  		}
	
// 	            	header( 'Content-Type: application/json; charset=utf-8' );
//                 	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
//                 		die();  
	    
// 	}

	
	else if(isset($_GET['get_user_profile']))
	{
	
		$qry = "SELECT * FROM tbl_users WHERE id = '".$_GET['id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
	
 	$jsonObj2= array();
 		if(mysqli_num_rows($result) > 0){
	 		
        	$totallevelearning=$row['first_level_earn']+$row['second_level_earn']+$row['third_level_earn']+$row['four_level_earn']+$row['fifth_level_earn'];
        	
    
            $qrys3 = "SELECT SUM(amount) as sum_amount FROM tbl_redeem
        	WHERE  user_id = '".$_GET['id']."' and status = 1 "; 
			$results3 = mysqli_query($mysqli,$qrys3);
			$row3 = mysqli_fetch_assoc($results3);
	   

	    if($refferal_code3!= null && $refferal_code3!= '')
	    {
	        
		   $refferal_code3 = $row3['sum_amount'];
	    }else
	    {
	        $refferal_code3 = 0;
	    }
		
	  				 
	    $set['ALL_IN_ONE_VIDEO'][]=array(
	        
	        'msg' 	=>	"succecesfull login",
            'success' 	=>	1,
 		    'id' 	=>	$row['id'],
 		    'login_type' 	=>	$row['login_type'],
 		    'name'	=>	$row['name'],
 		    'email'	=>	$row['email'],
 		    'imageurl'	=>	$row['imageurl'],
 		    'phone'	=>	$row['phone'],
 		    'device_id'	=>	$row['device_id'],
 		    'wallet'	=>	$row['wallet'],
 		     'refer_wallet'	=>	$row['refer_wallet'],
 		     'wallet_balance'	=>	$row['refer_wallet'],
 		     'total_withdrawl'	=>	$refferal_code3,
 		    'code'	=>	$row['code'],
 		    'refferal_code'	=>	$row['refferal_code'],
 		    'network'	=>	$row['network'],
 		    'totallevelearning'=>$totallevelearning,
 		    'first_level_earn'=>$row['first_level_earn'],
	        'second_level_earn'=>$row['second_level_earn'],
	        'third_level_earn'=>$row['third_level_earn'],
	        'four_level_earn'=>$row['four_level_earn'],
	        'fifth_level_earn'=>$row['fifth_level_earn'],
	        'six_level_earn'=>0,
	        'seven_level_earn'=>0,
	        'eight_level_earn'=>0,
	        'nine_level_earn'=>0,
	        'ten_level_earn'=>0,
	         'payment_verify'=>$row['payment_verify'],
 		    'status'	=>	$row['status']
	        
	        );
	        
 		}
	
	            	header( 'Content-Type: application/json; charset=utf-8' );
                	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                		die();   
	    
	}
	


	
	
	else if(isset($_GET['user_profile_update']))
	{
	       if($_FILES['imageurl']['name']!="")
	
		{
		      $video_thumbnail=rand(0,99999)."_".$_FILES['imageurl']['name'];
       
              //Main Image
              $tpath1='images/'.$video_thumbnail;        
              $pic1=compress_image($_FILES["imageurl"]["tmp_name"], $tpath1, 80);
         
              //Thumb Image 
              $thumbpath='images/thumbs/'.$video_thumbnail;   
              $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
              
			$user_edit= "UPDATE tbl_users SET name='".$_POST['name']."',imageurl='".$video_thumbnail."' WHERE id = '".$_POST['user_id']."'";	 
		}
		else
		{
			$user_edit= "UPDATE tbl_users SET name='".$_POST['name']."' WHERE id = '".$_POST['user_id']."'";	 
		}
   		
   		$user_res = mysqli_query($mysqli,$user_edit);	
	  				 
		$set['ALL_IN_ONE_VIDEO'][]=array('msg'=>'Updated','success'=>'1');

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	
	}
	
	else if(isset($_GET['vid_upload']))
	
	{
		    
		    if($_FILES['video_url']['name'] != '' and $_FILES['image_url']['name'] != '' and $_POST['video_title']!='' )
		    {
        		        
                  
        		     $video_title =$_POST['video_title'];
        		 
                    if($_FILES['video_url']['name'] != '')
                    {
                                          $video_url1=rand(0,99999)."_".$_FILES['video_url']['name'];
            	
            	    $file_path1 = $file_path .'/uploads/';
                      
                    $video_url=$file_path1.$video_url1;
                      
            		$temp=$_FILES['video_url']['tmp_name'];
            		$path="uploads/".$video_url1;
            		move_uploaded_file($temp,$path);
                    }
  
                   if($_FILES['image_url']['name'] != '')
                   {
                    	$image_url1=rand(0,99999)."_".$_FILES['image_url']['name'];
                	
                	    $file_path3 = $file_path.'/images/';
                          
                        $image_url=$file_path3.$image_url1;
                          
                		$temp1=$_FILES['image_url']['tmp_name'];
                		$path1="images/".$image_url1;
                		move_uploaded_file($temp1,$path1);
                    }
            		

			       $qry1="INSERT INTO tbl_video (`video_title`,`video_url`,`video_thumbnail`, `totel_viewer` , `totel_likes` , `totel_down`, `featured` , `status`)
			       VALUES ('".$video_title."','".$video_url."','".$image_url1."',0,0,0,0,0)"; 
        			       
        	        $result1=mysqli_query($mysqli,$qry1);  		
        	        
        			$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "video uploaded successfully...",'success'=>'1');
		    }else
		    {
		        $set['ALL_IN_ONE_VIDEO'][]=array('msg' => "something went wrong...",'success'=>'0');

		    }
        		header( 'Content-Type: application/json; charset=utf-8' );
        	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        		die();	
	
		    
	}
	
	
	else if(isset($_GET['task_view']))
	 	  
	{	
		$jsonObj= array();	
	
	    $query="SELECT * FROM tbl_daily_task		
		where tbl_daily_task.d_status=1 ORDER BY tbl_daily_task.d_id ASC";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['d_id'] = $data['d_id'];			 
			$row['d_name'] = $data['d_name'];
			$row['d_link'] = $data['d_link'];
				$row['d_point'] = $data['d_point'];
			$row['d_status'] = $data['d_status'];			 
		 	 
			  
			array_push($jsonObj,$row);
		
		}
		
		$set['ANDROID_REWARDS_APP'] = $jsonObj;	
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	

	else if(isset($_GET['get_news_cat']))
	{
	     $jsonObj= array();	
	
	    $query="SELECT * FROM tbl_category		
		ORDER BY tbl_category.id ASC";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['id'] = $data['id'];			 
			$row['category_name'] = $data['category_name'];
			$row['category_image_thumbs'] = $file_path.'images/thumbs'.$data['category_image'];
			$row['category_image'] = $file_path.'images/'.$data['category_image'];
	
			array_push($jsonObj,$row);
		
		}
		
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;	
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	
	
	
	else if(isset($_GET['get_news']))
	 	  
	{
	   $jsonObj= array();	
	   
	    $tableName="tbl_news";   
	      $limit = 10; 
	      
	      $query = "SELECT COUNT(*) as num FROM tbl_news 
	      left join tbl_category on tbl_category.id = tbl_news.cat_id 
	    where tbl_news.cat_id='".$_GET['catid']."' ";
	      
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
		
	
	    $query="SELECT * FROM tbl_news	
	   left join tbl_category on tbl_category.id = tbl_news.cat_id 
	    where tbl_news.cat_id='".$_GET['catid']."'
		ORDER BY tbl_news.vid DESC LIMIT $start, $limit";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
		    
		    $row['vid'] = $data['vid'];			 
		
			$row['cat_id'] = $data['cat_id'];			 
			$row['category_name'] = $data['category_name'];
			$row['news_title'] = $data['news_title'];
	
			
			$row['news_image_thumbs'] = $file_path.'images/thumbs'.$data['news_image'];
			$row['news_image'] = $file_path.'images/'.$data['news_image'];
			
			$row['url'] = $data['url'];
			$row['status'] = $data['status'];

			array_push($jsonObj,$row);
		
		}
		$set['page'] = $_GET['page'];
		$set['totalimage'] = $total_pages;
		$set['limit'] = $limit;
		$set['success'] = '1';
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;	
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	 
	}
	
	
	
	
	else if(isset($_GET['payment_transection']))
    {
	
		$user_id = $_POST['user_id'];
		
		if($user_id !== "")
		{
		 
		    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
             $date = date('d-m-Y');
     

			$qry1="INSERT INTO tbl_payment_transaction 
				  (`user_id`,
				  `email`,
				   `orderid`,
			      `checksum`,
	            `bankname`,
	           `txtstatus`,
	             `txtid`,
                 `txtdate`,
                 `txtamount`,
			           `currency`,
	             `payment_mode`,
                 `res_code`,
                 `res_msg`,		                 
				  `status`
				) VALUES (
			    	'".$_POST['user_id']."',
					'".trim($_POST['email'])."',
		    		'".trim($_POST['orderid'])."',
					'".trim($_POST['checksum'])."',
					'".trim($_POST['bankname'])."',
					'".trim($_POST['txtstatus'])."',
	    			'".trim($_POST['txtid'])."',
					'".$date."',
					'".trim($_POST['txtamount'])."',
					'".trim($_POST['currency'])."',
	    			'".trim($_POST['payment_mode'])."',
					'".trim($_POST['res_code'])."',
					'".trim($_POST['res_msg'])."',
						'1'
				)"; 
            
            $result1 = mysqli_query($mysqli,$qry1);
            $last_id = mysqli_insert_id($mysqli);  
            
            
            $user_edit= "UPDATE tbl_users SET payment_verify = 1
            WHERE user_id = '".$_POST['user_id']."' "; 	
        	$user_res = mysqli_query($mysqli,$user_edit);	
            
            $qrys = "SELECT * FROM tbl_payment_transaction WHERE tid = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);
			$firstid=$row['id'];
												 
			$set['ALL_IN_ONE_VIDEO'][]	=	array(
                                  'msg' 	=>	"Payment done Succecesfully",
			                      'tid' 	=>	$row['tid'],
 								 'user_id'	=>	$row['user_id'],
 								 'email'	=>	$row['email'],
 							     'orderid'	=>	$row['orderid'],
 							     'checksum'	=>	$row['checksum'],
 							 	 'bankname'	=>	$row['bankname'],
 							     'txtstatus'	=>	$row['txtstatus'],
 						       	 'txtid'	=>	$row['txtid'], 
 						       	  'txtdate' 	=>	$row['txtdate'],
 								 'txtamount'	=>	$row['txtamount'],
 								 'currency'	=>	$row['currency'],
 								 'payment_mode'	=>	$row['payment_mode'],
 							     'res_code'	=>	$row['res_code'],
 							     'res_msg'	=>	$row['res_msg'],
 						       	 'status'	=>	$row['status'], 
		     								);
		    		 
		    
		    
		    
		    $qrys3 = "SELECT * FROM tbl_users WHERE id = '".$row['user_id']."'"; 
			$results3 = mysqli_query($mysqli,$qrys3);
			$row3 = mysqli_fetch_assoc($results3);
		    $refferal_code3 = $row3['refferal_code'] ;
		    
		    
		    
		    //first level
		    if($refferal_code3!="")
		    {
			   $qry = "SELECT * FROM tbl_users WHERE code = '".$refferal_code3."'";	 
	    		$result = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 	    	$r2 = $row['refferal_code'];
	 	    	$c2 = $row['id'];

		        if ($num_rows > 0)
	    		{
	    		     $id=$row['id'];

	    		     $wallet=$row['refer_wallet'];
	    		  
	    		      $firstlevelearning=3;
	    		     $newwallet1=$wallet+$firstlevelearning ;
                   
                    
                      //first level user wallet and network update
	                 $first_level_earn=$row['first_level_earn'];
	    		     $first_level_earn_new_wallet=$first_level_earn+$firstlevelearning ;
	    		     
	    		     
    		      $network=$row['network'];
                 $newnetwork=$network+1; 
                
                //network add
                  $network_qry="INSERT INTO tbl_network (`user_id`,`level`,`money`,`refferal_user_id`) 
                VALUES ('$id','1','$firstlevelearning','$firstid')"; 	            
                $result1=mysqli_query($mysqli,$network_qry);  

	                   $first_level_earn= "UPDATE tbl_users SET first_level_earn='".$first_level_earn_new_wallet."' , refer_wallet='".$newwallet1."' , network='".$newnetwork."'  WHERE id = '".$id."' ";	 
	    		    $first_level_earn1 = mysqli_query($mysqli,$first_level_earn);
	    		    
		
	    		}
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
    			$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
    			VALUES ('".$id."','','0','Refer Bonus','".$date."','".$firstlevelearning."')"; 
	            
	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
	    	}
	    	
	    	//second level
		    if($r2!="")
		    {

			    $qry = "SELECT * FROM tbl_users WHERE code = '".$r2."'"; 
	    		$result = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 		    $r3 = $row['refferal_code'];
	 		    $c3 = $row['id'];

	 		     
	 			 $qry1 = "SELECT * FROM tbl_users WHERE code = '".$r3."'";	 
	    		$result1 = mysqli_query($mysqli,$qry1);
	    		$row1 = mysqli_fetch_assoc($result1);
	 			 $rid2 = $row1['id'];

		        if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		    
	    		      $wallet=$row['refer_wallet'];
	    		     $secondlevelearning=1;   
	    		     $newwallet2=$wallet+$secondlevelearning;   

	    		 
					 //first level user wallet update
	                 $second_level_earn=$row['second_level_earn'];
	    		     $second_level_earn_new_wallet=$second_level_earn+$secondlevelearning ;
	    		     
	    		      $network=$row['network'];
                         $newnetwork=$network+1; 
                        
                        //network add
                          $network_qry="INSERT INTO tbl_network (`user_id`,`level`,`money`,`refferal_user_id`) 
                        VALUES ('$id','2','$secondlevelearning','$c2')"; 	            
                        $result1=mysqli_query($mysqli,$network_qry); 

	                $first_level_earn= "UPDATE tbl_users SET second_level_earn='".$second_level_earn_new_wallet."', refer_wallet='".$newwallet2."'  , network='".$newnetwork."' WHERE id = '".$id."'";	 
	    		    $first_level_earn1 = mysqli_query($mysqli,$first_level_earn);

	             }
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
	    		     		$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
    			VALUES ('".$id."','0','0','Refer Bonus','".$date."','".$secondlevelearning."')"; 
	    		     


	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
			}
	    	 
	    	 
	    	 //third level
			if($r3!="")
			{
			    $qry = "SELECT * FROM tbl_users WHERE code = '".$r3."'";	 
	    		$result = mysqli_query($mysqli,$qry);
	    		$result1 = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 			$r4 = $row['refferal_code'];
	 			 $c4 = $row['id'];
	

				if ($num_rows > 0)
	    		{
	    		    $id=$row['id'];
	    		     $id4=$row['id'];
	    		     $wallet=$row['refer_wallet'];
	    		     $thirdlevelearning=0.50;   
	    		     $newwallet3=$wallet+$thirdlevelearning;   
	    	

	                 //first level user wallet update
	                 $third_level_earn=$row['third_level_earn'];
	    		     $third_level_earn_new_wallet=$third_level_earn+$thirdlevelearning ;
	    		     
	    		     	      $network=$row['network'];
                         $newnetwork=$network+1; 
                        
                        //network add
                          $network_qry="INSERT INTO tbl_network (`user_id`,`level`,`money`,`refferal_user_id`) 
                        VALUES ('$id','3','$thirdlevelearning','$c3')"; 	            
                        $result1=mysqli_query($mysqli,$network_qry); 
	    		    
	    		     $user_edit= "UPDATE tbl_users SET third_level_earn='".$third_level_earn_new_wallet."', refer_wallet='".$newwallet3."' , network='".$newnetwork."' WHERE id = '".$id."'";	 
	    		    $result = mysqli_query($mysqli,$user_edit);
		
	    		}
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
	    		     	$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
    			VALUES ('".$id."','0','0','Refer Bonus','".$date."','".$thirdlevelearning."')"; 
	    		     
	            
	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
	    	}
	    	
	    	//four level
			if($r4!="")
			{
			    $qry = "SELECT * FROM tbl_users WHERE code = '".$r4."'";	 
	    		$result = mysqli_query($mysqli,$qry);
	    		$result1 = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 			$r5 = $row['refferal_code'];
	 			 $c5 = $row['id'];


				if ($num_rows > 0)
	    		{
	    		    $id=$row['id'];
	    		     $id5=$row['id'];
	    		     $wallet=$row['refer_wallet'];

	    		     $fourlevelearning=0.25;   
	    		     $newwallet4=$wallet+$fourlevelearning;   
	    		     
	    		          	      $network=$row['network'];
                         $newnetwork=$network+1; 
                        
                        //network add
                          $network_qry="INSERT INTO tbl_network (`user_id`,`level`,`money`,`refferal_user_id`) 
                        VALUES ('$id','4','$fourlevelearning','$c4')"; 	            
                        $result1=mysqli_query($mysqli,$network_qry); 
	    		
	                 //first level user wallet update
	                 $four_level_earn=$row['four_level_earn'];
	    		     $four_level_earn_new_wallet=$four_level_earn+$fourlevelearning ;
	    		    
	    		     $user_edit= "UPDATE tbl_users SET four_level_earn='".$four_level_earn_new_wallet."', refer_wallet='".$newwallet4."', network='".$newnetwork."' WHERE id = '".$id."'";	 
	    		    $result = mysqli_query($mysqli,$user_edit);
		
	    		}
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
	    		     	$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
    			VALUES ('".$id."','0','0','Refer Bonus','".$date."','".$fourlevelearning."')"; 
	    		     
	            
	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
	    	}
	    	
	    	//fifth level
			if($r5!="")
			{
			    $qry = "SELECT * FROM tbl_users WHERE code = '".$r5."'";	 
	    		$result = mysqli_query($mysqli,$qry);
	    		$result1 = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 			$r6 = $row['refferal_code'];
				 $c6 = $row['id'];
	 	
				if ($num_rows > 0)
	    		{
	    		    $id=$row['id'];
	    		     $id6=$row['id'];
	    		     $wallet=$row['refer_wallet'];

	    		     $fifthlevelearning=0.10;   
	    		     $newwallet5=$wallet+$fifthlevelearning;   
	 
	                 //first level user wallet update
	                 $fifth_level_earn=$row['fifth_level_earn'];
	    		     $fifth_level_earn_new_wallet=$fifth_level_earn+$fifthlevelearning ;
	    		     
	    		      $network=$row['network'];
                         $newnetwork=$network+1; 
                        
                        //network add
                          $network_qry="INSERT INTO tbl_network (`user_id`,`level`,`money`,`refferal_user_id`) 
                        VALUES ('$id','5','$fifthlevelearning','$c4')"; 	            
                        $result1=mysqli_query($mysqli,$network_qry); 
	    		    
	    		     $user_edit= "UPDATE tbl_users SET fifth_level_earn='".$fifth_level_earn_new_wallet."', refer_wallet='".$newwallet5."', network='".$newnetwork."' WHERE id = '".$id."'";	 
	    		    $result = mysqli_query($mysqli,$user_edit);
		
	    		}
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
	    		     	$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
    			VALUES ('".$id."','0','0','Refer Bonus','".$date."','".$fifthlevelearning."')"; 
	    		     
	            
	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
	    	}
	    	

		    		 
			header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();
 		}
	}


else if(isset($_GET['payment_transection1']))
    {
	
		
		if($_POST['data'] !== "")
		{
  			 date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
             $date = date('d-m-Y');

		 	 $someArray = json_decode($_POST['data'], true);

			$qry1="INSERT INTO tbl_payment_transaction 
				  (`user_id`,
				  `email`,
				   `orderid`,
			      `checksum`,
	            `bankname`,
	           `txtstatus`,
	             `txtid`,
                 `txtdate`,
                 `txtamount`,
			           `currency`,
	             `payment_mode`,
                 `res_code`,
                 `res_msg`,		                 
				  `status`
				) VALUES (
			    	'".$someArray['user_id']."',
					'".trim($someArray['email'])."',
		    		'".trim($someArray['orderid'])."',
					'".trim($someArray['checksum'])."',
					'".trim($someArray['bankname'])."',
					'".trim($someArray['txtstatus'])."',
	    			'".trim($someArray['txtid'])."',
					'".$date."',
					'".trim($someArray['txtamount'])."',
					'".trim($someArray['currency'])."',
	    			'".trim($someArray['payment_mode'])."',
					'".trim($someArray['res_code'])."',
					'".trim($someArray['res_msg'])."',
						'1'
				)"; 
            
            $result1 = mysqli_query($mysqli,$qry1);
            $last_id = mysqli_insert_id($mysqli);  
            
             $user_edit= "UPDATE tbl_users SET payment_verify = 1
            WHERE user_id = '".$someArray['user_id']."' "; 	
        	$user_res = mysqli_query($mysqli,$user_edit);	
            
            $qrys = "SELECT * FROM tbl_payment_transaction WHERE tid = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);
			$firstid1=$row['user_id'];
				
				
       
            
												 
			$set['ALL_IN_ONE_VIDEO'][]	=	array(
                                  'msg' 	=>	"Payment done Succecesfully",
			                      'tid' 	=>	$row['tid'],
 								 'user_id'	=>	$row['user_id'],
 								 'email'	=>	$row['email'],
 							     'orderid'	=>	$row['orderid'],
 							     'checksum'	=>	$row['checksum'],
 							 	 'bankname'	=>	$row['bankname'],
 							     'txtstatus'	=>	$row['txtstatus'],
 						       	 'txtid'	=>	$row['txtid'], 
 						       	  'txtdate' 	=>	$row['txtdate'],
 								 'txtamount'	=>	$row['txtamount'],
 								 'currency'	=>	$row['currency'],
 								 'payment_mode'	=>	$row['payment_mode'],
 							     'res_code'	=>	$row['res_code'],
 							     'res_msg'	=>	$row['res_msg'],
 						       	 'status'	=>	$row['status'], 
		     								);
		    		 
		    
		    
		    
		    $qrys3 = "SELECT * FROM tbl_users WHERE id = '".$row['user_id']."'"; 
			$results3 = mysqli_query($mysqli,$qrys3);
			$row3 = mysqli_fetch_assoc($results3);
		    $refferal_code3 = $row3['refferal_code'] ;

		      
		    //first level
		    if($refferal_code3!="")
		    {
			   $qry = "SELECT * FROM tbl_users WHERE code = '".$refferal_code3."'";	 
	    		$result = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 	    	$r2 = $row['refferal_code'];
	 	    	$c2 = $row['id'];

		        if ($num_rows > 0)
	    		{
	    		     $id=$row['id'];

	    		     $wallet=$row['refer_wallet'];
	    		  
	    		      $firstlevelearning=5;
	    		     $newwallet1=$wallet+$firstlevelearning ;
                   
                    
                      //first level user wallet and network update
	                 $first_level_earn=$row['first_level_earn'];
	    		     $first_level_earn_new_wallet=$first_level_earn+$firstlevelearning ;
	    		     
	    		     
    		      $network=$row['network'];
                 $newnetwork=$network+1; 
                
                //network add
                  $network_qry="INSERT INTO tbl_network (`user_id`,`level`,`money`,`refferal_user_id`) 
                VALUES ('$id','1','$firstlevelearning','$firstid1')"; 	            
                $result1=mysqli_query($mysqli,$network_qry);  

	                   $first_level_earn= "UPDATE tbl_users SET first_level_earn='".$first_level_earn_new_wallet."' , refer_wallet='".$newwallet1."' , network='".$newnetwork."'  WHERE id = '".$id."' ";	 
	    		    $first_level_earn1 = mysqli_query($mysqli,$first_level_earn);
	    		    
		
	    		}
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
    			$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
    			VALUES ('".$id."','','0','Refer Bonus','".$date."','".$firstlevelearning."')"; 
	            
	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
	    	}
	    	
	    	//second level
		    if($r2!="")
		    {

			    $qry = "SELECT * FROM tbl_users WHERE code = '".$r2."'"; 
	    		$result = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 		    $r3 = $row['refferal_code'];
	 		    $c3 = $row['id'];

	 		     
	 			 $qry1 = "SELECT * FROM tbl_users WHERE code = '".$r3."'";	 
	    		$result1 = mysqli_query($mysqli,$qry1);
	    		$row1 = mysqli_fetch_assoc($result1);
	 			 $rid2 = $row1['id'];

		        if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		    
	    		      $wallet=$row['refer_wallet'];
	    		     $secondlevelearning=3;   
	    		     $newwallet2=$wallet+$secondlevelearning;   

	    		 
					 //first level user wallet update
	                 $second_level_earn=$row['second_level_earn'];
	    		     $second_level_earn_new_wallet=$second_level_earn+$secondlevelearning ;
	    		     
	    		      $network=$row['network'];
                         $newnetwork=$network+1; 
                        
                        //network add
                          $network_qry="INSERT INTO tbl_network (`user_id`,`level`,`money`,`refferal_user_id`) 
                        VALUES ('$id','2','$secondlevelearning','$c2')"; 	            
                        $result1=mysqli_query($mysqli,$network_qry); 

	                $first_level_earn= "UPDATE tbl_users SET second_level_earn='".$second_level_earn_new_wallet."', refer_wallet='".$newwallet2."'  , network='".$newnetwork."' WHERE id = '".$id."'";	 
	    		    $first_level_earn1 = mysqli_query($mysqli,$first_level_earn);

	             }
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
	    		     		$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
    			VALUES ('".$id."','0','0','Refer Bonus','".$date."','".$secondlevelearning."')"; 
	    		     


	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
			}
	    	 
	    	 
	    	 //third level
			if($r3!="")
			{
			    $qry = "SELECT * FROM tbl_users WHERE code = '".$r3."'";	 
	    		$result = mysqli_query($mysqli,$qry);
	    		$result1 = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 			$r4 = $row['refferal_code'];
	 			 $c4 = $row['id'];
	

				if ($num_rows > 0)
	    		{
	    		    $id=$row['id'];
	    		     $id4=$row['id'];
	    		     $wallet=$row['refer_wallet'];
	    		     $thirdlevelearning=1;   
	    		     $newwallet3=$wallet+$thirdlevelearning;   
	    	

	                 //first level user wallet update
	                 $third_level_earn=$row['third_level_earn'];
	    		     $third_level_earn_new_wallet=$third_level_earn+$thirdlevelearning ;
	    		     
	    		     	      $network=$row['network'];
                         $newnetwork=$network+1; 
                        
                        //network add
                          $network_qry="INSERT INTO tbl_network (`user_id`,`level`,`money`,`refferal_user_id`) 
                        VALUES ('$id','3','$thirdlevelearning','$c3')"; 	            
                        $result1=mysqli_query($mysqli,$network_qry); 
	    		    
	    		     $user_edit= "UPDATE tbl_users SET third_level_earn='".$third_level_earn_new_wallet."', refer_wallet='".$newwallet3."' , network='".$newnetwork."' WHERE id = '".$id."'";	 
	    		    $result = mysqli_query($mysqli,$user_edit);
		
	    		}
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
	    		     	$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
    			VALUES ('".$id."','0','0','Refer Bonus','".$date."','".$thirdlevelearning."')"; 
	    		     
	            
	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
	    	}
	    	
	    	//four level
			if($r4!="")
			{
			    $qry = "SELECT * FROM tbl_users WHERE code = '".$r4."'";	 
	    		$result = mysqli_query($mysqli,$qry);
	    		$result1 = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 			$r5 = $row['refferal_code'];
	 			 $c5 = $row['id'];


				if ($num_rows > 0)
	    		{
	    		    $id=$row['id'];
	    		     $id5=$row['id'];
	    		     $wallet=$row['refer_wallet'];

	    		     $fourlevelearning=0.50;   
	    		     $newwallet4=$wallet+$fourlevelearning;   
	    		     
	    		          	      $network=$row['network'];
                         $newnetwork=$network+1; 
                        
                        //network add
                          $network_qry="INSERT INTO tbl_network (`user_id`,`level`,`money`,`refferal_user_id`) 
                        VALUES ('$id','4','$fourlevelearning','$c4')"; 	            
                        $result1=mysqli_query($mysqli,$network_qry); 
	    		
	                 //first level user wallet update
	                 $four_level_earn=$row['four_level_earn'];
	    		     $four_level_earn_new_wallet=$four_level_earn+$fourlevelearning ;
	    		    
	    		     $user_edit= "UPDATE tbl_users SET four_level_earn='".$four_level_earn_new_wallet."', refer_wallet='".$newwallet4."', network='".$newnetwork."' WHERE id = '".$id."'";	 
	    		    $result = mysqli_query($mysqli,$user_edit);
		
	    		}
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
	    		     	$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
    			VALUES ('".$id."','0','0','Refer Bonus','".$date."','".$fourlevelearning."')"; 
	    		     
	            
	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
	    	}
	    	
	    	//fifth level
			if($r5!="")
			{
			    $qry = "SELECT * FROM tbl_users WHERE code = '".$r5."'";	 
	    		$result = mysqli_query($mysqli,$qry);
	    		$result1 = mysqli_query($mysqli,$qry);
	    		$num_rows = mysqli_num_rows($result);
	    		$row = mysqli_fetch_assoc($result);
	 			$r6 = $row['refferal_code'];
				 $c6 = $row['id'];
	 	
				if ($num_rows > 0)
	    		{
	    		    $id=$row['id'];
	    		     $id6=$row['id'];
	    		     $wallet=$row['refer_wallet'];

	    		     $fifthlevelearning=0.30;   
	    		     $newwallet5=$wallet+$fifthlevelearning;   
	 
	                 //first level user wallet update
	                 $fifth_level_earn=$row['fifth_level_earn'];
	    		     $fifth_level_earn_new_wallet=$fifth_level_earn+$fifthlevelearning ;
	    		     
	    		      $network=$row['network'];
                         $newnetwork=$network+1; 
                        
                        //network add
                          $network_qry="INSERT INTO tbl_network (`user_id`,`level`,`money`,`refferal_user_id`) 
                        VALUES ('$id','5','$fifthlevelearning','$c5')"; 	            
                        $result1=mysqli_query($mysqli,$network_qry); 
	    		    
	    		     $user_edit= "UPDATE tbl_users SET fifth_level_earn='".$fifth_level_earn_new_wallet."', refer_wallet='".$newwallet5."', network='".$newnetwork."' WHERE id = '".$id."'";	 
	    		    $result = mysqli_query($mysqli,$user_edit);
		
	    		}
	    		
	    		if ($num_rows > 0)
	    		{
	    		      $id=$row['id'];
	    		      $date = date("M-d-Y h:i:s");  
	    		     
	    		     	$qry1="INSERT INTO tbl_transaction (`user_id`,`v_type`,`v_id`,`type`,`date`,`score`) 
    			VALUES ('".$id."','0','0','Refer Bonus','".$date."','".$fifthlevelearning."')"; 
	    		     
	            
	            $result1=mysqli_query($mysqli,$qry1);  		
		
	    		}
	    	}
	    	

		    		 
			header( 'Content-Type: application/json; charset=utf-8' );
    	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    		die();
 		}
	}


	
	else if(isset($_GET['get_user_task']))
	{
	    
	    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $date = date('d-m-Y');

	    
	   $qry = "SELECT * FROM tbl_user_task WHERE user_id = '".$_POST['user_id']."' and section = '".$_POST['section']."' and date = '".$date."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
			$num_rows = mysqli_num_rows($result);

		if ($num_rows > 0)
		{
		    	$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Some Thing Want to Wrong...!",'success'=>'0');
		}else
		{
		    
		     $qry1="INSERT INTO `tbl_user_task`(`user_id`, `section`, `date`, `ut_status`)
    			VALUES ('".$_POST['user_id']."','".$_POST['section']."','".$date."',1)"; 
                
                $result1=mysqli_query($mysqli,$qry1);  									 
    					 
    				
    			$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "User task add successflly...!",'success'=>'1');
		    
		}
    	  
            	header( 'Content-Type: application/json; charset=utf-8' );
        	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        		die();    	 	 
   

	}
	else if(isset($_GET['post_user_active']))
	{

		   
			if($_POST['user_id']!="")
			{
			    $qry = "SELECT * FROM tbl_users WHERE id = '".$_POST['user_id']."'";	 
				$result = mysqli_query($mysqli,$qry);
				$num_rows = mysqli_num_rows($result);
				$row = mysqli_fetch_assoc($result);

		        if ($num_rows > 0)
				{
          			    $qry = "SELECT * FROM tbl_users WHERE id = '".$_POST['user_id']."' and payment_verify = 0 ";	 
        				$result = mysqli_query($mysqli,$qry);
        				$num_rows1 = mysqli_num_rows($result);
        				
				        if ($num_rows1 > 0)
        				{
        					     $user_edit= "UPDATE tbl_users SET payment_verify=1 WHERE id = '".$_POST['user_id']."'";	 
        					     $user_res = mysqli_query($mysqli,$user_edit);	
        					     $set['ALL_IN_ONE_VIDEO'][]=array('msg'=>'Profile Activate Successfully...','success'=>'1');
        
        				}else 
        				{
        				      $set['ALL_IN_ONE_VIDEO'][]=array('msg'=>'Something went wrong...','success'=>'0');
        				}
				}
			}
		
  	header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();    
	}
		
		else if(isset($_GET['get_all_notification']))
	{
		  
		 $jsonObj= array();	

		$query="SELECT * FROM tbl_notification ORDER BY id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['id'] = $data['id'];
			$row['date'] = $data['date'];
			$row['msg'] = $data['msg'];
			$row['image'] = $data['image'];
	

			array_push($jsonObj,$row);
		
		}
 
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;
		
	

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
	}
	
// 	else if(isset($_GET['task_view']))
// 	{
	
// 		$jsonObj= array();	
	
// 	    $query="SELECT * FROM tbl_daily_task		
// 		where tbl_daily_task.d_status=1 ORDER BY tbl_daily_task.d_id ASC";

// 		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

// 		while($data = mysqli_fetch_assoc($sql))
// 		{
// 			$row['d_id'] = $data['d_id'];			 
// 			$row['d_name'] = $data['d_name'];
// 			$row['d_link'] = $data['d_link'];
// 				$row['d_point'] = $data['d_point'];
// 			$row['d_status'] = $data['d_status'];			 
		 	 
			  
// 			array_push($jsonObj,$row);
		
// 		}
		
// 		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;	
		
// 		header( 'Content-Type: application/json; charset=utf-8' );
// 	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
// 		die();
// 	}
	

	else if(isset($_GET['get_task']))
	{
		$jsonObj= array();	
	
	    $query="SELECT * FROM tbl_task		
		where tbl_task.t_status=1 ORDER BY tbl_task.t_id ASC";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['t_id'] = $data['t_id'];			 
			$row['t_name'] = $data['t_name'];
			$row['t_link'] = $data['t_link'];
			$row['t_point'] = $data['t_point'];
			$row['t_status'] = $data['t_status'];			 
		 	 
			  
			array_push($jsonObj,$row);
		
		}
		
		$set['ANDROID_REWARDS_APP'] = $jsonObj;	
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
	}
	
?>