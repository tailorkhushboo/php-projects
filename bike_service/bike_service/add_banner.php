<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

	require_once("thumbnail_images.class.php");

	 
	
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
	
	   $banner_image=rand(0,99999)."_".$_FILES['b_image']['name'];
		 	 
       //Main Image
	   $tpath1='images/'.$banner_image; 			 
       $pic1=compress_image($_FILES["b_image"]["tmp_name"], $tpath1, 80);
	 
		//Thumb Image 
	   $thumbpath='images/thumbs/'.$banner_image;		
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
 
          
       $data = array( 
           'b_name'  =>  $_POST['b_name'],
			    'b_image'  =>  $banner_image,
			    'b_status' => '1'
			    );		

 		$qry = Insert('tbl_banner',$data);	

 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_banner.php");
		exit;	

		 
		
	}
	
	if(isset($_GET['banner_id']))
	{
			 
			$qry="SELECT * FROM tbl_banner where b_id='".$_GET['banner_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}
	if(isset($_POST['submit']) and isset($_POST['banner_id']))
	{
		 
		 if($_FILES['b_image']['name']!="")
		 {		


				$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_banner WHERE b_id='.$_GET['banner_id'].'');
			    $img_res_row=mysqli_fetch_assoc($img_res);
			

			    if($img_res_row['b_image']!="")
		        {
					unlink('images/thumbs/'.$img_res_row['b_image']);
					unlink('images/'.$img_res_row['b_image']);
			     }

 				   $banner_image=rand(0,99999)."_".$_FILES['b_image']['name'];
		 	 
			       //Main Image
				   $tpath1='images/'.$banner_image; 			 
			       $pic1=compress_image($_FILES["b_image"]["tmp_name"], $tpath1, 80);
				 
					//Thumb Image 
				   $thumbpath='images/thumbs/'.$banner_image;		
			       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');

                    $data = array(
                        'b_name'  =>  $_POST['b_name'],
					    'b_image'  =>  $banner_image,
				
					  
						);

					$category_edit=Update('tbl_banner', $data, "WHERE b_id = '".$_POST['banner_id']."'");

		 }
		 else
		 {

					 $data = array(
			          'b_name'  =>  $_POST['b_name'],
			     
			     
						);	
 
			         $category_edit=Update('tbl_banner', $data, "WHERE b_id = '".$_POST['banner_id']."'");

		 }

		     
		$_SESSION['msg']="11"; 
		header( "Location:add_banner.php?banner_id=".$_POST['banner_id']);
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
                    <label class="col-md-3 control-label"> Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="b_name" id="b_name" value="<?php if(isset($_GET['banner_id'])){echo $row['b_name'];}?>" class="form-control" required>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-md-3 control-label">Select Image :-
                      <p class="control-label-help">(Recommended resolution: 300x300,400x400 or Square Image)</p>
                    </label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="b_image" value="fileupload" id="fileupload">
                            
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="category image" /></div>
                           
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">&nbsp; </label>
                    <div class="col-md-6">
                      <?php if(isset($_GET['banner_id']) and $row['b_image']!="") {?>
                            <div class="block_wallpaper"><img src="images/<?php echo $row['b_image'];?>" alt="category image" /></div>
                          <?php } ?>
                    </div>
                  </div><br>

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
