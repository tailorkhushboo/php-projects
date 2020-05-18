<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  require_once("thumbnail_images.class.php");

   
  $qry1="SELECT * FROM `tbl_city` ORDER BY c_name";
  $results1=mysqli_query($mysqli,$qry1);



  if(isset($_POST['submit']) and isset($_GET['add']))
  {
      
          
    // c_id	c_name	c_status
     
       $data = array( 
           'c_id' => $_POST['c_id'],
          'ar_name' => $_POST['ar_name'],
          'a_status'  => 1
   
          );    

    $qry = Insert('tbl_area',$data);  
 

    $_SESSION['msg']="10";
 
    header( "Location:manage_area.php");
    exit; 

     
    
  }
  
  if(isset($_GET['ar_id']))
  {
       
      $qry="SELECT * FROM tbl_area where ar_id='".$_GET['ar_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }
  if(isset($_POST['submit']) and isset($_POST['ar_id']))
  {


 
             
             
                $data = array(
                    'c_id' => $_POST['c_id'],
          'ar_name' => $_POST['ar_name'],
                         );



     $category_edit=Update('tbl_area', $data, "WHERE ar_id = '".$_POST['ar_id']."'");

    
                    
          

  

         
    
    $_SESSION['msg']="11"; 
    header( "Location:add_area.php?ar_id=".$_POST['ar_id']);
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
              <div class="page_title"><?php if(isset($_GET['a_id'])){?>Edit<?php }else{?>Add<?php }?> Area </div>
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
              <input  type="hidden" name="ar_id" value="<?php echo $_GET['ar_id'];?>" />

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
                      <input type="text" name="ar_name" id="ar_name" value="<?php if(isset($_GET['ar_id'])){echo $row['ar_name'];}?>" class="form-control" >
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
