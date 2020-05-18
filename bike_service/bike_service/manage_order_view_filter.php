<?php include('includes/header.php'); 

    include('includes/function.php');
	include('language/language.php');  


	if(isset($_GET['s_id']) and isset($_GET['s_date']) and isset($_GET['e_date']))
  {   

         $m_id=$_GET['s_id'];

      $b_option=$_GET['s_date'];
       $e_date=$_GET['e_date'];
    
//     SELECT * FROM tbl_book 
// left join tbl_service on tbl_service.s_id = tbl_book.s_id
// WHERE 
// tbl_book.date BETWEEN '2020-04-29' AND '2020-04-30' AND tbl_book.s_id=3
// ORDER BY tbl_book.b_id DESC
 
       $quotes_qqry="SELECT SUM(tbl_invoice.i_total_amount) as total_amount, COUNT(*) as num FROM tbl_book
       left join tbl_service on tbl_service.s_id = tbl_book.s_id
LEFT JOIN tbl_invoice ON tbl_invoice.i_id = tbl_book.invoice_id
       where tbl_book.date BETWEEN '".$b_option."' AND '".$e_date."' AND tbl_book.s_id='".$m_id."'
	   ORDER BY tbl_book.b_id DESC";
    
    $result=mysqli_query($mysqli,$quotes_qqry); 
//$result = mysqli_fetch_array(mysqli_query($mysqli,$quotes_qqry));

$users_row=mysqli_fetch_array($result);
     $result12 = $users_row['num'];
     
     
      $resul1t = $users_row['total_amount'];

   }
else
  
   {
	 
				$tableName="tbl_book";		
							$targetpage = "manage_order_view_filter.php"; 	
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
							
							
						 $users_qry="SELECT * FROM tbl_book
          left join tbl_service on tbl_service.s_id = tbl_book.s_id
LEFT JOIN tbl_invoice ON tbl_invoice.i_id = tbl_book.invoice_id
				 		 ORDER BY tbl_book.b_id DESC LIMIT $start, $limit";  
							 
							$result=mysqli_query($mysqli,$users_qry);
							
	 }
	
	
	
	
?>


 <div class="row">
      <div class="col-xs-12">
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Manage Booking Filter</div>
            </div>
            <div class="col-md-7 col-xs-12">              
                  <div class="search_list">
                    <div class="search_block">
                      <form  method="post" action="">
                        <input class="form-control input-sm" placeholder="Search..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                        <button type="submit" name="user_search" class="btn-search"><i class="fa fa-search"></i></button>
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
              <form action="" name="frm_filter" method="GET" class="form form-horizontal" enctype="multipart/form-data">

           
                          
          
          

           <div class="col-md-3 col-xs-12">
            <!--     <div style="float: left;margin-left: 10px">-->
                  <div class="search_list" style="padding: 0px 0px 5px;float: left;margin-left: 20px"> 
                    <br> <div> <h4 style="float: right;   ">Start Date:|</h4>   </div>
                   <div style="    margin-left: 10px; "> 
                   		
                     	 <input type="date"  name="s_date" id="s_date" value="<?php if(($_GET['s_date'])){ echo $_GET['s_date']; } ?>" class="form-control" >

                     

                   </div>
              <!--   </div>-->
              </div> 
           </div>
           
            <div class="col-md-3 col-xs-12">
         
         
                  <div class="search_list" style="padding: 0px 0px 5px;float: left;margin-left: 20px"> 
                    <br> <div> <h4 style="float: right;   ">End Date:|</h4>   </div>
                   <div style="    margin-left: 10px; "> 
                   		
                     	 <input type="date"  name="e_date" id="e_date" value="<?php if(($_GET['e_date'])){ echo $_GET['e_date']; } ?>" class="form-control" >

                     

                   </div>
              
              
              </div> 
           </div>
           
            <div class="col-md-3 col-xs-12">
            <!--     <div style="float: left;margin-left: 10px">-->
                  <div class="search_list" style="padding: 0px 0px 5px;float: left;margin-left: 20px"> 
                    <br> <div> <h4 style=" ">Service:|</h4>   </div>
                   <div style="    margin-left: 10px; "> 
                      <select name="s_id" id="s_id" class="form-control filter_category" required 
                      style=" margin-top: 5px; ">
                         <option value="">Service Filter</option>
                          <?php
                            $cat_qry="SELECT * FROM tbl_service ORDER BY s_id ASC";
                            $cat_result=mysqli_query($mysqli,$cat_qry);
                             while($cat_row=mysqli_fetch_array($cat_result))
                              {
                          ?> 

                               <option value="<?php echo $cat_row['s_id'];?>" <?php if(isset($_GET['s_id']) && $_GET['s_id']==$cat_row['s_id']) {echo 'selected';} ?>><?php echo $cat_row['s_name'];?></option> 

             
             
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
                  
                  
                   <div style="    margin-left: 10px; "> 
                   		
                     	<button type="submit" name="search_filter" class="btn btn-primary">Save</button>

                     

                   </div>
              
              
              </div> 
           </div>
         <!--<div class="col-md-3 col-xs-12">-->
         <!--   <button type="submit" name="search_filter" class="btn btn-primary">Save</button>-->
         <!-- </div>-->
        </form>
       
       
        <div class="clearfix"></div>
    </div>     
 </div>
       
                


				  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-film fa-4x"></i>
          <div class="content">
            <div class="title">Total Order</div>
            <div class="value"><span class="sign"></span><?php echo $result12;?></div>
          </div>
        </div>
        </a> 
        </div>
        
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-film fa-4x"></i>
          <div class="content">
            <div class="title">Total Payment</div>
            <div class="value"><span class="sign"></span><?php echo $resul1t.'/-'; ?></div>
          </div>
        </div>
        </a> 
        </div>
		
		  
   
      </div>
         
         
         
<?php include('includes/footer.php');?>                  