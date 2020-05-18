<?php 
  $page_title="Manage Videos";
  include("includes/header.php");
	include("includes/connection.php");
	
	require("includes/function.php");
	require("language/language.php");

	
	 //Get all videos
   if(isset($_GET['filter']))
   {
      
      if($_GET['filter']=='enable'){
        $status="tbl_image.`im_status`='1'";
      }
      else if($_GET['filter']=='disable'){
        $status="tbl_image.`im_status`='0'";
      }
      else if($_GET['filter']=='slider'){
        $status="tbl_image.`featured`='1'";
      }
      else if($_GET['filter']=='no_slider'){
        $status="tbl_image.`featured`='0'";
      }


       $data_qry="SELECT tbl_image_category.i_name,tbl_image.* FROM tbl_image
                  LEFT JOIN tbl_image_category ON tbl_image.i_id= tbl_image_category.i_id 
                  WHERE tbl_image.featured= $status ORDER BY tbl_image.im_id DESC";                 
 
     $result=mysqli_query($mysqli,$data_qry);
   }
   else if(isset($_GET['category'])){
      $cat_id=$_GET['category'];
      $data_qry="SELECT tbl_image_category.i_name,tbl_image.* FROM tbl_image
                  LEFT JOIN tbl_image_category ON tbl_image.i_id= tbl_image_category.i_id 
                  WHERE tbl_image.`i_id`='$cat_id' ORDER BY tbl_image.im_id DESC";                 
 
      $result=mysqli_query($mysqli,$data_qry);
   }
	 else if(isset($_POST['data_search']))
   {

      $data_qry="SELECT * FROM tbl_image
                  WHERE tbl_image.im_name like '%".addslashes($_POST['search_value'])."%' 
                  ORDER BY tbl_image.im_id";
 
     $result=mysqli_query($mysqli,$data_qry); 

   }
   else
   {
      $tableName="tbl_image";   
      $targetpage = "manage_image.php"; 
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
      
     $quotes_qry="SELECT tbl_image_category.i_name,tbl_image.* FROM tbl_image
                  LEFT JOIN tbl_image_category ON tbl_image.i_id= tbl_image_category.i_id 
                  ORDER BY tbl_image.im_id DESC LIMIT $start, $limit";
 
     
	 $result=mysqli_query($mysqli,$quotes_qry); 
	 
	 }
	 
	 
	 //Active and Deactive featured
  if(isset($_GET['featured_deactive_id']))
  {
    $data = array('featured'  =>  '0');
    
    $edit_status=Update('tbl_image', $data, "WHERE im_id = '".$_GET['featured_deactive_id']."'");
    
     $_SESSION['msg']="14";
     header( "Location:manage_image.php");
     exit;
  }
  if(isset($_GET['featured_active_id']))
  {
    $data = array('featured'  =>  '1');
    
    $edit_status=Update('tbl_image', $data, "WHERE im_id = '".$_GET['featured_active_id']."'");
    
    $_SESSION['msg']="13";
     header( "Location:manage_image.php");
     exit;
  }
  
  
  if(isset($_GET['status_deactive_id']))
{
   $data = array('im_status'  =>  '0');
  
   $edit_status=Update('tbl_image', $data, "WHERE im_id = '".$_GET['status_deactive_id']."'");
  
   $_SESSION['msg']="14";
   header( "Location:manage_image.php");
   exit;
}
if(isset($_GET['status_active_id']))
{
    $data = array('im_status'  =>  '1');
    
    $edit_status=Update('tbl_image', $data, "WHERE im_id = '".$_GET['status_active_id']."'");
    
    $_SESSION['msg']="13";   
    header( "Location:manage_image.php");
    exit;
} 


?>

<style type="text/css">
</style>

<div class="row">
  <div class="col-xs-12">
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Manage Image</div>
            </div>
            <div class="col-md-7 col-xs-12">
              <div class="search_list">
                <div class="search_block">                   
                  <form  method="post" action="">
                  <input class="form-control input-sm" placeholder="Search..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                    <button type="submit" name="data_search" class="btn-search"><i class="fa fa-search"></i></button>
                  </form>  
                </div>
                <div class="add_btn_primary"> <a href="add_image.php">Add Image</a> </div>
              </div>
            </div> 

            <div class="col-md-8">
              <h4 style="float: left;">Filter: |</h4>
              <div class="search_list" style="padding: 0px 0px 5px;float: left;margin-left: 10px">
                <select name="filter_status" class="form-control filter_status" required style="padding: 5px 10px;height: 40px;">
                    <option value="">All</option>
                   
                 
                    <option value="enable" <?php if(isset($_GET['filter']) && $_GET['filter']=='enable'){ echo 'selected';} ?>>Enable</option>
                    <option value="disable" <?php if(isset($_GET['filter']) && $_GET['filter']=='disable'){ echo 'selected';} ?>>Disable</option>
                    <option value="slider" <?php if(isset($_GET['filter']) && $_GET['filter']=='slider'){ echo 'selected';} ?>>Slider</option>
                    <option value="no_slider" <?php if(isset($_GET['filter']) && $_GET['filter']=='no_slider'){ echo 'selected';} ?>>No Slider</option>
                  </select>
              </div>
              <div class="search_list" style="padding: 0px 0px 5px;float: left;margin-left: 20px">
                  <select name="filter_category" class="form-control filter_category" required style="padding: 5px 10px;height: 40px;">
                    <option value="">All Category</option>
                    <?php
                      $cat_qry="SELECT * FROM tbl_image_category ORDER BY i_name";
                      $cat_result=mysqli_query($mysqli,$cat_qry);
                      while($cat_row=mysqli_fetch_array($cat_result))
                      {
                    ?>                       
                    <option value="<?php echo $cat_row['i_id'];?>" <?php if(isset($_GET['category']) && $_GET['category']==$cat_row['i_id']){echo 'selected';} ?>><?php echo $cat_row['i_name'];?></option>                           
                    <?php
                      }
                    ?>
                  </select>
              </div>
            </div>
            <div class="col-md-4 col-xs-12 text-right" style="float: right;">
              <form method="post" action="">
                  <div class="checkbox" style="width: 100px;margin-top: 5px;margin-left: 10px;float: left;right: 110px;position: absolute;">
                    <input type="checkbox" id="checkall">
                    <label for="checkall">
                        Select All
                    </label>
                  </div>
                  <div class="dropdown" style="float:right">
                    <button class="btn btn-primary dropdown-toggle btn_delete" type="button" data-toggle="dropdown">Action
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu" style="right:0;left:auto;">
                      <li><a href="" class="actions" data-action="enable">Enable</a></li>
                      <li><a href="" class="actions" data-action="disable">Disable</a></li>
                      <li><a href="" class="actions" data-action="delete">Delete !</a></li>
                    </ul>
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
              <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="block_wallpaper">
                  <div class="wall_category_block">
                    <h2><?php echo $row['i_name'];?></h2>  
                        <?php if($row['featured']!="0"){?>
                         <a href="manage_image.php?featured_deactive_id=<?php echo $row['im_id'];?>" data-toggle="tooltip" data-tooltip="Featured">
                            <div style="color:green;">
                              <i class="fa fa-check-circle"></i></div></a> 
                        <?php }else{?>
                         <a href="manage_image.php?featured_active_id=<?php echo $row['im_id'];?>" data-toggle="tooltip" data-tooltip="Set Featured"><i class="fa fa-circle"></i></a> 
                      <?php }?>
  

                      <div class="checkbox" style="float: right;margin-top: 12px">
                        <input type="checkbox" name="post_ids[]" id="checkbox<?php echo $i;?>" value="<?php echo $row['im_id']; ?>" class="post_ids">
                        <label for="checkbox<?php echo $i;?>">
                        </label>
                      </div>

                  </div>
                  <div class="wall_image_title">
                     <p style="font-size: 16px;"><?php echo $row['im_name'];?></p>

                     <p>By: <a href="manage_user_history.php?user_id=0" style="color: #ddd">Admin</a> 
                      <img src="assets/images/verification_150.png" style="border: none;width: 15px !important;height: 15px !important">
                     </p>
                    <ul>
                     
                      <li><a href="javascript:void(0)" data-toggle="tooltip" data-tooltip="<?php echo $row['views'];?> Views"><i class="fa fa-eye"></i></a></li>        

                      <li><a href="edit_image.php?im_id=<?php echo $row['im_id'];?>" target="_blank" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>
                      <li><a href="" data-toggle="tooltip" data-tooltip="Delete" class="btn_delete_a" data-id="<?php echo $row['im_id'];?>"><i class="fa fa-trash"></i></a></li>

                           <?php if($row['im_status']!="0"){?>
                       <li>
                        <div class="row toggle_btn">
                          <a href="manage_image.php?status_deactive_id=<?php echo $row['im_id'];?>" data-toggle="tooltip" data-tooltip="ENABLE">
                            <img src="assets/images/btn_enabled.png" alt="wallpaper_1" />
                          </a>
                        </div>
                      </li> 

                      <?php }else{?>
                      
                       <li>
                        <div class="row toggle_btn">
                          <a href="manage_image.php?status_active_id=<?php echo $row['im_id'];?>" data-toggle="tooltip" data-tooltip="DISABLE"><img src="assets/images/btn_disabled.png" alt="wallpaper_1" />
                          </a>
                        </div>
                      </li> 
                  
                      <?php }?>  


                    </ul>
                  </div>
				  
                  <span>
                    <?php if($row['im_image']!=""){?>
                    <img src="images/<?php echo $row['im_image'];?>" />
                    <?php }else{?>
                    <img src="images/default_img.jpg" />
                  </span>                     
                  <?php }?>  
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

    <style type="text/css">
      iframe body{
        text-align: center !important;
      }
    </style>

    <!-- Video Preview Modal -->
    <div id="videoPreview" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding-top: 15px;padding-bottom: 15px;background: rgba(0,0,0.05);border-bottom-width: 0px;">
            <button type="button" class="close" data-dismiss="modal" style="color: #fff;font-size: 35px;font-weight: normal;opacity: 1">&times;</button>
            <h4 class="modal-title" style="color: #fff"></h4>
          </div>
          <div class="modal-body" style="padding: 0px;background: #000">
             <iframe width="100%" height="500" style="border:0" src=""></iframe>
          </div>
        </div>

      </div>
    </div>
    
        
<?php include("includes/footer.php");?>       

<script type="text/javascript">

  $('#videoPreview').on('hidden.bs.modal', function(){
      $("#videoPreview iframe").removeAttr("src");
  });

  $(".btn_preview").on("click",function(e){
    e.preventDefault();
    $("#videoPreview .modal-title").text($(this).data("title"));
    if($(this).data("url").substring(0,4)=='http' && $(this).data("url").substring(0,4)!='asse'){
      $("#videoPreview iframe").attr('src',$(this).data("url"));  
    }
    else if($(this).data("url").substring(0,4)=='asse'){
      $("#videoPreview iframe").attr('src',$(this).data("url"));  
    }
    else{
      $("#videoPreview iframe").attr('src','uploads/'+$(this).data("url"));
    }
    
    $("#videoPreview").modal("show");
  });


  $(".toggle_btn a").on("click",function(e){
    e.preventDefault();
    var _for=$(this).data("action");
    var _id=$(this).data("id");
    var _column=$(this).data("column");
    var _table='tbl_image';

    $.ajax({
      type:'post',
      url:'processData.php',
      dataType:'json',
      data:{id:_id,for_action:_for,column:_column,table:_table,'action':'toggle_status','video_status':'yes','tbl_id':'id'},
      success:function(res){
          console.log(res);
          if(res.status=='1'){
            location.reload();
          }
        }
    });

  });

   $(".toggle_btn_a").on("click",function(e){
    e.preventDefault();
    var _for=$(this).data("action");
    var _id=$(this).data("id");
    var _column=$(this).data("column");
    var _table='tbl_image';

    $.ajax({
      type:'post',
      url:'processData.php',
      dataType:'json',
      data:{id:_id,for_action:_for,column:_column,table:_table,'action':'toggle_status','tbl_id':'id'},
      success:function(res){
          console.log(res);
          if(res.status=='1'){
            location.reload();
          }
        }
    });

  });

  $(".filter_status").on("change",function(e){
    var _val=$(this).val();
    if(_val!=''){
      window.location.href="manage_image.php?filter="+_val;
    }else{
      window.location.href="manage_image.php";
    }
  });


  $(".filter_category").on("change",function(e){

    var _val=$(this).val();
    if(_val!=''){
      window.location.href="manage_image.php?category="+_val;
    }else{
      window.location.href="manage_image.php";
    }
  });


  $(".btn_notify").click(function(e){
      e.preventDefault();
      var _vid=$(this).data("vid");
      var _uid=$(this).data("uid");

      swal({
          title: "Are you sure?",
          text: "Notification will be send to your followers.",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger btn_edit",
          cancelButtonClass: "btn-warning btn_edit",
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false,
          showLoaderOnConfirm: true
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              type:'post',
              url:'processData.php',
              dataType:'json',
              data:{vid:_vid,uid:_uid,'action':'notify_users'},
              success:function(res){
                  console.log(res);
                  if(res.status=='1'){
                    swal({
                        title: "Send", 
                        text: "Notification has been sent to your followers..", 
                        type: "success"
                    },function() {
                    });
                  }
                }
            });
          }
          else{
            swal.close();
          }

        });


      
  });

  $(".actions").click(function(e){
      e.preventDefault();

      var _ids = $.map($('.post_ids:checked'), function(c){return c.value; });
      var _action=$(this).data("action");

      if(_ids!='')
      {
        swal({
          title: "Do you really want to perform?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger btn_edit",
          cancelButtonClass: "btn-warning btn_edit",
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false,
          showLoaderOnConfirm: true
        },
        function(isConfirm) {
          if (isConfirm) {

            var _table='tbl_image';

            $.ajax({
              type:'post',
              url:'processData.php',
              dataType:'json',
              data:{id:_ids,for_action:_action,table:_table,'action':'multi_action'},
              success:function(res){
                  console.log(res);
                  if(res.status=='1'){
                    swal({
                        title: "Successfully", 
                        text: "You have successfully done", 
                        type: "success"
                    },function() {
                        location.reload();
                    });
                  }
                }
            });
          }
          else{
            swal.close();
          }

        });
      }
      else{
        swal("Sorry no video selected !!")
      }
  });


  $(".btn_delete_a").click(function(e){

    e.preventDefault();

    var _id=$(this).data("id");

    swal({
        title: "Are you sure?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger btn_edit",
        cancelButtonClass: "btn-warning btn_edit",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
        showLoaderOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {

          $.ajax({
            type:'post',
            url:'processData.php',
            dataType:'json',
            data:{id:_id,'action':'delete_video'},
            success:function(res){
                console.log(res);
                if(res.status=='1'){
                  swal({
                      title: "Successfully", 
                      text: "Video is deleted...", 
                      type: "success"
                  },function() {
                      location.reload();
                  });
                }
              }
          });
        }
        else{
          swal.close();
        }
    });
  });


</script>