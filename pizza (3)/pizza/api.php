<?php include("includes/connection.php");
 	  include("includes/function.php"); 	
	
	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
	
  		// user registration
  	
  	
	 if(isset($_GET['testing'])) 
	{

    $apikey = "BKxPwHfraUeiik46zhGBbw";
       $apisender = "SMSTST";
       $msg = " Thank you for Registration with Amazing pizza, your OTP is ".$text;
       $num = 7567005767;    // MULTIPLE NUMBER VARIABLE PUT HERE...!     
     
       $ms = rawurlencode($msg);   // This for encode your message content       
     
     $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$num.'&text='.$ms.'&route=16';
    
     
     $ch=curl_init($url);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch,CURLOPT_POST,1);
     curl_setopt($ch,CURLOPT_POSTFIELDS,"");
     curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
     $data = curl_exec($ch);
    
     
      $result = json_decode($data, true);
                	
       if($result['ErrorMessage'] == "Success")
       {
    	    $set['pizza_app'][]=array('msg' => "OTP request sent",'success'=>'1');
       }
       else{
        	$set['pizza_app'][]=array('msg' => "Please enter a valid phone number",'success'=>'0');
       }
     
         header( 'Content-Type: application/json; charset=utf-8' );
    	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    	    	 die();
  	
	}
  	
  	//registration otp sent
	else if(isset($_GET['postUsermobileRegister'])) 
	{
	   
      	    $phone = $_POST['mobile'];
            $text=rand(1000,9999);

	        if($_POST['mobile']!="")
	        {
	            $qry5 = "SELECT * FROM tbl_registration WHERE mobile = '".$phone."' and status = 1 "; 	 
    			$result5 = mysqli_query($mysqli,$qry5);
    			$row5 = mysqli_fetch_assoc($result5);
    			$num_rows5 = mysqli_num_rows($result5);
	            
           
    	        if ($num_rows5 > 0 )
    			{
    			    $set['pizza_app'][]=array('msg' => "You have already register with this Number",'success'=>'0');
    	        
            	 	 header( 'Content-Type: application/json; charset=utf-8' );
        	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        	    	 die();
    			    
    			}else{
    			    
              
        		$insert_user1="INSERT INTO tbl_registration 
				  (f_name,
				  l_name,
				  password,
				   mobile,
				   email,
				   image,
				  confirm_code,
				   status
				) VALUES (
					'".$_POST['f_name']."',
					'".$_POST['l_name']."',
					'".$_POST['password']."',
					'".$_POST['mobile']."',
					'".$_POST['email']."',
					'',
				'".$text."',
					0
				)"; 
        			    
        			    
         
        	           
	            $result1=mysqli_query($mysqli,$insert_user1);  
	            $last_id = mysqli_insert_id($mysqli);
        	            
                $apikey = "BKxPwHfraUeiik46zhGBbw";
                $apisender = "SMSTST";
                $msg = " Thank you for Registration with Amazing pizza, your OTP is ".$text;
    
                $ms = rawurlencode($msg);   
                 
                $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$phone.'&text='.$ms.'&route=16';
                
                 
                 $ch=curl_init($url);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                 curl_setopt($ch,CURLOPT_POST,1);
                 curl_setopt($ch,CURLOPT_POSTFIELDS,"");
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
                 $data = curl_exec($ch);
                
                 
                   $result = json_decode($data, true);

    			   if($result['ErrorMessage'] == "Success")
    			   {
    				    $set['pizza_app'][]=array('msg' => "OTP request sent",'success'=>'1');
    			   }
    			   else{
    			    	$set['pizza_app'][]=array('msg' => "Please enter a valid phone number",'success'=>'0');
    			   }
    			   	curl_close($ch);
  
            	 	 header( 'Content-Type: application/json; charset=utf-8' );
        	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        	    	 die();
    
                		      
        			}
    
    	      
	        }else
	        {
	            $set['pizza_app'][]=array('msg' => "Please enter a valid phone number",'success'=>'0');
	        
        	 	 header( 'Content-Type: application/json; charset=utf-8' );
    	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    	    	 die();

	        }



	}
	
	    //user verify otp
	else if(isset($_GET['mobilenumberverify_setting'])) 
	{
	   
      		$phone = $_POST['phone'];
      		$confirm_code = $_POST['confirm_code'];

             $qry1 = "SELECT * FROM tbl_registration WHERE mobile = '".$phone."'  and confirm_code='".$confirm_code."' and status = 0 ";	 
			$result1 = mysqli_query($mysqli,$qry1);
			$row = mysqli_fetch_assoc($result1);
			 $num_rows = mysqli_num_rows($result1);

	        
	        if ($num_rows > 0 )
			{
    		
           
	           $user_edit1= "UPDATE tbl_registration SET status = 1 WHERE mobile = '".$phone."' and confirm_code='".$confirm_code."' ";	
	           
	           $user_res1 = mysqli_query($mysqli,$user_edit1);	
         
			  $qry2 = "SELECT * FROM tbl_registration WHERE mobile = '".$phone."'  and status = 1 ";	 
			$result2 = mysqli_query($mysqli,$qry2);
			$row = mysqli_fetch_assoc($result2);

	                         $set['pizza_app'][]	=	array(
	                             'msg' => "Profile verify successfully"       ,
	                             'success'=>'1',
                              	'id'	=>	$row['id'],
                    			'f_name' =>	$row['f_name'],
                    			'l_name'	=>	$row['l_name'],
                    			'password'	=>	$row['password'],
                    			'dob'	=>	$row['dob'],
                    			'mobile'	=>	$row['mobile'],
                    			'email'	=>	$row['email'],
                    				'image'	=>	$row['image'],
                    			 'confirm_code'	=>	$row['confirm_code'],
                    			'status'	=>	$row['status'],
	    							);
	    							
				   
            		
        	}
	        else
	        {
	            $set['pizza_app'][]=array('msg' => "Please enter a valid OTP",'success'=>'0');
	        
        

	        }
	        
	        	 	 header( 'Content-Type: application/json; charset=utf-8' );
    	          echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    	    	 die();
	}
  	
  	//Register
	if(isset($_GET['postUserRegister']))
 	{


		$qry = "SELECT * FROM tbl_registration WHERE email = '".$_POST['email']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
 	 	if($row['email']!="")
		{
			$set['pizza_app'][]=array('msg' => "Email address already used!",'success'=>'0');
		}
		else
		{ 
			if($_POST['f_name']!="" AND $_POST['l_name']!="" AND $_POST['password']!="" AND $_POST['dob']!="" AND $_POST['gender']!="" AND $_POST['country']!="" AND $_POST['mobile']!="" AND $_POST['email']!="" )
			{
					 $qry1="INSERT INTO tbl_registration 
				  (f_name,
				  l_name,
				  password,
				    dob,
				  gender,
				   country,
				   mobile,
				   email,
				   image,
				   wallet,
				   status

				 
				) VALUES (
					'".$_POST['f_name']."',
					'".$_POST['l_name']."',
					'".$_POST['password']."',
					'".$_POST['dob']."',
					'".$_POST['gender']."',
					'".$_POST['country']."',
					'".$_POST['mobile']."',
					'".$_POST['email']."',
					'',
					0,
					1
				)"; 
            
            $result1=mysqli_query($mysqli,$qry1);  									 
		
			 $last_id = mysqli_insert_id($mysqli); 
 

			$qrys = "SELECT * FROM tbl_registration WHERE id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);



			$set['pizza_app'][]	=	array( 
					  'msg'			=>	'Successflly Logged in',
					  'success'=>'1',
						'id'	=>	$row['id'],
						'f_name' =>	$row['f_name'],
						'l_name'	=>	$row['l_name'],
						'password'	=>	$row['password'],
						'dob'	=>	$row['dob'],
						'gender'	=>	$row['gender'],
						'country'	=>	$row['country'],
						'mobile'	=>	$row['mobile'],
						'email'	=>	$row['email'],
							'image'	=>	$row['image'],
						'wallet'	=>	$row['wallet'],
							'confirm_code'	=>	$row['confirm_code'],
						'status'	=>	$row['status'],

			);
			}else
			{
				$set['pizza_app'][]=array('msg' => "some thing went wrong ...!",'success'=>'0');
			}
  			
				
			
		}

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//Login with ussername and password
else if(isset($_GET['postUserLogin']))
{
	if($_POST['mobile']!="" and $_POST['password']!="")
	{

	
		$mobile = $_POST['mobile'];
		$password = $_POST['password'];
		//echo $password;die;
	  $qry = "SELECT * FROM tbl_registration WHERE mobile = '".$mobile."' and password = '".$password."'"; 
		
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    	if ($num_rows > 0)
		{ 
			$set['pizza_app'][]	= array(  
								 'msg' => "Logged in Successfully"       ,
	                             'success'=>'1',
                              	'id'	=>	$row['id'],
                    			'f_name' =>	$row['f_name'],
                    			'l_name'	=>	$row['l_name'],
                    			'password'	=>	$row['password'],
                    			'dob'	=>	$row['dob'],
                    			'mobile'	=>	$row['mobile'],
                    			'email'	=>	$row['email'],
                    				'image'	=>	$row['image'],
                    			 'confirm_code'	=>	$row['confirm_code'],
                    			'status'	=>	$row['status'],

	     								
	     								);
		  
		}		 
		else
		{
			$set['pizza_app'][]=array('msg' =>'Invalid username and password','success'=>'0');
 	
		}
	}else {
		$set['pizza_app'][]=array('msg' => "some thing went wrong ...!",'success'=>'0');
	}

			header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//users update profile
else if(isset($_GET['postUserProfileUpdate1']))
{
	
		$sql = "SELECT * FROM tbl_registration where id = '".$_POST['id']."' ";
		$res = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_assoc($res);

			//id	f_name	l_name	password	dob	gender	country	mobile	email	status
	if($_FILES['image']['name'] != "")
		{	
			if($row['image'] !== "") 
			{
			 	unlink('images/'.$row['image']); 
			 	unlink('images/thumbs/'.$row['image']); 
			}

			$facility_image=rand(0,99999)."_".$_FILES['image']['name'];
		   //Main Image
		   	$tpath1='images/'.$facility_image; 		
			$pic1=compress_image($_FILES["image"]["tmp_name"], $tpath1, 80);
		 	$thumbpath='images/thumbs/'.$facility_image;		
	       	$thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
 		}
 		else
 		{
 			(($row['image'] !== "") ? $facility_image = $row['image'] : $facility_image = "");
 		}

		
 if($_POST['password']!="")
		{
			$user_edit= "UPDATE tbl_registration SET 
			f_name='".$_POST['f_name']."',
			l_name='".$_POST['l_name']."',
			password='".$_POST['password']."',
			dob = '".$_POST['dob']."',
			gender='".$_POST['gender']."',
			country = '".$_POST['country']."',
			mobile='".$_POST['mobile']."',
			email='".$_POST['email']."',
				image='".$facility_image."'

			WHERE id = '".$_POST['id']."'";	 
		
		}
		else
		{
			$user_edit= "UPDATE tbl_registration SET 
			f_name='".$_POST['f_name']."',
			l_name='".$_POST['l_name']."',
			dob = '".$_POST['dob']."',
			gender='".$_POST['gender']."',
			country = '".$_POST['country']."',
			mobile='".$_POST['mobile']."',
			email='".$_POST['email']."',
				image='".$facility_image."'

			WHERE id = '".$_POST['id']."'";	 
		}
   		
   			$user_res = mysqli_query($mysqli,$user_edit);	
	  	
			$set['pizza_app'][]=array('msg'=>'Updated','success'=>'1');
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//users update profile
else if(isset($_GET['postUserProfileUpdate']))
{
	
		$sql = "SELECT * FROM tbl_registration where id = '".$_POST['id']."' ";
		$res = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_assoc($res);

			//id	f_name	l_name	password	dob	gender	country	mobile	email	status
	if($_FILES['image']['name'] != "")
		{	
			if($row['image'] !== "") 
			{
			 	unlink('images/'.$row['image']); 
			 	unlink('images/thumbs/'.$row['image']); 
			}

			$facility_image=rand(0,99999)."_".$_FILES['image']['name'];
		   //Main Image
		   	$tpath1='images/'.$facility_image; 		
			$pic1=compress_image($_FILES["image"]["tmp_name"], $tpath1, 80);
		 	$thumbpath='images/thumbs/'.$facility_image;		
	       	$thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
 		}
 		else
 		{
 			(($row['image'] !== "") ? $facility_image = $row['image'] : $facility_image = "");
 		}

		
 if($_POST['f_name']!="")
		{
			$user_edit= "UPDATE tbl_registration SET 
			f_name='".$_POST['f_name']."',
			l_name='".$_POST['l_name']."',
			mobile='".$_POST['mobile']."',
			email='".$_POST['email']."',
			image='".$facility_image."'

			WHERE id = '".$_POST['id']."'";	 
		
		}else{
		$set['pizza_app'][]=array('msg' => "some thing went wrong ...!",'success'=>'0');
		}
	
   		
   			$user_res = mysqli_query($mysqli,$user_edit);	
	  	
			$set['pizza_app'][]=array('msg'=>'Updated','success'=>'1');
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//get users profile with users id
else if(isset($_GET['getUserProfile']))
{
		
		$qry = "SELECT * FROM tbl_registration WHERE id = '".$_POST['id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		 
		$row = mysqli_fetch_assoc($result);
	  				 
	    $set['pizza_app'][]	=	array(
	    									'id'	=>	$row['id'],
											'f_name' =>	$row['f_name'],
											'l_name'	=>	$row['l_name'],
											'password'	=>	$row['password'],
											'dob'	=>	$row['dob'],
											'gender'	=>	$row['gender'],
											'country'	=>	$row['country'],
											'mobile'	=>	$row['mobile'],
											'email'	=>	$row['email'],
												'image'	=>	$row['image'],
												// 'image'	=>	 $file_path.'images/'.$row['image'],
											'wallet'	=>	$row['wallet'],
											'status'	=>	$row['status'],
	    	
	    							);

		
	   	header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


// ************** main API *************

//get all category 
else if(isset($_GET['get_category']))
{

		$jsonObj1= array();
			

		 $query="SELECT * FROM tbl_category where tbl_category.c_id and tbl_category.c_status='1' ORDER BY `c_order` ASC";
		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{

			$row['c_id'] = $data['c_id'];
			$row['c_name'] = $data['c_name'];
			$row['c_image'] = $file_path.'images/'.$data['c_image'];
			$row['c_image_thumb'] = $file_path.'images/thumbs/'.$data['c_image'];
			$row['c_status'] = $data['c_status'];
		
 
			array_push($jsonObj1,$row);

		
		}
		
		$set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//get all subcategory with category wise
 else if(isset($_GET['get_sub_category']))
 	{


		$jsonObj1= array();
			
        
		 $query="SELECT * FROM `tbl_sub_category` 
		 LEFT JOIN tbl_category ON tbl_category.c_id=tbl_sub_category.c_id 
		 WHERE tbl_sub_category.c_id='".$_POST['c_id']."'";
		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{

			$row['sub_id'] = $data['sub_id'];
			$row['c_id']=$data['c_id'];
			$row['c_name']=$data['c_name'];
			$row['sub_name'] = $data['sub_name'];
			$row['sub_category_image'] = $file_path.'images/'.$data['sub_image'];
			$row['sub_category_image_thumb'] = $file_path.'images/thumbs/'.$data['sub_image'];
 			$row['sub_status'] = $data['sub_status'];
			array_push($jsonObj1,$row);

		
		}
		
		$set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }

 //get all product subcategory with category wise
 else if(isset($_GET['get_product']))
 	{


  		  		$jsonObj4= array();
			
        
		 $query="SELECT * FROM `tbl_product`
LEFT JOIN tbl_category ON tbl_category.c_id=tbl_product.c_id
WHERE tbl_product.c_id='".$_POST['c_id']."'  ORDER BY `tbl_product`.`p_id` ASC ";

		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['p_id']=$data['p_id'];
			$row['c_id']=$data['c_id'];
			$row['c_name']=$data['c_name'];
		
			$row['p_name'] = $data['p_name'];
				$row['p_dec'] = $data['p_dec'];
 			$row['p_reg_price'] = $data['p_reg_price'];
 			$row['p_med_price'] = $data['p_med_price'];
 				$row['p_lar_price'] = $data['p_lar_price'];
 			
 			$row['p_image'] = $file_path.'images/'.$data['p_image'];
 			$row['p_featured'] = $data['p_featured'];
 			$row['p_status'] = $data['p_status'];
			array_push($jsonObj4,$row);

		
		}

		$set['pizza_app'] = $jsonObj4;

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }
//get all product subcategory with category wise
 else if(isset($_GET['get_featured']))
 	{


  		  		$jsonObj4= array();
			
        
		 $query="SELECT * FROM `tbl_product`
LEFT JOIN tbl_category ON tbl_category.c_id=tbl_product.c_id
WHERE tbl_product.p_featured=1  ORDER BY `tbl_product`.`p_id` ASC ";

		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['p_id']=$data['p_id'];
			$row['c_id']=$data['c_id'];
			$row['c_name']=$data['c_name'];
		
			$row['p_name'] = $data['p_name'];
				$row['p_dec'] = $data['p_dec'];
 			$row['p_reg_price'] = $data['p_reg_price'];
 			$row['p_med_price'] = $data['p_med_price'];
 				$row['p_lar_price'] = $data['p_lar_price'];
 			
 			$row['p_image'] = $file_path.'images/'.$data['p_image'];
 				$row['p_featured'] = $data['p_featured'];
 			$row['p_status'] = $data['p_status'];
			array_push($jsonObj4,$row);

		
		}

		$set['pizza_app'] = $jsonObj4;

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }


//View product details with product id and category id
 else if(isset($_GET['view_product']))
 	{


  		  		$jsonObj4= array();
			
        
		 $query="SELECT * FROM `tbl_product`
LEFT JOIN tbl_category ON tbl_category.c_id=tbl_product.c_id
WHERE tbl_product.c_id='".$_POST['c_id']."' and tbl_product.p_id='".$_POST['p_id']."' ORDER BY `tbl_product`.`p_id` ASC ";

		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['p_id']=$data['p_id'];
			$row['c_id']=$data['c_id'];
			$row['c_name']=$data['c_name'];
		
			$row['p_name'] = $data['p_name'];
				$row['p_dec'] = $data['p_dec'];
 			$row['p_reg_price'] = $data['p_reg_price'];
 			$row['p_med_price'] = $data['p_med_price'];
 				$row['p_lar_price'] = $data['p_lar_price'];
 			
 			$row['p_image'] = $file_path.'images/'.$data['p_image'];
 			$row['p_featured'] = $data['p_featured'];
 			$row['p_status'] = $data['p_status'];
			array_push($jsonObj4,$row);

		
		}

		$set['pizza_app'] = $jsonObj4;

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }



//get all Banner 
else if(isset($_GET['get_banner']))
{

		$jsonObj1= array();
			

		 $query="SELECT * FROM tbl_banner ORDER BY tbl_banner.b_id DESC";
		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{

			$row['b_id'] = $data['b_id'];
			$row['b_image'] = $file_path.'images/'.$data['b_image'];
			$row['b_image_thumb'] = $file_path.'images/thumbs/'.$data['b_image'];
			$row['b_status'] = $data['b_status'];
		
 
			array_push($jsonObj1,$row);

		
		}
		
		$set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//add adderss details
else if(isset($_GET['add_adderss']))
{
	
  if($_POST['user_id']!="" AND $_POST['a_type']!="" AND $_POST['a_name']!="" AND $_POST['a_number']!="" AND $_POST['a_houser_no']!="" AND $_POST['a_lendmark']!="" AND $_POST['a_adderss']!="")
  {

		
  			 $qry1="INSERT INTO tbl_adderss
				  (user_id,
				  city_id,
				  area_id,
				  a_type,
				  a_name,
				  a_number,
				  a_houser_no,
				   a_lendmark,
				   a_adderss,
				   a_status

				) VALUES (
					'".$_POST['user_id']."',
					'".$_POST['city_id']."',
					'".$_POST['area_id']."',
					'".$_POST['a_type']."',
					'".$_POST['a_name']."',
					'".$_POST['a_number']."',
					'".$_POST['a_houser_no']."',
					'".$_POST['a_lendmark']."',
					'".$_POST['a_adderss']."',
					1
				)"; 
  
            
            $result1=mysqli_query($mysqli,$qry1);  									 
		
			 $last_id = mysqli_insert_id($mysqli); 
 

			$qrys = "SELECT * FROM tbl_adderss WHERE a_id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);



			$set['pizza_app'][]	=	array( 
			'msg' =>	" Successful",
			'success'=>'1',
			'a_id'	=>	$row['a_id'],
			'user_id' =>	$row['user_id'],
			'city_id' =>	$row['city_id'],
			'area_id' =>	$row['area_id'],
			'a_type'	=>	$row['a_type'],
			'a_name'	=>	$row['a_name'],
			'a_number'	=>	$row['a_number'],
			'a_houser_no'	=>	$row['a_houser_no'],
			'a_lendmark'	=>	$row['a_lendmark'],
			'a_adderss'	=>	$row['a_adderss'],
			'a_status'	=>	$row['a_status']

			);
				
		}
		else{
			$set['pizza_app'][]=array('msg' => "some thing went wrong ...!",'success'=>'0');
		}	
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
}

//get all adderss
else if(isset($_GET['get_adderss']))
{

		$jsonObj1= array();
	
		 $query="SELECT * FROM `tbl_adderss`
		LEFT JOIN tbl_registration ON tbl_registration.id=tbl_adderss.user_id
		left join tbl_city on tbl_city.c_id=tbl_adderss.city_id
		left join tbl_area on tbl_area.ar_id=tbl_adderss.area_id
		WHERE tbl_adderss.user_id='".$_POST['user_id']."' ORDER BY tbl_adderss.a_id DESC";
		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{

			$row['a_id'] = $data['a_id'];
			$row['user_id'] = $data['user_id'];
			$row['f_name'] = $data['f_name'];
				$row['city_id'] = $data['city_id'];
		    	$row['c_name'] = $data['c_name'];
				$row['area_id'] = $data['area_id'];
			    $row['ar_name'] = $data['ar_name'];
			$row['a_type'] = $data['a_type'];
			$row['a_name'] = $data['a_name'];
			$row['a_number'] = $data['a_number'];
			$row['a_houser_no'] = $data['a_houser_no'];
			$row['a_lendmark'] = $data['a_lendmark'];
			$row['a_adderss'] = $data['a_adderss'];
			$row['a_status'] = $data['a_status'];

		
 
			array_push($jsonObj1,$row);

		
		}
		
		$set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//edit address
else if(isset($_GET['Updateaddress']))
{


				//tbl_adderss a_id	user_id	a_type	a_name	a_number	a_houser_no	a_lendmark	a_adderss	a_status
		
  if($_POST['user_id']!="" and $_POST['a_type']!="" and $_POST['a_name']!="" and $_POST['a_number']!="" and $_POST['a_houser_no']!="" and $_POST['a_lendmark']!="" and $_POST['a_adderss']!=""  )
		{
		    

			$user_edit="UPDATE `tbl_adderss` SET 
		    `user_id`='".$_POST['user_id']."',
		     `city_id`='".$_POST['city_id']."',
		      `area_id`='".$_POST['area_id']."',
		    `a_type`='".$_POST['a_type']."',
		    `a_name`='".$_POST['a_name']."',
		    `a_number`='".$_POST['a_number']."',
		    `a_houser_no`='".$_POST['a_houser_no']."',
		    `a_lendmark`='".$_POST['a_lendmark']."',
		    `a_adderss`='".$_POST['a_adderss']."'
		   
		    WHERE `a_id`='".$_POST['a_id']."'";	 
				$user_res = mysqli_query($mysqli,$user_edit);	
	  
			$set['pizza_app'][]=array('msg'=>'Updated','success'=>'1');
			
		
		}else {
		    	$set['pizza_app'][]=array('msg' => "some thing went wrong ...!",'success'=>'0');
		}
	
   		
   		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//delete address
else if(isset($_GET['Deleteaddress']))
 	{

		$jsonObj= array();
 		$a_id=$_POST['a_id'];

		if($_POST['a_id'] != "") 
		{

		$qry = "SELECT * FROM tbl_adderss WHERE a_id='".$a_id."'"; 
			
		$result 	= mysqli_query($mysqli,$qry);
		$num_rows 	= mysqli_num_rows($result);
			//$row = mysqli_fetch_array($result);
			
			if($num_rows > 0)
			{
			
				$delete = "DELETE FROM tbl_adderss where a_id = '".$a_id."'";
				$result1 = mysqli_query($mysqli,$delete);

				if($result1 == 1)
					$set['pizza_app'][]=array('msg' => "Address deleted successfully...!",'success'=>'1');
				else
					$set['pizza_app'][]=array('msg' => "Some error occured",'success'=>'0');
				

			}
			else
			{	
				$set['pizza_app'][]=array('msg' => " Address Not  found ",'success'=>'0');
			} 
 	
	}
	else
		{
			$set['pizza_app'][]=array('msg' => "Please enter address id",'success'=>'0');
		}	 
			header( 'Content-Type: application/json; charset=utf-8' );
 	   		echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
 			die();
		
		}
		
//add order
// else if(isset($_GET['add_order1']))
// {

// 	if($_POST['user_id']!="" AND $_POST['c_id']!="" AND $_POST['sub_id']!="" AND $_POST['sub_sub_id']!="" AND $_POST['a_id']!="" AND $_POST['o_date']!="" AND $_POST['o_time']!="" AND $_POST['o_amount']!="" AND $_POST['o_type']!="")
// 	{
	          
//       	date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
// 		$date = date('d-m-Y H:i:s');
		
//  		$qry1="INSERT INTO tbl_order
// 				  (user_id,
// 				  c_id,
// 				  sub_id,
// 				  sub_sub_id,
// 				  a_id,
// 				  o_cdate,
// 				   o_date,
// 				   o_time,
// 				   o_amount,
// 				   o_type,
// 				   o_status
// 				) VALUES (
// 					'".$_POST['user_id']."',
// 					'".$_POST['c_id']."',
// 					'".$_POST['sub_id']."',
// 					'".$_POST['sub_sub_id']."',
// 					'".$_POST['a_id']."',
// 					'".$date."',
// 					'".$_POST['o_date']."',
// 					'".$_POST['o_time']."',
// 					'".$_POST['o_amount']."',
// 					'".$_POST['o_type']."',
// 					1
// 				)"; 
            
//             $result1=mysqli_query($mysqli,$qry1);  									 
		
// 			 $last_id = mysqli_insert_id($mysqli); 
 

// 			$qrys = "SELECT * FROM tbl_order WHERE o_id = '".$last_id."'"; 
// 			$results = mysqli_query($mysqli,$qrys);
// 			$row = mysqli_fetch_assoc($results);


//   $someArray = json_decode($row['sub_id'], true);
//  $values_initials = array();
     
//     for ($x = 0; $x <= count($someArray)-1 ; $x++) {
            
            
//             $query1="SELECT * FROM tbl_sub_category WHERE sub_id='".$someArray[$x]["sub_cat"]."' ";
//             $result1 = mysqli_query($mysqli,$query1);
//             	$row1 = mysqli_fetch_assoc($result1);
//             	$row2=$row1['sub_name'];
            
            
            
//              	$query2="SELECT * FROM tbl_sub_sub_category WHERE sub_sub_id='".$someArray[$x]["sub_sub_nprice"]."' ";
//             $result2 = mysqli_query($mysqli,$query2);
//             	$row3 = mysqli_fetch_assoc($result2);
//             	$row4=$row3['sub_sub_name'];
            
	        
//             $employees[] = array('sub_cat'=> $row2,'sub_sub_cat'=> $row4,'sub_sub_nprice'=> $someArray[$x]["sub_sub_nprice"]);
            	
//     }
    
//      $jsonformat=json_encode($employees);

// 			$set['pizza_app'][]	=	array( 
			    
// 			'msg' =>	" Successful",
// 			'success'=>'1',
// 			'o_id'	=>	$row['o_id'],
// 			'user_id' =>	$row['user_id'],
// 			'c_id'	=>	$row['c_id'],
// 			'sub_id'	=>	$jsonformat,
// 			'sub_sub_id'	=>	$jsonformat,
// 			'a_id'	=>	$row['a_id'],
// 				'o_cdate'	=>	$row['o_cdate'],
// 			'o_date'	=>	$row['o_date'],
// 			'o_time'	=>	$row['o_time'],
// 			'o_amount'	=>	$row['o_amount'],
// 			'o_type'	=>	$row['o_type'],
// 			'o_status'	=>	$row['o_status']

// 			);
				
// 	}else
// 	{
// 		$set['pizza_app'][]=array('msg' => "some thing went wrong ...!",'success'=>'0');
// 	}
  			
			
	

		
// 		header( 'Content-Type: application/json; charset=utf-8' );
// 	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
// 		die();	
// }



//add order
else if(isset($_GET['add_order']))
{

	if($_POST['user_id']!="" AND $_POST['order_details']!="" AND $_POST['a_id']!="" AND $_POST['o_date']!="" AND $_POST['o_time']!="" AND
	$_POST['ori_amount']!="" AND $_POST['o_type']!="")
	{
	          
      	date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
		$date = date('d-m-Y H:i:s');
		
 		$qry1="INSERT INTO tbl_order
				  (user_id,
				  pro_id,
				 order_details,
				  a_id,
				  o_cdate,
				   o_date,
				   o_time,
				   ori_amount,
				p_price,
				dis_amount,
					payment_type,
						payment_id,
				   o_type,
				   o_status
				) VALUES (
					'".$_POST['user_id']."',
					'".$_POST['pro_id']."',
					'".$_POST['order_details']."',
					'".$_POST['a_id']."',
					'".$date."',
					'".$_POST['o_date']."',
					'".$_POST['o_time']."',
					'".$_POST['ori_amount']."',
					'".$_POST['p_price']."',
					'".$_POST['dis_amount']."',
						'".$_POST['payment_type']."',	
						'".$_POST['payment_id']."',
					'".$_POST['o_type']."',
					1
				)"; 
            
            $result1=mysqli_query($mysqli,$qry1);  		
            
            
    			$qrys1 = "SELECT * FROM tbl_registration WHERE id = '".$_POST['user_id']."'"; 
    			$results1 = mysqli_query($mysqli,$qrys1);
    			$row1 = mysqli_fetch_assoc($results1);
    			 $phone = $row1['mobile'];
                
                   $apikey = "BKxPwHfraUeiik46zhGBbw";
                    $apisender = "SMSTST";
                    $msg = "Thank you for order with Amazing pizza";
        
                    $ms = rawurlencode($msg);   
                     
                    $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$phone.'&text='.$ms.'&route=16';
                
                 
                 $ch=curl_init($url);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                 curl_setopt($ch,CURLOPT_POST,1);
                 curl_setopt($ch,CURLOPT_POSTFIELDS,"");
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
                    $data = curl_exec($ch);
                  
                   $result = json_decode($data, true);

    			   if($result['ErrorMessage'] == "Success")
    			   {
    				    $set['pizza_app1'][]=array('msg' => "OTP request sent",'success'=>'1');
    			   }
    			   else{
    			    	$set['pizza_app1'][]=array('msg' => "Please enter a valid phone number",'success'=>'0');
    			   }
    			   	curl_close($ch);
		
			 $last_id = mysqli_insert_id($mysqli); 
 

			$qrys = "SELECT * FROM tbl_order WHERE o_id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);


  $someArray = json_decode($row['order_details'], true);
 $values_initials = array();
     
    for ($x = 0; $x <= count($someArray)-1 ; $x++) {

    	      $query1="SELECT * FROM tbl_category WHERE c_id='".$someArray[$x]["cat"]."' ";
            $result1 = mysqli_query($mysqli,$query1);
            	$row1 = mysqli_fetch_assoc($result1);
            	$row2=$row1['c_name'];
            
             $query2="SELECT * FROM tbl_product WHERE p_id='".$someArray[$x]["product"]."' ";
             $result2 = mysqli_query($mysqli,$query2);
             	$row3 = mysqli_fetch_assoc($result2);
            	$row4=$row3['p_name'];

                 	$employees[] = array('cat'=> $row2,'product'=> $row4,
            	'qunt'=> $someArray[$x]["qunt"],
            	'crust'=> $someArray[$x]["crust"],
            	'toppings'=> $someArray[$x]["toppings"],
            	'cheez'=> $someArray[$x]["cheez"],
            	'size'=> $someArray[$x]["size"],
            	'price'=> $someArray[$x]["price"]);


            $employees_name[] = array('cat'=> $someArray[$x]["cat"],
            'product'=> $someArray[$x]["product"],
            'qunt'=> $someArray[$x]["qunt"],
            'crust'=> $someArray[$x]["crust"],
            'toppings'=> $someArray[$x]["toppings"],
            'cheez'=> $someArray[$x]["cheez"],
            'size'=> $someArray[$x]["size"],
            'price'=> $someArray[$x]["price"]);
            	
    }
    
     $jsonformat1=json_encode($employees);
        $jsonformat11=json_encode($employees_name);

			$set['pizza_app'][]	=	array( 
			    
			'msg' =>	" Successful",
			'success'=>'1',
			'o_id'	=>	$row['o_id'],
			'user_id' =>	$row['user_id'],
			'pro_id' =>	$row['pro_id'],
			'order_id' => $jsonformat11,
			'order_details' => $jsonformat1,
			'a_id'	=>	$row['a_id'],
			'o_cdate'	=>	$row['o_cdate'],
			'o_date'	=>	$row['o_date'],
			'o_time'	=>	$row['o_time'],
			'ori_amount'	=>	$row['ori_amount'],
			'p_price'	=>	$row['p_price'],
			'dis_amount'	=>	$row['dis_amount'],
			'payment_type'	=>	$row['payment_type'],
			'payment_id'	=>	$row['payment_id'],
			'o_type'	=>	$row['o_type'],
			'o_status'	=>	$row['o_status']

			);
				
	}else
	{
		$set['pizza_app'][]=array('msg' => "some thing went wrong ...!",'success'=>'0');
	}
  			
			
	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
}





//get all order
else if(isset($_GET['get_order']))
{

		$jsonObj1= array();
	
		 $query="SELECT * FROM `tbl_order`
left join tbl_promocode on tbl_promocode.p_id =  tbl_order.pro_id
left JOIN tbl_registration ON tbl_registration.id=tbl_order.user_id
left join tbl_adderss on tbl_adderss.a_id = tbl_order.a_id
WHERE tbl_order.user_id='".$_POST['user_id']."' ORDER BY tbl_order.o_id DESC";

		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
             $data['order_details'];
        	$someArray = json_decode($data['order_details'], true);
  
           $count = count($someArray) - 1; 

            for ($x = 0; $x <= $count ; $x++) {
                    
                    
        
    	      $query1="SELECT * FROM tbl_category WHERE c_id='".$someArray[$x]["cat"]."' ";
            $result1 = mysqli_query($mysqli,$query1);
            	$row1 = mysqli_fetch_assoc($result1);
            	$row2=$row1['c_name'];
            
             $query2="SELECT * FROM tbl_product WHERE p_id='".$someArray[$x]["product"]."' ";
             $result2 = mysqli_query($mysqli,$query2);
             	$row3 = mysqli_fetch_assoc($result2);
            	$row4=$row3['p_name'];


     
         	$employees[$x] = array('cat'=> $row2,
         	        'product'=> $row4,
            	'qunt'=> $someArray[$x]["qunt"],
            	'crust'=> $someArray[$x]["crust"],
            	'toppings'=> $someArray[$x]["toppings"],
            	'cheez'=> $someArray[$x]["cheez"],
            	'size'=> $someArray[$x]["size"],
            	'price'=> $someArray[$x]["price"]);


            


			$row['o_id'] = $data['o_id'];
			$row['user_id'] = $data['user_id'];
			$row['pro_id'] = $data['pro_id'];
			$row['p_name'] = $data['p_name'];
			$row['p_desc'] = $data['p_desc'];
			
			$row['f_name'] = $data['f_name'];
			$row['order_details'] = $employees;
			$row['a_id'] = $data['a_id'];
			$row['a_name'] = $data['a_name'];
			$row['a_number'] = $data['a_number'];
			$row['a_houser_no'] = $data['a_houser_no'];
			$row['a_lendmark'] = $data['a_lendmark'];
			$row['a_adderss'] = $data['a_adderss'];
			$row['o_cdate'] = $data['o_cdate'];
			$row['o_date'] = $data['o_date'];
			$row['o_time'] = $data['o_time'];
			$row['ori_amount'] = $data['ori_amount'];
			$row['p_price'] = $data['p_price'];
			$row['dis_amount'] = $data['dis_amount'];
				$row['payment_type'] = $data['payment_type'];
					$row['payment_id'] = $data['payment_id'];
			$row['o_type'] = $data['o_type'];
			$row['o_status'] = $data['o_status'];

            }
            
 
			array_push($jsonObj1,$row);

		
		}
		
		$set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


else if(isset($_GET['cancel_order']))
{


   $qry = "SELECT * FROM `tbl_order`
left JOIN tbl_registration ON tbl_registration.id=tbl_order.user_id
WHERE tbl_order.user_id='".$_POST['user_id']."' AND tbl_order.o_id='".$_POST['o_id']."' ";

		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row1 = mysqli_fetch_assoc($result);
		
         if ($num_rows > 0)
		{
		    
    		      $user_edit= "UPDATE tbl_order SET o_type='".$_POST['o_type']."' WHERE tbl_order.user_id='".$_POST['user_id']."' AND tbl_order.o_id='".$_POST['o_id']."' ";	 
    		    
                $result = mysqli_query($mysqli,$user_edit);

    	 
			$set['pizza_app'][]=array('msg'=>'Successfully Updated','success'=>'1');
		}
		else
		{
				$set['pizza_app'][]=array('msg'=>'Updated Fail','success'=>'0');	 
				
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
		
		$set['pizza_app'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }
 
 //test
else if(isset($_GET['test']))
 	{
  		 $jsonObj4= array();	
  		 
  		   // JSON string
  $someJSON = '[{"sub_cat":1,"sub_sub_cat":2},{"sub_cat":1,"sub_sub_cat":3},{"sub_cat":2,"sub_sub_cat":2}]';

  // Convert JSON string to Array
  $someArray = json_decode($someJSON, true);

    for ($x = 0; $x <= count($someArray)-1 ; $x++) {
            
            
            $query1="SELECT * FROM tbl_sub_category WHERE sub_id='".$someArray[$x]["sub_cat"]."' ";
            $result1 = mysqli_query($mysqli,$query1);
            	$row1 = mysqli_fetch_assoc($result1);
            	$row2=$row1['sub_name'];
            
            $query2="SELECT * FROM tbl_sub_sub_category WHERE sub_sub_id='".$someArray[$x]["sub_cat"]."' ";
            $result2 = mysqli_query($mysqli,$query2);
            	$row3 = mysqli_fetch_assoc($result2);
            	$row4=$row3['sub_sub_name'];
            
	        
            $employees[] = array('sub_cat'=> $row2,'sub_sub_cat'=> $row4);
            	
    }
    
     $jsonformat=json_encode($employees);

		$query="SELECT * FROM tbl_settings WHERE id='1'";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		
		$set['pizza_app'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }


else if(isset($_GET['gettrendingImageList']))
 	{



		$jsonObj= array();	

	    $tableName="tbl_product";		
		$limit = 10; 
		
		$query = "SELECT COUNT(*) as num FROM $tableName where p_status=1";
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
 
     
		 $query="SELECT * FROM `tbl_product`
LEFT JOIN tbl_category ON tbl_category.c_id=tbl_product.c_id
LEFT JOIN tbl_sub_category ON tbl_sub_category.sub_id=tbl_product.sub_id
where tbl_product.p_status=1 ORDER BY RAND() DESC LIMIT $start, $limit";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
				$row['p_id']=$data['p_id'];
			$row['c_id']=$data['c_id'];
			$row['c_name']=$data['c_name'];
			$row['sub_id'] = $data['sub_id'];
			$row['sub_name'] = $data['sub_name'];
			$row['p_name'] = $data['p_name'];
 			$row['p_dis_price'] = $data['p_dis_price'];
 			$row['p_ori_price'] = $data['p_ori_price'];
 				$row['p_image'] = $file_path.'images/'.$data['p_image'];
 			$row['p_status'] = $data['p_status'];
			
			array_push($jsonObj,$row);
		
		}
		
        $set['page'] = $_GET['page'];
        $set['totalimage'] = $total_pages;
        $set['limit'] = $limit;
        $set['success'] = '1';
		$set['pizza_app'] = $jsonObj;	
		
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

 	
}
	
	else if(isset($_GET['getsearchProductList']))
 	{

	    $jsonObj= array();	

		
		$tableName="tbl_product";		
		$limit = 10; 
		
		$query = "SELECT COUNT(*) as num FROM $tableName where tbl_product.p_status=1 and tbl_product.p_name like '%".addslashes($_GET['search_value'])."%'";
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



        $query="SELECT * FROM `tbl_product`
LEFT JOIN tbl_category ON tbl_category.c_id=tbl_product.c_id
LEFT JOIN tbl_sub_category ON tbl_sub_category.sub_id=tbl_product.sub_id 
		where tbl_product.p_status = 1 and tbl_product.p_name like '%".addslashes($_GET['search_value'])."%' ORDER BY tbl_product.p_id DESC LIMIT $start, $limit";


		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['p_id']=$data['p_id'];
			$row['c_id']=$data['c_id'];
			$row['c_name']=$data['c_name'];
			$row['sub_id'] = $data['sub_id'];
			$row['sub_name'] = $data['sub_name'];
			$row['p_name'] = $data['p_name'];
 			$row['p_dis_price'] = $data['p_dis_price'];
 			$row['p_ori_price'] = $data['p_ori_price'];
 			 				$row['p_image'] =$data['p_image'];
 			$row['p_status'] = $data['p_status'];
			

			array_push($jsonObj,$row);
		
		}

       
        $set['page'] = $_GET['page'];
        $set['totalvideo'] = $total_pages;
        $set['limit'] = '10';
        $set['success'] = '1';
		$set['pizza_app'] = $jsonObj;	

 	
			header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

	}
	
//get all city
else if(isset($_GET['get_city']))
 	{
  		 $jsonObj4= array();	

		$query="SELECT * FROM tbl_city order by c_id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			 	$row['c_id'] = $data['c_id'];
			$row['c_name'] = $data['c_name'];
			$row['c_status'] = $data['c_status'];
	
			array_push($jsonObj4,$row); 
			}
		
		$set['pizza_app'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }
 
//get all Area with City wise
 else if(isset($_GET['get_area']))
 	{


		$jsonObj1= array();
			
        
		 $query="SELECT * FROM `tbl_area` 
		 LEFT JOIN tbl_city ON tbl_city.c_id=tbl_area.c_id 
		 WHERE tbl_area.c_id='".$_POST['c_id']."'";
		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{

			$row['ar_id'] = $data['ar_id'];
			$row['c_id']=$data['c_id'];
			$row['c_name']=$data['c_name'];
			$row['ar_name'] = $data['ar_name'];
 			$row['a_status'] = $data['a_status'];
			array_push($jsonObj1,$row);

		
		}
		
		$set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }
 
  
//get all crust
 else if(isset($_GET['get_crust']))
 	{


		$jsonObj1= array();
			
        
		 $query="SELECT * FROM `tbl_crust`
		 WHERE tbl_crust.cid order by tbl_crust.cid DESC";
		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{

		
			$row['cid']=$data['cid'];
			$row['c_name']=$data['c_name'];
			$row['c_reg_price'] = $data['c_reg_price'];
				$row['c_mid_price'] = $data['c_mid_price'];
				$row['c_lar_price'] = $data['c_lar_price'];
					$row['c_image'] = $file_path.'images/'.$data['c_image'];
 			$row['c_status'] = $data['c_status'];
			array_push($jsonObj1,$row);

		
		}
		
		$set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }
 
 
 //get all Toppings
 else if(isset($_GET['get_toppings']))
 	{


		$jsonObj1= array();
		
			 $query="SELECT * FROM `tbl_toppings`
		 WHERE tbl_toppings.t_id order by tbl_toppings.t_id DESC";
		 
		 
		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());
		 
     
    
    	 $query1="SELECT * FROM `tbl_toppings_price`
     WHERE tbl_toppings_price.t_id = 1 ";
                 $result2 = mysqli_query($mysqli,$query1);
    	 	$row3 = mysqli_fetch_assoc($result2);
        	$t_reg_price=$row3['t_reg_price'];
        	$t_mid_price=$row3['t_mid_price'];
        	$t_lar_price=$row3['t_lar_price'];

		while($data = mysqli_fetch_assoc($sql))
		{

		
			$row['t_id']=$data['t_id'];
			$row['t_name']=$data['t_name'];
			$row['t_image'] = $file_path.'images/'.$data['t_image'];
 			$row['t_status'] = $data['t_status'];
			array_push($jsonObj1,$row);

		
		}
		
			$set['t_reg_price'] = $t_reg_price;	
			$set['t_mid_price'] = $t_mid_price;	
			$set['t_lar_price'] = $t_lar_price;	
		    $set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }
 
 //get all Extra Cheez
 else if(isset($_GET['get_cheese']))
 	{


		$jsonObj1= array();
			
        
		 $query="SELECT * FROM `tbl_cheez`
		 WHERE tbl_cheez.c_id order by tbl_cheez.c_id DESC";
		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{

		
			$row['c_id']=$data['c_id'];
			$row['c_name']=$data['c_name'];
			$row['c_reg_price'] = $data['c_reg_price'];
			$row['c_mid_price'] = $data['c_mid_price'];
			$row['c_lar_price'] = $data['c_lar_price'];
			$row['c_image'] = $file_path.'images/'.$data['c_image'];
 			$row['c_status'] = $data['c_status'];
			array_push($jsonObj1,$row);

		
		}
		
		$set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }
 
 //get all Banner 
else if(isset($_GET['get_Newbanner']))
{

		$jsonObj1= array();
			

		 $query="SELECT * FROM tbl_banner2 WHERE tbl_banner2.b_id=1";
		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{

			$row['b_id'] = $data['b_id'];
			$row['b_image'] = $file_path.'images/'.$data['b_image'];
			$row['b_image_thumb'] = $file_path.'images/thumbs/'.$data['b_image'];
			$row['b_status'] = $data['b_status'];
		
 
			array_push($jsonObj1,$row);

		
		}
		
		$set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


//Get All PromoCode
else if(isset($_GET['get_promocode']))
{

		$jsonObj1= array();
			

		 $query="SELECT * FROM `tbl_promocode` 
		 INNER JOIN tbl_order ON ( tbl_order.pro_id = tbl_promocode.p_id )
		 WHERE tbl_order.user_id = '".$_POST['user_id']."' and tbl_order.pro_id = '1' ORDER BY `tbl_promocode`.`p_id` ASC";
		 $sql = mysqli_query($mysqli,$query)or die(mysqli_error());
		 $num_rows = mysqli_num_rows($sql);
		 
	    if( $num_rows >= 2 )
         {
              $query1="SELECT * FROM tbl_promocode WHERE tbl_promocode.p_id!=1 ORDER BY `tbl_promocode`.`p_id` ASC";
		    $sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());
		 
    		while($data1 = mysqli_fetch_assoc($sql1))
    		{
    		    
        			$row['p_id'] = $data1['p_id'];
        			$row['p_name'] = $data1['p_name'];
        			$row['p_desc'] = $data1['p_desc'];
        			$row['p_tandc'] = $data1['p_tandc'];
        			$row['p_start_date'] = $data1['p_start_date'];
        			$row['p_end_date'] = $data1['p_end_date'];
        			$row['min_price'] = $data1['min_price'];
        			$row['p_discount'] = $data1['p_discount'];
        			$row['p_status'] = $data1['p_status'];
        		
         
        			array_push($jsonObj1,$row);
           
    		
    		}
         }else
         {
              $query2="SELECT * FROM tbl_promocode ORDER BY `tbl_promocode`.`p_id` ASC";
		    $sql2 = mysqli_query($mysqli,$query2)or die(mysqli_error());
		 
		 
             	while($data2 = mysqli_fetch_assoc($sql2))
    		{
    
    			$row['p_id'] = $data2['p_id'];
    			$row['p_name'] = $data2['p_name'];
    			$row['p_desc'] = $data2['p_desc'];
    			$row['p_tandc'] = $data2['p_tandc'];
    			$row['p_start_date'] = $data2['p_start_date'];
    			$row['p_end_date'] = $data2['p_end_date'];
    				$row['min_price'] = $data2['min_price'];
    					$row['p_discount'] = $data2['p_discount'];
    			$row['p_status'] = $data2['p_status'];
    		
     
    			array_push($jsonObj1,$row);
    
    		
    		}
         }
		
		$set['pizza_app'] = $jsonObj1;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//add feedback
//add adderss details
else if(isset($_GET['add_feedback']))
{
//tbl_feedback	f_id	user_id	f_star	f_cat	f_desc	f_status
  if($_POST['user_id']!="" AND $_POST['f_star']!="" AND $_POST['f_cat']!="" AND $_POST['f_desc']!="" )
  {

		
  			 $qry1="INSERT INTO tbl_feedback
				  (user_id,
				  f_star,
				  f_cat,
				  f_desc,
				  f_status

				) VALUES (
					'".$_POST['user_id']."',
					'".$_POST['f_star']."',
					'".$_POST['f_cat']."',
					'".$_POST['f_desc']."',
					1
				)"; 
  
            
            $result1=mysqli_query($mysqli,$qry1);  									 
		
			 $last_id = mysqli_insert_id($mysqli); 
 

			$qrys = "SELECT * FROM tbl_feedback WHERE f_id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);



			$set['pizza_app'][]	=	array( 
			'msg' =>	" Successful",
			'success'=>'1',
			'f_id'	=>	$row['f_id'],
			'user_id' =>	$row['user_id'],
			'f_star' =>	$row['f_star'],
			'f_cat' =>	$row['f_cat'],
			'f_desc'	=>	$row['f_desc'],
			'f_status'	=>	$row['f_status']

			);
				
		}
		else{
			$set['pizza_app'][]=array('msg' => "some thing went wrong ...!",'success'=>'0');
		}	
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
}
























?>