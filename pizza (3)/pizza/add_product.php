<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  require_once("thumbnail_images.class.php");

   
  $qry1="SELECT * FROM `tbl_category` ORDER BY c_name";
  $results1=mysqli_query($mysqli,$qry1);



  if(isset($_POST['submit']) and isset($_GET['add']))
  {
      
 // sub_sub_oprice  sub_sub_nprice
          
$banner_image=rand(0,99999)."_".$_FILES['p_image']['name'];
       
       //Main Image
     $tpath1='images/'.$banner_image;        
       $pic1=compress_image($_FILES["p_image"]["tmp_name"], $tpath1, 80);
   
    //Thumb Image 
     $thumbpath='images/thumbs/'.$banner_image;   
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
 	
          
          
       $data = array( 
          'c_id' => $_POST['c_id'],
          'p_name'  =>  $_POST['p_name'],
           'p_dec'  =>  $_POST['p_dec'],
          'p_reg_price'  =>  $_POST['p_reg_price'],
          'p_med_price'  =>  $_POST['p_med_price'],
          'p_lar_price'  =>  $_POST['p_lar_price'],
          'p_image'  =>  $banner_image,
          'p_status'=>1
          );    

    $qry = Insert('tbl_product',$data);  
 

    $_SESSION['msg']="10";
 
    header( "Location:manage_product.php");
    exit; 

     
    
  }
  
  if(isset($_GET['p_id']))
  {
       
      $qry="SELECT * FROM tbl_product where p_id='".$_GET['p_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }
  if(isset($_POST['submit']) and isset($_POST['p_id']))
  {


         if($_FILES['p_image']['name']!="")
     {   


         $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_product WHERE p_id='.$_POST['p_id'].'');
          $img_res_row=mysqli_fetch_assoc($img_res);
      

          if($img_res_row['p_image']!="")
            {
          unlink('images/thumbs/'.$img_res_row['p_image']);
          unlink('images/'.$img_res_row['p_image']);
           }

           $banner_image=rand(0,99999)."_".$_FILES['p_image']['name'];
       
             //Main Image
           $tpath1='images/'.$banner_image;        
             $pic1=compress_image($_FILES["p_image"]["tmp_name"], $tpath1, 80);
         
          //Thumb Image 
           $thumbpath='images/thumbs/'.$banner_image;   
             $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');
             
             
                $data = array(
                  'c_id' => $_POST['c_id'],
          'p_name'  =>  $_POST['p_name'],
           'p_dec'  =>  $_POST['p_dec'],
          'p_reg_price'  =>  $_POST['p_reg_price'],
          'p_med_price'  =>  $_POST['p_med_price'],
          'p_lar_price'  =>  $_POST['p_lar_price'],
          'p_image'  =>  $banner_image,

                         );



     $category_edit=Update('tbl_product', $data, "WHERE p_id = '".$_POST['p_id']."'");

     } else
     {

        		  $data = array(
		    'c_id' => $_POST['c_id'],
          'p_name'  =>  $_POST['p_name'],
           'p_dec'  =>  $_POST['p_dec'],
          'p_reg_price'  =>  $_POST['p_reg_price'],
          'p_med_price'  =>  $_POST['p_med_price'],
          'p_lar_price'  =>  $_POST['p_lar_price'],
      
    

		);	
	
$category_edit=Update('tbl_product', $data, "WHERE p_id = '".$_POST['p_id']."'");
		
        }

                    
          

  

         
    
    $_SESSION['msg']="11"; 
    header( "Location:add_product.php?p_id=".$_POST['p_id']);
    exit;
 
  }


?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


<script type="text/javascript">
  $(function() {
   
   $("#c_id").bind("change", function() {
       $.ajax({
           type: "GET", 
           url: "change.php",
           data: "c_id="+$("#c_id").val(),
           success: function(response) {
               $("#sub_id").html(response);
           }
       });
   });
        
   
  });
</script>

<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['p_id'])){?>Edit<?php }else{?>Add<?php }?> Category</div>
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
              <input  type="hidden" name="p_id" value="<?php echo $_GET['p_id'];?>" />

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
                      <input type="text" name="p_name" id="p_name" value="<?php if(isset($_GET['p_id'])){echo $row['p_name'];}?>" class="form-control" >
                    </div>
                  </div>
        
                  <div class="form-group">
                    <label class="col-md-3 control-label"> Description :-</label>
                    <div class="col-md-6">
                      <!--<input type="text" name="p_dec" id="p_dec" value="<?php if(isset($_GET['p_id'])){echo $row['p_dec'];}?>" class="form-control" >-->
                      <textarea rows="4" name="p_dec" id="p_dec" cols="50"><?php if(isset($_GET['p_id'])){echo $row['p_dec'];}?></textarea>
                    </div>
                  </div>
        

                    <div class="form-group">
                    <label class="col-md-3 control-label"> Regular Price:-</label>
                    <div class="col-md-6">
                      <input type="text" name="p_reg_price" id="p_reg_price" value="<?php if(isset($_GET['p_id'])){echo $row['p_reg_price'];}?>" class="form-control" required>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-md-3 control-label">Medium Price :-</label>
                    <div class="col-md-6">
                      <input type="text" name="p_med_price" id="p_med_price" value="<?php if(isset($_GET['p_id'])){echo $row['p_med_price'];}?>" class="form-control" >
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">Large Price :-</label>
                    <div class="col-md-6">
                      <input type="text" name="p_lar_price" id="p_lar_price" value="<?php if(isset($_GET['p_id'])){echo $row['p_lar_price'];}?>" class="form-control" >
                    </div>
                  </div>
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Image :-</label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="p_image" value="fileupload" id="fileupload"  <?php if(!isset($_GET['p_id'])) {?>required<?php }?>>
                            <?php if(isset($_GET['p_id']) and $row['p_image']!="") {?>
                            <div class="fileupload_img"><img type="image" src="images/<?php echo $row['p_image'];?>" alt="banner image" style="width: 172px;"/></div>
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
