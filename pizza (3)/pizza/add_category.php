<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

	require_once("thumbnail_images.class.php");

	 

	if(isset($_POST['submit']) and isset($_GET['add']))
	{

         $banner_image=rand(0,99999)."_".$_FILES['c_image']['name'];
       
       //Main Image
     $tpath1='images/'.$banner_image;        
       $pic1=compress_image($_FILES["c_image"]["tmp_name"], $tpath1, 80);
   
    //Thumb Image 
     $thumbpath='images/thumbs/'.$banner_image;   
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
 
      
  		 $data = array(
       
	        'c_name'  =>  $_POST['c_name'],
             'c_image'  =>  $banner_image,
	        'c_status'  =>  1,
		);	

 		$qry = Insert('tbl_category',$data);	
			

		$_SESSION['msg']="10";
 
		header( "Location:manage_category.php");
		exit;	

		 
		
	}
	
	if(isset($_GET['c_id']))
	{
			 
			$qry="SELECT * FROM tbl_category where c_id='".$_GET['c_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}

	if(isset($_POST['submit']) and isset($_POST['c_id']))
	{		 	

         if($_FILES['c_image']['name']!="")
     {   


         $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_category WHERE c_id='.$_POST['c_id'].'');
          $img_res_row=mysqli_fetch_assoc($img_res);
      

          if($img_res_row['c_image']!="")
            {
          unlink('images/thumbs/'.$img_res_row['c_image']);
          unlink('images/'.$img_res_row['c_image']);
           }

           $banner_image=rand(0,99999)."_".$_FILES['c_image']['name'];
       
             //Main Image
           $tpath1='images/'.$banner_image;        
             $pic1=compress_image($_FILES["c_image"]["tmp_name"], $tpath1, 80);
         
          //Thumb Image 
           $thumbpath='images/thumbs/'.$banner_image;   
             $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');

               $data = array(
             'c_name'  =>  $_POST['c_name'],
             'c_image'  =>  $banner_image,
            

		);	


       $category_edit=Update('tbl_category', $data, "WHERE c_id = '".$_POST['c_id']."'");

     } else
     {

        		  $data = array(
	       'c_name'  =>  $_POST['c_name'],
          
		);	
	

	     $category_edit=Update('tbl_category', $data, "WHERE c_id = '".$_POST['c_id']."'");
		
        }


		$_SESSION['msg']="11"; 
		header( "Location:manage_category.php");
		exit;
 
	}


?>
<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['c_id'])){?>Edit<?php }else{?>Add<?php }?> Category</div>
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
            	<input  type="hidden" name="c_id" value="<?php echo $_GET['c_id'];?>" />

              <div class="section">
                <div class="section-body">

       
              
                	
                  <div class="form-group">
                    <label class="col-md-3 control-label">Category Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="c_name" id="c_name" value="<?php if(isset($_GET['c_id'])){echo $row['c_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                      <div class="form-group">
                    <label class="col-md-3 control-label">Category Image :-</label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="c_image" value="fileupload" id="fileupload"  <?php if(!isset($_GET['c_id'])) {?>required<?php }?>>
                            <?php if(isset($_GET['c_id']) and $row['c_image']!="") {?>
                            <div class="fileupload_img"><img type="image" src="images/<?php echo $row['c_image'];?>" alt="banner image" style="width: 172px;"/></div>
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
