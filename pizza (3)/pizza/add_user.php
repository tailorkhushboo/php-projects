<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
	 
	 
	if(isset($_POST['submit']) and isset($_GET['add']))
	{		

 
			$data = array(
		
			'f_name'  =>  $_POST['f_name'],
      'l_name'  =>  $_POST['l_name'],	
			'password'  =>  $_POST['password'],
      'dob'  =>  $_POST['dob'],
      'gender'  =>  $_POST['gender'],
        'country'  =>  $_POST['country'],
      'mobile'  =>  $_POST['mobile'],
      'email'  =>  $_POST['email'],
       'wallet'  =>  $_POST['wallet'],
			'status' => 1
			);

			$qry = Insert('tbl_registration',$data);

		
			$_SESSION['msg']="10";
			header("location:manage_user.php");	 
			exit;
		
	}
	
	if(isset($_GET['id']))
	{
			 
			$user_qry="SELECT * FROM tbl_registration where id='".$_GET['id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
	if(isset($_POST['submit']) and isset($_POST['id']))
	{


	
			$data = array(
			 'f_name'  =>  $_POST['f_name'],
      'l_name'  =>  $_POST['l_name'], 
      'password'  =>  $_POST['password'],
      'dob'  =>  $_POST['dob'],
      'gender'  =>  $_POST['gender'],
        'country'  =>  $_POST['country'],
      'mobile'  =>  $_POST['mobile'],
      'email'  =>  $_POST['email'],
       'wallet'  =>  $_POST['wallet'],
			);
			$user_edit=Update('tbl_registration', $data, "WHERE id = '".$_POST['id']."'");
		

		
		  
			if ($user_edit > 0){
				
				$_SESSION['msg']="11";
				header("Location:add_user.php?id=".$_POST['id']);
				exit;
			} 	
 }
		
	 
	
	
	
?>
 	

 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['id'])){?>Edit<?php }else{?>Add<?php }?> User</div>
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
            	<input  type="hidden" name="id" value="<?php echo $_GET['id'];?>" />

              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Frist Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="f_name" id="f_name" value="<?php if(isset($_GET['id'])){echo $user_row['f_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 control-label">Last Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="l_name" id="l_name" value="<?php if(isset($_GET['id'])){echo $user_row['l_name'];}?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Password :-</label>
                    <div class="col-md-6">
                      <input type="password" name="password" id="password" value="<?php if(isset($_GET['id'])){echo $user_row['password'];}?>" class="form-control" <?php if(!isset($_GET['id'])){ echo $user_row['password'];?>required<?php }?>>
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">BirthDay  :-</label>
                    <div class="col-md-6">
                      <input type="date" name="dob" id="dob" value="<?php if(isset($_GET['id'])){echo $user_row['dob'];}?>" class="form-control">
                    </div>
                  </div>
                  <br>
                    <div class="form-group">
                    <label class="col-md-3 control-label"> Gender :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="gender" id="gender" value="1" <?php if($user_row['gender']=="1"){echo "Checked";}?>  > Male
                       <input type="radio" name="gender" id="gender" 
                       value="2" <?php if($user_row['gender']=="2"){echo "Checked";}?>  >Female 
                    </div>
                  </div>
                    <br>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Country  :-</label>
                    <div class="col-md-6">
                      <input type="text" name="country" id="country" value="<?php if(isset($_GET['id'])){echo $user_row['country'];}?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Phone :-</label>
                    <div class="col-md-6">
                      <input type="text" name="mobile" id="mobile" value="<?php if(isset($_GET['id'])){echo $user_row['mobile'];}?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Email :-</label>
                    <div class="col-md-6">
                      <input type="email" name="email" id="email" value="<?php if(isset($_GET['id'])){echo $user_row['email'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label class="col-md-3 control-label">Wallet :-</label>
                    <div class="col-md-6">
                      <input type="text" name="wallet" id="wallet" value="<?php if(isset($_GET['id'])){echo $user_row['wallet'];}?>" class="form-control" required>
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