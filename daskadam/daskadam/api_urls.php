<?php include("includes/header.php");

$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
?>
<div class="row">
      <div class="col-sm-12 col-xs-12">
     	 	<div class="card">
		        <div class="card-header">
		          Example API urls
		        </div>
       			    <div class="card-body no-padding">
         		
         			 <pre><code class="html">
<b>App Details</b><br><?php echo $file_path."api.php?settings"?><br>
<b>Featured_video Videos</b><br><?php echo $file_path."api.php?featured_video"?><br>
<b>Latest Videos</b><br><?php echo $file_path."api.php?latest_video&page=1"?><br>
<b>Popular Videos</b><br><?php echo $file_path."api.php?popular_video&page=1"?><br>
<b>All videos</b><br><?php echo $file_path."api.php?all_video&page=1"?><br>
<b>Category List</b><br><?php echo $file_path."api.php?cat_list=1"?><br>
<b>Videos list by Cat ID</b><br><?php echo $file_path."api.php?cat_id=2&page=1"?><br>
<b>Single Video</b><br><?php echo $file_path."api.php?video_id=8"?><br>
<b>Search Video</b><br><?php echo $file_path."api.php?search_text=the&page=1"?><br>
<b>video_id_download Video</b><br><?php echo $file_path."api.php?video_id_download=1"?><br>
<b>video_id_like Video</b><br><?php echo $file_path."api.php?video_id_like=1"?><br>
       				</div>
          	</div>
        </div>
</div>
    <br/>
    <div class="clearfix"></div>
        
<?php include("includes/footer.php");?>       
