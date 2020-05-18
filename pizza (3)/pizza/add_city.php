<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  require_once("thumbnail_images.class.php");

   
  $qry1="SELECT * FROM `tbl_category` ORDER BY c_name";
  $results1=mysqli_query($mysqli,$qry1);



  if(isset($_POST['submit']) and isset($_GET['add']))
  {
      
          
    // c_id	c_name	c_status
     
       $data = array( 
          'c_name' => $_POST['c_name'],
          'c_status'  => 1
   
          );    

    $qry = Insert('tbl_city',$data);  
 

    $_SESSION['msg']="10";
 
    header( "Location:manage_city.php");
    exit; 

     
    
  }
  
  if(isset($_GET['c_id']))
  {
       
      $qry="SELECT * FROM tbl_city where c_id='".$_GET['c_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }
  if(isset($_POST['submit']) and isset($_POST['c_id']))
  {


 
             
             
                $data = array(
                   'c_name' => $_POST['c_name'],

                         );



     $category_edit=Update('tbl_city', $data, "WHERE c_id = '".$_POST['c_id']."'");

    
                    
          

  

         
    
    $_SESSION['msg']="11"; 
    header( "Location:add_city.php?c_id=".$_POST['c_id']);
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
                    <label class="col-md-3 control-label"> Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="c_name" id="c_name" value="<?php if(isset($_GET['c_id'])){echo $row['c_name'];}?>" class="form-control" >
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
