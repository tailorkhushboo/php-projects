<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

 
	 $cat_qry="SELECT * FROM tbl_category ORDER BY id";
	 $cat_result=mysqli_query($mysqli,$cat_qry); 
	


	if(isset($_GET['banner_id']))
	{
			 
			$qry="SELECT * FROM tbl_news where vid='".$_GET['banner_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}
	if(isset($_POST['submit']) and isset($_GET['banner_id']))
	{
		 
		 if($_FILES['news_image']['name']!="")
		 {		


				$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_news WHERE vid='.$_GET['banner_id'].'');
			    $img_res_row=mysqli_fetch_assoc($img_res);
			

			    if($img_res_row['news_image']!="")
		        {
					unlink('images/thumbs/'.$img_res_row['news_image']);
					unlink('images/'.$img_res_row['news_image']);
			     }

            	   $news_image=rand(0,99999)."_".$_FILES['news_image']['name'];
            		 	 
                   //Main Image
            	   $tpath1='images/'.$news_image; 			 
                   $pic1=compress_image($_FILES["news_image"]["tmp_name"], $tpath1, 80);
            	 
            		//Thumb Image 
            	   $thumbpath='images/thumbs/'.$news_image;		
                   $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');  
                   
                   $data = array( 
        			    'cat_id'  =>  $_POST['cat_id'],
        			    'news_title'  =>  $_POST['news_title'],
        			    'news_image'  =>  $news_image,
        			    'url'  =>  $_POST['url'],
        			 //   'data_description'  =>  $_POST['data_description'],
        			    'status'  =>  '1'
        			    );		
        			    
					$category_edit=Update('tbl_news', $data, "WHERE vid = '".$_GET['banner_id']."'");

		 }
		 else
		 {

				     
                   $data = array( 
        			    'cat_id'  =>  $_POST['cat_id'],
        			    'news_title'  =>  $_POST['news_title'],
        			    'url'  =>  $_POST['url'],
        			 //   'data_description'  =>  $_POST['data_description'],
        			    'status'  =>  '1'
        			    );	
			         $category_edit=Update('tbl_news', $data, "WHERE vid = '".$_GET['banner_id']."'");

		 }

		     
		$_SESSION['msg']="11"; 
		header( "Location:manage_news.php");
		exit;
 
	}

	
	  
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Add Video</div>
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
            <form action="" name="add_form" method="post" class="form form-horizontal" enctype="multipart/form-data">
 
              <div class="section">
                <div class="section-body">
                   <div class="form-group">
                    <label class="col-md-3 control-label">Category :-</label>
                    <div class="col-md-6">
                      <select name="cat_id" id="cat_id" class="select2" required>
                        <option value="">--Select Category--</option>
          							<?php
          									while($cat_row=mysqli_fetch_array($cat_result))
          									{
          							?>          						 
          							<option value="<?php echo $cat_row['id'];?>" <?php if($cat_row['id']==$row['cat_id']){?>selected<?php }?>>
          							    <?php echo $cat_row['category_name'];?></option>	          							 
          							<?php
          								}
          							?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">News Title :-</label>
                    <div class="col-md-6">
                      <input type="text" name="news_title" id="news_title"  value="<?php if(isset($_GET['banner_id'])){echo $row['news_title'];}?>" class="form-control" required>
                    </div>
                  </div>
                   
                    <div class="form-group">
                    <label class="col-md-3 control-label">URL :-</label>
                    <div class="col-md-6">
                      <input type="text" name="url" id="url" value="<?php if(isset($_GET['banner_id'])){echo $row['url'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                  <!--<div class="form-group">-->
                  <!--  <label class="col-md-3 control-label">Data Description :-</label>-->
                  <!--  <div class="col-md-6">-->
                  <!--<textarea name="data_description" id="data_description" class="form-control" rows="200" cols="200" <?php if(($_GET['banner_id'])) {echo $row['data_description'];}?> > </textarea>-->

                  <!--  <script>CKEDITOR.replace( 'data_description' );</script>-->
                  <!--</div>-->
                  </div>
                      <div class="form-group">
                    <label class="col-md-3 control-label">Select Image :-</label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="news_image" value="fileupload" id="fileupload">
                            <?php if(isset($_GET['banner_id']) and $row['news_image']!="") {?>
                        	  <div class="fileupload_img"><img type="image" src="images/<?php echo $row['news_image'];?>" alt="category image" /></div>
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
