<?php include('config/config.php'); ?>
<?php	include('includes/header.php'); ?>
<?php include('libs/Database.php'); ?>

<?php
  $db = new Database;
  $servicesList = $db->getServicesList();
  var_dump($servicesList);
?>

 <div class="container">
    <h1>Register</h1>
    <form class="form-horizontal" id="usrreg">
    <div class="block">
    <h3>Organisation information</h3>
    <div class="form-group">
    <label for="charityName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="charityName" placeholder="Enter organisation name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="charityReg" class="col-sm-2 control-label">Background/description</label>
    <div class="col-sm-10"><textarea class="form-control" form="usrreg" rows="3"></textarea></div>
  </div>
  <div class="form-group">
    <label for="conditions" class="col-sm-2 control-label">Conditions catered for</label>
    <div class="col-sm-10"><textarea class="form-control" form="usrreg" rows="3"></textarea></div>
  </div>
  <div class="form-group">
    <label for="services" class="col-sm-2 control-label">Service offered</label> <br><br>
    <div class="row">
          <?php while($service = $servicesList->fetch_assoc()) : ?>
              <div class="col-md-3  col-md-offset-2">
              <input type="checkbox" name="service" value="<?php echo($service['id']); ?>"><?php echo($service['service']); ?>
              </div> 

      <?php endwhile; ?>
      </div>
  </div>

  </div> <!-- end block -->
  <div class="block"> 
  <h3>Address</h3>
  <div class="form-group">
    <label for="streetname" class="col-sm-2 control-label">Street name</label>

    <div class="col-sm-10">
      <input type="text" class="form-control" id="streetname" placeholder="Enter first line of address">
    </div>
  </div>
   <div class="form-group">
    <label for="city" class="col-sm-2 control-label">City</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="city" placeholder="Enter city">
    </div>
  </div>
   <div class="form-group">
    <label for="website" class="col-sm-2 control-label">Enter postcode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="website" placeholder="Postcode">
    </div>
  </div>
  </div>

  <div class="block">
 <h3>Contact informatiom</h3>
  <div class="form-group">
    <div class="form-group">
    <label for="website" class="col-sm-2 control-label">Website</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="website" placeholder="Enter charity's website">
    </div>
  </div> 
  <div class="form-group">
    <label for="telnumber" class="col-sm-2 control-label">Tel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="telnumber" placeholder="Enter charity's contact number">
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
