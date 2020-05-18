<?php include('includes/header.php'); 

    include('includes/function.php');
	include('language/language.php');  

	if(isset($_GET['id']))
	{
			 
			$user_qry="SELECT * FROM tbl_book 
			left join tbl_users on tbl_users.id = tbl_book.u_id
			left join tbl_bike on tbl_bike.bk_id = tbl_book.bike_id
			left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
            left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
            left join tbl_service on tbl_service.s_id = tbl_book.s_id
            left join tbl_invoice on tbl_invoice.i_id = tbl_book.invoice_id
			where tbl_book.u_id='".$_GET['id']."' ";
			$users_result=mysqli_query($mysqli,$user_qry);

		
	}
	


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



 <div class="row">
      <div class="col-xs-12">
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">View Booking Details</div>
            </div>
            <div class="col-md-7 col-xs-12">              
                  <div class="search_list">
                    <div class="search_block">
                      <form  method="post" action="">
                        <!--<input class="form-control input-sm" placeholder="Search..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>-->
                        <!--<button type="submit" name="user_search" class="btn-search"><i class="fa fa-search"></i></button>-->
                      </form>  
                    </div>
                   
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

          <div class="col-md-12 mrg-top" style="
    overflow: scroll;
">
              
            <table class="table table-striped table-bordered table-hover">
                
              <thead>
                <tr>
                  <th>User Name</th>
                  <th> Date </th>
                  <th>Invoice </th>
                  <th>Serive Name</th>
                  <th> Bike Brands </th>
				  <th>Bike Name</th>
		        <th>General Service</th>
		        <th>Change oil</th>
		        <th>Bike Repair</th>
		        <th>Bike Polish</th>
		        <th>Bike Engine</th>
		        <th>Bike Water</th>
		        <th>Bike Electrical</th>
                <th>Total Amount</th>
                </tr>
              </thead>
              <tbody>
              	<?php
						$i=0;
						while($users_row=mysqli_fetch_array($users_result))
						{
						 
				?>
                <tr>
                    
                   <td><?php echo $users_row['name'];?></td>
                   <td><?php echo $users_row['date'];?></td>
                   
                    <td><?php   	
                    
                    $someArray = json_decode($users_row['order_details'], true);
            
            for ($x = 0; $x <= count($someArray)-1 ; $x++) {
                    


                
              
                    echo  "ServiceName:-".$someArray[$x]["service_name"]."<br />";
                    echo  "ServicePrice:-".$someArray[$x]["service_price"]."<br />";
                    echo "";
          
            }?></td>
		           <td><?php echo $users_row['s_name'];?></td>
		           <td><?php echo $users_row['bb_name'];?></td>
		           <td><?php echo $users_row['bn_name'];?></td>
		           <td><?php if( $users_row['bike_gn_service']==0){ echo 'NO';}
		            else if( $users_row['bike_gn_service']==1){ echo 'YES';}
		            ?></td>
		              <td><?php if( $users_row['bike_oil']==0){ echo 'NO';}
		            else if( $users_row['bike_oil']==1){ echo 'YES';}
		            ?></td>
		            
		              <td><?php if( $users_row['bike_repair']==0){ echo 'NO';}
		            else if( $users_row['bike_repair']==1){ echo 'YES';}
		            ?></td>
		            
		             <td><?php if( $users_row['bike_polish']==0){ echo 'NO';}
		            else if( $users_row['bike_polish']==1){ echo 'YES';}
		            ?></td>
		            
		            <td><?php if( $users_row['bike_engine']==0){ echo 'NO';}
		            else if( $users_row['bike_engine']==1){ echo 'YES';}
		            ?></td>
		            
		             <td><?php if( $users_row['bike_water']==0){ echo 'NO';}
		            else if( $users_row['bike_water']==1){ echo 'YES';}
		            ?></td>
		            
		            <td><?php if( $users_row['bike_electrical']==0){ echo 'NO';}
		            else if( $users_row['bike_electrical']==1){ echo 'YES';}
		            ?></td>
		             <td><?php echo $users_row['i_total_amount'];?></td>

		       </tr>
		       
		         
                
                
               <?php
						
						$i++;
						}
			   ?>
		
                 <?php        
            
						
						
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