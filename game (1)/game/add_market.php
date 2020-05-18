<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
	 
	 
	if(isset($_POST['submit']) and isset($_GET['add']))
	{		
     $openTime = $_POST['m_open_time'];
 $closeTime = $_POST['m_close_time'];
  $date = $_POST['m_date'];
 $newDateTime1 = date("h:i:s", strtotime($openTime));
 $newDateTime2 = date("h:i:s", strtotime($closeTime));
  

			$data = array(
		
			'm_name'  =>  $_POST['m_name'],
      'm_date' => $date,
			'm_open_time'  =>  $newDateTime1,
			'm_close_time'  =>  $newDateTime2,
			'm_score'  =>  $_POST['m_score'],
      'm_open'  =>  0,
      'm_close'  =>  0,
			'm_status' => 1
			);

			$qry = Insert('tbl_market',$data);

			$_SESSION['msg']="10";
			header("location:manage_market.php");	 
			exit;
		
	}
	
	if(isset($_GET['m_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_market where m_id='".$_GET['m_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}

	 
	
	
	
?>


 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['m_id'])){?>Edit<?php }else{?>Add<?php }?> Market</div>
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
            	<input  type="hidden" name="m_id" value="<?php echo $_GET['m_id'];?>" />

              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="m_name" id="m_name" value="<?php if(isset($_GET['m_id'])){echo $user_row['m_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                     <div class="form-group">
                    <label class="col-md-3 control-label">Date :-</label>
                    <div class="col-md-6">
                      <input type="date" name="m_date" id="m_date" value="<?php if(isset($_GET['m_id'])){echo $user_row['m_date'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Open Time :-</label>
                    <div class="col-md-6">
                      <!--  <input id="appt-time" type="time" name="appt-time" step="2"> -->
                      <input type="time" name="m_open_time" step="2" id="appt-time" value="<?php if(isset($_GET['m_id'])){echo $user_row['m_open_time'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Close Time :-</label>
                    <div class="col-md-6">
                      <input type="time" name="m_close_time" step="2" id="appt-time" value="<?php if(isset($_GET['m_id'])){echo $user_row['m_close_time'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Score :-</label>
                    <div class="col-md-6">
                      <input type="text" name="m_score" id="m_score" value="<?php if(isset($_GET['m_id'])){echo $user_row['m_score'];}?>" class="form-control">
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