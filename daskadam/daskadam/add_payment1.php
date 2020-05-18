<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
	 
	 $cat_qry="SELECT * FROM `tbl_users` ORDER BY id";
	 $cat_result=mysqli_query($mysqli,$cat_qry); 
	 
	 	 $cat_qry="SELECT * FROM `tbl_membership_plan` ORDER BY id";
	 $cat_result2=mysqli_query($mysqli,$cat_qry); 
	 
	$cat_qry="SELECT * FROM `tbl_payment_transaction` ";
	  $cat_result3=mysqli_query($mysqli,$cat_qry); 
	  $user_row1=mysqli_fetch_assoc($cat_result3);


 	if(isset($_POST['submit']) and isset($_GET['add']))
 	{		
 	    
     	  date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
         $date = date('d-m-Y');
 
		 
		 $orderid= $_POST['orderid'];
		 $userid=$_POST['user_id'];


		$qry2 = "SELECT * FROM tbl_payment_transaction WHERE user_id = '".$userid."'"; 
		$result2 = mysqli_query($mysqli,$qry2);
		$num_rows2 = mysqli_num_rows($result2);
		$row2 = mysqli_fetch_assoc($result2);
		
    	if ($num_rows2 > 0)
	    {
	        	  
	
 			$data = array(
			'orderid'  =>  $userid,
			'bankname'  =>  'manual',
			'txtstatus'  => 'TXN_SUCCESS',
			'txtid'  => $userid,
			'txtdate'  =>  $date,
			'txtamount'  => 'manual',
			'currency'  =>  'INR',
			
			);
	    
		
 		   $user_edit=Update('tbl_payment_transaction', $data, "WHERE user_id = '".$userid."'");
 		   
 		   
 		   	$data1 = array(
			'payment_verify'  =>  1
			);
		
 		   $user_edit=Update('tbl_users', $data1, "WHERE id = '".$userid."'");
 		   
	    }else
	    {
	        
	 
	 
		$data = array(
		    'user_id'  =>  $userid,
			'email'  =>  $_POST['email'],
			'orderid'  =>  $userid,
				'checksum'  => $userid,
			'bankname'  =>  'manual',
				'txtstatus'  => 'TXN_SUCCESS',
			'txtid'  => $userid,
				'txtdate'  =>  $date,
				'txtamount'  => $m,
			'currency'  =>  'INR',
				'payment_mode'  => 'PPI',
			'res_code'  =>  '01',
				'res_msg'  =>  'Txn Success',
			'status'  =>  '1'
			);

			$qry = Insert('tbl_payment_transaction',$data);
			
			
			$data1 = array(
			'payment_verify'  =>  1
			);
		
 		   $user_edit=Update('tbl_users', $data1, "WHERE id = '".$userid."'");


	    }
			$_SESSION['msg']="10";
			header("location:manage_payment.php");	 
			exit;
		
	}
	
	
	if(isset($_GET['plan_id']))
 	{
			 
 			$user_qry="SELECT * FROM tbl_payment_transaction where tid='".$_GET['plan_id']."'";
 			$user_result=mysqli_query($mysqli,$user_qry);
 			$user_row=mysqli_fetch_assoc($user_result);
		
 	}
	

	
	
	
?>





 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['plan_id'])){?>Edit<?php }else{?>Add<?php }?> Payment</div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row mrg-top">
            <div class="col-md-12">
               
              <div class="col-md-12 col-sm-12">
                <?php if(isset($_SESSION['msg'])){?> 
               	 <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                	<?php echo $client_lang[$_SESSION['msg']] ; ?></a> </div>
                <?php unset($_SESSION['msg']);}?>	
              </div>
            </div>
          </div>
          <div class="card-body mrg_bottom"> 
            <form action="" name="addedituser" method="post" class="form form-horizontal" enctype="multipart/form-data" >
            	<input  type="hidden" name="plan_id" value="<?php echo $_GET['plan_id'];?>" />
                <input  type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
              <div class="section">
                <div class="section-body">
                    
               
               
                  
           <div class="form-group">
                    <label class="col-md-3 control-label">Email_id :-</label>
                    <div class="col-md-6" >
                    
                      <input type="text" name="email" id="email" value="<?php if(isset($_GET['plan_id'])){echo $user_row['email'];}?>" class="form-control" required>
                    </div>
                  </div>
            </div>
            
                <div class="form-group">
                    <label class="col-md-3 control-label">User_id :-</label>
                    <div class="col-md-6">
                    
                      <input type="text" name="user_id" id="user_id" value="<?php if(isset($_GET['plan_id'])){echo $user_row['user_id'];}?>" class="form-control" required>
                    </div>
                  </div>
            </div>          
                        
           
         
             
                   
                  <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   

<?php include('includes/footer.php');?>                  


	                , network='".$newnetwork."'