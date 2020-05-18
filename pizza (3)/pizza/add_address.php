<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
	 
  $qry1="SELECT * FROM `tbl_registration` ORDER BY f_name";
  $results1=mysqli_query($mysqli,$qry1);



	if(isset($_POST['submit']) and isset($_GET['add']))
	{		

//tbl_adderss a_id  user_id a_type  a_name  a_number  a_houser_no a_lendmark  a_adderss a_status

			$data = array(
		
	  'user_id'  =>  $_POST['user_id'],
      'a_type'  =>  $_POST['a_type'],	
	  'a_name'  =>  $_POST['a_name'],
      'a_number'  =>  $_POST['a_number'],
      'a_houser_no'  =>  $_POST['a_houser_no'],
      'a_lendmark'  =>  $_POST['a_lendmark'],
      'a_adderss'  =>  $_POST['a_adderss'],
	  'a_status' => 1
			);

			$qry = Insert('tbl_adderss',$data);

		
			$_SESSION['msg']="10";
			header("location:manage_address.php");	 
			exit;
		
	}
	
	if(isset($_GET['a_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_adderss where a_id='".$_GET['a_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
	if(isset($_POST['submit']) and isset($_POST['a_id']))
	{


	
			$data = array(
			   'user_id'  =>  $_POST['user_id'],
      'a_type'  =>  $_POST['a_type'], 
    'a_name'  =>  $_POST['a_name'],
      'a_number'  =>  $_POST['a_number'],
      'a_houser_no'  =>  $_POST['a_houser_no'],
      'a_lendmark'  =>  $_POST['a_lendmark'],
      'a_adderss'  =>  $_POST['a_adderss'],

	 
			);
			$user_edit=Update('tbl_adderss', $data, "WHERE a_id = '".$_POST['a_id']."'");
		

		
		  
			if ($user_edit > 0){
				
				$_SESSION['msg']="11";
				header("Location:add_address.php?a_id=".$_POST['a_id']);
				exit;
			} 	
 }
		
	 
	
	
	
?>




 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['a_id'])){?>Edit<?php }else{?>Add<?php }?>Address</div>
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
            	<input  type="hidden" name="a_id" value="<?php echo $_GET['a_id'];?>" />

              <div class="section">
                <div class="section-body">

                   <div class="form-group">
                    <label class="col-md-3 control-label">User Name: :-</label>
                    <div class="col-md-6">
                     <select name="user_id" id="user_id" class="select2">
                       <option value="">--Select Category--</option>
              
                              <?php
                               
                              
                                 while ($row1=mysqli_fetch_array($results1)) 
                                 {
                            
                                  ?>

                                 <option value="<?php echo $row1['id'];?>" 

                                <?php if($user_row['user_id']==$row1['id']){?>selected<?php }?>

                                  > <?php echo $row1['f_name'];?></option>
                                <?php
                                }
                                 
                              ?>
                     
                            </select>

                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 control-label"> Type :-</label>
                      <div class="col-md-6">                       
                        <select name="a_type" id="a_type" style="width:280px; height:25px;" class="select2" required>
                            <option value="">--Select Type--</option>
                            <option value="1" <?php if($user_row['a_type']=='1'){?>selected<?php }?>>Home</option>
                            <option value="2" <?php if($user_row['a_type']=='2'){?>selected<?php }?>>Work</option>
                            <option value="3" <?php if($user_row['a_type']=='3'){?>selected<?php }?>>Others</option>
                            
                        </select>
                      </div>
                  </div>
                                

                    <div class="form-group">
                    <label class="col-md-3 control-label">Name  :-</label>
                    <div class="col-md-6">
                      <input type="text" name="a_name" id="a_name" value="<?php if(isset($_GET['a_id'])){echo $user_row['a_name'];}?>" class="form-control">
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-md-3 control-label">Number  :-</label>
                    <div class="col-md-6">
                      <input type="text" name="a_number" id="a_number" value="<?php if(isset($_GET['a_id'])){echo $user_row['a_number'];}?>" class="form-control">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label class="col-md-3 control-label">Houser No :-</label>
                    <div class="col-md-6">
                      <input type="text" name="a_houser_no" id="a_houser_no" value="<?php if(isset($_GET['a_id'])){echo $user_row['a_houser_no'];}?>" class="form-control">
                    </div>
                  </div>
                  

                  <div class="form-group">
                    <label class="col-md-3 control-label">Lendmark  :-</label>
                    <div class="col-md-6">
                      <input type="text" name="a_lendmark" id="a_lendmark" value="<?php if(isset($_GET['a_id'])){echo $user_row['a_lendmark'];}?>" class="form-control">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-md-3 control-label">Address  :-</label>
                    <div class="col-md-6">
                            <textarea rows="4" cols="50"  name="a_adderss" id="a_adderss" value="" class="form-control"><?php if(isset($_GET['a_id'])){echo $user_row['a_adderss'];}?></textarea>
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