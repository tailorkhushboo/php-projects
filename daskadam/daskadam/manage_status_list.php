<?php
include("includes/header.php");
require("includes/function.php");
require("language/language.php");
$mysqli->set_charset('utf8mb4');

   //Get all Wallpaper 
	
      $tableName="tbl_status_list";   
      $targetpage = "manage_status_list.php"; 
      $limit = 20; 
      
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
      
     $quotes_qry="SELECT * FROM tbl_status_list
                  LEFT JOIN tbl_status_cat ON tbl_status_list.cid= tbl_status_cat.sid 
                  ORDER BY `tbl_status_list`.`id` DESC LIMIT $start, $limit";
 
     $result=mysqli_query($mysqli,$quotes_qry); 


if (isset($_GET['video_id'])) {
    

	
    Delete('tbl_status_list', 'id=' . $_GET['video_id'] . '');
    
	$_SESSION['msg'] = "12";
    header("Location:manage_status_list.php");
    exit;
}


//Active and Deactive status
 if (isset($_GET['status_deactive_id'])) {
     $data = array('status' => '0');
     $edit_status = Update('tbl_video', $data, "WHERE id = '" . $_GET['status_deactive_id'] . "'");
     $_SESSION['msg'] = "14";
     header("Location:manage_status_list.php");
     exit;
 }if (isset($_GET['status_active_id'])) {
     $data = array('status' => '1');
     $edit_status = Update('tbl_video', $data, "WHERE id = '" . $_GET['status_active_id'] . "'");
     $_SESSION['msg'] = "13";
     header("Location:manage_status_list.php");
     exit;
 }
 
?>
    <div class="row">
    <div class="col-xs-12">
        <div class="card mrg_bottom">
            <div class="page_title_block">
                <div class="col-md-5 col-xs-12">
                    <div class="page_title">Manage Status</div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="search_list">
                        <div class="add_btn_primary"><a href="add_status.php?add=yes">Add Status</a></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row mrg-top">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12">
                        <?php if (isset($_SESSION['msg'])) { ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                <?php echo $client_lang[$_SESSION['msg']]; ?></a>
                            </div>
                            <?php unset($_SESSION['msg']);
                        } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mrg-top">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>categories</th>
                      <th>quote</th>
                     
                        <th class="cat_action_list">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['quote']; ?></td>
                            <td> <a href="?video_id=<?php echo $row['id']; ?>"
																		class="btn btn-default"
                                    onclick="return confirm('Are you sure you want to delete this video?');">Delete</a>

                                      <a href="add_status.php?banner_id=<?php echo $row['id'];?>" class="btn btn-primary" >EDIT</a>
                            </td>
                        </tr>
                        <?php $i++;
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 col-xs-12">
                <div class="pagination_item_block">
                    <nav>
                        <?php include("pagination.php"); ?>
                    </nav>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
<?php
include("includes/footer.php");
?>