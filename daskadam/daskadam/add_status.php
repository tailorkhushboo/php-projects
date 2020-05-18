<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
    $mysqli->set_charset('utf8mb4');
	require_once("thumbnail_images.class.php");

	 $cat_qry="SELECT * FROM tbl_status_cat ORDER BY category_name";
	$cat_result=mysqli_query($mysqli,$cat_qry); 
	
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
	
          
       $data = array( 
	   			 'cid'  =>  $_POST['cat_id'],
			    'quote'  =>  $_POST['banner_status'],
			    'status' => 1
			   
			    );		

 		$qry = Insert('tbl_status_list',$data);	

 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_status_list.php");
		exit;	

		 
		
	}
	
	if(isset($_GET['banner_id']))
	{
			 
			$qry="SELECT * FROM tbl_status_list where id='".$_GET['banner_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}
	
	if(isset($_POST['submit']) and isset($_POST['banner_id']))
	{
		 

				    $data = array( 
									 'cid'  =>  $_POST['cat_id'],
									'quote'  =>  $_POST['banner_status'],
								   
									);		

			         $category_edit=Update('tbl_status_list', $data, "WHERE id = '".$_POST['banner_id']."'");

		     
		$_SESSION['msg']="11"; 
		header( "Location:add_status.php?banner_id=".$_POST['banner_id']);
		exit;
 
	}


?>
<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['banner_id'])){?>Edit<?php }else{?>Add<?php }?> Banner</div>
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
            <form action="" name="addeditcategory" method="post" class="form form-horizontal" enctype="multipart/form-data">
            	<input  type="hidden" name="banner_id" value="<?php echo $_GET['banner_id'];?>" />

              <div class="section">
                <div class="section-body">
				 <div class="form-group">
                    <label class="col-md-3 control-label">Status Category :-</label>
                    <div class="col-md-6">
                      <select name="cat_id" id="cat_id" class="select2" required>
                        <option value="">--Select Status Category--</option>
          							<?php
          									while($cat_row=mysqli_fetch_array($cat_result))
          									{
          							?>          						 
          	<!-- 						<option value="<?php echo $cat_row['sid'];?>"><?php echo $cat_row['category_name'];?></option>	      -->
                        <option value="<?php echo $cat_row['sid'];?>" <?php if($cat_row['sid']==$row['cid']){?>selected<?php }?>><?php echo $cat_row['category_name'];?></option>            							 
          							<?php
          								}
          							?>
                      </select>
                    </div>
                  </div>
                                
                  <div class="form-group">
                    <label class="col-md-3 control-label"> Quote :-</label>
                    <div class="col-md-6">
                      <input type="text" name="banner_status" id="banner_status" value="<?php if(isset($_GET['banner_id'])){echo $row['quote'];}?>" class="form-control" required>
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
        
<?php include("includes/footer.php");?>       
