<?php include('config/config.php'); ?>
<?php	include('includes/header.php'); ?>
<?php include('libs/Database.php'); ?>

<?php
  $db = new Database;
  $servicesList = $db->getServicesList();
  $conditionsList = $db->getConditionsList();
?>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    
    <script>
var map;
var lat;
var lng;
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
 }
   function codeAddress(address) {
    var geocoder = new google.maps.Geocoder();
            geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                       map.setCenter(results[0].geometry.location);
                       var marker = new google.maps.Marker({
                          map: map,
                          position: results[0].geometry.location
                       });
                       //alert("Value " + results[0].geometry.location.lat());
                      $('#lat').val(results[0].geometry.location.lat());
                      $('#lng').val(results[0].geometry.location.lng());
              } else {
                      alert('Geocode was not successful for the following reason: ' + status);
              }
            });
        }

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
<script> 
$(document).ready(function() {
  $('#find-address').click(function() {
    var postcode = $('#postcode').val();
    codeAddress(postcode);
  });
});
</script>

 <div class="container" id="register">
    <h1>Add organisation</h1>
  <form class="form-horizontal" id="usrreg" action="post_charity.php" method="POST">
    <div class="block">
    <h3>Information</h3>
    <div class="form-group">
    <label for="charityName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input name="charityname" type="text" class="form-control" id="charityName" placeholder="Enter organisation name">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Charity email</label>
    <div class="col-sm-10">
      <input name="email" type="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
     <!--<div class="form-group">
        <label for="userFile" class="col-sm-2 control-label">Upload logo </label>
          <input type="file" size="40" name="userFile" id="userFile"/><br />
      </div>  -->
<div class="form-group">
    <label for="charityReg" class="col-sm-2 control-label">Background</label>
    <div class="col-sm-10">
    <textarea name="summary" class="form-control" form="usrreg" rows="3" placeholder="Enter a summary or brief description"></textarea></div>
  </div>
  <div class="form-group">
    <label for="conditions" class="col-sm-2 control-label">Conditions catered</label><br><br><br>
          <div class="row">
          <?php while($condition = $conditionsList->fetch_assoc()) : ?>
              <div class="col-md-3  col-md-offset-2">
              <input type="checkbox" name="conditions[]" value="<?php echo($condition['id']); ?>"><?php echo($condition['name']); ?>
              </div> 

          <?php endwhile; ?>  </div>
  <div class="form-group">
    <label for="services" class="col-sm-2 control-label">Service offered</label> <br><br>
    <div class="row">
          <?php while($service = $servicesList->fetch_assoc()) : ?>
              <div class="col-md-3  col-md-offset-2">
              <input type="checkbox" name="services[]" value="<?php echo($service['id']); ?>"><?php echo($service['service']); ?>
              </div> 
      <?php endwhile; ?>
      </div>
  </div>
</div>
  </div> <!-- end block -->

  <div class="block"> <!-- start location block -->
  <h3>Location</h3>

  <div class="row">
        <div class="col-md-6">
  <div id="map-canvas"></div>
  </div>
  
  <div class="col-md-6">

  <div class="form-group">
    <label for="streetname" class="col-sm-2 control-label">First line of address</label>

    <div class="col-sm-10">
      <input name="streetname" type="text" class="form-control" id="streetname" placeholder="Enter first line of address">
    </div>
  </div>
   <div class="form-group">
    <label for="city" class="col-sm-2 control-label">City</label>
    <div class="col-sm-10">
      <input name="city" type="text" class="form-control" id="city" placeholder="Enter city">
    </div>
  </div>
   <div class="form-group">
    <label for="website" class="col-sm-2 control-label">Postcode</label>
    <div class="col-sm-10">
      <input name="postcode" type="text" class="form-control" id="postcode" placeholder="Postcode">
    </div>
  </div>
  <div class="form-group">
    <a id="find-address" class="btn btn-info"> Find address</a>
  </div>
    <input name="lat" type="hidden" class="form-control" id="lat" >
    <input name="lng" type="hidden" class="form-control" id="lng" >

  </div>
  </div>
  </div> <!-- end location block -->

  <div class="block">
 <h3>Contact informatiom</h3>
  <div class="form-group">
    <div class="form-group">
    <label for="website" class="col-sm-2 control-label">Website</label>
    <div class="col-sm-10">
      <input name="website" type="text" class="form-control" id="website" placeholder="Enter charity's website">
    </div>
  </div> 
  <div class="form-group">
    <label for="telnumber" class="col-sm-2 control-label">Tel</label>
    <div class="col-sm-10">
      <input name="tel" type="text" class="form-control" id="telnumber" placeholder="Enter charity's contact number">
    </div>
  </div> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="register">Register</button>
    </div>
  </div>
  </div>
</form>
 </div>

<?php include('includes/footer.php'); ?>
