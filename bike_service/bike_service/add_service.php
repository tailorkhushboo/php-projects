<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
 	
 		  
	if(isset($_POST['submit']) and isset($_GET['add']))
	{		


	     $category_image1=rand(0,99999)."_".$_FILES['s_image']['name'];
       
       //Main Image
     $tpath11='images/'.$category_image1;        
       $pic1=compress_image($_FILES["s_image"]["tmp_name"], $tpath11, 80);
   
    //Thumb Image 
     $thumbpath1='images/thumbs/'.$category_image1;   
       $thumb_pic11=create_thumb_image($tpath11,$thumbpath1,'300','300');   

    
    	     $category_image2=rand(0,99999)."_".$_FILES['s_banner_image']['name'];
       
       //Main Image
     $tpath11='images/'.$category_image2;        
       $pic1=compress_image($_FILES["s_banner_image"]["tmp_name"], $tpath11, 80);
   
    //Thumb Image 
     $thumbpath1='images/thumbs/'.$category_image2;   
       $thumb_pic11=create_thumb_image($tpath11,$thumbpath1,'300','300');
       
			$data = array(
			's_name'  =>  $_POST['s_name'],
			 's_post_type'  =>  $_POST['s_post_type'],
			's_image'  =>  $category_image1,
			 's_spec'  =>  $_POST['s_spec'],
			's_banner_image'  =>  $category_image2,
			's_email'  =>  $_POST['s_email'],
			's_password'  =>  $_POST['s_password'],
			's_lat'  =>  $_POST['s_lat'],
			's_long'  =>  $_POST['s_long'],
			's_postal_code'  =>  $_POST['s_postal_code'],
			's_adderss'  =>  $_POST['s_adderss'],
			's_phone'  =>  $_POST['s_phone'],
			's_description'  =>  $_POST['s_description'],
			's_o_time'  =>  $_POST['s_o_time'],
			's_c_time'  =>  $_POST['s_c_time'],
			's_puncture'  =>  $_POST['s_puncture'],
			's_breakdown'  =>  $_POST['s_breakdown'],
			's_outoffuel'  =>  $_POST['s_outoffuel'],
			's_engineservices'  =>  $_POST['s_engineservices'],
			's_oilservice'  =>  $_POST['s_oilservice'],
			's_bikespares'  =>  $_POST['s_bikespares'],
			's_bikepainting'  =>  $_POST['s_bikepainting'],
			's_generalservice'  =>  $_POST['s_generalservice'],
			's_bikewashpolish'  =>  $_POST['s_bikewashpolish'],
			's_electricwork'  =>  $_POST['s_electricwork'],
			's_stickering'  =>  $_POST['s_stickering'],
			's_status'  =>  1
			);

			$qry = Insert('tbl_service',$data);

		
			$_SESSION['msg']="10";
			header("location:manage_service.php");	 
			exit;
		
	}
	
	if(isset($_GET['s_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_service where s_id='".$_GET['s_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
		if(isset($_POST['submit']) and isset($_POST['s_id']))
	{
			$sql = "SELECT * FROM tbl_service where s_id = '".$_GET['s_id']."' ";
    		$res = mysqli_query($mysqli,$sql);
    		$row = mysqli_fetch_assoc($res);
    		
    		
		if($_FILES['s_image']['name'] != "")
    		{	
    			if($row['s_image'] !== "") 
    			{
    			 	unlink('images/'.$row['s_image']); 
    			 	unlink('images/thumbs/'.$row['s_image']); 
    			}
    
    			$facility_image=rand(0,99999)."_".$_FILES['s_image']['name'];
    		   //Main Image
    		   	$tpath1='images/'.$facility_image; 		
    			$pic1=compress_image($_FILES["s_image"]["tmp_name"], $tpath1, 80);
    		 	$thumbpath='images/thumbs/'.$facility_image;		
    	       	$thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
     		}
     		else
     		{
     		     $facility_image = $row['s_image'] ;
     		}
     		
     		
     		
     			if($_FILES['s_banner_image']['name'] != "")
    		{	
    			if($row['s_banner_image'] !== "") 
    			{
    			 	unlink('images/'.$row['s_banner_image']); 
    			 	unlink('images/thumbs/'.$row['s_banner_image']); 
    			}
    
    			$facility_image1=rand(0,99999)."_".$_FILES['s_banner_image']['name'];
    		   //Main Image
    		   	$tpath1='images/'.$facility_image1; 		
    			$pic1=compress_image($_FILES["s_banner_image"]["tmp_name"], $tpath1, 80);
    		 	$thumbpath='images/thumbs/'.$facility_image1;		
    	       	$thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
     		}
     		else
     		{
     		     $facility_image1 =  $row['s_banner_image'] ;
     		}


     
     
           
           	 $data = array( 
         	's_name'  =>  $_POST['s_name'],
         	's_post_type'  =>  $_POST['s_post_type'],
			's_image'  =>  $facility_image,
			 's_spec'  =>  $_POST['s_spec'],
			's_banner_image'  =>  $facility_image1,
			's_email'  =>  $_POST['s_email'],
			's_password'  =>  $_POST['s_password'],
			's_lat'  =>  $_POST['s_lat'],
			's_long'  =>  $_POST['s_long'],
			's_postal_code'  =>  $_POST['s_postal_code'],
			's_adderss'  =>  $_POST['s_adderss'],
			's_phone'  =>  $_POST['s_phone'],
			's_description'  =>  $_POST['s_description'],
			's_o_time'  =>  $_POST['s_o_time'],
			's_c_time'  =>  $_POST['s_c_time'],
			's_puncture'  =>  $_POST['s_puncture'],
			's_breakdown'  =>  $_POST['s_breakdown'],
			's_outoffuel'  =>  $_POST['s_outoffuel'],
			's_engineservices'  =>  $_POST['s_engineservices'],
			's_oilservice'  =>  $_POST['s_oilservice'],
			's_bikespares'  =>  $_POST['s_bikespares'],
			's_bikepainting'  =>  $_POST['s_bikepainting'],
			's_generalservice'  =>  $_POST['s_generalservice'],
			's_bikewashpolish'  =>  $_POST['s_bikewashpolish'],
			's_electricwork'  =>  $_POST['s_electricwork'],
			's_stickering'  =>  $_POST['s_stickering'],
			);
			
		 $category_edit=Update('tbl_service', $data, "WHERE s_id = '".$_POST['s_id']."'");
              

   
   

 
		
	            $_SESSION['msg']="11"; 
                header( "Location:add_service.php?s_id=".$_POST['s_id']);
                exit; 
 
    
		 
	 
	}
	
	


	
?>
 	

 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['s_id'])){?>Edit<?php }else{?>Add<?php }?>Service List </div>
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
            	<input  type="hidden" name="s_id" value="<?php echo $_GET['s_id'];?>" />

                  
              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label"> Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="s_name" id="s_name" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Post Type :-</label>
                      <div class="col-md-6">                       
                        <select name="s_post_type" id="s_post_type" style="width:280px; height:25px;" class="select2" required>
              <option value="">--Select Type--</option>
     <option value="0" <?php if($user_row['s_post_type']=='0'){?>selected<?php }?>>None</option>
    <option value="1" <?php if($user_row['s_post_type']=='1'){?>selected<?php }?>>Featured</option>
                            <option value="2" <?php if($user_row['s_post_type']=='2'){?>selected<?php }?>>Sponsored</option>
                             <option value="3" <?php if($user_row['s_post_type']=='3'){?>selected<?php }?>>Verified</option>
                            
                        </select>
                      </div>
                  </div>
              
           <div class="form-group">
                    <label class="col-md-3 control-label">Select Image :-
                      <p class="control-label-help">(Recommended resolution: 300x300,400x400 or Square Image)</p>
                    </label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="s_image" value="fileupload" id="fileupload">
                            
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="category image" /></div>
                           
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">&nbsp; </label>
                    <div class="col-md-6">
                      <?php if(isset($_GET['s_id']) and $user_row['s_image']!="") {?>
                            <div class="block_wallpaper"><img src="images/<?php echo $user_row['s_image'];?>" alt="category image" /></div>
                          <?php } ?>
                    </div>
                  </div><br>
                  
                      <div class="form-group">
                    <label class="col-md-3 control-label"> Speciality :-</label>
                    <div class="col-md-6">
                      <input type="text" name="s_spec" id="s_spec" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_spec'];}?>" class="form-control" >
                    </div>
                  </div>
                  
                      <div class="form-group">
                    <label class="col-md-3 control-label">Banner Image :-
                      <p class="control-label-help">(Recommended resolution: 300x300,400x400 or Square Image)</p>
                    </label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="s_banner_image" value="fileupload" id="fileupload">
                            
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="category image" /></div>
                           
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">&nbsp; </label>
                    <div class="col-md-6">
                      <?php if(isset($_GET['s_id']) and $user_row['s_banner_image']!="") {?>
                            <div class="block_wallpaper"><img src="images/<?php echo $user_row['s_banner_image'];?>" alt="category image" /></div>
                          <?php } ?>
                    </div>
                  </div><br>
                  
                   <div class="form-group">
                    <label class="col-md-3 control-label">Email :-</label>
                    <div class="col-md-6">
                      <input type="text" name="s_email" id="s_email" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_email'];}?>" class="form-control" required>
                    </div>
                  </div>    
                           <div class="form-group">
                    <label class="col-md-3 control-label">Password :-</label>
                    <div class="col-md-6">
                      <input type="Password" name="s_password" id="s_password" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_password'];}?>" class="form-control" required>
                    </div>
                  </div>        
                     
                  

<!-- Search input -->
<input id="searchInput" class="controls" type="text" placeholder="Enter a location">

<!-- Google map -->
<div id="map"></div>

<ul class="geo-data">
<!--    <li>Full Address: <span id="location"></span></li>
    <li>Postal Code: <span id="postal_code"></span></li>
    <li>Country: <span id="country"></span></li>
    <li>Latitude: <span id="lat"></span></li>
    <li>Longitude: <span id="lon"></span></li>-->
</ul>

                 
                        <div class="form-group">
                    <label class="col-md-3 control-label">Address :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="s_adderss" id="address" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_adderss'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">Postal_Code :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="s_postal_code" id="postal_code" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_postal_code'];}?>" class="form-control" required>
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <label class="col-md-3 control-label">Lattitude :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="s_lat" id="lattitude" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_lat'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                     
                  <div class="form-group">
                    <label class="col-md-3 control-label">Longitude :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="s_long" id="longitude" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_long'];}?>" class="form-control" required>
                    </div>
                  </div>
              
                  <div class="form-group">
                    <label class="col-md-3 control-label">Phone No :-</label>
                    <div class="col-md-6">
                      <input type="text"   name="s_phone" id="s_phone" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_phone'];}?>" class="form-control">
                    </div>
                  </div>
                        <div class="form-group">
                    <label class="col-md-3 control-label"> Description :-</label>
                    <div class="col-md-6">
                 
                      <textarea name="s_description" id="s_description" rows="5" cols="80" class="form-control"><?php echo $user_row['s_description'];?></textarea>

                     
                     
                    </div>
                  </div>
                   
                    <div class="form-group">
                    <label class="col-md-3 control-label">Open Time :-</label>
                    <div class="col-md-6">
                      <input type="text"   name="s_o_time" id="s_o_time" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_o_time'];}?>" class="form-control">
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Close Time :-</label>
                    <div class="col-md-6">
                      <input type="text"   name="s_c_time" id="s_c_time" value="<?php if(isset($_GET['s_id'])){echo $user_row['s_c_time'];}?>" class="form-control">
                    </div>
                  </div>
                  
                      <div class="form-group">
                    <label class="col-md-3 control-label"> Puncture :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_puncture" id="s_puncture" value="1" <?php if($user_row['s_puncture']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_puncture" id="s_puncture" value="0" <?php if($user_row['s_puncture']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                    
                     <div class="form-group">
                    <label class="col-md-3 control-label"> Breakdown :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_breakdown" id="s_breakdown" value="1" <?php if($user_row['s_breakdown']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_breakdown" id="s_breakdown" value="0" <?php if($user_row['s_breakdown']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Out Of Fuel :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_outoffuel" id="s_outoffuel" value="1" <?php if($user_row['s_outoffuel']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_outoffuel" id="s_outoffuel" value="0" <?php if($user_row['s_outoffuel']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Engine Services :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_engineservices" id="s_engineservices" value="1" <?php if($user_row['s_engineservices']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_engineservices" id="s_engineservices" value="0" <?php if($user_row['s_engineservices']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Oil Service :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_oilservice" id="s_oilservice" value="1" <?php if($user_row['s_oilservice']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_oilservice" id="s_oilservice" value="0" <?php if($user_row['s_oilservice']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                    
                    
                     <div class="form-group">
                    <label class="col-md-3 control-label"> Bike Spares :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_bikespares" id="s_bikespares" value="1" <?php if($user_row['s_bikespares']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_bikespares" id="s_bikespares" value="0" <?php if($user_row['s_bikespares']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                    
                      <div class="form-group">
                    <label class="col-md-3 control-label"> Bike Painting :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_bikepainting" id="s_bikepainting" value="1" <?php if($user_row['s_bikepainting']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_bikepainting" id="s_bikepainting" value="0" <?php if($user_row['s_bikepainting']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> General Service :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_generalservice" id="s_generalservice" value="1" <?php if($user_row['s_generalservice']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_generalservice" id="s_generalservice" value="0" <?php if($user_row['s_generalservice']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Bike Wash Polish :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_bikewashpolish" id="s_bikewashpolish" value="1" <?php if($user_row['s_bikewashpolish']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_bikewashpolish" id="s_bikewashpolish" value="0" <?php if($user_row['s_bikewashpolish']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                    
                    
                    
                       <div class="form-group">
                    <label class="col-md-3 control-label"> Electric Work :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_electricwork" id="s_electricwork" value="1" <?php if($user_row['s_electricwork']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_electricwork" id="s_electricwork" value="0" <?php if($user_row['s_electricwork']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                    
                    <div class="form-group">
                    <label class="col-md-3 control-label"> Stickering :-</label>
                    <div class="col-md-6">
                      <input type="radio" name="s_stickering" id="s_stickering" value="1" <?php if($user_row['s_stickering']=="1"){echo "Checked";}?>   > Yes
                       <input type="radio" name="s_stickering" id="s_stickering" value="0" <?php if($user_row['s_stickering']=="0"){echo "Checked";}?>   > No 
                    </div>
                  </div>
                    <br>
                  
               

                  
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
   
 <script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -33.8688, lng: 151.2195},
      zoom: 13
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        //Location details
        for (var i = 0; i < place.address_components.length; i++) {
            if(place.address_components[i].types[0] == 'postal_code'){
                document.getElementById('postal_code').value = place.address_components[i].long_name;
            }
            if(place.address_components[i].types[0] == 'city'){
                document.getElementById('city').value = place.address_components[i].long_name;
            }
        }
        document.getElementById('address').value = place.formatted_address;
        document.getElementById('lattitude').value = place.geometry.location.lat();
        document.getElementById('longitude').value = place.geometry.location.lng();
    });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCorvva3XX3dIlpvkDX_QCg_sE1HcVE8DU&libraries=places&callback=initMap" async defer></script>

<style>
#map {
    width: 100%;
    height: 400px;
}

input#searchInput

{
        z-index: 0;
    position: absolute;
    left: 230px;
       top: 10px !important;
    width: 250px;
    padding: 12px;
}

</style>





<?php include('includes/footer.php');?>                  