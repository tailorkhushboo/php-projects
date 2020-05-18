<?php include('includes/header.php');

    include('includes/function.php');
  include('language/language.php'); 

  require_once("thumbnail_images.class.php");
   
  
  if(isset($_GET['m_id']))
  {
       
      $user_qry="SELECT * FROM tbl_market where m_id='".$_GET['m_id']."'";
      $user_result=mysqli_query($mysqli,$user_qry);
      $user_row=mysqli_fetch_assoc($user_result);
    
  }



  // open start
  if(isset($_GET['open']) and isset($_GET['m_id']))
    {
    
    
     $qry1 = "SELECT tbl_bat.m_id as m_id , tbl_bat.user_id as user_id , tbl_bat.b_type as b_type , tbl_bat.b_option as b_option , tbl_bat.b_date as b_date ,  tbl_bat.b_digit as b_digit, tbl_bat.b_points as b_points FROM tbl_bat INNER JOIN tbl_market ON (tbl_market.m_id = '".$_POST['m_id']."' and tbl_market.m_date = tbl_bat.b_date and tbl_market.m_open=tbl_bat.b_digit) ";
   
    $user_result=mysqli_query($mysqli,$qry1);

     $num_rows = mysqli_num_rows($user_result);

    if($num_rows > 0)
    {
        while ($row = mysqli_fetch_array($user_result)) 
        {   
                      $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$row['user_id']."' ";  
                      $result = mysqli_query($mysqli,$qry);
                      $num_rows1 = mysqli_num_rows($result);
                      $row1 = mysqli_fetch_assoc($result);
                       
                       if ($num_rows1 > 0)
                    {    
                
                      $wallet=$row1['wallet'];
                      $newwallet=$wallet+2;   
                  
          
                       $user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$row['user_id']."' ";  
                       $result = mysqli_query($mysqli,$user_edit);
                       
                       $user_qry2="SELECT * FROM tbl_market where m_id='".$_GET['m_id']."'";
                      $user_result2=mysqli_query($mysqli,$user_qry2);
                      $user_row2=mysqli_fetch_assoc($user_result2);
                        $m_id2=$user_row2['m_id'];
                       $m_date2=$user_row2['m_date'];
                       
                       $user_insert2=" INSERT INTO `tbl_transaction`(`m_id`,`user_id`,  `t_date`, `t_option`,`t_type`, `t_digit`, `t_wallet`,`trace_st`,`t_status`) 
                       VALUES ('".$m_id2."','".$row['user_id']."','".$m_date2."','".$row['b_option']."','".$row['b_type']."','".$row['b_digit']."',2,2,1)";
                        $result2 = mysqli_query($mysqli,$user_insert2);
                
                   
                    }
        }
    }           
         
           
          
                 $user_qry="SELECT * FROM tbl_redeem where m_id='".$_GET['m_id']."' and m_date='".$user_row2['m_date']."' and m_type=1";
                 $user_result3=mysqli_query($mysqli,$user_qry);
                 $user_row=mysqli_fetch_assoc($user_result3);
                
                if($user_row > 0)
                {

                 
                }else{

                      $user_qry="SELECT * FROM tbl_market where m_id='".$_GET['m_id']."'";
                  $user_result4=mysqli_query($mysqli,$user_qry);
                  $user_row=mysqli_fetch_assoc($user_result4);
                    $m_id=$user_row['m_id'];
                   $m_date=$user_row['m_date'];
                    $user_insert=" INSERT INTO `tbl_redeem`(`m_id`, `r_date`, `r_type`, `r_status`) VALUES ('".$m_id."','".$m_date."',1,1)";
                    $result = mysqli_query($mysqli,$user_insert);

                }

         header("Location:edit_market.php?m_id=".$_GET['m_id']);
  }

// open end



//close start


  if(isset($_GET['close']) and isset($_GET['m_id']))
    {
    
    

 $qry1 = "SELECT tbl_bat.m_id as m_id , tbl_bat.user_id as user_id , tbl_bat.b_date as b_date ,tbl_bat.b_digit as b_digit, tbl_bat.b_points as b_points FROM tbl_bat INNER JOIN tbl_market ON (tbl_market.m_id = '".$_GET['m_id']."' and tbl_market.m_date = tbl_bat.b_date and tbl_market.m_close=tbl_bat.b_digit)";

    $user_result=mysqli_query($mysqli,$qry1);

     $num_rows = mysqli_num_rows($user_result);

  if($num_rows > 0)
  {
    while ($row = mysqli_fetch_array($user_result)) 
    {   


                      $qry = "SELECT * FROM tbl_registration WHERE user_id = '".$row['user_id']."' ";  
                      $result = mysqli_query($mysqli,$qry);
                      $num_rows1 = mysqli_num_rows($result);
                      $row1 = mysqli_fetch_assoc($result);
                       
                       if ($num_rows1 > 0)
                    {    
                
                      $wallet=$row1['wallet'];
                      $newwallet=$wallet+2;   
                  
          
                       $user_edit= "UPDATE tbl_registration SET wallet='".$newwallet."' WHERE user_id = '".$row['user_id']."' ";  
                    
                      $result = mysqli_query($mysqli,$user_edit);
                      
                      $user_qry2="SELECT * FROM tbl_market where m_id='".$_GET['m_id']."'";
                      $user_result2=mysqli_query($mysqli,$user_qry2);
                      $user_row2=mysqli_fetch_assoc($user_result2);
                        $m_id2=$user_row2['m_id'];
                       $m_date2=$user_row2['m_date'];
                        $user_insert2=" INSERT INTO `tbl_transaction`(`m_id`,`user_id`, `t_date`, `t_type`, `t_wallet`,`r_status`) VALUES ('".$m_id2."','".$row['user_id']."','".$m_date2."',2,2,1)";
                        $result2 = mysqli_query($mysqli,$user_insert2);
                   
                   
                  }

         }                
          
    }

 {
           
          
          
            
   

                   $user_qry="SELECT * FROM tbl_market where m_id='".$_GET['m_id']."'";
             $user_result=mysqli_query($mysqli,$user_qry);
             $user_row=mysqli_fetch_assoc($user_result);

                   $user_qry="SELECT * FROM tbl_redeem where m_id='".$_GET['m_id']."' and m_date='".$user_row2['m_date']."' and m_type=2";
                       $user_result=mysqli_query($mysqli,$user_qry);
                 $user_row=mysqli_fetch_assoc($user_result);
                
                if($user_row > 0)
                {
                  echo "false";
                  
                 
                }else{
                    echo "true";
                     
                  $user_qry="SELECT * FROM tbl_market where m_id='".$_GET['m_id']."'";
              $user_result=mysqli_query($mysqli,$user_qry);
              $user_row=mysqli_fetch_assoc($user_result);
                $m_id=$user_row['m_id'];
               $m_date=$user_row['m_date'];
                   $user_insert=" INSERT INTO `tbl_redeem`(`m_id`, `r_date`, `r_type`, `r_status`) VALUES ('".$m_id."','".$m_date."',2,1)";
                  $result = mysqli_query($mysqli,$user_insert);

              
            }
          }


         header("Location:edit_market.php?m_id=".$_GET['m_id']);
  }

//close end



  if(isset($_POST['submit']) and isset($_POST['m_id']))
  {
  
  $openTime = $_POST['m_open_time'];
 $closeTime = $_POST['m_close_time'];
  
  $newDateTime1 = date("h:i:s", strtotime($openTime));
 $newDateTime2 = date("h:i:s", strtotime($closeTime));
  $date1 = $_POST['m_date'];
 //exit();
      $data = array(
    
      'm_name'  =>  $_POST['m_name'],
      'm_date' => $date1,
      'm_open_time'  =>  $openTime,
      'm_close_time'  =>  $closeTime,
      'm_score'  =>  $_POST['m_score'],
      'm_open'  =>   $_POST['m_open'],
      'm_close'  =>   $_POST['m_close']
    
      );


      $user_edit=Update('tbl_market', $data, "WHERE m_id = '".$_POST['m_id']."'");
    

      
      if ($user_edit > 0){
        
        $_SESSION['msg']="11";
        header("Location:edit_market.php?m_id=".$_POST['m_id']);
        exit;
      }   
    }

    
   
  
  
  
?>


 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['m_id'])){?>Edit<?php }else{?>Add<?php }?> Market</div>
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
            <form action="" name="addedituser" method="post" class="form form-horizontal" enctype="multipart/form-data" >
              <input  type="hidden" name="m_id" value="<?php echo $_GET['m_id'];?>" />

              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="m_name" id="m_name" value="<?php if(isset($_GET['m_id'])){echo $user_row['m_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                     <div class="form-group">
                    <label class="col-md-3 control-label">Date :-</label>
                    <div class="col-md-6">
                      <input type="date" name="m_date" id="m_date" value="<?php if(isset($_GET['m_id'])){echo $user_row['m_date'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Open Time :-</label>
                    <div class="col-md-6">
                      <!--  <input id="appt-time" type="time" name="appt-time" step="2"> -->
                      <input type="time" name="m_open_time" step="1" id="appt-time" value="<?php if(isset($_GET['m_id'])){echo $user_row['m_open_time'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Close Time :-</label>
                    <div class="col-md-6">
                      <input type="time" name="m_close_time" step="2" id="appt-time" value="<?php if(isset($_GET['m_id'])){echo $user_row['m_close_time'];}?>" class="form-control" required>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 control-label">Open :-</label>
                    <div class="col-md-6">
                      <input type="text" name="m_open" id="m_open"  value="<?php if(isset($_GET['m_id'])){echo $user_row['m_open'];}?>" class="form-control" required>   
                        

                          <?php

  $qry="SELECT tbl_redeem.m_id as m_id, tbl_redeem.r_date as r_date, tbl_redeem.r_type as r_type
FROM tbl_redeem INNER JOIN tbl_market ON (tbl_redeem.m_id = '".$_GET['m_id']."'  and tbl_redeem.r_date = tbl_market.m_date and tbl_redeem.r_type = 1)";
//exit();
   $results = mysqli_query($mysqli,$qry);
   $row1 = mysqli_fetch_assoc($results);
  $num_rows = mysqli_num_rows($results);

  if ($num_rows > 0)
   {
   
?>
   
    
<?php
    }
    else {?>
 <div class="add_btn_primary"> <a href="edit_market.php?m_id=<?php echo $_GET['m_id'];?>&open" class="btn btn-primary">Redeem</a> </div> 
<!--    <button type="submit" name="open" class="btn btn-primary" >Submit</button>
 -->   <?php
    }    

                           ?>
                        
                    </div>

                  </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Close :-</label>
                    <div class="col-md-6">
                      <input type="text" name="m_close" id="m_close"  value="<?php if(isset($_GET['m_id'])){echo $user_row['m_close'];}?>" class="form-control" required>  
                              
                          <?php

  $qry1="SELECT tbl_redeem.m_id as m_id, tbl_redeem.r_date as r_date, tbl_redeem.r_type as r_type
FROM tbl_redeem INNER JOIN tbl_market ON (tbl_redeem.m_id = '".$_GET['m_id']."'  and tbl_redeem.r_date = tbl_market.m_date and tbl_redeem.r_type = 2)";

   $results1 = mysqli_query($mysqli,$qry1);
   $row2 = mysqli_fetch_assoc($results1);
  $num_rows1 = mysqli_num_rows($results1);

  if ($num_rows1 > 0)
   {
   
?>
   
    
<?php
    }
    else {?>
 <div class="add_btn_primary"> <a href="edit_market.php?m_id=<?php echo $_GET['m_id'];?>&close" class="btn btn-primary">Redeem</a> </div> 
<!--    <button type="submit" name="open" class="btn btn-primary" >Submit</button>
 -->   <?php
    }    

                           ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Score :-</label>
                    <div class="col-md-6">
                      <input type="text" name="m_score" id="m_score" value="<?php if(isset($_GET['m_id'])){echo $user_row['m_score'];}?>" class="form-control">
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
   

<?php include('includes/footer.php');?>                  