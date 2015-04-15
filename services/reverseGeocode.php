  <?php

include('../helpers/location.php');

$latitude = "";
if(isset($_REQUEST['latitude']))
    $latitude = $_REQUEST['latitude'];

$longitude = "";
if(isset($_REQUEST['longitude']))
    $longitude = $_REQUEST['longitude'];

$result = get_location_details_for_lat_long($latitude, $longitude);
print_r(json_encode($result));

  ?>