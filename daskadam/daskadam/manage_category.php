<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

	
	//Get all Category 
	$qry="SELECT * FROM tbl_category ORDER BY tbl_category.id ASC ";
	$result=mysqli_query($mysqli,$qry);
	
	if(isset($_GET['cat_id']))
	{


		$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_category WHERE id=\''.$_GET['cat_id'].'\'');
		$cat_res_row=mysqli_fetch_assoc($cat_res);


		if($cat_res_row['category_image']!="")
	    {
	    	unlink('images/'.$cat_res_row['category_image']);
			  unlink('images/thumbs/'.$cat_res_row['category_image']);

		}
 
		Delete('tbl_category','id='.$_GET['cat_id'].'');

      
		$_SESSION['msg']="12";
		header( "Location:manage_category.php");
		exit;
		
	}	
	 
?>
                
    <div class="row">
      <div class="col-xs-12">
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Manage Categories</div>
            </div>
            <div class="col-md-7 col-xs-12">
              <div class="search_list">
                
                <div class="add_btn_primary"> <a href="add_category.php?add=yes">Add Category</a> </div>
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
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>    
                <th>id</th>
                  <th>Category</th>
          
                  <th> Image</th>
                  <th class="cat_action_list">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php	
						$i=0;
						while($row=mysqli_fetch_array($result))
						{					
				?>
                <tr>    
                 <td><?php echo $i+1 ;?></td>
        
                  <td><?php echo $row['category_name'];?></td>
                  <td><span class="category_img"><img src="images/thumbs/<?php echo $row['category_image'];?>" /></span></td>
                  <td><a href="add_category.php?cat_id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
                    <a href="?cat_id=<?php echo $row['id'];?>" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this category and related wallpaper?');">Delete</a></td>
                </tr>
                <?php
						
						$i++;
				     	}
				?> 
              </tbody>
            </table>
          </div>
           
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
        
<?php include("includes/footer.php");?>       
