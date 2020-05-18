<?php include("includes/connection.php");
 	  include("includes/function.php"); 	
	
	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
	
  		// user registration
  	
	if(isset($_GET['postUserRegister']))
 	{
        if($_POST['name']!=="" and $_POST['email']!=="" and $_POST['phone_number']!=="" and $_POST['password']!=="" )
        	{

  			$qry1="INSERT INTO tbl_registration 
				  (`name`,
				  `email`,
				  `phone_number`,
				    `password`,
				    wallet,
				   status
				 
				) VALUES (
					'".trim($_POST['name'])."',
					'".trim($_POST['email'])."',
					'".$_POST['phone_number']."',
					'".$_POST['password']."',
					0,
					1
				)"; 
            
            $result1=mysqli_query($mysqli,$qry1);  									 
		
			 $last_id = mysqli_insert_id($mysqli); 
 

			$qrys = "SELECT * FROM tbl_registration WHERE user_id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);

			$set['GAME_APP'][]	=	array( 
			'msg' =>	"Successful",
			'success'=>'1',
			'user_id'	=>	$row['user_id'],
			'name' =>	$row['name'],
			'email'	=>	$row['email'],
			'phone_number'	=>	$row['phone_number'],
			'password'	=>	$row['password'],
			 'wallet'	=>	$row['wallet']
	     								
			);
        }else
        {
            	$set['GAME_APP'][]	=	array( 
			'msg' =>	"Fail",
			'success'=>'0'
			);
        }
		
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//Login with ussername and password
else if(isset($_GET['postUserLogin']))
{
	if($_POST['phone_number']!=="" and $_POST['password']!=="")
	{

	
		$phone_number = $_POST['phone_number'];
		//$password = encryptIt($_POST['password']);
		$password = $_POST['password'];
		//echo $password;die;
	  $qry = "SELECT * FROM tbl_registration WHERE phone_number = '".$phone_number."' and password = '".$password."'"; 
		
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    	if ($num_rows > 0)
		{ 
			$set['GAME_APP'][]	= array(  
										  'msg'			=>	'Successflly Logged in',
										  'success'=>'1',
										  'user_id' 	=>	$row['user_id'],
	     								  'name'	=>	$row['name'],
	     								  'email'	=>	$row['email'],
	     								  'phone_number'=>	$row['phone_number'],
	     								  'password'	=>	$row['password'],
	     								   'wallet'	=>	$row['wallet']
	     								
	     								);
		  
		}		 
		else
		{
			$set['GAME_APP'][]=array('msg' =>'Invalid username and password','success'=>'0');
 	
		}
	}

			header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//users update profile
else if(isset($_GET['postUserProfileUpdate']))
{
	
		$sql = "SELECT * FROM tbl_registration where user_id = '".$_POST['user_id']."' ";
		$res = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_assoc($res);
		
		
	   if($_POST['password']!="")
		{
			$user_edit= "UPDATE tbl_registration SET 
			name='".$_POST['name']."',
			email='".$_POST['email']."',
			phone_number = '".$_POST['phone_number']."',
			password='".$_POST['password']."'

			WHERE user_id = '".$_POST['user_id']."'";	 
		}
		else
		{
			$user_edit= "UPDATE tbl_registration SET 
			name='".$_POST['name']."',
			email_id='".$_POST['email']."',
			phone_number = '".$_POST['phone_number']."',
			password='".$_POST['password']."'
	
			WHERE user_id = '".$_POST['user_id']."'";		
		}
   		
   		$user_res = mysqli_query($mysqli,$user_edit);	
	  	
		$set['GAME_APP'][]=array('msg'=>'Updated','success'=>'1');
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//get users profile with users id
else if(isset($_GET['getUserProfile']))
{

		$qry = "SELECT * FROM tbl_registration WHERE user_id = '".$_POST['user_id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		 
		$row = mysqli_fetch_assoc($result);
	  				 
	    $set['GAME_APP'][]	=	array('user_id' 	=> 	$row['user_id'],
	    							  'name'	=>	$row['name'],
	    							  'email'	=>	$row['email'],
	    							  'phone_number'=>	$row['phone_number'],
	    							  'password'	=>	$row['password'],
	    							   'wallet'	=>	$row['wallet']
	     								
	    							
	    	
	    							);

	   	header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


//get all user
else if(isset($_GET['get_user']))
{
    
  		 $jsonObj4= array();	

		 $query="SELECT * FROM tbl_registration order BY user_id DESC";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
 			//$data = mysqli_fetch_assoc($sql);


		while($data = mysqli_fetch_assoc($sql))
		{
			

			$row['user_id'] = $data['user_id'];
			$row['name'] = $data['name'];
				$row['email'] = $data['email'];
			$row['phone_number'] = $data['phone_number'];
				$row['password'] = $data['password'];
			$row['wallet'] = $data['wallet'];



			array_push($jsonObj4,$row); 
			}
		
		$set['GAME_APP'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}



//profile updte wallet
else if(isset($_GET['Updateprofilewallet']))
{
    

    if($_POST['p_type']== 1)
    {
         $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$_POST['user_id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row1 = mysqli_fetch_assoc($result);
		

		         $id=$row1['user_id'];
    		     $wallet=$row1['wallet'];
    		    $update_amount=$_POST['p_payment'];
    		    // $wallet1=$row1['wallet'];
		 	    $newwallet=$wallet+$update_amount;  

		 		$user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$id."'";
		 	$result1=mysqli_query($mysqli,$user_edit);
		 				
		 	 date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
            $date = date('d-m-Y');
             $date2 = date('H:i:s');
			
		 				
		 	$qry1="INSERT INTO `tbl_payment`(`user_id`,`p_date`,`p_time`,`p_payment`, `p_type`, `p_status`) 
		 	VALUES ('".$_POST['user_id']."','".$date."','".$date2."','".$update_amount."','".$_POST['p_type']."',1)"; 
            
  		  $result1=mysqli_query($mysqli,$qry1);


 		 


  	      $set['GAME_APP'][]=array('msg' => "Add successflly...!",'success'=>'1');
			 	
    }
    
    if ($_POST['p_type'] == 2)
	{
    
        $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$_POST['user_id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row1 = mysqli_fetch_assoc($result);
		

      		    
		         $id=$row1['user_id'];
    		     $wallet=$row1['wallet'];
    		    $update_amount=$_POST['p_payment'];
    		  
    		    if($wallet >= $update_amount1)
                {
		 	    $newwallet=$wallet-$update_amount;  
                
		 		$user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$id."'";
		 	$result1=mysqli_query($mysqli,$user_edit);
		 				
		 					 	 date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
            $date = date('d-m-Y');
             $date2 = date('H:i:s');
			
		 				
		 	$qry1="INSERT INTO `tbl_payment`(`user_id`,`p_date`,`p_time`,`p_payment`, `p_type`, `p_status`) 
		 	VALUES ('".$_POST['user_id']."','".$date."','".$date2."','".$update_amount."','".$_POST['p_type']."',1)"; 
            
            
  			  $result2=mysqli_query($mysqli,$qry1);


 	 	      $set['GAME_APP'][]=array('msg' => "Add successflly...!",'success'=>'1');
                }else
            		     {
            		         	$set['GAME_APP'][]=array('msg' => "some thing went wrong 1...!",'success'=>'0');
            		     }
        }
			
			 
			 


		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//get all payment
else if(isset($_GET['get_payment']))
{
    	 $jsonObj4= array();	

		 $query="select * from tbl_payment 
		 left JOIN tbl_registration ON tbl_registration.user_id=tbl_payment.user_id order by tbl_payment.p_id DESC";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
 			//$data = mysqli_fetch_assoc($sql);


		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['p_id'] = $data['p_id'];
			$row['user_id'] = $data['user_id'];
			$row['name'] = $data['name'];
			$row['phone_number'] = $data['phone_number'];
			$row['p_payment'] = $data['p_payment'];
			$row['p_type'] = $data['p_type'];
			if($row['p_type'] ==1)
			{
			    	$row['p_name'] = "credited";
			}else
			{
			    	$row['p_name'] = "Debited";
			}
			
			$row['p_status'] = $data['p_status'];




			array_push($jsonObj4,$row); 
			}
		
		$set['GAME_APP'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//get all payment user wise
else if(isset($_GET['get_payment_user']))
{
    
    	$user_id=$_POST['user_id'];
    
    	
		 $query="select * from tbl_payment 
		 left JOIN tbl_registration ON tbl_registration.user_id=tbl_payment.user_id  WHERE tbl_payment.user_id = '".$user_id."'";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

        $jsonObj4= array();	


		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['p_id'] = $data['p_id'];
			$row['user_id'] = $data['user_id'];
			$row['name'] = $data['name'];
			$row['phone_number'] = $data['phone_number'];
				$row['p_payment'] = $data['p_payment'];
				
			$row['p_date'] = $data['p_date'];
				$row['p_time'] = $data['p_time'];
			$row['p_type'] = $data['p_type'];
			if($row['p_type'] ==1)
			{
			    	$row['p_name'] = "credited";
			}else
			{
			    	$row['p_name'] = "Debited";
			}
			
			
			$row['p_status'] = $data['p_status'];




			array_push($jsonObj4,$row); 
			}
		
		$set['GAME_APP'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


//add market
else if(isset($_GET['add_market']))
 {

  			$qry1="INSERT INTO tbl_market 
				  (`m_name`,
				   `m_date`,
				  `m_open_time`,
				  `m_close_time`,
				  m_open,
				  m_close,
				   `m_score`,
					m_status
				 
				) VALUES (
					'".trim($_POST['m_name'])."',
							'".trim($_POST['m_date'])."',
					'".trim($_POST['m_open_time'])."',
						'".trim($_POST['m_close_time'])."',
					'".$_POST['m_open']."',
						'".$_POST['m_close']."',
					'".$_POST['m_score']."',
					1
				)"; 
            
            $result1=mysqli_query($mysqli,$qry1);  									 
		
			 $last_id = mysqli_insert_id($mysqli); 
 

			$qrys = "SELECT * FROM tbl_market WHERE m_id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);

			$set['GAME_APP'][]	=	array( 
			'msg' =>	" Successful",
			'success'=>'1',
			'm_id'	=>	$row['m_id'],
			'm_name' =>	$row['m_name'],
				'm_date' =>	$row['m_date'],
			'm_open_time'	=>	$row['m_open_time'],
			'm_close_time'	=>	$row['m_close_time'],
				'm_open'	=>	$row['m_open'],
			'm_close'	=>	$row['m_close'],
			'm_score'	=>	$row['m_score'],
			'm_status'	=>	$row['m_status']
			);
			

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}



//get all market 
else if(isset($_GET['get_market']))
{

  		 $jsonObj4= array();	

		 $query="SELECT * FROM tbl_market ORDER BY `tbl_market`.`m_id` ASC";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
 			//$data = mysqli_fetch_assoc($sql);


		while($data = mysqli_fetch_assoc($sql))
		{
			 date_default_timezone_set('Asia/Calcutta');
 		    	  $newDateTime2 = date('Y-m-d H:i:s');
  						 
  					$m_date = $data['m_date'];	 
     			$openTime = $data['m_date']." ".$data['m_open_time'];
 			   $closeTime = $data['m_date']." ".$data['m_close_time'];
 		
 
			if ($newDateTime2 < $openTime) 
			{
  			
 				 $open=1;
 				
			}else
			{
				 $open=0;
 				
			}


			if($newDateTime2 < $closeTime)
			{
				 $close=1;
			}else
			{
				 $close=0;
			}
			
	//	exit();

			$row['m_id'] = $data['m_id'];
			$row['m_name'] = $data['m_name'];
			$row['m_date'] = $data['m_date'];
			$row['market_otime'] = $data['m_open_time'];
			$row['market_ctime'] = $data['m_close_time'];
			$row['m_open_time'] = $open;
			$row['m_close_time'] = $close;
			$row['m_open'] = $data['m_open'];
			$row['m_close'] = $data['m_close'];
			$row['m_score'] = $data['m_score'];
			$row['m_status'] = $data['m_status'];

			array_push($jsonObj4,$row); 
			}
		
		$set['GAME_APP'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


//delete market for admin app
else if(isset($_GET['deletemarket']))
{

	   if($_POST['m_id']!="" )
		{

		 $user_edit= "DELETE FROM `tbl_market`
			WHERE m_id = '".$_POST['m_id']."'";	 
			
			$user_res = mysqli_query($mysqli,$user_edit);	
		
	  	
		    $set['GAME_APP'][]=array('msg'=>'Updated','success'=>'1');
		    
		}else {
		      $set['GAME_APP'][]=array('msg' => "Data Something Wrong ...!",'success'=>'0');
		}
	
   		
   	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();  
}

//edit market for admin app
else if(isset($_GET['Updatemarket']))
{

	   if($_POST['m_name']!="" and $_POST['m_date']!="" and $_POST['m_open_time']!="" and $_POST['m_close_time']!=""  and $_POST['m_score']!="")
		{

		 $user_edit= "UPDATE tbl_market SET 
			m_name='".$_POST['m_name']."',
			m_date='".$_POST['m_date']."',
			m_open_time='".$_POST['m_open_time']."',
			m_close_time='".$_POST['m_close_time']."',
			m_score='".$_POST['m_score']."',
			m_status='".$_POST['m_status']."'
			WHERE m_id = '".$_POST['m_id']."'";	 
				$user_res = mysqli_query($mysqli,$user_edit);	
		
	  	
		    $set['GAME_APP'][]=array('msg'=>'Updated','success'=>'1');
		    
		}else {
		      $set['GAME_APP'][]=array('msg' => "Data Something Wrong ...!",'success'=>'0');
		}
	
   		
   	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();  
}


//add bat
else if(isset($_GET['add_bat']))
{
    
    
    $qry1 = "SELECT * FROM tbl_market WHERE m_id = '".$_POST['m_id']."' ";  
    $result1 = mysqli_query($mysqli,$qry1);
    $num_rows1 = mysqli_num_rows($result1);
    $row1 = mysqli_fetch_assoc($result1);
        
    
    date_default_timezone_set('Asia/Calcutta');
 	  $newDateTime2 = date('Y-m-d H:i:s');
  		
 		$openTime = $row1['m_date']." ".$row1['m_open_time'];
 	      $closeTime = $row1['m_date']." ".$row1['m_close_time'];




if ($num_rows1 > 0 and $newDateTime2 < $openTime and $_POST['b_option'] == 1)
    {
  	    $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$_POST['user_id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		

      		    
		         $id=$row['user_id'];
    		      $wallet=$row['wallet'];
    		     $update_amount=$_POST['b_points'];
    		   
		 			if($update_amount <= $wallet)
		 			{
		 					 $newwallet=$wallet - $update_amount;  

		 				  $user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$id."'";
		 				  $result1=mysqli_query($mysqli,$user_edit);
		 				  
		 				   date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                            $date = date('Y-m-d');
                            $date2 = date('H:i:s');
		 				
		 					 $qry1="INSERT INTO tbl_bat 
								  (`m_id`,
					 			    user_id,
					 			   `b_type`,
								   `b_option`,
								   `b_digit`,
									b_points,
									b_date,
										b_time,
									b_status
				 
									) VALUES (
					 				'".trim($_POST['m_id'])."',
						 				'".trim($_POST['user_id'])."',
										'".trim($_POST['b_type'])."',
										'".$_POST['b_option']."',
						 				'".$_POST['b_digit']."',
						 				'".$_POST['b_points']."',
						 				'".$date."',
						 					'".$date2."',
						 				1
						 			)"; 
            
          				  $result1=mysqli_query($mysqli,$qry1);
    
          $user_insert2=" INSERT INTO `tbl_transaction`(`m_id`,`user_id`,  `t_date`,  `t_time`,`t_option`,`t_type`, `t_digit`, `t_wallet`,`trace_st`,`t_status`) 
                       VALUES ('".$_POST['m_id']."','".$_POST['user_id']."','".$date."','".$date2."','".$_POST['b_option']."','".$_POST['b_type']."','".$_POST['b_digit']."','".$_POST['b_points']."',1,1)";
                            $result2 = mysqli_query($mysqli,$user_insert2);
		 				 


			 	 	      $set['GAME_APP'][]=array('msg' => "Add successflly...!",'success'=>'1');
			 	 }else{
			 	 		  $set['GAME_APP'][]=array('msg' => "Not Added ...!",'success'=>'0');
			 	 }
			
    }
    
    if ($num_rows1 > 0 and $newDateTime2 < $closeTime and $_POST['b_option'] == 2)
    {
  	    $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$_POST['user_id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		

      		    
		         $id=$row['user_id'];
    		     $wallet=$row['wallet'];
    		     $update_amount=$_POST['b_points'];
    		   
		 			if($update_amount <= $wallet)
		 			{
		 					 $newwallet=$wallet - $update_amount;  

		 				  $user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$id."'";
		 				  $result1=mysqli_query($mysqli,$user_edit);
		 				  
		 		 				   date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                            $date = date('Y-m-d');
                            $date2 = date('H:i:s');
		 				
		 					 $qry1="INSERT INTO tbl_bat 
								  (`m_id`,
					 			    user_id,
					 			   `b_type`,
								   `b_option`,
								   `b_digit`,
									b_points,
									b_date,
										b_time,
									b_status
				 
									) VALUES (
					 				'".trim($_POST['m_id'])."',
						 				'".trim($_POST['user_id'])."',
										'".trim($_POST['b_type'])."',
										'".$_POST['b_option']."',
						 				'".$_POST['b_digit']."',
						 				'".$_POST['b_points']."',
						 				'".$date."',
						 					'".$date2."',
						 				1
						 			)"; 
						 			
          				  $result1=mysqli_query($mysqli,$qry1);
    
                       $user_insert2=" INSERT INTO `tbl_transaction`(`m_id`,`user_id`,  `t_date`,  `t_time`,`t_option`,`t_type`, `t_digit`, `t_wallet`,`trace_st`,`t_status`) 
                       VALUES ('".$_POST['m_id']."','".$_POST['user_id']."','".$date."','".$date2."','".$_POST['b_option']."','".$_POST['b_type']."','".$_POST['b_digit']."','".$_POST['b_points']."',1,1)";
                            $result2 = mysqli_query($mysqli,$user_insert2);
		 				 


			 	 	      $set['GAME_APP'][]=array('msg' => "Add successflly...!",'success'=>'1');
			 	 }else{
			 	 		  $set['GAME_APP'][]=array('msg' => "Not Added ...!",'success'=>'0');
			 	 }
			
    }	 


		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}



//get all bat for admin app
else if(isset($_GET['get_bat']))
{
    
  		 $jsonObj4= array();	

		 $query="SELECT * FROM `tbl_bat`
left JOIN tbl_market ON tbl_market.m_id=tbl_bat.m_id
left JOIN tbl_registration ON tbl_registration.user_id=tbl_bat.user_id
ORDER BY tbl_bat.b_id DESC";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
 			//$data = mysqli_fetch_assoc($sql);


		while($data = mysqli_fetch_assoc($sql))
		{
			

			$row['b_id'] = $data['b_id'];
			$row['m_id'] = $data['m_id'];
				$row['m_name'] = $data['m_name'];
			$row['user_id'] = $data['user_id'];
				$row['name'] = $data['name'];
					$row['phone_number'] = $data['phone_number'];
			$row['b_type'] = $data['b_type'];
			$row['b_option'] = $data['b_option'];
			$row['b_digit'] =$data['b_digit'];
			$row['b_points'] = $data['b_points'];
			$row['b_date'] = $data['b_date'];
			$row['b_status'] = $data['b_status'];


			array_push($jsonObj4,$row); 
			}
		
		$set['GAME_APP'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


//edit bat for admin app
else if(isset($_GET['Updatebat']))
{
	   if($_POST['b_id']!="" and $_POST['m_id']!="" and $_POST['user_id']!="" and $_POST['b_type']!="" and $_POST['b_option']!="" and $_POST['b_digit']!="" and $_POST['b_points']!="" and $_POST['b_date']!="")
		{

		 $user_edit= "UPDATE `tbl_bat` SET 
                            `m_id`='".$_POST['m_id']."',
                            `user_id`='".$_POST['user_id']."',
                            `b_type`='".$_POST['b_type']."',
                            `b_option`='".$_POST['b_option']."',
                            `b_digit`='".$_POST['b_digit']."',
                            `b_points`='".$_POST['b_points']."',
                            `b_date`='".$_POST['b_date']."'
                           
                            WHERE `b_id`='".$_POST['b_id']."'";	 
				$user_res = mysqli_query($mysqli,$user_edit);	
		
	  	
		$set['GAME_APP'][]=array('msg'=>'Updated','success'=>'1');
		}else {
		      $set['GAME_APP'][]=array('msg' => "Data Something Wrong ...!",'success'=>'0');
		}
	
   		
   	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();  
    
}
//check bat user wise
else if(isset($_GET['get_bat_id_wise']))
{



    $qry = "SELECT * FROM tbl_bat 
   			left join tbl_market on tbl_market.m_id =tbl_bat.m_id
   			left join tbl_registration on tbl_bat.user_id =tbl_registration.user_id
             where tbl_bat.user_id='".$_POST['user_id']."' ";
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);


         if ($num_rows > 0)
		{
		    
		       	 $jsonObj4= array();	
    		while($row1 = mysqli_fetch_assoc($result))
    		{
			
			$row['b_id'] = $row1['b_id'];
			$row['m_id'] = $row1['m_id'];
				$row['m_name'] = $row1['m_name'];
			$row['user_id'] = $row1['user_id'];
				$row['user_name'] = $row1['name'];
			$row['b_type'] = $row1['b_type'];
			$row['b_option'] = $row1['b_option'];
			$row['b_digit'] = $row1['b_digit'];
			$row['b_points'] = $row1['b_points'];
			$row['b_date'] = $row1['b_date'];
	    	$row['b_status'] = $row1['b_status'];
		
			array_push($jsonObj4,$row); 
			}
		
		}
				$set['GAME_APP'] = $jsonObj4;

		
		 	header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


//check transaction user wise
else if(isset($_GET['get_transaction']))
{

    $qry = "SELECT * FROM tbl_transaction 
   			left join tbl_market on tbl_market.m_id =tbl_transaction.m_id
   			left join tbl_registration on tbl_transaction.user_id =tbl_registration.user_id
             where tbl_transaction.user_id='".$_POST['user_id']."' ";
             
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);

         $jsonObj4= array();	
         
         if ($num_rows > 0)
		{
		    
		       	
    		while($row1 = mysqli_fetch_assoc($result))
    		{
			
			$row['tid'] = $row1['tid'];
			$row['m_id'] = $row1['m_id'];
			$row['m_name'] = $row1['m_name'];
			$row['user_id'] = $row1['user_id'];
			$row['user_name'] = $row1['name'];
			$row['t_date'] = $row1['t_date'];
				$row['t_time'] = $row1['t_time'];
				$row['t_option'] = $row1['t_option'];
			$row['t_type'] = $row1['t_type'];
				$row['t_digit'] = $row1['t_digit'];
			$row['t_wallet'] = $row1['t_wallet'];
				$row['trace_st'] = $row1['trace_st'];
			$row['t_status'] = $row1['t_status'];

			array_push($jsonObj4,$row); 
			}
			
		
		}
		
		$set['GAME_APP'] = $jsonObj4;

		
		 	header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//check transaction user wise
else if(isset($_GET['get_transaction_all']))
{

     $qry = "SELECT * FROM tbl_transaction 
   			left join tbl_market on tbl_market.m_id =tbl_transaction.m_id
   			left join tbl_registration on tbl_transaction.user_id =tbl_registration.user_id ORDER BY `tbl_transaction`.`tid` DESC ";
             
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);

         $jsonObj4= array();	
         
         if ($num_rows > 0)
		{
		    
		       	
    		while($row1 = mysqli_fetch_assoc($result))
    		{
			
			$row['tid'] = $row1['tid'];
			$row['m_id'] = $row1['m_id'];
			$row['m_name'] = $row1['m_name'];
			$row['user_id'] = $row1['user_id'];
			$row['user_name'] = $row1['name'];
				$row['phone_number'] = $row1['phone_number'];
			$row['t_date'] = $row1['t_date'];
					$row['t_time'] = $row1['t_time'];
			$row['t_option'] = $row1['t_option'];
			$row['t_type'] = $row1['t_type'];
			$row['t_digit'] = $row1['t_digit'];
			$row['t_wallet'] = $row1['t_wallet'];
			$row['trace_st'] = $row1['trace_st'];
			$row['t_status'] = $row1['t_status'];

			array_push($jsonObj4,$row); 
			}
			
		
		}
				$set['GAME_APP'] = $jsonObj4;

		
		 	header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}




//check transaction user wise
else if(isset($_GET['get_transaction_today']))
{
    
      		 
  		date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $date = date('Y-m-d');
         

     $qry = "SELECT * FROM tbl_transaction 
   			left join tbl_market on tbl_market.m_id =tbl_transaction.m_id
   			left join tbl_registration on tbl_transaction.user_id =tbl_registration.user_id where tbl_transaction.t_date ='".$date."' and tbl_transaction.trace_st =2 ORDER BY `tbl_transaction`.`tid` DESC ";
             
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);

         $jsonObj4= array();	
         
         if ($num_rows > 0)
		{
		    
		       	
    		while($row1 = mysqli_fetch_assoc($result))
    		{
			
			$row['tid'] = $row1['tid'];
			$row['m_id'] = $row1['m_id'];
			$row['m_name'] = $row1['m_name'];
			$row['user_id'] = $row1['user_id'];
			$row['user_name'] = $row1['name'];
			$row['phone_number'] = $row1['phone_number'];
			$row['t_date'] = $row1['t_date'];
			$row['t_time'] = $row1['t_time'];
			$row['t_option'] = $row1['t_option'];
			$row['t_type'] = $row1['t_type'];
			$row['t_digit'] = $row1['t_digit'];
			$row['t_wallet'] = $row1['t_wallet'];
			$row['trace_st'] = $row1['trace_st'];
			$row['t_status'] = $row1['t_status'];

			array_push($jsonObj4,$row); 
			}
			
		
		}
				$set['GAME_APP'] = $jsonObj4;

		
		 	header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}



// 3 4 5 open redeem
else if(isset($_GET['redeem_open']))
 	{
  		 

    
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
    $date = date('Y-m-d');

    
 echo  $user_qry="SELECT * FROM tbl_redeem where m_id='".$_POST['m_id']."' and r_date='".$date."' and r_type=1";
 
         $user_result3=mysqli_query($mysqli,$user_qry);
         $user_row=mysqli_fetch_assoc($user_result3);
        
        if($user_row > 0)
        {
            $set['GAME_APP'][]=array('msg' => "You have already gave redeem for open market  ...!",'success'=>'0');
         
        }else{
                    
        $str_arr = explode ("-", $_POST['m_score']);  
        $str1 = $str_arr[0];
        $str2 = $str_arr[1];
          
        $str6 = str_split("$str2",1);
        $str4 = $str6[0];
        $str5 = $str6[1];  
           
         if($_POST['m_id']!="")
        {
             // 3 4 5 open redeem
          
          $qry1 = "SELECT tbl_bat.m_id as m_id , tbl_bat.user_id as user_id , tbl_bat.b_type as b_type , tbl_bat.b_option as b_option , tbl_bat.b_date as b_date ,  tbl_bat.b_digit as b_digit, tbl_bat.b_points as b_points FROM tbl_bat INNER JOIN tbl_market ON (tbl_market.m_id = '".$_POST['m_id']."' and tbl_market.m_date = tbl_bat.b_date and tbl_bat.b_digit='".$str1."') where tbl_bat.b_option=1 and (tbl_bat.b_type= 3 or tbl_bat.b_type= 4 or tbl_bat.b_type= 5 ) ";
    
    
                $user_result=mysqli_query($mysqli,$qry1);
                $num_rows = mysqli_num_rows($user_result);

                if($num_rows > 0)
                {
                    while ($row = mysqli_fetch_array($user_result)) 
                    {
                          $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$row['user_id']."' ";  
                          $result = mysqli_query($mysqli,$qry);
                          $num_rows1 = mysqli_num_rows($result);
                          $row1 = mysqli_fetch_assoc($result);
                           
                        if ($num_rows1 > 0)
                        {   
                    
                          $wallet=$row1['wallet'];
                          
                          
                          if($row['b_type']==3)
                          {
                                
                          $b_points = $row['b_points'];
                          $wallet1 = $b_points*150 ;
                          $newwallet=$wallet+$wallet1;   
                          
                          }
                          
                              if($row['b_type']==4)
                          {
                                
                          $b_points = $row['b_points'];
                          $wallet1 = $b_points*300 ;
                          $newwallet=$wallet+$wallet1;   
                          
                          }
                          
                          
                              if($row['b_type']==5)
                          {
                                
                          $b_points = $row['b_points'];
                          $wallet1 = $b_points*700 ;
                          $newwallet=$wallet+$wallet1;   
                          
                          }
                        
                      
              
                           $user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$row['user_id']."' ";  
                           $result = mysqli_query($mysqli,$user_edit);
                           
                            date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                           $date = date('d-m-Y');

                           
                           $user_insert2=" INSERT INTO `tbl_transaction`(`m_id`,`user_id`,  `t_date`, `t_option`,`t_type`, `t_digit`, `t_wallet`,`trace_st`,`t_status`) 
                           VALUES ('".$_POST['m_id']."','".$row['user_id']."','".$date."','".$row['b_option']."','".$row['b_type']."','".$row['b_digit']."',2,2,1)";
                            $result2 = mysqli_query($mysqli,$user_insert2);
                                
                        }
                    }
                }   
                
                
                
                // 1 open redeem
                
                
               $qry1 = "SELECT tbl_bat.m_id as m_id , tbl_bat.user_id as user_id , tbl_bat.b_type as b_type , tbl_bat.b_option as b_option , tbl_bat.b_date as b_date ,  tbl_bat.b_digit as b_digit, tbl_bat.b_points as b_points FROM tbl_bat INNER JOIN tbl_market ON (tbl_market.m_id = '".$_POST['m_id']."' and tbl_market.m_date = tbl_bat.b_date and tbl_bat.b_digit='".$str4."') where tbl_bat.b_option=1 and tbl_bat.b_type= 1 ";

    
                $user_result=mysqli_query($mysqli,$qry1);
                $num_rows = mysqli_num_rows($user_result);

                if($num_rows > 0)
                {
                    while ($row = mysqli_fetch_array($user_result)) 
                    {
                          $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$row['user_id']."' ";  
                          $result = mysqli_query($mysqli,$qry);
                          $num_rows1 = mysqli_num_rows($result);
                          $row1 = mysqli_fetch_assoc($result);
                           
                        if ($num_rows1 > 0)
                        {   
                    
                             $wallet=$row1['wallet'];
                          
                            
                          if($row['b_type']==1)
                          {
                                
                          $b_points = $row['b_points'];
                          $wallet1 = $b_points*9 ;
                          $newwallet=$wallet+$wallet1;   
                          
                          }
                
                      
              
                           $user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$row['user_id']."' ";  
                           $result = mysqli_query($mysqli,$user_edit);
                           
                            date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                           $date = date('d-m-Y');

                           
                           $user_insert2=" INSERT INTO `tbl_transaction`(`m_id`,`user_id`,  `t_date`, `t_option`,`t_type`, `t_digit`, `t_wallet`,`trace_st`,`t_status`) 
                           VALUES ('".$_POST['m_id']."','".$row['user_id']."','".$date."','".$row['b_option']."','".$row['b_type']."','".$row['b_digit']."',2,2,1)";
                            $result2 = mysqli_query($mysqli,$user_insert2);
                                
                        }
                    }
                } 
                
                    

                 date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                 $date = date('Y-m-d');
                  
            $user_insert=" INSERT INTO `tbl_redeem`(`m_id`, `r_date`, `r_type`, `r_status`) VALUES ('".$_POST['m_id']."','".$date."',1,1)";
            $result = mysqli_query($mysqli,$user_insert);

		    $set['GAME_APP'][]=array('msg'=>'Updated','success'=>'1');
		    
		    
		    
        }else
        {
            $set['GAME_APP'][]=array('msg' => "Data Something Wrong ...!",'success'=>'0');
        }
    }	
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }


// 3 4 5 close redeem
else if(isset($_GET['redeem_close']))
 	{

    
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
     $date = date('Y-m-d');

    
                        
        $str_arr = explode ("-", $_POST['m_score']);  
        $str1 = $str_arr[0];
        $str2 = $str_arr[1];
         $str3 = $str_arr[2];
        
        $str6 = str_split("$str2",1);
        $str4 = $str6[0];
        $str5 = $str6[1];
        
    
     $user_qry="SELECT * FROM tbl_redeem where m_id='".$_POST['m_id']."' and r_date='".$date."' and r_type=2";
         
         $user_result3=mysqli_query($mysqli,$user_qry);
         $user_row=mysqli_fetch_assoc($user_result3);
        
        if($user_row > 0)
        {
             $set['GAME_APP'][]=array('msg' => "Data Something Wrong ...!",'success'=>'0');
         
        }else{
            
        if($_POST['m_id']!="")
        {
            
            // 3 4 5  close
            
            $qry1 = "SELECT tbl_bat.m_id as m_id , tbl_bat.user_id as user_id , tbl_bat.b_type as b_type , tbl_bat.b_option as b_option , tbl_bat.b_date as b_date ,  tbl_bat.b_digit as b_digit, tbl_bat.b_points as b_points FROM tbl_bat INNER JOIN tbl_market ON (tbl_market.m_id = '".$_POST['m_id']."' and tbl_market.m_date = tbl_bat.b_date and tbl_bat.b_digit='".$str3."') where  tbl_bat.b_option=2 and  (tbl_bat.b_type= 3 or tbl_bat.b_type= 4 or tbl_bat.b_type= 5 ) ";
            
            $user_result=mysqli_query($mysqli,$qry1);
             $num_rows = mysqli_num_rows($user_result);
          
            if($num_rows > 0)
            {
                while ($row = mysqli_fetch_array($user_result)) 
                {
                      $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$row['user_id']."' ";  
                      $result = mysqli_query($mysqli,$qry);
                      $num_rows1 = mysqli_num_rows($result);
                      $row1 = mysqli_fetch_assoc($result);
                       
                    if ($num_rows1 > 0)
                    {   
                
                     $wallet=$row1['wallet'];
             
                          
                          if($row['b_type']==3)
                          {
                                
                          $b_points = $row['b_points'];
                          $wallet1 = $b_points*150 ;
                          $newwallet=$wallet+$wallet1;   
                          
                          }
                          
                              if($row['b_type']==4)
                          {
                                
                          $b_points = $row['b_points'];
                          $wallet1 = $b_points*300 ;
                          $newwallet=$wallet+$wallet1;   
                          
                          }
                          
                          
                              if($row['b_type']==5)
                          {
                                
                          $b_points = $row['b_points'];
                          $wallet1 = $b_points*700 ;
                          $newwallet=$wallet+$wallet1;   
                          
                          }
                      
      
                   $user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$row['user_id']."' ";  
                   $result = mysqli_query($mysqli,$user_edit);
        
                   
                    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                    $date = date('Y-m-d');

                   
                   $user_insert2=" INSERT INTO `tbl_transaction`(`m_id`,`user_id`,  `t_date`, `t_option`,`t_type`, `t_digit`, `t_wallet`,`trace_st`,`t_status`) 
                   VALUES ('".$_POST['m_id']."','".$row['user_id']."','".$date."','".$row['b_option']."','".$row['b_type']."','".$row['b_digit']."',2,2,1)";
                    $result2 = mysqli_query($mysqli,$user_insert2);
                
                   
                    }
                }
            }
            
  
    //1 close
  
       $qry2 = "SELECT tbl_bat.m_id as m_id , tbl_bat.user_id as user_id , tbl_bat.b_type as b_type , tbl_bat.b_option as b_option , tbl_bat.b_date as b_date ,  tbl_bat.b_digit as b_digit, tbl_bat.b_points as b_points FROM tbl_bat INNER JOIN tbl_market ON (tbl_market.m_id = '".$_POST['m_id']."' and tbl_market.m_date = tbl_bat.b_date and tbl_bat.b_digit='".$str5."') where tbl_bat.b_option=2 and tbl_bat.b_type= 1 ";
            
            $user_result1=mysqli_query($mysqli,$qry2);
             $num_rows1 = mysqli_num_rows($user_result1);
          
            if($num_rows1 > 0)
            {
                while ($row = mysqli_fetch_array($user_result1)) 
                {
                      $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$row['user_id']."' ";  
                      $result = mysqli_query($mysqli,$qry);
                      $num_rows1 = mysqli_num_rows($result);
                      $row1 = mysqli_fetch_assoc($result);
                       
                    if ($num_rows1 > 0)
                    {   
                
                   $wallet=$row1['wallet'];

                          if($row['b_type']==1)
                          {
                                
                          $b_points = $row['b_points'];
                          $wallet1 = $b_points*9 ;
                          $newwallet=$wallet+$wallet1;   
                          
                          }
                
      
                   $user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$row['user_id']."' ";  
                   $result = mysqli_query($mysqli,$user_edit);
        
                   
                    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                    $date = date('Y-m-d');
                    

                   
                   $user_insert2=" INSERT INTO `tbl_transaction`(`m_id`,`user_id`,  `t_date`, `t_option`,`t_type`, `t_digit`, `t_wallet`,`trace_st`,`t_status`) 
                   VALUES ('".$_POST['m_id']."','".$row['user_id']."','".$date."','".$row['b_option']."','".$row['b_type']."','".$row['b_digit']."',2,2,1)";
                    $result2 = mysqli_query($mysqli,$user_insert2);
                
                   
                    }
                }
            }
            
            
            //2 close
  
       $qry3 = "SELECT tbl_bat.m_id as m_id , tbl_bat.user_id as user_id , tbl_bat.b_type as b_type , tbl_bat.b_option as b_option , tbl_bat.b_date as b_date ,  tbl_bat.b_digit as b_digit, tbl_bat.b_points as b_points FROM tbl_bat INNER JOIN tbl_market ON (tbl_market.m_id = '".$_POST['m_id']."' and tbl_market.m_date = tbl_bat.b_date and tbl_bat.b_digit='".$str2."') where  tbl_bat.b_option=1 and  tbl_bat.b_type= 2  ";
            
            $user_result3=mysqli_query($mysqli,$qry3);
             $num_rows3 = mysqli_num_rows($user_result3);
          
            if($num_rows3 > 0)
            {
                while ($row = mysqli_fetch_array($user_result3)) 
                {
                      $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$row['user_id']."' ";  
                      $result = mysqli_query($mysqli,$qry);
                      $num_rows1 = mysqli_num_rows($result);
                      $row1 = mysqli_fetch_assoc($result);
                       
                    if ($num_rows1 > 0)
                    {   
                
                         $wallet=$row1['wallet'];

                          if($row['b_type']==2)
                          {
                                
                          $b_points = $row['b_points'];
                          $wallet1 = $b_points*95 ;
                          $newwallet=$wallet+$wallet1;   
                          
                          } 
              
      
                   $user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$row['user_id']."' ";  
                   $result = mysqli_query($mysqli,$user_edit);
        
         
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
    $date = date('Y-m-d');
                   
                   $user_insert2=" INSERT INTO `tbl_transaction`(`m_id`,`user_id`,  `t_date`, `t_option`,`t_type`, `t_digit`, `t_wallet`,`trace_st`,`t_status`) 
                   VALUES ('".$_POST['m_id']."','".$row['user_id']."','".$date."','".$row['b_option']."','".$row['b_type']."','".$row['b_digit']."',2,2,1)";
                    $result2 = mysqli_query($mysqli,$user_insert2);
                
                   
                    }
                }
            }
  
           
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
   $date = date('Y-m-d');
           
            $user_insert=" INSERT INTO `tbl_redeem`(`m_id`, `r_date`, `r_type`, `r_status`) VALUES ('".$_POST['m_id']."','".$date."',2,1)";
            $result = mysqli_query($mysqli,$user_insert);
            
            $set['GAME_APP'][]=array('msg'=>'Updated','success'=>'1');
        }else
        {
            $set['GAME_APP'][]=array('msg' => "Data Something Wrong ...!",'success'=>'0');
        }

		
	        
		}
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }






//get all settings
else if(isset($_GET['home']))
 	{

  		date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $date = date('Y-m-d');
         $date2 = date('d-m-Y');


		$query="SELECT SUM(b_points) AS b_points FROM tbl_bat WHERE b_date ='".$date."'";
		$result = mysqli_query($mysqli,$query);
		$row = mysqli_fetch_assoc($result); 
        $sum = $row['b_points'];

		$query1="SELECT SUM(wallet) AS wallet FROM tbl_registration ";
		$result1 = mysqli_query($mysqli,$query1);
		$row1 = mysqli_fetch_assoc($result1); 
        $wallet = $row1['wallet'];
        
         $query3="SELECT SUM(t_wallet) AS t_wallet FROM tbl_transaction WHERE trace_st = 1 and t_date ='".$date."'";
		$result3 = mysqli_query($mysqli,$query3);
		$row3 = mysqli_fetch_assoc($result3); 
        $today_loss = $row3['t_wallet'];

         $query2="SELECT SUM(t_wallet) AS t_wallet FROM tbl_transaction WHERE trace_st = 2 and t_date ='".$date."'";
		$result2 = mysqli_query($mysqli,$query2);
		$row2 = mysqli_fetch_assoc($result2); 
        $today_won = $row2['t_wallet'];
        
        
         $query5="SELECT SUM(p_payment) AS p_payment FROM tbl_payment WHERE p_type = 1 and p_date ='".$date2."'";
		$result5 = mysqli_query($mysqli,$query5);
		$row5 = mysqli_fetch_assoc($result5); 
        $today_payment = $row5['p_payment'];
        
        $qry_pdf="SELECT COUNT(*) as num FROM tbl_registration";
        $total_pdf = mysqli_fetch_array(mysqli_query($mysqli,$qry_pdf));
        $total_user = $total_pdf['num'];

	   $set['GAME_APP'][]=array('today_bet' => $sum, 'wallet' => $wallet,'today_won' => $today_won, 'today_loss' => $today_loss,'today_payment' => $today_payment,'total_user' => $total_user,'success'=>'1');

		
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
		
		$set['GAME_APP'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }
 
  //test
else if(isset($_GET['test']))
 	{
 	   date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
       $date = date('Y-m-d');
 	    
  		 $jsonObj4= array();	
  		 
  		date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $date = date('Y-m-d');
         $m_id = $_POST['m_id'];
        $b_option = $_POST['b_option'];
        
  		 
       $query="SELECT SUM(b_points) as b_pointss, b_digit as b_digitt FROM tbl_bat WHERE b_type= 1 and b_date ='".$date."' and m_id ='".$m_id."' and b_option ='".$b_option." ' GROUP BY b_digit ORDER BY SUM(b_points) DESC ";
    

    		$sql = mysqli_query($mysqli,$query);
      		  
  		  
		while($data = mysqli_fetch_assoc($sql))
		{
			$row['b_pointss'] = $data['b_pointss'];
			$row['b_digitt'] = $data['b_digitt'];
			
  		  	array_push($jsonObj4,$row); 
		}
		
		$jsonObj5= array();	

       $query1="SELECT SUM(b_points) as b_pointss, b_digit as b_digitt FROM tbl_bat WHERE b_type= 2 and b_date ='".$date."' and m_id ='".$m_id."' and b_option ='".$b_option." ' GROUP BY b_digit ORDER BY SUM(b_points) DESC ";
    

    		$sql1 = mysqli_query($mysqli,$query1);
      		  
  		  
		while($data1 = mysqli_fetch_assoc($sql1))
		{
			$row1['b_pointss'] = $data1['b_pointss'];
			$row1['b_digitt'] = $data1['b_digitt'];
			
  		  	array_push($jsonObj5,$row1); 
		}
		
		
		 $jsonObj6= array();	
  		 

       $query2="SELECT SUM(b_points) as b_pointss, b_digit as b_digitt FROM tbl_bat WHERE   (b_type= 3 or b_type= 4 or b_type= 5 ) and  b_date ='".$date."' and m_id ='".$m_id."' and b_option ='".$b_option." ' GROUP BY b_digit ORDER BY SUM(b_points) DESC ";
    

    		$sql2 = mysqli_query($mysqli,$query2);
      		  
  		  
		while($data2 = mysqli_fetch_assoc($sql2))
		{
			$row2['b_pointss'] = $data2['b_pointss'];
			$row2['b_digitt'] = $data2['b_digitt'];
			
  		  	array_push($jsonObj6,$row2); 
		}
  		  
  		  $set['GAME_APP1'] = $jsonObj4;	
  		  $set['GAME_APP2'] = $jsonObj5;	
  		  $set['GAME_APP3'] = $jsonObj6;	
  		  

		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
 }

else if(isset($_GET['get_notification']))
{
    	 $jsonObj4= array();	
       $query="SELECT * FROM tbl_notification ORDER BY tbl_notification.id DESC LIMIT 10";
 

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['id'] = $data['id'];
			$row['date'] = $data['date'];
			$row['msg'] = $data['msg'];
			$row['image'] = $data['image'];
		

			array_push($jsonObj4,$row);
		
		}
				$set['GAME_APP'] = $jsonObj4;	

		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


?>