<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  require_once("thumbnail_images.class.php");

   
  $cat_qry="SELECT * FROM tbl_category ORDER BY category_name";
  $cat_result=mysqli_query($mysqli,$cat_qry); 
  
  if(isset($_POST['submit']) and isset($_GET['add']))
  {
  
     $category_image=rand(0,99999)."_".$_FILES['category_image']['name'];
       
       //Main Image
     $tpath1='images/'.$category_image;        
       $pic1=compress_image($_FILES["category_image"]["tmp_name"], $tpath1, 80);
   
    //Thumb Image 
     $thumbpath='images/thumbs/'.$category_image;   
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'300','300');   
 
          
       $data = array( 
             'category_desc'  =>  $_POST['category_desc'],
          'category_name'  =>  $_POST['category_name'],
            'category_link'  =>  $_POST['category_link'],
         'category_image'  =>  $category_image ,
            'status'  =>  1
          );    

    $qry = Insert('tbl_inner_app',$data);  
 

    $_SESSION['msg']="10";
 
   header( "Location:manage_inner_app.php");
    exit; 

         
  }
  
  if(isset($_GET['app_id']))
  {
       
      $qry="SELECT * FROM tbl_inner_app where cid='".$_GET['app_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }

  if(isset($_POST['submit']) and isset($_POST['app_id']))
  {
     
     if($_FILES['category_image']['name']!="")
     {    


        $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_inner_app WHERE cid='.$_GET['app_id'].'');
          $img_res_row=mysqli_fetch_assoc($img_res);
      

          if($img_res_row['category_image']!="")
            {
              unlink('images/thumbs/'.$img_res_row['category_image']);
              unlink('images/'.$img_res_row['category_image']);
           }

           $category_image=rand(0,99999)."_".$_FILES['category_image']['name'];
       
             //Main Image
           $tpath1='images/'.$category_image;        
             $pic1=compress_image($_FILES["category_image"]["tmp_name"], $tpath1, 80);
         
          //Thumb Image 
           $thumbpath='images/thumbs/'.$category_image;   
           $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'300','300');

                     $data = array( 
                       'cat_id'  =>  $_POST['cat_id'],
                        'category_desc'  =>  $_POST['category_desc'],
          'category_name'  =>  $_POST['category_name'],
            'category_link'  =>  $_POST['category_link'],
         'category_image'  =>  $category_image 
          );    

          $category_edit=Update('tbl_inner_app', $data, "WHERE cid = '".$_POST['app_id']."'");

     }
     else
     {

         $data = array( 
           'cat_id'  =>  $_POST['cat_id'],
            'category_desc'  =>  $_POST['category_desc'],
          'category_name'  =>  $_POST['category_name'],
            'category_link'  =>  $_POST['category_link']
          );    
 
               $category_edit=Update('tbl_inner_app', $data, "WHERE cid = '".$_POST['app_id']."'");

     }
 
    
    $_SESSION['msg']="11"; 
    header( "Location:manage_inner_app.php");
    exit;
 
  }


?>
<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['cat_id'])){?>Edit<?php }else{?>Add<?php }?> App</div>
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
              <input  type="hidden" name="app_id" value="<?php echo $_GET['app_id'];?>" />

              <div class="section">
                <div class="section-body">
                   <div class="form-group">
                    <label class="col-md-3 control-label">Category :-</label>
                    <div class="col-md-6">
                      <select name="cat_id" id="cat_id" class="select2" required>
                        <option value="">--Select Category--</option>
                        <?php
                            while($cat_row=mysqli_fetch_array($cat_result))
                            {
                        ?>                       
                        <option value="<?php echo $cat_row['cid'];?>"><?php echo $cat_row['category_name'];?></option>                           
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 control-label">App Desc :-
                    
                    </label>
                    <div class="col-md-6">
                      <input type="text" name="category_desc" id="category_desc" value="<?php if(isset($_GET['app_id'])){echo $row['category_desc'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">App Name :-
                    
                    </label>
                    <div class="col-md-6">
                      <input type="text" name="category_name" id="category_name" value="<?php if(isset($_GET['app_id'])){echo $row['category_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">App link :-
                    
                    </label>
                    <div class="col-md-6">
                      <input type="text" name="category_link" id="category_link" value="<?php if(isset($_GET['app_id'])){echo $row['category_link'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Select Image :-
                      <p class="control-label-help">(Recommended resolution: 300x300,400x400 or Square Image)</p>
                    </label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="category_image" value="fileupload" id="fileupload">
                            
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="category image" /></div>
                           
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">&nbsp; </label>
                    <div class="col-md-6">
                      <?php if(isset($_GET['app_id']) and $row['category_image']!="") {?>
                            <div class="block_wallpaper"><img src="images/<?php echo $row['category_image'];?>" alt="category image" /></div>
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
