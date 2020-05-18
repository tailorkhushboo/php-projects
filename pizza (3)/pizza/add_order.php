<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
	 
  $qry1="SELECT * FROM `tbl_registration` ORDER BY f_name";
  $results1=mysqli_query($mysqli,$qry1);


	if(isset($_POST['submit']) and isset($_GET['add']))
	{		

 
			$data = array(
		
	  'user_id'  =>  $_POST['user_id'],
      'c_id'  =>  $_POST['c_id'],	
	  'sub_id'  =>  $_POST['sub_id'],
      'sub_sub_id'  =>  $_POST['sub_sub_id'],
      'a_id'  =>  $_POST['a_id'],
      'o_date'  =>  $_POST['o_date'],
      'o_time'  =>  $_POST['o_time'],
      'o_amount'  =>  $_POST['o_amount'],
      'o_type'  =>  $_POST['o_type'],
	  'o_status' => 1
			);

			$qry = Insert('tbl_order',$data);

		
			$_SESSION['msg']="10";
			header("location:manage_order.php");	 
			exit;
		
	}
	
	if(isset($_GET['o_id']))
	{
	
			
			 $user_qry="SELECT * FROM `tbl_order` 
		  LEFT JOIN tbl_adderss ON tbl_adderss.a_id =tbl_order.a_id 
		  LEFT JOIN tbl_registration on tbl_registration.id=tbl_order.user_id
		  LEFT JOIN tbl_promocode ON tbl_promocode.p_id =tbl_order.pro_id 
		  	where o_id='".$_GET['o_id']."' ";  
		  
		  
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
	if(isset($_POST['submit']) and isset($_POST['o_id']))
	{


	
			$data = array(

      'o_type'  =>  $_POST['o_type'],
	 
	 
			);
			$user_edit=Update('tbl_order', $data, "WHERE o_id = '".$_POST['o_id']."'");
		

		
		  
			if ($user_edit > 0){
				
				$_SESSION['msg']="11";
				header("Location:add_order.php?o_id=".$_POST['o_id']);
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
              <div class="page_title"><?php if(isset($_GET['o_id'])){?>Edit<?php }else{?>Add<?php }?>Order</div>
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
            	<input  type="hidden" name="o_id" value="<?php echo $_GET['o_id'];?>" />

              <div class="section">
                <div class="section-body">
                    
                    
                    
    <div class="form-group">
    <label class="col-md-3 control-label">user details:-</label>
    <div class="col-md-3">
      <input type="text" name="f_name" id="f_name" value="<?php if(isset($_GET['o_id'])){echo $user_row['f_name'];}?>" class="form-control" readonly>
    </div>
    <div class="col-md-3">
      <input type="text" name="mobile" id="mobile" value="<?php if(isset($_GET['o_id'])){echo $user_row['mobile'];}?>" class="form-control" readonly>
    </div>
  </div>
  
      <div class="form-group">
    <label class="col-md-3 control-label">Delhivery details:-</label>
    <div class="col-md-3">
      <input type="text" name="a_houser_no" id="a_houser_no" value="<?php if(isset($_GET['o_id'])){echo $user_row['a_houser_no'];}?>" class="form-control" readonly>
    </div>
    <div class="col-md-4">
      <input type="text" name="a_lendmark" id="a_lendmark" value="<?php if(isset($_GET['o_id'])){echo $user_row['a_lendmark'];}?>" class="form-control" readonly>
    </div>
     <div class="col-md-3"></div>
    <div class="col-md-6">
      <input type="text" name="a_adderss" id="a_adderss" value="<?php if(isset($_GET['o_id'])){echo $user_row['a_adderss'];}?>" class="form-control" readonly>
    </div>
   </div> 
  </div>
                    
        <div class="form-group">
                <label class="col-md-2 control-label">Order details :-</label>
                <div class="col-md-8">
             <table id="t01" style="width:100%" border=1>
                 <tr>
                     <th>categories</th>
                     <th>product</th>
             
                     <th>crust</th>
                     <th>topping</th>
                     <th>cheez</th>
                     <th>size</th>
                             <th>qunt</th>
                     <th>price</th>
                      <th>final price</th>
                </tr>
           
                      <?php 

             	$someArray = json_decode($user_row['order_details'], true);
            for ($x = 0; $x <= count($someArray)-1 ; $x++) {
                    
                    
        
    	      $query1="SELECT * FROM tbl_category WHERE c_id='".$someArray[$x]["cat"]."' ";
            $result1 = mysqli_query($mysqli,$query1);
            	$row1 = mysqli_fetch_assoc($result1);
            	$row2=$row1['c_name'];
            
             $query2="SELECT * FROM tbl_product WHERE p_id='".$someArray[$x]["product"]."' ";
             $result2 = mysqli_query($mysqli,$query2);
             	$row3 = mysqli_fetch_assoc($result2);
            	$row4=$row3['p_name'];

                    echo "<tr>";
                    echo  "<td>".$row2."</td>";
                    echo  "<td>".$row4."</td>";
                  
                    echo  "<td>".$someArray[$x]["crust"]."</td>";
                    echo  "<td>".$someArray[$x]["toppings"]."</td>";
                    echo  "<td>".$someArray[$x]["cheez"]."</td>";
                    echo  "<td>".$someArray[$x]["size"]."</td>";
                    echo  "<td>".$someArray[$x]["qunt"]."</td>";
                    echo  "<td>".$someArray[$x]["price"]."</td>";
                    echo  "<td>".$someArray[$x]["qunt"] * $someArray[$x]["price"]."</td>";
                    echo "</tr>";
          
            }
            
          
       ?>
       

               
                
             </table>
        </div>
    </div>                 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <br><br>
    
    
                   <div class="form-group">
                    <label class="col-md-3 control-label">Amount Details :-</label>
                    <div class="col-md-6">
                   
                      <table id="t01" style="width:100%" border=1>
                     <tr>
                           <th>amount</th>
                         <th>pro_id</th>
                         <th>p_price</th>
                          <th>final_price</th>
                    </tr>
                    <tr>
                         <?php   echo  "<td>".$user_row['ori_amount']."</td>"; ?>
                      <?php   echo  "<td>".$user_row['p_name']."</td>"; ?>
                        <?php   echo  "<td>".$user_row['p_price']."</td>"; ?>
                        <?php   echo  "<td>".$user_row['dis_amount']."</td>"; ?>
                    </tr>
                    </table>
                    </div>
                  </div>
            <br><br>


  
            
                    <div class="form-group">
                    <label class="col-md-3 control-label">Date & time:-</label>
                    <div class="col-md-3">
                      <input type="text" name="o_date" id="o_date" value="<?php if(isset($_GET['o_id'])){echo $user_row['o_date'];}?>" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                      <input type="text" name="o_time" id="o_time" value="<?php if(isset($_GET['o_id'])){echo $user_row['o_time'];}?>" class="form-control" readonly>
                    </div>
                  </div>
                
            
                  <div class="form-group">
                    <label class="col-md-3 control-label"> Type :-</label>
                      <div class="col-md-6">                       
                        <select name="o_type" id="o_type" style="width:280px; height:25px;" class="select2" required>
                            <option value="">--Select Category--</option>
                            <option value="1" <?php if($user_row['o_type']=='1'){?>selected<?php }?>>Pendding</option>
                            <option value="2" <?php if($user_row['o_type']=='2'){?>selected<?php }?>>In Processing</option>
                            <option value="3" <?php if($user_row['o_type']=='3'){?>selected<?php }?>>Completed</option>
                            
                        </select>
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