<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
	 
	 
	if(isset($_POST['submit']) and isset($_GET['add']))
	{		

 
			$data = array(
		
			'd_name'  =>  $_POST['d_name'],
            'd_link'  =>  $_POST['d_link'],	
			'd_point'  =>  $_POST['d_point'],
			'd_status' => 1
			);

			$qry = Insert('tbl_daily_task',$data);

		
			$_SESSION['msg']="10";
			header("location:manage_daily_task.php");	 
			exit;
		
	}
	
	if(isset($_GET['d_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_daily_task where d_id='".$_GET['d_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
	if(isset($_POST['submit']) and isset($_POST['d_id']))
	{


	
			$data = array(
	'd_name'  =>  $_POST['d_name'],
      'd_link'  =>  $_POST['d_link'],	
			'd_point'  =>  $_POST['d_point'],
		
			);
			$user_edit=Update('tbl_daily_task', $data, "WHERE d_id = '".$_POST['d_id']."'");
		

		
		  
			if ($user_edit > 0){
				
				$_SESSION['msg']="11";
				header("Location:add_daily_task.php?d_id=".$_POST['d_id']);
				exit;
			} 	
 }
		
	 
	
	
	
?>
 	

 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['d_id'])){?>Edit<?php }else{?>Add<?php }?> Daily Task</div>
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
            	<input  type="hidden" name="d_id" value="<?php echo $_GET['d_id'];?>" />

              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label"> Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="d_name" id="d_name" value="<?php if(isset($_GET['d_id'])){echo $user_row['d_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 control-label"> Link :-</label>
                    <div class="col-md-6">
                      <input type="text" name="d_link" id="d_link" value="<?php if(isset($_GET['d_id'])){echo $user_row['d_link'];}?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Points :-</label>
                    <div class="col-md-6">
                      <input type="text" name="d_point" id="d_point" value="<?php if(isset($_GET['d_id'])){echo $user_row['d_point'];}?>" class="form-control" <?php if(!isset($_GET['id'])){ echo $user_row['password'];?>required<?php }?>>
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