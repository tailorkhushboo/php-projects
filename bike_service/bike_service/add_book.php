<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 
		include('language/GCM.php'); 

 	require_once("thumbnail_images.class.php");
	 
	 $qry1="SELECT * FROM tbl_users order by name";
$results1=mysqli_query($mysqli,$qry1);

	 $qry2="SELECT * FROM tbl_service order by s_name";
$results2=mysqli_query($mysqli,$qry2);

	if(isset($_POST['submit']) and isset($_GET['add']))
	{		
			  
			$data = array(
		
			'u_id'  =>  $_POST['u_id'],
			's_id'  =>  $_POST['s_id'],
			'bike_id'  =>  $_POST['bike_id'],
			'bike_gn_service'  =>  $_POST['bike_gn_service'],
			'bike_oil'  =>  $_POST['bike_oil'],
				'bike_repair'  =>  $_POST['bike_repair'],
			'bike_polish'  =>  $_POST['bike_polish'],
			'bike_engine'  =>  $_POST['bike_engine'],
			'bike_water'  =>  $_POST['bike_water'],
			'bike_electrical'  =>  $_POST['bike_electrical'],
			'other'  =>  $_POST['other'],
			'b_type'  =>  $_POST['b_type'],
					'o_puncture'  =>  $_POST['o_puncture'],
			'o_breakdown'  =>  $_POST['o_breakdown'],
			'o_outoffuel'  =>  $_POST['o_outoffuel'],
			'o_engineservices'  =>  $_POST['o_engineservices'],
			'o_oilservice'  =>  $_POST['o_oilservice'],
			'o_bikespares'  =>  $_POST['o_bikespares'],
			'o_bikepainting'  =>  $_POST['o_bikepainting'],
			'o_generalservice'  =>  $_POST['o_generalservice'],
			'o_bikewashpolish'  =>  $_POST['o_bikewashpolish'],
			'o_electricwork'  =>  $_POST['o_electricwork'],
			'o_stickering'  =>  $_POST['o_stickering'],
			'b_status'  => 1,
		
			);

			$qry = Insert('tbl_book',$data);

		
			$_SESSION['msg']="10";
			header("location:manage_book.php");	 
			exit;
		
	}
	
	if(isset($_GET['b_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_book 
			left join tbl_users on tbl_users.id = tbl_book.u_id
			left join tbl_bike on tbl_bike.bk_id = tbl_book.bike_id
			left join tbl_bikebrand on tbl_bikebrand.bb_id =tbl_bike.bk_brand
            left join tbl_bikename on tbl_bikename.bn_id =tbl_bike.bk_name
			where b_id='".$_GET['b_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
	if(isset($_POST['submit']) and isset($_POST['b_id']))
	{
		  

/*			           
                $qry1 = "SELECT * FROM `tbl_users`
                WHERE tbl_users.id='".$_POST['u_id']."' ";
        
        		$result1 = mysqli_query($mysqli,$qry1);
        		$row2 = mysqli_fetch_assoc($result1);
        	
               
                     if($_POST['b_type'] == 2)
                    {
                         $tokens = $row2['token'];
                        $body = $_POST['remark'];
                        send_notification($tokens,$body);
        
            			   
                    }
        
        
                     if($_POST['b_type'] == 3)
                    {
                         $tokens = $row2['token'];
                        $body = $_POST['remark'];
                        send_notification($tokens,$body);
        
            			   
                    }
                    
                    if($_POST['b_type'] == 4)
                    {
                         $tokens = $row2['token'];
                        $body = $_POST['remark'];
                        send_notification($tokens,$body);
        
            			   
                    }*/
                    
        
 		$data = array(
			'b_type'  =>  $_POST['b_type'],

			);
			
		
		   $user_edit=Update('tbl_book', $data, "WHERE b_id = '".$_POST['b_id']."'");
		 
			if ($user_edit > 0){
				
				$_SESSION['msg']="11";
				header("Location:add_book.php?b_id=".$_POST['b_id']);
				exit;
			} 	
		
	 
	}
	
	
?>
 	

 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['b_id'])){?>Edit<?php }else{?>Add<?php }?> Book</div>
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
            	<input  type="hidden" name="u_id" value="<?php if(isset($_GET['b_id'])){echo $user_row['u_id'];}?>"/>
              <div class="section">
                <div class="section-body">
                      <div class="form-group">
                    <label class="col-md-3 control-label">User Name :-</label>
                    <div class="col-md-6">
                        <input type="text" name="name" id="name" value="<?php if(isset($_GET['b_id'])){echo $user_row['name'];}?>" class="form-control" readonly>


                    </div>
                  </div>
                  
                    <div class="form-group">
                    <label class="col-md-3 control-label">Service Name :-</label>
                    <div class="col-md-6">
                     <select name="s_id" id="s_id"  class="select2" disabled>
                       <option value="">--Select service Name--</option>
              
                              <?php
                               
                              
                                 while ($row2=mysqli_fetch_array($results2)) 
                                 {
                            
                                  ?>

                                 <option value="<?php echo $row2['s_id'];?>" 

                                <?php if($user_row['s_id']==$row2['s_id']){?>selected<?php }?>

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
                        
                      <input type="text" name="bike_id" id="bike_id" value="<?php if(isset($_GET['b_id'])){echo $user_row['bb_name'];}?>" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Bike Brand :-</label>
                    <div class="col-md-6">
                      <input type="text" name="bike_brand" id="bike_brand" value="<?php if(isset($_GET['b_id'])){echo $user_row['bn_name'];}?>" class="form-control" readonly>
                    </div>
                  </div>
               

                  <div class="form-group">
                    <label class="col-md-3 control-label">Bike Number :-</label>
                    <div class="col-md-6">
                      <input type="text" name="bike_number" id="bike_number" value="<?php if(isset($_GET['b_id'])){echo $user_row['bk_number'];}?>" class="form-control" readonly>
                    </div>
                  </div>
		
			       <div class="form-group">
                    <label class="col-md-3 control-label"> Bike Type :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="bike_type" id="bike_type" value="1" <?php if($user_row['bk_type']=="1"){echo "Checked";}?>  disabled> Motorcycle
                       <input type="radio" name="bike_type" id="bike_type" value="2" <?php if($user_row['bk_type']=="2"){echo "Checked";}?>  disabled>Moped 
                    </div>
                  </div>
                    <br>
                    
                
                
		
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Puncture :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_puncture" id="o_puncture" value="0" <?php if($user_row['o_puncture']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_puncture" id="o_puncture" value="1" <?php if($user_row['o_puncture']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                    
                     <div class="form-group">
                    <label class="col-md-3 control-label"> Breakdown :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_breakdown" id="o_breakdown" value="0" <?php if($user_row['o_breakdown']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_breakdown" id="o_breakdown" value="1" <?php if($user_row['o_breakdown']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Out Of Fuel :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_outoffuel" id="o_outoffuel" value="0" <?php if($user_row['o_outoffuel']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_outoffuel" id="o_outoffuel" value="1" <?php if($user_row['o_outoffuel']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Engine Services :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_engineservices" id="o_engineservices" value="0" <?php if($user_row['o_engineservices']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_engineservices" id="o_engineservices" value="1" <?php if($user_row['o_engineservices']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Oil Service :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_oilservice" id="o_oilservice" value="0" <?php if($user_row['o_oilservice']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_oilservice" id="o_oilservice" value="1" <?php if($user_row['o_oilservice']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                    
                    
                     <div class="form-group">
                    <label class="col-md-3 control-label"> Bike Spares :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_bikespares" id="o_bikespares" value="0" <?php if($user_row['o_bikespares']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_bikespares" id="o_bikespares" value="1" <?php if($user_row['o_bikespares']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                    
                      <div class="form-group">
                    <label class="col-md-3 control-label"> Bike Painting :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_bikepainting" id="o_bikepainting" value="0" <?php if($user_row['o_bikepainting']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_bikepainting" id="o_bikepainting" value="1" <?php if($user_row['o_bikepainting']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> General Service :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_generalservice" id="o_generalservice" value="0" <?php if($user_row['o_generalservice']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_generalservice" id="o_generalservice" value="1" <?php if($user_row['o_generalservice']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Bike Wash Polish :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_bikewashpolish" id="o_bikewashpolish" value="0" <?php if($user_row['o_bikewashpolish']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_bikewashpolish" id="o_bikewashpolish" value="1" <?php if($user_row['o_bikewashpolish']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                    
                    
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Electric Work :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_electricwork" id="o_electricwork" value="0" <?php if($user_row['o_electricwork']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_electricwork" id="o_electricwork" value="1" <?php if($user_row['o_electricwork']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                    
                    <div class="form-group">
                    <label class="col-md-3 control-label"> Stickering :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="o_stickering" id="o_stickering" value="0" <?php if($user_row['o_stickering']=="0"){echo "Checked";}?>  disabled> Yes
                       <input type="radio" name="o_stickering" id="o_stickering" value="1" <?php if($user_row['o_stickering']=="1"){echo "Checked";}?>  disabled> No 
                    </div>
                  </div>
                    <br>
                   
                   	  <div class="form-group">
                    <label class="col-md-3 control-label">Other :-</label>
                    <div class="col-md-6">
                        
                      <input type="text" name="o_others" id="o_others" value="<?php if(isset($_GET['b_id'])){echo $user_row['o_others'];}?>" class="form-control" disabled>
                    </div>
                  </div>
                  
                            
                    
                      <div class="form-group">
                    <label class="col-md-3 control-label">remark :-</label>
                    <div class="col-md-6">
                        
                      <input type="text" name="o_remark" id="o_remark" value="<?php if(isset($_GET['b_id'])){echo $user_row['o_remark'];}?>" class="form-control" disabled>
                    </div>
                  </div>
                   
                     <div class="form-group">
                      <label class="col-md-3 control-label">Type :-</label>
                      <div class="col-md-6">
                       <select name="b_type" id="b_type" class="select2">
                                <option value="1" <?php if($user_row['b_type']=='1'){?>selected<?php }?>>Pending</option>
                                <option value="2" <?php if($user_row['b_type']=='2'){?>selected<?php }?>>Accept</option>
                                <option value="3" <?php if($user_row['b_type']=='3'){?>selected<?php }?>>Reject</option>
                                <option value="4" <?php if($user_row['b_type']=='4'){?>selected<?php }?>>Delivered</option>
                                <option value="5" <?php if($user_row['b_type']=='5'){?>selected<?php }?>>Cancel</option>
                    
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