<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  require_once("thumbnail_images.class.php");

   
  
  if(isset($_POST['submit']) and isset($_GET['add']))
  {
  
     $category_image=rand(0,99999)."_".$_FILES['i_image']['name'];
       
       //Main Image
     $tpath1='images/'.$category_image;        
       $pic1=compress_image($_FILES["i_image"]["tmp_name"], $tpath1, 80);
   
    //Thumb Image 
     $thumbpath='images/thumbs/'.$category_image;   
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'400','200');   
 
          
       $data = array( 
          'i_name'  =>  $_POST['i_name'],
         'i_image'  =>  $category_image
          );    

    $qry = Insert('tbl_image_category',$data);  
 

    $_SESSION['msg']="10";
 
    header( "Location:manage_image_category.php");
    exit; 

     
    
  }
  
  if(isset($_GET['i_id']))
  {
       
      $qry="SELECT * FROM tbl_image_category where i_id='".$_GET['i_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }
  if(isset($_POST['submit']) and isset($_POST['i_id']))
  {
     
     if($_FILES['i_image']['name']!="")
     {    


        $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_image_category WHERE i_id='.$_GET['i_id'].'');
          $img_res_row=mysqli_fetch_assoc($img_res);
      

          if($img_res_row['i_image']!="")
            {
              unlink('images/thumbs/'.$img_res_row['i_image']);
              unlink('images/'.$img_res_row['i_image']);
           }

           $category_image=rand(0,99999)."_".$_FILES['i_image']['name'];
       
             //Main Image
           $tpath1='images/'.$category_image;        
             $pic1=compress_image($_FILES["i_image"]["tmp_name"], $tpath1, 80);
         
          //Thumb Image 
           $thumbpath='images/thumbs/'.$category_image;   
           $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'400','200');

                    $data = array(
              'i_name'  =>  $_POST['i_name'],
              'i_image'  =>  $category_image
            );

          $category_edit=Update('tbl_image_category', $data, "WHERE i_id = '".$_POST['i_id']."'");

     }
     else
     {

           $data = array(
                'i_name'  =>  $_POST['i_name']
            );  
 
               $category_edit=Update('tbl_image_category', $data, "WHERE i_id = '".$_POST['i_id']."'");

     }
 
    
    $_SESSION['msg']="11"; 
    header( "Location:add_image_category.php?i_id=".$_POST['i_id']);
    exit;
 
  }


?>
<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['i_id'])){?>Edit<?php }else{?>Add<?php }?> Image Category </div>
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
              <input  type="hidden" name="i_id" value="<?php echo $_GET['i_id'];?>" />

              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Category Name :-
                    
                    </label>
                    <div class="col-md-6">
                      <input type="text" name="i_name" id="i_name" value="<?php if(isset($_GET['i_id'])){echo $row['i_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Select Image :-
                      <p class="control-label-help">(Recommended resolution: W:400*H:200)</p>
                    </label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="i_image" value="fileupload" id="fileupload">
                            
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="category image" /></div>
                           
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">&nbsp; </label>
                    <div class="col-md-6">
                      <?php if(isset($_GET['i_id']) and $row['i_image']!="") {?>
                            <div class="block_wallpaper"><img src="images/<?php echo $row['i_image'];?>" alt="category image" /></div>
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
