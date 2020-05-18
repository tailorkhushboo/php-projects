<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

	require_once("thumbnail_images.class.php");



	if(isset($_POST['submit']) and isset($_GET['add']))
	{


  
//  tbl_specialist	st_id	st_name	st_status

      
  		 $data = array(
       
	        'st_name'  =>  $_POST['st_name'],
	        'st_status'  =>  1,
		);	

 		$qry = Insert('tbl_specialist',$data);	
			

		$_SESSION['msg']="10";
 
		header( "Location:manage_specialist.php");
		exit;	

		 
		
	}

	if(isset($_GET['st_id']))
	{
			 
			$qry="SELECT * FROM tbl_specialist where st_id='".$_GET['st_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}

	if(isset($_POST['submit']) and isset($_POST['st_id']))
	{		 	

    
    
               $data = array(
           'st_name'  =>  $_POST['st_name'],
		);	


       $category_edit=Update('tbl_specialist', $data, "WHERE st_id = '".$_POST['st_id']."'");




		$_SESSION['msg']="11"; 
		header( "Location:manage_specialist.php");
		exit;
 
	}

	       
	       

?>
<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['st_id'])){?>Edit<?php }else{?>Add<?php }?> Specialist</div>
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
            	<input  type="hidden" name="st_id" value="<?php echo $_GET['st_id'];?>" />

              <div class="section">
                <div class="section-body">

             
              
              
               
                  
                   <div class="form-group">
                    <label class="col-md-3 control-label"> Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="st_name" id="st_name" value="<?php if(isset($_GET['st_id'])){echo $row['st_name'];}?>" class="form-control" required>
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
