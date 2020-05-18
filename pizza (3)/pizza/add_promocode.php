<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  require_once("thumbnail_images.class.php");





  if(isset($_POST['submit']) and isset($_GET['add']))
  {
      
          
    // p_id	p_name	p_desc	p_t&c	p_start_date	p_end_date	p_status
     
       $data = array( 
          'p_name' => $_POST['p_name'],
          'p_desc' => $_POST['p_desc'],
          'p_tandc' => $_POST['p_tandc'],
          'p_start_date' => $_POST['p_start_date'],
          'p_end_date' => $_POST['p_end_date'],
           'min_price' => $_POST['min_price'],
          'p_status'  => 1
   
          );    

    $qry = Insert('tbl_promocode',$data);  
 

    $_SESSION['msg']="10";
 
    header( "Location:manage_promocode.php");
    exit; 

     
    
  }
  
  if(isset($_GET['p_id']))
  {
       
      $qry="SELECT * FROM tbl_promocode where p_id='".$_GET['p_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }
  if(isset($_POST['submit']) and isset($_POST['p_id']))
  {

                $data = array(
          'p_name' => $_POST['p_name'],
          'p_desc' => $_POST['p_desc'],
          'p_tandc' => $_POST['p_tandc'],
          'p_start_date' => $_POST['p_start_date'],
          'p_end_date' => $_POST['p_end_date'],
              'min_price' => $_POST['min_price'],
                         );



     $category_edit=Update('tbl_promocode', $data, "WHERE p_id = '".$_POST['p_id']."'");

    $_SESSION['msg']="11"; 
    header( "Location:add_promocode.php?p_id=".$_POST['p_id']);
    exit;
 
  }


?>

<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['p_id'])){?>Edit<?php }else{?>Add<?php }?> PromoCode </div>
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
                    <label class="col-md-3 control-label"> Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="p_name" id="p_name" value="<?php if(isset($_GET['p_id'])){echo $row['p_name'];}?>" class="form-control" >
                    </div>
                  </div>
        
                    <div class="form-group">
                    <label class="col-md-3 control-label">Description :-</label>
                    <div class="col-md-6">
                 
                      <textarea name="p_desc" id="p_desc" class="form-control"><?php echo $row['p_desc'];?></textarea>

                      <script>CKEDITOR.replace( 'p_desc' );</script>
                    </div>
                  </div>
                  <br />
                  
                   <div class="form-group">
                    <label class="col-md-3 control-label">Tems and terms and conditions :-</label>
                    <div class="col-md-6">
                 
                      <textarea name="p_tandc" id="p_tandc" class="form-control"><?php echo $row['p_tandc']?></textarea>

                      <script>CKEDITOR.replace( 'p_tandc' );</script>
                    </div>
                  </div>
                  <br />
                <div class="form-group">
                    <label class="col-md-3 control-label">Start date :-</label>
                    <div class="col-md-6">
                      <input type="date" name="p_start_date" id="p_start_date" value="<?php if(isset($_GET['p_id'])){echo $row['p_start_date'];}?>" class="form-control" >
                    </div>
                  </div>
                  
                         <div class="form-group">
                    <label class="col-md-3 control-label">End date :-</label>
                    <div class="col-md-6">
                      <input type="date" name="p_end_date" id="p_end_date" value="<?php if(isset($_GET['p_id'])){echo $row['p_end_date'];}?>" class="form-control" >
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Minimum Price :-</label>
                    <div class="col-md-6">
                      <input type="text" name="min_price" id="min_price" value="<?php if(isset($_GET['p_id'])){echo $row['min_price'];}?>" class="form-control" >
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
