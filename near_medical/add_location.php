<?php include('includes/header.php');

    include('includes/function.php');
	include('language/language.php'); 

 	require_once("thumbnail_images.class.php");
	 
	 
	if(isset($_POST['submit']) and isset($_GET['add']))
	{		
			$data = array(
			'name'  =>  $_POST['name'],
			'lat'  =>  $_POST['lat'],			 
			'long'  =>  $_POST['long']
			);

			$qry = Insert('tbl_location',$data);

		
			$_SESSION['msg']="10";
			header("location:manage_location.php");	 
			exit;
		
	}
	
	if(isset($_GET['user_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_location where id='".$_GET['user_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
	if(isset($_POST['submit']) and isset($_POST['user_id']))
	{
		
			$data = array(
			'name'  =>  $_POST['name'],
			'lat'  =>  $_POST['lat'],			 
			'long'  =>  $_POST['long']
			);
		
 
		
		   $user_edit=Update('tbl_location', $data, "WHERE id = '".$_POST['user_id']."'");
		 
			if ($user_edit > 0){
				
				$_SESSION['msg']="11";
				header("Location:add_location.php?user_id=".$_POST['user_id']);
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

              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="name" id="name" value="<?php if(isset($_GET['user_id'])){echo $user_row['name'];}?>" class="form-control" required>
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
                    <label class="col-md-3 control-label">location :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="location1" id="location1" value="<?php if(isset($_GET['user_id'])){echo $user_row['location1'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">postal_code :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="postal_code" id="postal_code" value="<?php if(isset($_GET['user_id'])){echo $user_row['postal_code'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">country :-</label>
                    <div class="col-md-6">
                      <input type="text" name="country" id="country" value="<?php if(isset($_GET['user_id'])){echo $user_row['country'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">lat1 :-</label>
                    <div class="col-md-6">
                      <input type="text"  name="lat1" id="lat1" value="<?php if(isset($_GET['user_id'])){echo $user_row['lat1'];}?>" class="form-control" required>
                    </div>
                  </div>
              
                  <div class="form-group">
                    <label class="col-md-3 control-label">long1 :-</label>
                    <div class="col-md-6">
                      <input type="text"   name="long1" id="long1" value="<?php if(isset($_GET['user_id'])){echo $user_row['long1'];}?>" class="form-control">
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
            if(place.address_components[i].types[0] == 'country'){
                document.getElementById('country').value = place.address_components[i].long_name;
            }
        }
        document.getElementById('location1').value = place.formatted_address;
        document.getElementById('lat1').value = place.geometry.location.lat();
        document.getElementById('long1').value = place.geometry.location.lng();
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