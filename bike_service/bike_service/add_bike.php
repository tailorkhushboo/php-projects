<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

	require_once("thumbnail_images.class.php");

	 	 $qry2="SELECT * FROM tbl_users order by name";
$results2=mysqli_query($mysqli,$qry2);


	 	 $qry3="SELECT * FROM tbl_bikebrand order by bb_name";
$results3=mysqli_query($mysqli,$qry3);


	 	 $qry4="SELECT * FROM tbl_bikename order by bn_name";
$results4=mysqli_query($mysqli,$qry4);
	if(isset($_POST['submit']) and isset($_GET['add']))
	{


    //      $banner_image=rand(0,99999)."_".$_FILES['bog_image']['name'];
       
    //   //Main Image
    //  $tpath1='images/'.$banner_image;        
    //   $pic1=compress_image($_FILES["bog_image"]["tmp_name"], $tpath1, 80);
   
    // //Thumb Image 
    //  $thumbpath='images/thumbs/'.$banner_image;   
    //   $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
    
    
          	//tbl_bike bk_id	u_id	bk_type	bk_brand	bk_name	bk_number	bk_status

      
  		 $data = array(
       
	        'u_id'  =>  $_POST['u_id'],
	        'bk_type'  =>  $_POST['bk_type'],
	        'bk_brand'  =>  $_POST['bk_brand'],
	        'bk_name'  =>  $_POST['bk_name'],
              'bk_number'  =>  $_POST['bk_number'],
	        'bk_status'  =>  1,
		);	

 		$qry = Insert('tbl_bike',$data);	
			

		$_SESSION['msg']="10";
 
		header( "Location:manage_bike.php");
		exit;	

		 
		
	}

	if(isset($_GET['bk_id']))
	{
			 
			$qry="SELECT * FROM tbl_bike where bk_id='".$_GET['bk_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}

	if(isset($_POST['submit']) and isset($_POST['bk_id']))
	{		 	

    //      if($_FILES['bog_name']['name']!="")
    //  {   


    //      $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_blog WHERE bk_id='.$_POST['bog_id'].'');
    //       $img_res_row=mysqli_fetch_assoc($img_res);
      

    //       if($img_res_row['bog_name']!="")
    //         {
    //       unlink('images/thumbs/'.$img_res_row['bog_name']);
    //       unlink('images/'.$img_res_row['bog_name']);
    //       }

    //       $banner_image=rand(0,99999)."_".$_FILES['bog_name']['name'];
       
    //          //Main Image
    //       $tpath1='images/'.$banner_image;        
    //          $pic1=compress_image($_FILES["bog_name"]["tmp_name"], $tpath1, 80);
         
    //       //Thumb Image 
    //       $thumbpath='images/thumbs/'.$banner_image;   
    //          $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');

               $data = array(
             'u_id'  =>  $_POST['u_id'],
	        'bk_type'  =>  $_POST['bk_type'],
	        'bk_brand'  =>  $_POST['bk_brand'],
	        'bk_name'  =>  $_POST['bk_name'],
              'bk_number'  =>  $_POST['bk_number'],

		);	


       $category_edit=Update('tbl_bike', $data, "WHERE bk_id = '".$_POST['bk_id']."'");

//      } else
//      {

//         		  $data = array(
// 	         'bog_name'  =>  $_POST['bog_name'],
//               'bog_desc'  =>  $_POST['bog_desc'],
          
// 		);	
	

// 	     $category_edit=Update('tbl_blog', $data, "WHERE bog_id = '".$_POST['bog_id']."'");
		
//         }


		$_SESSION['msg']="11"; 
		header( "Location:manage_bike.php");
		exit;
 
	}

	          	//tbl_bike bk_id	u_id	bk_type	bk_brand	bk_name	bk_number	bk_status

?>
<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['bk_id'])){?>Edit<?php }else{?>Add<?php }?> Bike</div>
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
            	<input  type="hidden" name="bk_id" value="<?php echo $_GET['bk_id'];?>" />

              <div class="section">
                <div class="section-body">

             
                    <div class="form-group">
                    <label class="col-md-3 control-label">User Name :-</label>
                    <div class="col-md-6">
                     <select name="u_id" id="u_id"  class="select2" >
                       <option value="">--Select User-Name--</option>
              
                              <?php
                               
                              
                                 while ($row2=mysqli_fetch_array($results2)) 
                                 {
                            
                                  ?>

                                 <option value="<?php echo $row2['id'];?>" 

                                <?php if($row['u_id']==$row2['id']){?>selected<?php }?>

                                  > <?php echo $row2['name'];?></option>
                                <?php
                                }
                                 
                              ?>
                     
                            </select>

                    </div>
                  </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">  Type :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="bk_type" id="bk_type" value="1" <?php if($row['bk_type']=="1"){echo "Checked";}?>  > Motorcycle
                       <input type="radio" name="bk_type" id="bk_type" value="2" <?php if($row['bk_type']=="2"){echo "Checked";}?>  >Moped 
                    </div>
                  </div>
                    <br>
                <div class="form-group">
                    <label class="col-md-3 control-label">Brands Name :-</label>
                    <div class="col-md-6">
                     <select name="bk_brand" id="bk_brand"  class="select2" >
                       <option value="">--Select User-Name--</option>
              
                              <?php
                               
                              
                                 while ($row3=mysqli_fetch_array($results3)) 
                                 {
                            
                                  ?>

                                 <option value="<?php echo $row3['bb_id'];?>" 

                                <?php if($row['bk_brand']==$row3['bb_id']){?>selected<?php }?>

                                  > <?php echo $row3['bb_name'];?></option>
                                <?php
                                }
                                 
                              ?>
                     
                            </select>

                    </div>
                  </div>
   
                   
                   
                   <div class="form-group">
                    <label class="col-md-3 control-label">Bike Name :-</label>
                    <div class="col-md-6">
                     <select name="bk_name" id="bk_name"  class="select2" >
                       <option value="">--Select User-Name--</option>
              
                              <?php
                               
                              
                                 while ($row4=mysqli_fetch_array($results4)) 
                                 {
                            
                                  ?>

                                 <option value="<?php echo $row4['bn_id'];?>" 

                                <?php if($row['bk_name']==$row4['bn_id']){?>selected<?php }?>

                                  > <?php echo $row4['bn_name'];?></option>
                                <?php
                                }
                                 
                              ?>
                     
                            </select>

                    </div>
                  </div>
               
                  
                   <div class="form-group">
                    <label class="col-md-3 control-label">Bike Number :-</label>
                    <div class="col-md-6">
                      <input type="text" name="bk_number" id="bk_number" value="<?php if(isset($_GET['bk_id'])){echo $row['bk_number'];}?>" class="form-control" required>
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
