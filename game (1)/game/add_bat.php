<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
	 
	  
    $qry1="SELECT * FROM tbl_market order by m_name DESC";
  $results1=mysqli_query($mysqli,$qry1);

	if(isset($_POST['submit']) and isset($_GET['add']))
	{		

  //b_id  m_id  b_type  b_option  b_digit b_points  b_date  b_status
			$data = array(
		
			'm_id'  =>  $_POST['m_id'],
      'b_type' => $_POST['b_type'],
			'b_option'  => $_POST['b_option'],
			'b_digit'  =>  $_POST['b_digit'],
			'b_points'  =>  $_POST['b_points'],
      'b_date'  =>  $_POST['b_date'],
			'b_status' => 1
			);

			$qry = Insert('tbl_bat',$data);

			$_SESSION['msg']="10";
			header("location:manage_bat.php");	 
			exit;
		
	}
	
	if(isset($_GET['b_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_bat where b_id='".$_GET['b_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$row=mysqli_fetch_assoc($user_result);
		
	}
	
	if(isset($_POST['submit']) and isset($_POST['b_id']))
	{
 
  
 
      $data = array(
    'm_id'  =>  $_POST['m_id'],
      'b_type' => $_POST['b_type'],
      'b_option'  => $_POST['b_option'],
      'b_digit'  =>  $_POST['b_digit'],
      'b_points'  =>  $_POST['b_points'],
      'b_date'  =>  $_POST['b_date'],
      'b_status' => 1
    
			);


			$user_edit=Update('tbl_bat', $data, "WHERE b_id = '".$_POST['b_id']."'");
		

		  
			if ($user_edit > 0){
				
				$_SESSION['msg']="11";
				header("Location:add_bat.php?b_id=".$_POST['b_id']);
				exit;
			} 	
    }

		
	 
	
	
	
?>
 	

 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['b_id'])){?>Edit<?php }else{?>Add<?php }?> Bat</div>
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
            	<input  type="hidden" name="b_id" value="<?php echo $_GET['b_id'];?>" />

              <div class="section">
                <div class="section-body">
                    <div class="form-group">
                    <label class="col-md-3 control-label">Market Name: :-</label>
                    <div class="col-md-6">
                     <select name="m_id" id="m_id" class="select2">
                       <option value="">--Select Market--</option>
              
                              <?php
                               
                              
                                 while ($row1=mysqli_fetch_array($results1)) 
                                 {
                            
                                  ?>

                                 <option value="<?php echo $row1['m_id'];?>" 

                                <?php if($row['m_id']==$row1['m_id']){?>selected<?php }?>

                                  > <?php echo $row1['m_name'];?></option>
                                <?php
                                }
                                 
                              ?>
                     
                            </select>

                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Bat Type :-</label>
                      <div class="col-md-6">                       
                        <select name="b_type" id="b_type" style="width:280px; height:25px;" class="select2" required>
                            <option value="">--Select Type--</option>
                            <option value="1" <?php if($row['b_type']=='1'){?>selected<?php }?>>1</option>
                            <option value="2" <?php if($row['b_type']=='2'){?>selected<?php }?>>2</option>
                            <option value="3" <?php if($row['b_type']=='3'){?>selected<?php }?>>3</option>
                             <option value="4" <?php if($row['b_type']=='4'){?>selected<?php }?>>4</option>
                              <option value="5" <?php if($row['b_type']=='5'){?>selected<?php }?>>5</option>
                            
                        </select>
                      </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 control-label">Option :-</label>
                      <div class="col-md-6">                       
                        <select name="b_option" id="b_option" style="width:280px; height:25px;" class="select2" required>
                            <option value="">--Select Option--</option>
                            <option value="1" <?php if($row['b_option']=='1'){?>selected<?php }?>>Open</option>
                            <option value="2" <?php if($row['b_option']=='2'){?>selected<?php }?>>Close</option>
                 
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Digit :-</label>
                    <div class="col-md-6">
                      <input type="text" name="b_digit" id="b_digit" value="<?php if(isset($_GET['b_id'])){echo $row['b_digit'];}?>" class="form-control" required>
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Point :-</label>
                    <div class="col-md-6">
                      <input type="text" name="b_points" id="b_points" value="<?php if(isset($_GET['b_id'])){echo $row['b_points'];}?>" class="form-control" required>
                    </div>
                  </div>
                     <div class="form-group">
                    <label class="col-md-3 control-label">Date :-</label>
                    <div class="col-md-6">
                      <input type="date" name="b_date" id="b_date" value="<?php if(isset($_GET['b_id'])){echo $row['b_date'];}?>" class="form-control" required>
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