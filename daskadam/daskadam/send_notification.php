<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  //'filters' => array(array('Area' => '=', 'value' => 'ALL')),
 
  
  if(isset($_POST['submit']) and isset($_GET['add']))
  {
    if($_FILES['big_picture']['name']!="")
    {

        $big_picture=rand(0,99999)."_".$_FILES['big_picture']['name'];
        $tpath2='images/'.$big_picture;
        move_uploaded_file($_FILES["big_picture"]["tmp_name"], $tpath2);

         $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/images/'.$big_picture;
         
        $content = array(
                         "en" => $_POST['notification_msg']                                                 
                         );
                 

        $fields = array(
                        'app_id' => ONESIGNAL_APP_ID,
                         'included_segments' => array('All'),  
                         'data' => array("foo" => "bar","link"=>$_POST['link']),
                        'contents' => $content,
                        'headings'=> array("en" => $_POST['title']),
                         'big_picture' =>$file_path       
                        );
                   
        $date = date("M,d,Y h:i:s A");     
          $title=$_POST['title'];
         $msg=$_POST['notification_msg'];     
         $link=$_POST['link'];
         $image= $file_path;     
        
        
        $data = array(
			'date'=>$date,	
			'title'  =>  $title,
			'msg'  =>  $msg,
			'link'  =>  $link,
			'image'  =>  $image

			);
			
		
		$qry = Insert('tbl_notification',$data);
                        

        
        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic '.ONESIGNAL_REST_KEY));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        
    }
    else
    {

        $file_path="";
        $content = array(
                         "en" => $_POST['notification_msg']
                          );

        $fields = array(
                        'app_id' => ONESIGNAL_APP_ID,
                       'included_segments' => array('All'),                               
                         'data' => array("foo" => "bar","link"=>$_POST['link']),
                        'contents' => $content,
                        'headings'=> array("en" => $_POST['title']),
                        'big_picture' =>$file_path       
                        );
                        
         $date = date("M,d,Y h:i:s A");     
         $title=$_POST['title'];
         $msg=$_POST['notification_msg'];     
         $link=$_POST['link'];
         $image= "";     
        
        
        $data = array(
			'date'=>$date,	
			'title'  =>  $title,
			'msg'  =>  $msg,
			'link'  =>  $link,
			'image'  =>  $image

			);

		$qry = Insert('tbl_notification',$data);

        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic '.ONESIGNAL_REST_KEY));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);


    }
        
        $_SESSION['msg']="16";
     
        header( "Location:manage_notification.php");
        exit; 
     
     
  }
  
  
    if(isset($_POST['submit']) and isset($_GET['n_id']))
  {
       if($_FILES['big_picture']['name']!="")
    {   
      
        $big_picture=rand(0,99999)."_".$_FILES['big_picture']['name'];
        $tpath2='images/'.$big_picture;
        move_uploaded_file($_FILES["big_picture"]["tmp_name"], $tpath2);

        $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/images/'.$big_picture;

           
          $title=$_POST['title'];
         $msg=$_POST['notification_msg'];     
         $link=$_POST['link'];
         $image= $file_path;     
        
        $data = array(
			'title'  =>  $title,
			'msg'  =>  $msg,
			'link'  =>  $link,
			'image'  =>  $image

			);


		$qry=Update('tbl_notification', $data, "WHERE id = '".$_GET['n_id']."'");
        
                             
        $_SESSION['msg']="11"; 
        header( "Location:send_notification.php?n_id=".$_GET['n_id']);
        exit;
		
    }else
    {
        $title=$_POST['title'];
        $msg=$_POST['notification_msg'];     
        $link=$_POST['link'];

        $data = array(
			'title'  =>  $title,
			'msg'  =>  $msg,
			'link'  =>  $link,

			);

	    $qry=Update('tbl_notification', $data, "WHERE id = '".$_GET['n_id']."'");
        
                             
        $_SESSION['msg']="11"; 
        header( "Location:send_notification.php?n_id=".$_GET['n_id']);
        exit;    
        
    }
      
  }
  
    if(isset($_GET['n_id']))
  {
       
      $qry="SELECT * FROM tbl_notification where id='".$_GET['n_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

  }
   

?>
<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Send Notification</div>
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
            <form action="" name="addeditcategory" method="post" class="form form-horizontal" enctype="multipart/form-data">
                <input  type="hidden" name="n_id" value="<?php echo $_GET['n_id'];?>" />
              <div class="section">
                <div class="section-body">
                    
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Title :-</label>
                    <div class="col-md-6">
                      <input type="text" name="title" id="title" class="form-control" value="<?php if(isset($_GET['n_id'])){echo $row['title'];}?>" required>
                    </div>
                  </div>

                   
                  <div class="form-group">
                    <label class="col-md-3 control-label">Message :-</label>
                    <div class="col-md-6">
                        <textarea name="notification_msg" id="notification_msg" class="form-control" required><?php if(isset($_GET['n_id'])){echo $row['msg'];}?></textarea>
                    </div>
                  </div>
                  
                  <br>
                  
                       <div class="form-group">
                    <label class="col-md-3 control-label"> url :-</label>
                    <div class="col-md-6">
                      <input type="text" name="link" id="link" value="<?php if(isset($_GET['n_id'])){echo $row['link'];}?>" class="form-control" >
                    </div>
                  </div>

                  
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">Image :-<br/>(Optional)</label>

                    <div class="col-md-6">
                      <div class="fileupload_block">
                         <input type="file" name="big_picture" value="" id="fileupload">
<!--                         
                         
                           <?php if(isset($_GET['n_id']) and $row['image']!="") {?>
                            <div class="fileupload_img"><img type="image" src="<?php echo $row['image'];?>" alt="category image" /></div>
                          <?php } else {?>
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="category image" /></div>
                          <?php }?>-->
                         
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
