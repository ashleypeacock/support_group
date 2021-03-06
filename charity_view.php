<?php 
include('config/config.php');
include('includes/header.php');
include('libs/Database.php');
include 'helpers/text_formatter.php'; 
?>


<?php
  $db = new Database;
  if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $charity = $db->getCharity($id);
    $servicesOffered = $db->getServicesOffered($id); 
    if($servicesOffered) {
      $serviceNames = getFormattedColumn('service', $servicesOffered);
    } else {
      $serviceNames = "None";
    }
      
  }
?>

 <div class="container">
  <div class="block charityview">
  <h1><?php echo $charity['name'] ?> </h1>
  <img src="images/kca.jpeg" class="pull-right"></img>
  <h2>Summary</h2>
  <p>
  <?php echo $charity['summary'] ?>
  </p>
  <br>
  <table class="table">
      <tr><td><strong>Location</strong></td><td><?php echo $charity['streetname']; ?></td></tr>
      <tr><td><strong>Age range</strong></td><td> Ages</td></tr>
      <tr><td><strong>Conditions</strong></td><td><?php echo $charity['conditions']; ?></td></tr>
      <tr><td><strong>Website</strong></td><td><a href=""><?php echo $charity['website']; ?></a></td></tr>
      <tr><td><strong>Telephone number</strong></td><td><?php echo $charity['tel']; ?></td></tr>
      <tr><td><strong>Email</strong></td><td><?php echo $charity['email']; ?></td></tr> 
       <tr><td><strong>Services offered</strong></td><td>  
        <?php echo $serviceNames; ?>
       </td></tr> 
     
      </table>
      </div>
  </div>

<?
	include('footer.php');
?>