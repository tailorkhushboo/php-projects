<?php include('includes/header.php'); 

    include('includes/function.php');
	include('language/language.php');  

	if(isset($_GET['u_id']))
	{
			 
			 $user_qry="SELECT * FROM tbl_bike 
		 		left join tbl_users on tbl_users.id = tbl_bike.u_id
			left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
            left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
            where tbl_bike.u_id='".$_GET['u_id']."'
	       order by bk_id desc";
			$users_result=mysqli_query($mysqli,$user_qry);

		
	}
	


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



 <div class="row">
      <div class="col-xs-12">
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">View Bike Details</div>
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
                  <th> Bike Type </th>
                  <th>Brands Name </th>
                    <th>Brands Image </th>

		        <th>Bike Name</th>
		        <th>Bike Image </th>
		      <th> Bike Number </th>

	
	
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
                    <td><?php if($users_row['bk_type']==1){echo 'Motorcycle';}
		           else if($users_row['bk_type']==2){echo 'Moped';}?></td>   
                   
              
		           <td><?php echo $users_row['bb_name'];?></td>
		              <td><span class="category_img"><img src="images/thumbs/<?php echo $users_row['bb_image'];?>" /></span></td>
		              
		              <td><?php echo $users_row['bn_name'];?></td>
		             <td><span class="category_img"><img src="images/thumbs/<?php echo $users_row['bn_image'];?>" /></span></td>

		           <td><?php echo $users_row['bk_number'];?></td>
		  
		  

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