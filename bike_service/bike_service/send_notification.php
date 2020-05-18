<?php include("includes/header.php");

  require("includes/function.php");
  require("language/language.php");

  //'filters' => array(array('Area' => '=', 'value' => 'ALL')),
 
  
  if(isset($_POST['submit']))
  {
    if($_FILES['image']['name']!="")
    {   

        $big_picture=rand(0,99999)."_".$_FILES['image']['name'];
        $tpath2='images/'.$big_picture;
        move_uploaded_file($_FILES["image"]["tmp_name"], $tpath2);

        $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/images/'.$big_picture;
          
        $content = array(
                         "en" => $_POST['msg']                                                
                         );

        $fields = array(
                        'app_id' => ONESIGNAL_APP_ID,
                        'included_segments' => array('All'),                                            
                        'contents' => $content,
                         'headings'=> array("en" => $_POST['tittle']),
                        'big_picture' =>$file_path                    
                        );
             
             
         $date = date("M-d-Y h:i:s");      
         $msg=$_POST['msg']; 
 
               
         $image= $file_path;     
        
        
        $data = array(

      'title' => $_POST['tittle'],
      'link' => $_POST['link'],
      'date'=>$date,  
      'msg'  =>  $msg,
      'image'  =>  $image,
       

      );

      $qry = Insert('tbl_notification',$data);
                        

        
        $fields = json_encode($fields);//json data
        print("\nJSON sent:\n");
        print($fields);



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic '.ONESIGNAL_REST_KEY));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // send back data 
        curl_setopt($ch, CURLOPT_HEADER, FALSE); // not display header
        curl_setopt($ch, CURLOPT_POST, TRUE); //post call
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); // post data to server 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); //verify and not verify

        $response = curl_exec($ch);//session are set(execute)
        curl_close($ch); // close session

        
    }
    else
    {

        $file_path="";
        $content = array(
                         "en" => $_POST['msg']
                          );

      
        $fields = array(
                        'app_id' => ONESIGNAL_APP_ID,
                        'included_segments' => array('All'),                                            
                        // 'data' => array("foo" => "bar","type"=>$_POST['type']),
                        'contents' => $content,
                
                        // 'big_picture' =>$file_path                    
                        );
             
                        
        $date = date("M-d-Y h:i:s");      
         $msg=$_POST['msg']; 

                     
         $image= $file_path;     
        
        
        $data = array(
       'title' => $_POST['tittle'],
      'link' => $_POST['link'],
      'date'=>$date,  
      'msg'  =>  $msg,
      );

      $qry = Insert('tbl_notification',$data);

        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic '.ONESIGNAL_REST_KEY));
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
  
   

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(e) {
           $("#image_type").change(function(){



           var type=$("#image_type").val();
              
              if(type=="Podcasts" || type=="Notes" || type=="Events" || type=="Gallery" || type=="Store")
              { 
                //alert(type);
                $("#video_url_display").show();
                $("#video_local_display").hide();
                $("#thumbnail").hide();
              } 
              else if(type=="server_url")
              {
                 
                 $("#video_url_display").show();
                 $("#thumbnail").show();
                 $("#video_local_display").hide();
              }
              else
              {   
                     
                $("#video_url_display").hide();               
                $("#video_local_display").show();
                $("#thumbnail").show();

              }    
              
         });
        });
</script>
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
               
              <div class="section">
                <div class="section-body">
                          <div class="form-group">
                    <label class="col-md-3 control-label">Title :-</label>
                    <div class="col-md-6">
                      <input type="text" name="tittle" id="tittle" class="form-control" value="" placeholder="" required>
                    </div>
                  </div>
                      
                
                  <div class="form-group">
                    <label class="col-md-3 control-label">Message :-</label>
                    <div class="col-md-6">
                        <textarea name="msg" id="msg" class="form-control" required></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Image :-<br/>(Optional)</label>

                    <div class="col-md-6">
                      <div class="fileupload_block">
                         <input type="file" name="image" value="" id="fileupload">
                         <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="category image" /></div>    
                      </div>
                    </div>
                  </div> 
                      <div class="form-group">
                    <label class="col-md-3 control-label">url :-</label>
                    <div class="col-md-6">
                      <input type="text" name="link" id="link" class="form-control" value="" placeholder="" required>
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
