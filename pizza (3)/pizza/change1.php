<?php
include('includes/connection.php');

		//collect the passed id
	 $sub_id = $_GET['sub_id'];


     $cat_qry="SELECT * FROM tbl_sub_sub_category WHERE sub_id = '".$sub_id."' ORDER BY tbl_sub_sub_category.sub_sub_id ASC";
  
	 $cat_result1=mysqli_query($mysqli,$cat_qry); 
	  echo	"<option value=''>----Select Categories---</option>";

     while($row=mysqli_fetch_array($cat_result1))
	  {
		  echo	"<option value='".$row['sub_sub_id']."'>".$row['sub_sub_name']."</option>";
      }
     