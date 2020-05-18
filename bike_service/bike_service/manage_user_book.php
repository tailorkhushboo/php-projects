<?php include('includes/header.php'); 

    include('includes/function.php');
	include('language/language.php');  


	if(isset($_POST['user_search']))
	 {
		 
		
		$user_qry="SELECT * FROM tbl_book 
			 left join tbl_users on tbl_users.id =tbl_book.u_id
						 left join tbl_service on tbl_service.s_id =tbl_book.s_id
						  left join tbl_bike on tbl_bike.bk_id =tbl_book.bike_id
						 left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
                    	 left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
                    	 left join tbl_invoice on tbl_invoice.i_id = tbl_book.invoice_id
		WHERE tbl_users.name like '%".addslashes($_POST['search_value'])."%' ORDER BY tbl_book.b_id DESC";  
							 
		$users_result=mysqli_query($mysqli,$user_qry);
		
		 
	 }
	 else
	 {
	 
							$tableName="tbl_book";		
							$targetpage = "manage_book.php"; 	
							$limit = 15; 
							
							$query = "SELECT COUNT(*) as num FROM $tableName where tbl_book.u_id='".$_GET['id']."' ";
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
							
							
					 $users_qry="SELECT * FROM tbl_book
						 left join tbl_users on tbl_users.id =tbl_book.u_id
						 left join tbl_service on tbl_service.s_id =tbl_book.s_id
						  left join tbl_bike on tbl_bike.bk_id =tbl_book.bike_id
						 left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
                    	 left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
                    	 left join tbl_invoice on tbl_invoice.i_id = tbl_book.invoice_id where tbl_book.u_id='".$_GET['id']."'
						 ORDER BY tbl_book.b_id DESC LIMIT $start, $limit";  
							 
							$users_result=mysqli_query($mysqli,$users_qry);
							
	 }
	if(isset($_GET['b_id']))
	{
		  
		 
		Delete('tbl_book','b_id='.$_GET['b_id'].'');
		
		$_SESSION['msg']="12";
		header( "Location:manage_book.php");
		exit;
	}
	
	//Active and Deactive status
	if(isset($_GET['status_deactive_id']))
	{
		$data = array('b_status'  =>  '0');
		
		$edit_status=Update('tbl_book', $data, "WHERE b_id = '".$_GET['status_deactive_id']."'");
		
		 $_SESSION['msg']="14";
		 header( "Location:manage_book.php");
		 exit;
	}
	if(isset($_GET['status_active_id']))
	{
		$data = array('b_status'  =>  '1');
		
		$edit_status=Update('tbl_book', $data, "WHERE b_id = '".$_GET['status_active_id']."'");
		
		$_SESSION['msg']="13";
		 header( "Location:manage_book.php");
		 exit;
	}
	
	
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



 <div class="row">
      <div class="col-xs-12">
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Manage User Book</div>
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
                    <th>No</th>
                      <th>order id</th>
                  <th>User Name</th>
				  <th>Bike Name</th>
				  <th>Bike No</th>
				  <th> Type </th>
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
                <td><?php echo $i+1 ;?></td>
                    <td><?php echo $users_row['b_id'];?></td>
                   <td><?php echo $users_row['name'];?></td>
		           <td><?php echo $users_row['bb_name'];?></td>
		            <td><?php echo $users_row['bk_number'];?></td>
		           <td><?php if($users_row['b_type']==1){echo 'Accept';}
		           else if($users_row['b_type']==2){echo 'Reject';}?></td>
		           <td>
		          		<?php if($users_row['b_status']!="0"){?>
		              <a href="manage_book.php?status_deactive_id=<?php echo $users_row['b_id'];?>" title="Change Status"><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Enable</span></span></a>

		              <?php }else{?>
		              <a href="manage_book.php?status_active_id=<?php echo $users_row['b_id'];?>" title="Change Status"><span class="badge badge-danger badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Disable </span></span></a>
		              <?php }?>
              		</td>
                   <td>
                          <a class="btn btn-warning" data-toggle="modal" data-target="#viewinvoice_<?php echo $users_row['b_id']; ?>">View</a>
                       <a href="add_book.php?b_id=<?php echo $users_row['b_id'];?>" class="btn btn-primary">Edit</a>
                    <a href="manage_book.php?b_id=<?php echo $users_row['b_id'];?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-default">Delete</a></td>
                </tr>
                
                
               <?php
						
						$i++;
						if($users_row['invoice_id']== 0)
						{
				
			   ?>
			     <div id="viewinvoice_<?php echo $users_row['b_id'];  ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Invoice </h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                   
                        
                          <div class="col-md-12">
                              <div class="col-md-6">
                                  <label> User Name </label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['']; ?></p>
                              </div>  
                           </div>
                             
                            <div class="col-md-12">
                              <div class="col-md-6">
                                  <label> Date </label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['']; ?></p>
                              </div>  
                           </div>
                            <div class="col-md-12">
                              <div class="col-md-6">
                                  <label>Service Name</label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['']; ?></p>
                              </div>  
                           </div>
                             <div class="col-md-12">
                              <div class="col-md-6">
                                  <label> Brands Name </label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['']; ?></p>
                              </div>  
                           </div>
                          <div class="col-md-12">
                              <div class="col-md-6">
                                  <label> Bike Name </label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['']; ?></p>
                              </div>  
                           </div>
                                   
                           
                            <div class="col-md-12">
                              <div class="col-md-6">
                                  <label> Total Amount</label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['']; ?></p>
                              </div>  
                           </div>
                         
                       
              
                             
                        </div>                  
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
                
                 <?php        
              }else
              {
						
						
        ?> 
           <div id="viewinvoice_<?php echo $users_row['b_id'];  ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Invoice </h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                   
                        <div class="col-md-12">
                              <div class="col-md-6">
                                  <label> User Name </label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['name']; ?></p>
                              </div>  
                           </div>
                               
                            <div class="col-md-12">
                              <div class="col-md-6">
                                  <label> Date </label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['i_date']; ?></p>
                              </div>  
                           </div>
                        
                            <div class="col-md-12">
                              <div class="col-md-6">
                                  <label>Service Name</label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['s_name']; ?></p>
                              </div>  
                           </div>
                           <div class="col-md-12">
                              <div class="col-md-6">
                                  <label> Brands Name </label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['bb_name']; ?></p>
                              </div>  
                           </div>
                          <div class="col-md-12">
                              <div class="col-md-6">
                                  <label> Bike Name </label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['bn_name']; ?></p>
                              </div>  
                           </div>
                                     
                           
                               <div class="col-md-12">
                              <div class="col-md-6">
                                  <label> Order Details </label>
                              </div>
                              <div class="col-md-6">
                                  </div>
                              </div>
                              
                              
                          
                                         
                            <div class='col-md-12' > 
             <?php 

                $someArray = json_decode($users_row['order_details'], true);
            for ($x = 0; $x <= count($someArray)-1 ; $x++) {
       

           //   echo "<table><tr><th>Service Name</th><th>Service Price</th></tr><tr><td>".$someArray[$x]["service_name"]."</td><td>".$someArray[$x]["service_price"]."</td></tr></table>" ;
           
            echo "<div class='col-md-5 service_name' >" ;
             echo  $someArray[$x]["service_name"]  ;
             echo "</div>" ;
             
                     
            echo "<div class='col-md-5 service_price'>";
             echo  $someArray[$x]["service_price"]  ;
             echo "</div>" ;
      

            }
            ?>
            </div>
            
                         
                            <div class="col-md-12" style ="padding-top: 10px;">
                              <div class="col-md-6">
                                  <label> Total Amount </label>
                              </div>
                              <div class="col-md-6">
                                  <p><?php echo $users_row['i_total_amount']; ?></p>
                              </div>  
                           </div>
                       
                       
                       
              
                             
                                  
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
        <?php }
        }?>
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