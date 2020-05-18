<?php include("includes/header.php");

$qry_cat="SELECT COUNT(*) as num FROM tbl_category";
$total_category= mysqli_fetch_array(mysqli_query($mysqli,$qry_cat));
$total_category = $total_category['num'];

$qry_sub_cat="SELECT COUNT(*) as num FROM tbl_product";
$total_sub_cat = mysqli_fetch_array(mysqli_query($mysqli,$qry_sub_cat));
$total_sub_cat = $total_sub_cat['num'];


$qry_sub_sub_cat="SELECT COUNT(*) as num FROM tbl_crust";
$total_sub_sub_cat = mysqli_fetch_array(mysqli_query($mysqli,$qry_sub_sub_cat));
$total_sub_sub_cat = $total_sub_sub_cat['num'];

$qry_topping="SELECT COUNT(*) as num FROM tbl_toppings";
$total_topping = mysqli_fetch_array(mysqli_query($mysqli,$qry_topping));
$total_topping = $total_topping['num'];

$qry_pdf="SELECT COUNT(*) as num FROM tbl_order";
$total_pdf = mysqli_fetch_array(mysqli_query($mysqli,$qry_pdf));
$total_pdf = $total_pdf['num'];

$qry_reg="SELECT COUNT(*) as num FROM tbl_registration";
$total_reg = mysqli_fetch_array(mysqli_query($mysqli,$qry_reg));
$total_reg = $total_reg['num'];
 
 $qry_city="SELECT COUNT(*) as num FROM tbl_city";
$total_city = mysqli_fetch_array(mysqli_query($mysqli,$qry_city));
$total_city = $total_city['num'];

 $qry_area="SELECT COUNT(*) as num FROM tbl_area";
$total_area = mysqli_fetch_array(mysqli_query($mysqli,$qry_area));
$total_area = $total_area['num'];

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
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_product.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-film fa-4x"></i>
          <div class="content">
            <div class="title">Product</div>
            <div class="value"><span class="sign"></span><?php echo $total_sub_cat;?></div>
          </div>
        </div>
        </a> 
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_crust.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title"> Crust </div>
            <div class="value"><span class="sign"></span><?php echo $total_sub_sub_cat;?></div>
          </div>
        </div>
        </a> </div> 
        
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_topping.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title"> Topping </div>
            <div class="value"><span class="sign"></span><?php echo $total_topping;?></div>
          </div>
        </div>
        </a> </div> 
        
        

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_order.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title">Order</div>
            <div class="value"><span class="sign"></span><?php echo $total_pdf;?></div>
          </div>
        </div>
        </a> </div> 
        
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_user.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title">User</div>
            <div class="value"><span class="sign"></span><?php echo $total_reg;?></div>
          </div>
        </div>
        </a> </div> 
        
         <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_city.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title"> City </div>
            <div class="value"><span class="sign"></span><?php echo $total_city;?></div>
          </div>
        </div>
        </a> </div> 
        
         <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"> <a href="manage_area.php" class="card card-banner card-yellow-light">
        <div class="card-body"> <i class="icon fa fa-users fa-4x"></i>
          <div class="content">
            <div class="title"> Area </div>
            <div class="value"><span class="sign"></span><?php echo $total_area;?></div>
          </div>
        </div>
        </a> </div> 
     
    </div>

        
<?php include("includes/footer.php");?>       
