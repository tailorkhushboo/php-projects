<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

	require_once("thumbnail_images.class.php");

	 

	if(isset($_POST['submit']) and isset($_GET['add']))
	{

         $banner_image=rand(0,99999)."_".$_FILES['bb_image']['name'];
       
       //Main Image
     $tpath1='images/'.$banner_image;        
       $pic1=compress_image($_FILES["bb_image"]["tmp_name"], $tpath1, 80);
   
    //Thumb Image 
     $thumbpath='images/thumbs/'.$banner_image;   
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200'); 
       
       
      
  		 $data = array(
       
	        'bb_name'  =>  $_POST['bb_name'],
             'bb_image'  =>  $banner_image,
	        'bb_status'  =>  1,
		);	

 		$qry = Insert('tbl_bikebrand',$data);	
			

		$_SESSION['msg']="10";
 
		header( "Location:manage_brands.php");
		exit;	

		 
		
	}

	if(isset($_GET['bb_id']))
	{
			 
			$qry="SELECT * FROM tbl_bikebrand where bb_id='".$_GET['bb_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}

	if(isset($_POST['submit']) and isset($_POST['bb_id']))
	{		 	

         if($_FILES['bb_image']['name']!="")
     {   


         $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_bikebrand WHERE bb_id='.$_POST['bb_id'].'');
          $img_res_row=mysqli_fetch_assoc($img_res);
      

          if($img_res_row['bb_image']!="")
            {
          unlink('images/thumbs/'.$img_res_row['bb_image']);
          unlink('images/'.$img_res_row['bb_image']);
           }

           $banner_image=rand(0,99999)."_".$_FILES['bb_image']['name'];
       
             //Main Image
           $tpath1='images/'.$banner_image;        
             $pic1=compress_image($_FILES["bb_image"]["tmp_name"], $tpath1, 80);
         
          //Thumb Image 
           $thumbpath='images/thumbs/'.$banner_image;   
             $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');

               $data = array(
          'bb_name'  =>  $_POST['bb_name'],
             'bb_image'  =>  $banner_image,
            

		);	


       $category_edit=Update('tbl_bikebrand', $data, "WHERE bb_id = '".$_POST['bb_id']."'");

     } else
     {

        		  $data = array(
	      'bb_name'  =>  $_POST['bb_name'],

		);	
	

	     $category_edit=Update('tbl_bikebrand', $data, "WHERE bb_id = '".$_POST['bb_id']."'");
		
        }


		$_SESSION['msg']="11"; 
		header( "Location:manage_brands.php");
		exit;
 
	}
        //	tbl_bikebrand	bb_id	bb_name	bb_image	bb_status
       

?>  

<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['bb_id'])){?>Edit<?php }else{?>Add<?php }?>Brands</div>
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
            	<input  type="hidden" name="bb_id" value="<?php echo $_GET['bb_id'];?>" />

              <div class="section">
                <div class="section-body">

       
                	
                  <div class="form-group">
                    <label class="col-md-3 control-label"> Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="bb_name" id="bb_name" value="<?php if(isset($_GET['bb_id'])){echo $row['bb_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                      <div class="form-group">
                    <label class="col-md-3 control-label"> Image :-</label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="bb_image" value="fileupload" id="fileupload"  <?php if(!isset($_GET['bb_id'])) {?><?php }?>>
                            <?php if(isset($_GET['bb_id']) and $row['bb_image']!="") {?>
                            <div class="fileupload_img"><img type="image" src="images/<?php echo $row['bb_image'];?>" alt="banner image" style="width: 172px;"/></div>
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
