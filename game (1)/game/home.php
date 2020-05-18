<?php include("includes/header.php");

$qry_cat="SELECT COUNT(*) as num FROM tbl_market";
$total_category= mysqli_fetch_array(mysqli_query($mysqli,$qry_cat));
$total_category = $total_category['num'];

$qry_sub_cat="SELECT COUNT(*) as num FROM tbl_bat";
$total_sub_cat = mysqli_fetch_array(mysqli_query($mysqli,$qry_sub_cat));
$total_sub_cat = $total_sub_cat['num'];


$qry_sub_sub_cat="SELECT COUNT(*) as num FROM tbl_registration";
$total_sub_sub_cat = mysqli_fetch_array(mysqli_query($mysqli,$qry_sub_sub_cat));
$total_sub_sub_cat = $total_sub_sub_cat['num'];

$qry_pdf="SELECT COUNT(*) as num FROM tbl_pdf";
$total_pdf = mysqli_fetch_array(mysqli_query($mysqli,$qry_pdf));
$total_pdf = $total_pdf['num'];
 

?>       



    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_market.php" class="card card-banner card-green-light">
        <div class="card-body"> <i class="icon fa fa-sitemap fa-4x"></i>
          <div class="content">
            <div class="title">Market</div>
            <div class="value"><span class="sign"></span><?php echo $total_category;?></div>
          </div>
        </div>
        </a> 
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_bat.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-film fa-4x"></i>
          <div class="content">
            <div class="title">Bat</div>
            <div class="value"><span class="sign"></span><?php echo $total_sub_cat;?></div>
          </div>
        </div>
        </a> 
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_user.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title">User</div>
            <div class="value"><span class="sign"></span><?php echo $total_sub_sub_cat;?></div>
          </div>
        </div>
        </a> </div> 
        
             
             
     
    </div>

        
<?php include("includes/footer.php");?>       
