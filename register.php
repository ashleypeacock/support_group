<?php include('config/config.php'); ?>
<?php	include('includes/header.php'); ?>
<?php include('libs/Database.php'); ?>

<?php
  $db = new Database;
  $servicesList = $db->getServicesList();
  $conditionsList = $db->getConditionsList();
?>

 <div class="container" id="register">
    <h1>Register</h1>
    <form class="form-horizontal" id="usrreg">
    <div class="block">
    <h3>Information</h3>
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
    <label for="pass" class="col-sm-2 control-label">Password</label><br>
        <div class="col-sm-10">
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="charityReg" class="col-sm-2 control-label">Background</label><br>
    <div class="col-sm-10"><textarea class="form-control" form="usrreg" rows="3" placeholder="Tell us a bit about yourself(optional)"></textarea></div>
  </div>
  </div> <!-- end block -->
  <div class="block clearfix"> 
  <h3>Location</h3>
   <div class="form-group">
    <label for="city" class="col-sm-2 control-label">City</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="city" placeholder="Enter city">
    </div>
  </div>
   <div class="form-group">
    <label for="country" class="col-sm-2 control-label">Country</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="website" placeholder="Country">
    </div>
  </div>
   <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="register">Register</button>
    </div>
  </div>
</form>
 </div>
<?php include('includes/footer.php'); ?>
