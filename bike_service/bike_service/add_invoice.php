<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
	 
	 $qry1="SELECT * FROM tbl_users order by name";
$results1=mysqli_query($mysqli,$qry1);

	 $qry2="SELECT * FROM tbl_service order by s_name";
$results2=mysqli_query($mysqli,$qry2);

	if(isset($_POST['submit']) and isset($_GET['add']))
	{		
			  
			$data = array(
		
			'srprovider_id'  =>  $_POST['srprovider_id'],
			'bikedetails_id'  =>  $_POST['bikedetails_id'],
			'u_id'  =>  $_POST['u_id'],
			'o_id'  =>  $_POST['o_id'],
			'order_details'  =>  $_POST['order_details'],
				'i_total_amount'  =>  $_POST['i_total_amount'],
			'i_date'  =>  $_POST['i_date'],
			'i_status'  => 1,
		
			);

			$qry = Insert('tbl_invoice',$data);

		
			$_SESSION['msg']="10";
			header("location:manage_invoice.php");	 
			exit;
		
	}
	//INSERT INTO `tbl_invoice`(`i_id`, `srprovider_id`, `bikedetails_id`, `u_id`, `o_id`, `order_details`, `i_total_amount`, `i_date`, `i_status`)

	if(isset($_GET['i_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_invoice
						 left join tbl_users on tbl_users.id =tbl_invoice.u_id
						 left join tbl_service on tbl_service.s_id =tbl_invoice.srprovider_id
						  left join tbl_bike on tbl_bike.bk_id =tbl_invoice.bikedetails_id
						 left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
                    	 left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
			where i_id='".$_GET['i_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
	if(isset($_POST['submit']) and isset($_POST['i_id']))
	{
		  
		$data = array(
		
	       	'srprovider_id'  =>  $_POST['srprovider_id'],
			'bikedetails_id'  =>  $_POST['bikedetails_id'],
			'u_id'  =>  $_POST['u_id'],
			'o_id'  =>  $_POST['o_id'],
			'order_details'  =>  $_POST['order_details'],
				'i_total_amount'  =>  $_POST['i_total_amount'],
			'i_date'  =>  $_POST['i_date'],

			);
 
		
		   $user_edit=Update('tbl_book', $data, "WHERE i_id = '".$_POST['i_id']."'");
		 
			if ($user_edit > 0){
				
				$_SESSION['msg']="11";
				header("Location:add_book.php?i_id=".$_POST['i_id']);
				exit;
			} 	
		
	 
	}
	
	
?>
 	<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['i_id'])){?>Edit<?php }else{?>Add<?php }?> Invoice</div>
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
            	<input  type="hidden" name="i_id" value="<?php echo $_GET['i_id'];?>" />

              <div class="section">
                <div class="section-body">
                      <div class="form-group">
                    <label class="col-md-3 control-label">User Name :-</label>
                    <div class="col-md-6">
                        <input type="text" name="name" id="name" value="<?php if(isset($_GET['i_id'])){echo $user_row['name'];}?>" class="form-control" readonly>


                    </div>
                  </div>
                  
                    <div class="form-group">
                    <label class="col-md-3 control-label">Service Name :-</label>
                    <div class="col-md-6">
                     <select name="srprovider_id" id="srprovider_id"  class="select2" disabled>
                       <option value="">--Select service Name--</option>
              
                              <?php
                               
                              
                                 while ($row2=mysqli_fetch_array($results2)) 
                                 {
                            
                                  ?>

                                 <option value="<?php echo $row2['s_id'];?>" 

                                <?php if($user_row['srprovider_id']==$row2['s_id']){?>selected<?php }?>

                                  > <?php echo $row2['s_name'];?></option>
                                <?php
                                }
                                 
                              ?>
                     
                            </select>

                    </div>
                  </div>

	
                  <div class="form-group">
                    <label class="col-md-3 control-label">Brands :-</label>
                    <div class="col-md-6">
                        
                      <input type="text" name="bike_id" id="bike_id" value="<?php if(isset($_GET['i_id'])){echo $user_row['bb_name'];}?>" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Bike Brand :-</label>
                    <div class="col-md-6">
                      <input type="text" name="bike_brand" id="bike_brand" value="<?php if(isset($_GET['i_id'])){echo $user_row['bn_name'];}?>" class="form-control" readonly>
                    </div>
                  </div>
               
                <div class="form-group">
                    <label class="col-md-3 control-label">Date:-</label>
                    <div class="col-md-6">
                      <input type="text" name="i_date" id="i_date" value="<?php if(isset($_GET['i_id'])){echo $user_row['i_date'];}?>" class="form-control" readonly>
                    </div>
                  </div>
		

                  <div class="form-group">
                    <label class="col-md-3 control-label">Order id :-</label>
                    <div class="col-md-6">
                      <input type="text" name="o_id" id="o_id" value="<?php if(isset($_GET['i_id'])){echo $user_row['o_id'];}?>" class="form-control" readonly>
                    </div>
                  </div>
         

                   
        <div class="form-group">
                <label class="col-md-2 control-label">Order details :-</label>
                <div class="col-md-8">
             <table id="t01" style="width:100%" border=1>
                 <tr>
                     <th>Service Name</th>
                      <th>Service price</th>
                </tr>
           
                      <?php 

             	$someArray = json_decode($user_row['order_details'], true);
            for ($x = 0; $x <= count($someArray)-1 ; $x++) {
                    


                    echo "<tr>";
              
                    echo  "<td>".$someArray[$x]["service_name"]."</td>";
                    echo  "<td>".$someArray[$x]["service_price"]."</td>";
                    echo "</tr>";
          
            }
            
          
       ?>
       

               
                
             </table>
        </div>
    </div>                 
    
    
    <br><br>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">Total Amount:-</label>
                    <div class="col-md-6">
                      <input type="text" name="i_total_amount" id="i_total_amount" value="<?php if(isset($_GET['i_id'])){echo $user_row['i_total_amount'];}?>" class="form-control" readonly>
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