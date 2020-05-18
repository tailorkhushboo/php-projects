<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  require_once("thumbnail_images.class.php");

   	$cat_qry="SELECT * FROM tbl_image_category ORDER BY i_name";
	$cat_result=mysqli_query($mysqli,$cat_qry); 
  
  if(isset($_POST['submit']) )
  {
  
     $category_image=rand(0,99999)."_".$_FILES['im_image']['name'];
       
       //Main Image
     $tpath1='images/'.$category_image;        
       $pic1=compress_image($_FILES["im_image"]["tmp_name"], $tpath1, 80);
   
    //Thumb Image 
     $thumbpath='images/thumbs/'.$category_image;   
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'400','200');   
 
          
       $data = array( 
             'i_id'  =>  $_POST['i_id'],
          'im_name'  =>  $_POST['im_name'],
         'im_image'  =>  $category_image,
         'im_status' => 1
          );    

    $qry = Insert('tbl_image',$data);  
 

    $_SESSION['msg']="10";
 
    header( "Location:manage_image.php");
    exit; 

     
    
  }
  
  if(isset($_GET['im_id']))
  {
       
      $qry="SELECT * FROM tbl_image where im_id='".$_GET['im_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }
  
  
  
  

?>
<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['im_id'])){?>Edit<?php }else{?>Add<?php }?> Image</div>
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
              <input  type="hidden" name="im_id" value="<?php echo $_GET['im_id'];?>" />

              <div class="section">
                <div class="section-body">
                    
                  <div class="form-group">
                    <label class="col-md-3 control-label">Category :-</label>
                    <div class="col-md-6">
                      <select name="i_id" id="i_id" class="select2" required>
                        <option value="">--Select Category--</option>
          							<?php
          							while($cat_row=mysqli_fetch_array($cat_result))
          									{
          							?>          						 
          								<option value="<?php echo $cat_row['i_id'];?>" <?php if($cat_row['i_id']==$row['i_id']){?>selected<?php }?>><?php echo $cat_row['i_name'];?></option>	               							 
          							<?php
          								}
          							?>
                      </select>
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label class="col-md-3 control-label"> Name :-
                    
                    </label>
                    <div class="col-md-6">
                      <input type="text" name="im_name" id="im_name" value="<?php if(isset($_GET['im_id'])){echo $row['im_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Select Image :-
                      <p class="control-label-help">(Recommended resolution: W:400*H:200)</p>
                    </label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="im_image" value="fileupload" id="fileupload">
                            
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="category image" /></div>
                           
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">&nbsp; </label>
                    <div class="col-md-6">
                      <?php if(isset($_GET['im_id']) and $row['im_image']!="") {?>
                            <div class="block_wallpaper"><img src="images/<?php echo $row['im_image'];?>" alt="category image" /></div>
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
