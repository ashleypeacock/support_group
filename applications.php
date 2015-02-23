<?php 
 include('config/config.php'); 
 include('includes/header.php');
 include('libs/Database.php'); 
 include 'helpers/text_formatter.php'; 
?>

<?php  
  $db = new Database;
  $charities = $db->getPendingCharities();
  var_dump($charities);
  if(isset($_GET['msg'])) {
    $msg_display = '<div class="alert alert alert-success">'.$_GET['msg'].'</div>';
    echo($msg_display);
  }
?>

<div class="container">

<div class="block">
	<h2> Pending applications</h2> </div>
	<p>On this page you can view pending charities and approve them.</p>
	<div class="block">
	<table class="table">
	
      <tr> <th> Accept </th> <th> Charity name</th> <th>Location </th><th>Services</th> <th> Distance </th></tr>
      <?php while($row = $charities->fetch_assoc()) : ?>
      	<?php 
      		$servicesOffered = $db->getServicesOffered($row['id']); 
      		if($servicesOffered) {
      			$serviceNames = getFormattedColumn('service', $servicesOffered);
      		} else {
      			$serviceNames = "None";
      		}
      	?>
      	<tr> 
      	<td> <input type="checkbox" name="approvechar" value="<?php echo($row['charity_id']);?>"> </td>
      	<td> <a href="charity_view.php?id=<?php echo $row['id']?>"><?php echo $row['name']?></a></td> <td><?php echo $row['streetname']?></td>
      	<td><?php echo($serviceNames); ?></td>
      	<td></td></tr>
      <?php endwhile; ?>
      
      </table>
      </div>
</div>
</div>

<?php
	include('includes/footer.php');
?>