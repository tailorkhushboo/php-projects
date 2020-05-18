<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  if(isset($_POST['data_search']))
   {

      $qry="SELECT * FROM tbl_category                   
                  WHERE tbl_category.category_name like '%".addslashes($_POST['search_value'])."%'
                  ORDER BY tbl_category.category_name";
 
     $result=mysqli_query($mysqli,$qry); 

   }
   else
   {
  
  //Get all Category 
   
      $tableName="tbl_sub_category";   
      $targetpage = "manage_sub_category.php"; 
      $limit = 12; 
      
      $query = "SELECT COUNT(*) as num FROM $tableName";
      $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
      $total_pages = $total_pages['num'];
      
      $stages = 3;
      $page=0;
      if(isset($_GET['page'])){
      $page = mysqli_real_escape_string($mysqli,$_GET['page']);
      }
      if($page){
        $start = ($page - 1) * $limit; 
      }else{
        $start = 0; 
        } 
      
     $qry="SELECT * FROM tbl_sub_category
     left join tbl_category on tbl_category.c_id=tbl_sub_category.c_id
WHERE tbl_sub_category.sub_id
                   ORDER BY tbl_sub_category.sub_id DESC LIMIT $start, $limit";
 
     $result=mysqli_query($mysqli,$qry); 
  
    } 

  if(isset($_GET['sub_id']))
  { 

    $cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_sub_category WHERE sub_id=\''.$_GET['sub_id'].'\'');
    $cat_res_row=mysqli_fetch_assoc($cat_res);


    if($cat_res_row['sub_image']!="")
      {
        unlink('images/'.$cat_res_row['sub_image']);
        unlink('images/thumbs/'.$cat_res_row['sub_image']);

    }
 
    Delete('tbl_sub_category','sub_id='.$_GET['sub_id'].'');

     
    $_SESSION['msg']="12";
    header( "Location:manage_sub_category.php");
    exit;
    
  } 

  function get_total_item($cat_id)
  { 
    global $mysqli;   

    $qry_songs="SELECT COUNT(*) as num FROM tbl_sub_category WHERE sub_id='".$cat_id."'";
     
    $total_songs = mysqli_fetch_array(mysqli_query($mysqli,$qry_songs));
    $total_songs = $total_songs['num'];
     
    return $total_songs;

  }

  //Active and Deactive status
if(isset($_GET['status_deactive_id']))
{
   $data = array('sub_status'  =>  '0');
  
   $edit_status=Update('tbl_sub_category', $data, "WHERE sub_id = '".$_GET['status_deactive_id']."'");
  
   $_SESSION['msg']="14";
   header( "Location:manage_sub_category.php");
   exit;
}
if(isset($_GET['status_active_id']))
{
    $data = array('sub_status'  =>  '1');
    
    $edit_status=Update('tbl_sub_category', $data, "WHERE sub_id = '".$_GET['status_active_id']."'");
    
    $_SESSION['msg']="13";   
    header( "Location:manage_sub_category.php");
    exit;
}  
   
?>
                
    <div class="row">
      <div class="col-xs-12">
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Manage sub Categories</div>
            </div>
            <div class="col-md-7 col-xs-12">
              <div class="search_list">
                <div class="search_block">
                  <form  method="post" action="">
                  <input class="form-control input-sm" placeholder="Search category..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                        <button type="submit" name="data_search" class="btn-search"><i class="fa fa-search"></i></button>
                  </form>  
                </div>
                <div class="add_btn_primary"> <a href="add_sub_category.php?add=yes">Add Sub Category</a> </div>
              </div>
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
          <div class="col-md-12 mrg-top">
            <div class="row">
              <?php 
              $i=0;
              while($row=mysqli_fetch_array($result))
              {         
          ?>
              <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="block_wallpaper add_wall_category">           
                  <div class="wall_image_title">
                    <h2><a href="#"><?php echo $row['sub_name'];?></a></h2>
                    <ul>                
                      <li><a href="add_sub_category.php?sub_id=<?php echo $row['sub_id'];?>" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>               
                      <li><a href="?sub_id=<?php echo $row['sub_id'];?>" data-toggle="tooltip" data-tooltip="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="fa fa-trash"></i></a></li>
                      
                      <?php if($row['sub_status']!="0"){?>
                      <li><div class="row toggle_btn"><a href="manage_sub_category.php?status_deactive_id=<?php echo $row['sub_id'];?>" data-toggle="tooltip" data-tooltip="ENABLE"><img src="assets/images/btn_enabled.png" alt="wallpaper_1" /></a></div></li>

                      <?php }else{?>
                      
                      <li><div class="row toggle_btn"><a href="manage_sub_category.php?status_active_id=<?php echo $row['sub_id'];?>" data-toggle="tooltip" data-tooltip="DISABLE"><img src="assets/images/btn_disabled.png" alt="wallpaper_1" /></a></div></li>
                  
                      <?php }?>


                    </ul>
                  </div>
                  <span><img src="images/<?php echo $row['sub_image'];?>" /></span>
                </div>
              </div>
          <?php
            
            $i++;
              }
        ?>     
               
      </div>
          </div>
          <div class="col-md-12 col-xs-12">
            <div class="pagination_item_block">
              <nav>
                <?php if(!isset($_POST["data_search"])){ include("pagination.php");}?>
              </nav>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
        
<?php include("includes/footer.php");?>       
