<?php include('includes/header.php'); 

    include('includes/function.php');
	include('language/language.php');  


	if(isset($_POST['user_search']))
	 {
		 
		
		$user_qry="SELECT * FROM tbl_blog WHERE tbl_blog.bog_name like '%".addslashes($_POST['search_value'])."%' ORDER BY tbl_blog.bog_id DESC";  
							 
		$users_result=mysqli_query($mysqli,$user_qry);
		

	 }
	 else
	 {
	 
							$tableName="tbl_blog";		
							$targetpage = "manage_blog.php"; 	
							$limit = 15; 
							
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
							

						 $users_qry="SELECT * FROM tbl_blog
						 ORDER BY tbl_blog.bog_id DESC LIMIT $start, $limit";  
							 
							$users_result=mysqli_query($mysqli,$users_qry);
							
	 }
	if(isset($_GET['bog_id']))
	{
		  
		 
		Delete('tbl_blog','bog_id='.$_GET['bog_id'].'');
		
		$_SESSION['msg']="12";
		header( "Location:manage_blog.php");
		exit;
	}
										              

	//Active and Deactive status
	if(isset($_GET['status_deactive_id']))
	{
		$data = array('bog_status'  =>  '0');
		
		$edit_status=Update('tbl_blog', $data, "WHERE bog_id = '".$_GET['status_deactive_id']."'");
		
		 $_SESSION['msg']="14";
		 header( "Location:manage_blog.php");
		 exit;
	}
	if(isset($_GET['status_active_id']))
	{
		$data = array('bog_status'  =>  '1');
		
		$edit_status=Update('tbl_blog', $data, "WHERE bog_id = '".$_GET['status_active_id']."'");
		
		$_SESSION['msg']="13";
		 header( "Location:manage_blog.php");
		 exit;
	}
	 	//tbl_blog bog_id	bog_name	bog_image	bog_desc	bog_status
	
?>


 <div class="row">
      <div class="col-xs-12">
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Manage Blog</div>
            </div>
            <div class="col-md-7 col-xs-12">              
                  <div class="search_list">
                    <div class="search_block">
                      <form  method="post" action="">
                        <input class="form-control input-sm" placeholder="Search..." aria-controls="DataTables_Table_0" type="search" name="search_value" required>
                        <button type="submit" name="user_search" class="btn-search"><i class="fa fa-search"></i></button>
                      </form>  
                    </div>
                    <div class="add_btn_primary"> <a href="add_blog.php?add">Add Blog</a> </div>
                  </div>
                  
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row mrg-top" >
            <div class="col-md-12">
               
              <div class="col-md-12 col-sm-12">
                <?php if(isset($_SESSION['msg'])){?> 
               	 <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                	<?php echo $client_lang[$_SESSION['msg']] ; ?></a> </div>
                <?php unset($_SESSION['msg']);}?>	
              </div>
            </div>
          </div>
          <div class="col-md-12 mrg-top" style="
    overflow: scroll;
">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Name</th>						 
				  <th>Descripation</th>
				  <th>image</th>
				  <th>Status</th>	 
                  <th class="cat_action_list">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php
						$i=0;
						while($users_row=mysqli_fetch_array($users_result))
						{
						 
				?>
                <tr>
                   <td><?php echo $users_row['bog_name'];?></td>
		           <td><?php echo $users_row['bog_desc'];?></td>   
		           <td><span class="category_img"><img src="images/thumbs/<?php echo $users_row['bog_image'];?>" /></span></td>
		           <td>
		          		<?php if($users_row['bog_status']!="0"){?>
		              <a href="manage_blog.php?status_deactive_id=<?php echo $users_row['bog_id'];?>" title="Change Status"><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Enable</span></span></a>

		              <?php }else{?>
		              <a href="manage_blog.php?status_active_id=<?php echo $users_row['bog_id'];?>" title="Change Status"><span class="badge badge-danger badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Disable </span></span></a>
		              <?php }?>
              		</td>
                   <td><a href="add_blog.php?bog_id=<?php echo $users_row['bog_id'];?>" class="btn btn-primary">Edit</a>
                    <a href="manage_blog.php?bog_id=<?php echo $users_row['bog_id'];?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-default">Delete</a></td>
                </tr>
               <?php
						
						$i++;
						}
			   ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-12 col-xs-12">
            <div class="pagination_item_block">
              <nav>
              	<?php if(!isset($_POST["search"])){ include("pagination.php");}?>                 
              </nav>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>     



<?php include('includes/footer.php');?>                  