<?php
include('includes/connection.php');

		//collect the passed id
	 $cid = $_GET['c_id'];


     $cat_qry="SELECT * FROM tbl_sub_category WHERE c_id = '".$cid."' ORDER BY tbl_sub_category.sub_id ASC";
  
	 $cat_result1=mysqli_query($mysqli,$cat_qry); 
	  echo	"<option value=''>----Select Categories---</option>";

     while($row=mysqli_fetch_array($cat_result1))
	  {
		  echo	"<option value='".$row['sub_id']."'>".$row['sub_name']."</option>";
      }
     