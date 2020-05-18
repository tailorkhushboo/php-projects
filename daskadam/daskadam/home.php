<?php include("includes/header.php");

$qry_cat="SELECT COUNT(*) as num FROM tbl_category";
$total_category= mysqli_fetch_array(mysqli_query($mysqli,$qry_cat));
$total_category = $total_category['num'];

$qry_video="SELECT COUNT(*) as num FROM tbl_video";
$total_video = mysqli_fetch_array(mysqli_query($mysqli,$qry_video));
$total_video = $total_video['num'];

$qry_user="SELECT COUNT(*) as num FROM tbl_users where payment_verify = 0";
$total_user = mysqli_fetch_array(mysqli_query($mysqli,$qry_user));
$total_user = $total_user['num'];

$qry_user1="SELECT COUNT(*) as num FROM tbl_users where payment_verify = 1";
$total_user1 = mysqli_fetch_array(mysqli_query($mysqli,$qry_user1));
$total_user1 = $total_user1['num'];

$qry_user2="SELECT COUNT(*) as num FROM tbl_users";
$total_user2 = mysqli_fetch_array(mysqli_query($mysqli,$qry_user2));
$total_user2 = $total_user2['num'];

?>       


  
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_category.php" class="card card-banner card-green-light">
        <div class="card-body"> <i class="icon fa fa-sitemap fa-4x"></i>
          <div class="content">
            <div class="title">Categories</div>
            <div class="value"><span class="sign"></span><?php echo $total_category;?></div>
          </div>
        </div>
        </a> 
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_videos.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-film fa-4x"></i>
          <div class="content">
            <div class="title">Videos</div>
            <div class="value"><span class="sign"></span><?php echo $total_video;?></div>
          </div>
        </div>
        </a> 
        </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_users.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-user fa-4x"></i>
          <div class="content">
            <div class="title">Users</div>
            <div class="value"><span class="sign"></span><?php echo $total_user2;?></div>
          </div>
        </div>
        </a> 
        </div>

    </div>
    
     <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_users.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-user fa-4x"></i>
          <div class="content">
            <div class="title">Non Users</div>
            <div class="value"><span class="sign"></span><?php echo $total_user;?></div>
          </div>
        </div>
        </a> 
        </div>
        
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_prime_member.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-user fa-4x"></i>
          <div class="content">
            <div class="title">prime Users</div>
            <div class="value"><span class="sign"></span><?php echo $total_user1;?></div>
          </div>
        </div>
        </a> 
        </div>

    </div>
    

        
<?php include("includes/footer.php");?>       
