<?php include('config/config.php'); ?>
<?php	include('includes/header.php'); ?>
<?php include('libs/Database.php'); ?>

<?php
  $db = new Database;
  $servicesList = $db->getServicesList();
  $conditionsList = $db->getConditionsList();

if(isset($_POST['register'])) {
      $registerData = array();
      $registerData['username'] = $_POST['username'];
      $registerData['email'] = $_POST['email'];
      $registerData['password'] = $_POST['password'];
      $registerData['password2'] = $_POST['password2'];
      $registerData['city'] = $_POST['city'];
      $registerData['country'] = $_POST['country'];

      $register = $db->register($registerData);
      if($register === TRUE) { // success
        $msg = "You have successfully registered!";
        $message = "Thankyou for registering ".$registerData['username'].'. You may now login and add a charity to be listed from the main site.';
        $message = wordwrap($message, 70, "\r\n");
        mail($registerData['email'], SITE_NAME.' registration', $message);
        header('Location: index.php?msg='.$msg);
      } else { // failure
        $msg = '<div class="alert alert-danger">'.$register.'</div>';
        echo($msg);
      }
  }
?>

 <div class="container" id="register">
    <h1>Register</h1>
    <form class="form-horizontal" id="usrreg" method="post" action="register.php">
    <div class="block">
    <h3>Information</h3>
    <div class="form-group">
    <label for="charityName" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input name="username" type="text" class="form-control" id="charityName" placeholder="Enter username">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input name="email" type="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
    <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
    <input name="password"type="password" class="form-control" id="pass" placeholder="Password">
    </div>
    </div>
    <div class="form-group">
    <label for="password2" class="col-sm-2 control-label">Confirm password</label><br>
        <div class="col-sm-10">
    <input name ="password2" type="password" class="form-control" id="password2" placeholder="Confirm password">
    </div>
  </div>
  </div> <!-- end block -->
  <div class="block clearfix"> 
  <h3>Location</h3>
   <div class="form-group">
    <label for="city" class="col-sm-2 control-label">City</label>
    <div class="col-sm-10">
      <input name="city" type="text" class="form-control" id="city" placeholder="Enter city">
    </div>
  </div>
   <div class="form-group">
    <label for="country" class="col-sm-2 control-label">Country</label>
    <div class="col-sm-10">
      <input name="country" type="text" class="form-control" id="country" placeholder="Country">
    </div>
  </div>
   <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="register" >Register</button>
    </div>
  </div>
</form>
 </div>
<?php include('includes/footer.php'); ?>
