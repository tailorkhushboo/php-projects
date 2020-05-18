<?php include('includes/header.php'); 

    include('includes/function.php');
	include('language/language.php');  


	if(isset($_POST['user_search']))
	 {
		 
	$user_qry="SELECT * FROM tbl_service WHERE tbl_service.s_name like '%".addslashes($_POST['search_value'])."%' or tbl_service.s_email like '%".addslashes($_POST['search_value'])."%' ORDER BY tbl_service.s_id DESC";  
							 
		$users_result=mysqli_query($mysqli,$user_qry);
		
		 
	 }
	 else
	 {
	 
							$tableName="tbl_service";		
							$targetpage = "manage_service.php"; 	
							$limit = 150; 
							
							$query = "SELECT COUNT(*) as num FROM $tableName";
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
							
							
						 $users_qry="SELECT * FROM tbl_service
						 where tbl_service.s_status=0
						 ORDER BY tbl_service.s_id DESC LIMIT $start, $limit";  
							 
							$users_result=mysqli_query($mysqli,$users_qry);
							
	 }
	if(isset($_GET['s_id']))
	{
		  
		 
		Delete('tbl_service','s_id='.$_GET['s_id'].'');
		
		$_SESSION['msg']="12";
		header( "Location:manage_padding_service.php");
		exit;
	}
	
	//Active and Deactive status
	if(isset($_GET['status_deactive_id']))
	{
		$data = array('s_status'  =>  '0');
		
		$edit_status=Update('tbl_service', $data, "WHERE s_id = '".$_GET['status_deactive_id']."'");
		
		 $_SESSION['msg']="14";
		 header( "Location:manage_padding_service.php");
		 exit;
	}
	
	if(isset($_GET['status_active_id']))
	{
	        
	        $s_id = $_GET['status_active_id'] ;
		
	       $qry1 = "SELECT * FROM tbl_service WHERE s_id = '".$s_id."' ";  
			$result1 = mysqli_query($mysqli,$qry1);
			$row1 = mysqli_fetch_assoc($result1);
			$num_rows = mysqli_num_rows($result1);
    
    		
        	if ($num_rows > 0 )
	    	{
	    	    $phone_number =  $row1['s_phone'] ;
	    	   $s_name =  $row1['s_name'] ;
    	      
    		    $api_key = '25CD9A36FA1FD3';
                $contacts = $phone_number;
                $from = 'TXTDMO';
                $msg ="Congratulations, Your Garage / Shop ".$s_name." Approved for Listing in FortySix - Please Update all Info about your Shop. You can refer your friends to use FortySix Mobile App.";
                $sms_text = urlencode($msg);
                
                //Submit to server
                
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, "https://sms.textmysms.com/app/smsapi/index.php");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
                $response = curl_exec($ch);
                curl_close($ch);
    	            
		    }
		    
		    
		$data = array('s_status'  =>  '1');
		
		$edit_status=Update('tbl_service', $data, "WHERE s_id = '".$s_id."'");
		
	
		$_SESSION['msg']="13";
		 header( "Location:manage_padding_service.php");
		 exit;
	}
	
	
?>


 <div class="row">
      <div class="col-xs-12">
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Manage Padding Service</div>
            </div>
            <div class="col-md-7 col-xs-12">              
                  <div class="search_list">
                    <div class="search_block">
                      <form  method="post" action="">
                        <input class="form-control input-sm" placeholder="Search..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                        <button type="submit" name="user_search" class="btn-search"><i class="fa fa-search"></i></button>
                      </form>  
                    </div>
                    <!--<div class="add_btn_primary"> <a href="add_service.php?add">Add Service List</a> </div>-->
                  </div>
                  
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
          <div class="col-md-12 mrg-top">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                     <th> id</th>
                  <th>Post Type</th>
                  <th>Name</th>
                  <th>Email</th>				 
				  <th>password</th>
				  <th>Phone</th>
				  <th>Status</th>	 
                  <th class="cat_action_list">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php
						$i=0;
						while($users_row=mysqli_fetch_array($users_result))
						{
						 
				?>
                <tr>
                      <td><?php echo $users_row['s_id'];?></td>
                     <td><?php if($users_row['s_post_type']==0){echo 'None';}
                     else if($users_row['s_post_type']==1){echo 'Featured';}
                      else if($users_row['s_post_type']==2){echo 'Sponsored';}
                     ?></td>
                   <td><?php echo $users_row['s_name'];?></td>
                   <td><?php echo $users_row['s_email'];?></td>
                   <td><?php echo $users_row['s_password'];?></td>
		           <td><?php echo $users_row['s_phone'];?></td>
		           <td>
		          		<?php if($users_row['s_status']!="0"){?>
		              <a href="manage_padding_service.php?status_deactive_id=<?php echo $users_row['s_id'];?>" title="Change Status"><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Enable</span></span></a>

		              <?php }else{?>
		              <a href="manage_padding_service.php?status_active_id=<?php echo $users_row['s_id'];?>" title="Change Status"><span class="badge badge-danger badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Disable </span></span></a>
		              <?php }?>
              		</td>
                   <td>
                       
                       <a href="add_service.php?s_id=<?php echo $users_row['s_id'];?>" class="btn btn-primary">Edit</a>
                    <a href="manage_padding_service.php?s_id=<?php echo $users_row['s_id'];?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-default">Delete</a></td>
                </tr>
               <?php
						
						$i++;
						}
			   ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-12 col-xs-12">
            <div class="pagination_item_block">
              <nav>
              	<?php if(!isset($_POST["search"])){ include("pagination.php");}?>                 
              </nav>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>     



<?php include('includes/footer.php');?>                  