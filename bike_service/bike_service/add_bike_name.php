<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

	require_once("thumbnail_images.class.php");

	 	 $qry1="SELECT * FROM tbl_bikebrand order by bb_name";
$results1=mysqli_query($mysqli,$qry1);

	if(isset($_POST['submit']) and isset($_GET['add']))
	{

         $banner_image=rand(0,99999)."_".$_FILES['bn_image']['name'];
       
       //Main Image
     $tpath1='images/'.$banner_image;        
       $pic1=compress_image($_FILES["bn_image"]["tmp_name"], $tpath1, 80);
   
    //Thumb Image 
     $thumbpath='images/thumbs/'.$banner_image;   
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200'); 
       
       
      
  		 $data = array(
              'bb_id'  =>  $_POST['bb_id'],
	        'bn_name'  =>  $_POST['bn_name'],
             'bn_image'  =>  $banner_image,
	        'bn_status'  =>  1,
		);	

 		$qry = Insert('tbl_bikename',$data);	
			

		$_SESSION['msg']="10";
 
		header( "Location:manage_bike_name.php");
		exit;	

	 //	tbl_bikename		bn_id	bb_id	bn_name	bn_image	bn_status    	 
		 
	}

	if(isset($_GET['bn_id']))
	{
			 
			$qry="SELECT * FROM tbl_bikename where bn_id='".$_GET['bn_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}

	if(isset($_POST['submit']) and isset($_POST['bn_id']))
	{		 	

         if($_FILES['bn_image']['name']!="")
     {   


         $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_bikename WHERE bn_id='.$_POST['bn_id'].'');
          $img_res_row=mysqli_fetch_assoc($img_res);
      

          if($img_res_row['bn_image']!="")
            {
          unlink('images/thumbs/'.$img_res_row['bn_image']);
          unlink('images/'.$img_res_row['bn_image']);
           }

           $banner_image=rand(0,99999)."_".$_FILES['bn_image']['name'];
       
             //Main Image
           $tpath1='images/'.$banner_image;        
             $pic1=compress_image($_FILES["bn_image"]["tmp_name"], $tpath1, 80);
         
          //Thumb Image 
           $thumbpath='images/thumbs/'.$banner_image;   
             $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');

               $data = array(
            'bb_id'  =>  $_POST['bb_id'],
	        'bn_name'  =>  $_POST['bn_name'],
             'bn_image'  =>  $banner_image,

		);	


       $category_edit=Update('tbl_bikename', $data, "WHERE bn_id = '".$_POST['bn_id']."'");

     } else
     {

        		  $data = array(
	         'bb_id'  =>  $_POST['bb_id'],
	        'bn_name'  =>  $_POST['bn_name'],

		);	
	

	     $category_edit=Update('tbl_bikename', $data, "WHERE bn_id = '".$_POST['bn_id']."'");
		
        }


		$_SESSION['msg']="11"; 
		header( "Location:manage_bike_name.php");
		exit;
 
	}
        //	tbl_bikename		bn_id	bb_id	bn_name	bn_image	bn_status    

?>  

<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['bn_id'])){?>Edit<?php }else{?>Add<?php }?> Bike Name</div>
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
            	<input  type="hidden" name="bn_id" value="<?php echo $_GET['bn_id'];?>" />

              <div class="section">
                <div class="section-body">

                	 <div class="form-group">
                    <label class="col-md-3 control-label">Brands Name :-</label>
                    <div class="col-md-6">
                     <select name="bb_id" id="bb_id"  class="select2" >
                       <option value="">--Select service Name--</option>
              
                              <?php
                               
                              
                                 while ($row2=mysqli_fetch_array($results1)) 
                                 {
                            
                                  ?>

                                 <option value="<?php echo $row2['bb_id'];?>" 

                                <?php if($row['bb_id']==$row2['bb_id']){?>selected<?php }?>

                                  > <?php echo $row2['bb_name'];?></option>
                                <?php
                                }
                                 
                              ?>
                     
                            </select>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label"> Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="bn_name" id="bn_name" value="<?php if(isset($_GET['bn_id'])){echo $row['bn_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                      <div class="form-group">
                    <label class="col-md-3 control-label"> Image :-</label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="bn_image" value="fileupload" id="fileupload"  <?php if(!isset($_GET['bn_id'])) {?><?php }?>>
                            <?php if(isset($_GET['bn_id']) and $row['bn_image']!="") {?>
                            <div class="fileupload_img"><img type="image" src="images/<?php echo $row['bn_image'];?>" alt="banner image" style="width: 172px;"/></div>
                          <?php } else {?>
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="banner image" /></div>
                          <?php }?>
                      </div>
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
