
<div class="block">
      <h2> Support group listings </h2>
      <div class="pull-right"> <p>Sort</p></div>
      <table class="table">
      <tr> <th> Charity name</th> <th>Location </th><th>Services</th> <th> Distance </th></tr>
      <?php while($row = $charities->fetch_assoc()) : ?>
      	<?php 
      		$servicesOffered = $db->getServicesOffered($row['id']); 
      	?>
      	<tr> <td> <a href="charity_view.php?id=<?php echo $row['id']?>"><?php echo $row['name']?></a></td> <td><?php echo $row['streetname']?></td><td><?php echo $row['services']?></td><td></td></tr>
      <?php endwhile; ?>
      </table>
    </div>