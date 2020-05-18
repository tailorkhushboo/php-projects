<?php include('includes/header.php'); 

    include('includes/function.php');
	include('language/language.php');  


	if(isset($_GET['m_id']) and isset($_GET['b_date']) and isset($_GET['b_option']))
  {   

         $m_id=$_GET['m_id'];

      $b_option=$_GET['b_option'];
       $b_date=$_GET['b_date'];
 
       $quotes_qqry="SELECT * FROM tbl_bat
						 left join tbl_market on tbl_market.m_id=tbl_bat.m_id
				 		 left join tbl_registration on tbl_registration.user_id = tbl_bat.user_id
					     WHERE tbl_bat.m_id='".$m_id."' AND tbl_bat.b_option='".$b_option."' AND tbl_bat.b_date='".$b_date."'
				 		 ORDER BY tbl_bat.b_id DESC";
    
       //  echo  $quotes_qry="SELECT * FROM tbl_bat
						 // left join tbl_market on tbl_market.m_id=tbl_bat.m_id
						 // left join tbl_registration on tbl_registration.user_id = tbl_bat.user_id
						 // WHERE tbl_bat.m_id='".$m_id."' AND tbl_bat.b_date='".$b_date."'
						 // ORDER BY tbl_bat.b_id DESC";

    $result=mysqli_query($mysqli,$quotes_qqry); 

   }
else
  
   {
	 
							$tableName="tbl_bat";		
							$targetpage = "manage_bat.php"; 	
							$limit = 15; 
							
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
							
							
						 $users_qry="SELECT * FROM tbl_bat
						 left join tbl_market on tbl_market.m_id=tbl_bat.m_id
						 left join tbl_registration on tbl_registration.user_id = tbl_bat.user_id
						 WHERE tbl_bat.b_id
						 ORDER BY tbl_bat.b_id DESC LIMIT $start, $limit";  
							 
							$result=mysqli_query($mysqli,$users_qry);
							
	 }
	if(isset($_GET['b_id']))
	{
		  
		 
		Delete('tbl_bat','b_id='.$_GET['b_id'].'');
		
		$_SESSION['msg']="12";
		header( "Location:manage_bat.php");
		exit;
	}
	
	//Active and Deactive status
	if(isset($_GET['status_deactive_id']))
	{
		$data = array('b_status'  =>  '0');
		
		$edit_status=Update('tbl_bat', $data, "WHERE b_id = '".$_GET['status_deactive_id']."'");
		
		 $_SESSION['msg']="14";
		 header( "Location:manage_bat.php");
		 exit;
	}
	if(isset($_GET['status_active_id']))
	{
		$data = array('b_status'  =>  '1');
		
		$edit_status=Update('tbl_bat', $data, "WHERE b_id = '".$_GET['status_active_id']."'");
		
		$_SESSION['msg']="13";
		 header( "Location:manage_bat.php");
		 exit;
	}
	
	
?>


 <div class="row">
      <div class="col-xs-12">
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Manage Bat</div>
            </div>
            <div class="col-md-7 col-xs-12">              
                  <div class="search_list">
                    <div class="search_block">
                      <form  method="post" action="">
                        <input class="form-control input-sm" placeholder="Search..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                        <button type="submit" name="user_search" class="btn-search"><i class="fa fa-search"></i></button>
                      </form>  
                    </div>
                    <div class="add_btn_primary"> <a href="add_bat.php?add">Add Bat</a> </div>
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
              <form action="" name="frm_filter" method="GET" class="form form-horizontal" enctype="multipart/form-data">

            <div class="col-md-3 col-xs-12">
            <!--     <div style="float: left;margin-left: 10px">-->
                  <div class="search_list" style="padding: 0px 0px 5px;float: left;margin-left: 20px"> 
                    <br> <div> <h4 style="float: right;   ">Market:|</h4>   </div>
                   <div style="    margin-left: 10px; "> 
                      <select name="m_id" id="m_id" class="form-control filter_category" required 
                      style=" margin-top: 5px; ">
                         <option value="">Market Filter</option>
                          <?php
                            $cat_qry="SELECT * FROM tbl_market ORDER BY m_name";
                            $cat_result=mysqli_query($mysqli,$cat_qry);
                             while($cat_row=mysqli_fetch_array($cat_result))
                              {
                          ?> 

                               <option value="<?php echo $cat_row['m_id'];?>" <?php if(isset($_GET['m_id']) && $_GET['m_id']==$cat_row['m_id']) {echo 'selected';} ?>><?php echo $cat_row['m_name'];?></option> 

                        <!--  <option value="<?php echo $cat_row['cid'];?>" 

                                <?php if($row['c_id']==$cat_row['cid']){?>selected<?php }?>

                                  > <?php echo $cat_row['category_name'];?></option> -->
                                <?php
                                }
                                 
                              ?>
                     
                            </select>
                   </div>
              <!--   </div>-->
              </div> 
           </div>
         
                          
          <div class="col-md-3 col-xs-12">
         
                  <div class="search_list" style="padding: 0px 0px 5px;float: left;margin-left: 20px"> 
                    <br> <div> <h4 style="float: right;   ">Option:|</h4>   </div>
                   <div style="    margin-left: 10px; "> 
                      <select name="b_option" id="b_option" class="form-control filter_category" required 
                      style=" margin-top: 5px; ">
                         <option value="">Option Filter</option>
                                    
                           <option value="1" <?php  
                           if(($_GET['b_option']) == 1){echo "selected"; } ?>  >open</option>
                            
                            <option value="2" <?php 
                           if(($_GET['b_option']) == 2){echo "selected"; } ?>  >Close</option>

                     
                            </select>
                   </div>
        
              </div> 
           </div> 

            <div class="col-md-3 col-xs-12">
            <!--     <div style="float: left;margin-left: 10px">-->
                  <div class="search_list" style="padding: 0px 0px 5px;float: left;margin-left: 20px"> 
                    <br> <div> <h4 style="float: right;   ">Date:|</h4>   </div>
                   <div style="    margin-left: 10px; "> 
                   		
                     	 <input type="date"  name="b_date" id="b_date" value="<?php if(($_GET['b_date'])){ echo $_GET['b_date']; } ?>" class="form-control" >

                     

                   </div>
              <!--   </div>-->
              </div> 
           </div>
             
          <div class="col-md-3 col-xs-12">
            <button type="submit" name="search_filter" class="btn btn-primary">Save</button>
          </div>
        </form>
          <div class="col-md-12 mrg-top">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>

                  <th>Market Name</th>	
                    <th>User Name</th>	
                   <th>Type</th>						 
				  <th>Option</th>
				   <th>Digit</th>
				   <th>Points</th>
				  <th>Date</th>
				  <th>Status</th>	 
                  <th class="cat_action_list">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php
						$i=0;
						while($users_row=mysqli_fetch_array($result))
						{
						 
				?>
                <tr>
                   <td><?php echo $users_row['m_name'];?></td>
                   <td><?php echo $users_row['name'];?></td>
                    <td><?php if($users_row['b_type']=="1")
                    {
                    	echo "Single Digits";
                    }else if($users_row['b_type']=="2")
                    {
                    	echo "Jodi Digits";
                    }else if($users_row['b_type']=="3")
                    {
                    	echo "Single Pana";
                    }else if($users_row['b_type']=="4")
                    {
                    	echo "Double Pana";
                    }else if($users_row['b_type']=="5")
                    {
                    	echo "Tripal Pana";
                    }
					?></td>
		           <td><?php if($users_row['b_option']=="1")
		           			{
		           				echo "Open";
		           			}else if($users_row['b_option']=="2")
		           			{
		           				echo "Close";
		           			}
		           ?></td>   
		           
		           <td><?php  echo $users_row['b_digit'];?></td>
		           <td><?php  echo $users_row['b_points'];?></td>
		             <td><?php echo $users_row['b_date'];?></td>
		           <td>
		          		<?php if($users_row['b_status']!="0"){?>
		              <a href="manage_bat.php?status_deactive_id=<?php echo $users_row['b_id'];?>" title="Change Status"><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Enable</span></span></a>

		              <?php }else{?>
		              <a href="manage_bat.php?status_active_id=<?php echo $users_row['b_id'];?>" title="Change Status"><span class="badge badge-danger badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Disable </span></span></a>
		              <?php }?>
              		</td>
                   <td><a href="add_bat.php?b_id=<?php echo $users_row['b_id'];?>" class="btn btn-primary">Edit</a>
                    <a href="manage_bat.php?b_id=<?php echo $users_row['b_id'];?>" onclick="return confirm('Are you sure you want to delete this bat?');" class="btn btn-default">Delete</a></td>
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