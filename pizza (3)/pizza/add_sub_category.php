<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  require_once("thumbnail_images.class.php");

   
  $qry1="SELECT * FROM `tbl_category` ORDER BY c_name";
  $results1=mysqli_query($mysqli,$qry1);

  if(isset($_POST['submit']) and isset($_GET['add']))
  {
  
     $category_image=rand(0,99999)."_".$_FILES['sub_image']['name'];
       
       //Main Image
     $tpath1='images/'.$category_image;        
       $pic1=compress_image($_FILES["sub_image"]["tmp_name"], $tpath1, 80);
   
    //Thumb Image 
     $thumbpath='images/thumbs/'.$category_image;   
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'300','300');   
 
          
       $data = array( 
          'c_id' => $_POST['c_id'],
          'sub_name'  =>  $_POST['sub_name'],
          'sub_image'  =>  $category_image,
       
          'sub_status'=>1
          );    

    $qry = Insert('tbl_sub_category',$data);  
 

    $_SESSION['msg']="10";
 
    header( "Location:manage_sub_category.php");
    exit; 

     
    
  }
  
  if(isset($_GET['sub_id']))
  {
       
      $qry="SELECT * FROM tbl_sub_category where sub_id='".$_GET['sub_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }
  if(isset($_POST['submit']) and isset($_POST['sub_id']))
  {
     
     if($_FILES['sub_image']['name']!="")
     {    


        $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_sub_category WHERE sub_id='.$_GET['sub_id'].'');
          $img_res_row=mysqli_fetch_assoc($img_res);
      

          if($img_res_row['sub_image']!="")
            {
          unlink('images/thumbs/'.$img_res_row['sub_image']);
          unlink('images/'.$img_res_row['sub_image']);
           }

           $category_image=rand(0,99999)."_".$_FILES['sub_image']['name'];
       
             //Main Image
           $tpath1='images/'.$category_image;        
             $pic1=compress_image($_FILES["sub_image"]["tmp_name"], $tpath1, 80);
         
          //Thumb Image 
           $thumbpath='images/thumbs/'.$category_image;   
             $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');

                    $data = array(
              'c_id' => $_POST['c_id'],
          'sub_name'  =>  $_POST['sub_name'],
          'sub_image'  =>  $category_image,



            );

          $category_edit=Update('tbl_sub_category', $data, "WHERE sub_id = '".$_POST['sub_id']."'");

     }
     else
     {

           $data = array(
                  'c_id' => $_POST['c_id'],
          'sub_name'  =>  $_POST['sub_name'],


          
            );  
 
               $category_edit=Update('tbl_sub_category', $data, "WHERE sub_id = '".$_POST['sub_id']."'");

     }

         
    
    $_SESSION['msg']="11"; 
    header( "Location:add_sub_category.php?sub_id=".$_POST['sub_id']);
    exit;
 
  }


?>
<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['sub_id'])){?>Edit<?php }else{?>Add<?php }?> Category</div>
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
              <input  type="hidden" name="sub_id" value="<?php echo $_GET['sub_id'];?>" />

              <div class="section">
                <div class="section-body">
        
                  <div class="form-group">
                    <label class="col-md-3 control-label">Category Name: :-</label>
                    <div class="col-md-6">
                     <select name="c_id" id="c_id" class="select2">
                       <option value="">--Select Category--</option>
              
                              <?php
                               
                              
                                 while ($row1=mysqli_fetch_array($results1)) 
                                 {
                            
                                  ?>

                                 <option value="<?php echo $row1['c_id'];?>" 

                                <?php if($row['c_id']==$row1['c_id']){?>selected<?php }?>

                                  > <?php echo $row1['c_name'];?></option>
                                <?php
                                }
                                 
                              ?>
                     
                            </select>

                    </div>
                  </div>
  

  
                  <div class="form-group">
                    <label class="col-md-3 control-label"> Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="sub_name" id="sub_name" value="<?php if(isset($_GET['sub_id'])){echo $row['sub_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label"> Image :-</label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="sub_image" value="fileupload" id="fileupload">
                            <?php if(isset($_GET['sub_id']) and $row['sub_image']!="") {?>
                            <div class="fileupload_img"><img type="image" src="images/<?php echo $row['sub_image'];?>" alt="category image" /></div>
                          <?php } else {?>
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="category image" /></div>
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
