<?php include("includes/header.php");

$qry_cat="SELECT COUNT(*) as num FROM tbl_service";
$total_category= mysqli_fetch_array(mysqli_query($mysqli,$qry_cat));
$total_category = $total_category['num'];

$qry_sub_cat="SELECT COUNT(*) as num FROM tbl_book";
$total_sub_cat = mysqli_fetch_array(mysqli_query($mysqli,$qry_sub_cat));
$total_sub_cat = $total_sub_cat['num'];


$qry_sub_sub_cat="SELECT COUNT(*) as num FROM tbl_users";
$total_sub_sub_cat = mysqli_fetch_array(mysqli_query($mysqli,$qry_sub_sub_cat));
$total_sub_sub_cat = $total_sub_sub_cat['num'];

$qry_pdf="SELECT COUNT(*) as num FROM tbl_pdf";
$total_pdf = mysqli_fetch_array(mysqli_query($mysqli,$qry_pdf));
$total_pdf = $total_pdf['num'];
 
 
 $qry_bikename="SELECT COUNT(*) as num FROM tbl_bikename";
$total_bikename = mysqli_fetch_array(mysqli_query($mysqli,$qry_bikename));
$total_bikename = $total_bikename['num'];


 $qry_bikebrand="SELECT COUNT(*) as num FROM tbl_bikebrand";
$total_bikebrand = mysqli_fetch_array(mysqli_query($mysqli,$qry_bikebrand));
$total_bikebrand = $total_bikebrand['num'];

 $qry_inquiryform="SELECT COUNT(*) as num FROM tbl_inquiryform";
$total_inquiryform = mysqli_fetch_array(mysqli_query($mysqli,$qry_inquiryform));
$total_inquiryform = $total_inquiryform['num'];

?>       



    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_service.php" class="card card-banner card-green-light">
        <div class="card-body"> <i class="icon fa fa-sitemap fa-4x"></i>
          <div class="content">
            <div class="title">Service</div>
            <div class="value"><span class="sign"></span><?php echo $total_category;?></div>
          </div>
        </div>
        </a> 
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_book.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-film fa-4x"></i>
          <div class="content">
            <div class="title">Book</div>
            <div class="value"><span class="sign"></span><?php echo $total_sub_cat;?></div>
          </div>
        </div>
        </a> 
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_user.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title"> User </div>
            <div class="value"><span class="sign"></span><?php echo $total_sub_sub_cat;?></div>
          </div>
        </div>
        </a> </div>
        
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_brands.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title"> Brands </div>
            <div class="value"><span class="sign"></span><?php echo $total_bikebrand;?></div>
          </div>
        </div>
        </a> </div> 
        
       <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_bike_name.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title"> Bike Name </div>
            <div class="value"><span class="sign"></span><?php echo $total_bikename;?></div>
          </div>
        </div>
        </a> </div> 
        
        
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_inquiryform.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title"> InquiryForm </div>
            <div class="value"><span class="sign"></span><?php echo $total_inquiryform;?></div>
          </div>
        </div>
        </a> </div> 
        
 

     
    </div>

        
<?php include("includes/footer.php");?>       
