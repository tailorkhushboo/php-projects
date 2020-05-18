<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
 	
 		  
    $qry1="SELECT * FROM `tbl_doctor_cat` ORDER BY `tbl_doctor_cat`.`dc_id` ASC";
  $results1=mysqli_query($mysqli,$qry1);

	 
	 
	if(isset($_POST['submit']) and isset($_GET['add']))
	{		
	    
	     $category_image=rand(0,99999)."_".$_FILES['category_image']['name'];
       
       //Main Image
     $tpath1='images/'.$category_image;        
       $pic1=compress_image($_FILES["category_image"]["tmp_name"], $tpath1, 80);
   
    //Thumb Image 
     $thumbpath='images/thumbs/'.$category_image;   
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'300','300');   
       
       
			$data = array(
			'd_name'  =>  $_POST['d_name'],
			'd_image'  =>  $category_image,
				'd_cat'  =>  $_POST['d_cat'],
			'phone_no'  =>  $_POST['phone_no'],
				'degree'  =>  $_POST['degree'],
			'experience'  =>  $_POST['experience'],
				'address'  =>  $_POST['address'],
					'postal_code'  =>  $_POST['postal_code'],
			'lattitude'  =>  $_POST['lattitude'],
			'longitude'  =>  $_POST['longitude'],
			'status'  =>  1
			);

			$qry = Insert('tbl_doctor_list',$data);

		
			$_SESSION['msg']="10";
			header("location:manage_doctor_list.php");	 
			exit;
		
	}
	
	if(isset($_GET['user_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_doctor_list where did='".$_GET['user_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
	if(isset($_POST['submit']) and isset($_GET['user_id']))
	{
		
	 if($_FILES['category_image']['name']!="")
     {   	
		
		$category_image=rand(0,99999)."_".$_FILES['category_image']['name'];
       
       //Main Image
     $tpath1='images/'.$category_image;        
       $pic1=compress_image($_FILES["category_image"]["tmp_name"], $tpath1, 80);
   
    //Thumb Image 
     $thumbpath='images/thumbs/'.$category_image;   
       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'300','300');   
       
       
			$data = array(
			'd_name'  =>  $_POST['d_name'],
			'd_image'  =>  $category_image,
				'd_cat'  =>  $_POST['d_cat'],
			'phone_no'  =>  $_POST['phone_no'],
				'degree'  =>  $_POST['degree'],
			'experience'  =>  $_POST['experience'],
				'address'  =>  $_POST['address'],
					'postal_code'  =>  $_POST['postal_code'],
			'lattitude'  =>  $_POST['lattitude'],
			'longitude'  =>  $_POST['longitude']
			);
		
 
     }else
     {
         
			$data = array(
			'd_name'  =>  $_POST['d_name'],
				'd_cat'  =>  $_POST['d_cat'],
			'phone_no'  =>  $_POST['phone_no'],
				'degree'  =>  $_POST['degree'],
			'experience'  =>  $_POST['experience'],
				'address'  =>  $_POST['address'],
					'postal_code'  =>  $_POST['postal_code'],
			'lattitude'  =>  $_POST['lattitude'],
			'longitude'  =>  $_POST['longitude']
			);
     }
         
     
		   $user_edit=Update('tbl_location', $data, "WHERE id = '".$_GET['user_id']."'");
		 
			if ($user_edit > 0){
				
				$_SESSION['msg']="11";
				header("Location:add_location.php?user_id=".$_GET['user_id']);
				exit;
			} 	
		
	 
	}
	
	
?>
 	

 <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?php if(isset($_GET['cat_id'])){?>Edit<?php }else{?>Add<?php }?> User</div>
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
            	<input  type="hidden" name="user_id" value="<?php echo $_GET['user_id'];?>" />
                <div class="form-group">
                    <label class="col-md-3 control-label">cat : :-</label>
                    <div class="col-md-6">
                     <select name="d_cat" id="d_cat" class="select2">
                       <option value="">--Select cat--</option>
              
                              <?php
                               
                              
                                 while ($row1=mysqli_fetch_array($results1)) 
                                 {
                            
                                  ?>

                                 <option value="<?php echo $row1['dc_id'];?>" 

                                <?php if($user_row['d_cat']==$row1['dc_id']){?>selected<?php }?>

                                  > <?php echo $row1['dc_name'];?></option>
                                <?php
                                }
                                 
                              ?>
                     
                            </select>

                    </div>
                  </div>
                  
              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="d_name" id="name" value="<?php if(isset($_GET['user_id'])){echo $user_row['d_name'];}?>" class="form-control" required>
                    </div>
                  </div>
                   
           <div class="form-group">
                    <label class="col-md-3 control-label">Select Image :-
                      <p class="control-label-help">(Recommended resolution: 300x300,400x400 or Square Image)</p>
                    </label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="category_image" value="fileupload" id="fileupload">
                            
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="category image" /></div>
                           
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">&nbsp; </label>
                    <div class="col-md-6">
                      <?php if(isset($_GET['cat_id']) and $user_row['dc_image']!="") {?>
                            <div class="block_wallpaper"><img src="images/<?php echo $user_row['dc_image'];?>" alt="category image" /></div>
                          <?php } ?>
                    </div>
                  </div><br>
                  
                  

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
                    <label class="col-md-3 control-label">address :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="address" id="address" value="<?php if(isset($_GET['user_id'])){echo $user_row['address'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">postal_code :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="postal_code" id="postal_code" value="<?php if(isset($_GET['user_id'])){echo $user_row['postal_code'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">lattitude :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="lattitude" id="lattitude" value="<?php if(isset($_GET['user_id'])){echo $user_row['lattitude'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                     
                  <div class="form-group">
                    <label class="col-md-3 control-label">longitude :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="longitude" id="longitude" value="<?php if(isset($_GET['user_id'])){echo $user_row['longitude'];}?>" class="form-control" required>
                    </div>
                  </div>
              
                  <div class="form-group">
                    <label class="col-md-3 control-label">phone_no :-</label>
                    <div class="col-md-6">
                      <input type="text"   name="phone_no" id="phone_no" value="<?php if(isset($_GET['user_id'])){echo $user_row['phone_no'];}?>" class="form-control">
                    </div>
                  </div>
                  
                    <div class="form-group">
                    <label class="col-md-3 control-label">degree :-</label>
                    <div class="col-md-6">
                      <input type="text"   name="degree" id="degree" value="<?php if(isset($_GET['user_id'])){echo $user_row['degree'];}?>" class="form-control">
                    </div>
                  </div>
                  
                  
                    <div class="form-group">
                    <label class="col-md-3 control-label">experience :-</label>
                    <div class="col-md-6">
                      <input type="text"   name="experience" id="experience" value="<?php if(isset($_GET['user_id'])){echo $user_row['experience'];}?>" class="form-control">
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6AbTQWlrffAp8McPhy7n4iCtKtPdeF6w&libraries=places&callback=initMap" async defer></script>

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