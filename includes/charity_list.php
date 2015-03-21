
<div class="block">
      <h2> Support group listings </h2>
      <div class="pull-right"> <p>Sort</p></div>
      <table class="table listtable">
      <tr> <th> Charity name</th> <th>Location </th><th>Services</th> <th> Distance </th></tr>
      
      <?php foreach($charities as $charity) : ?>
      	<?php 
      		$servicesOffered = $db->getServicesOffered($charity['id']); 
      		if($servicesOffered) {
      			$serviceNames = getFormattedColumn('service', $servicesOffered);
      		} else {
      			$serviceNames = "None";
      		}
      	?>
      	<tr> <td> <a href="charity_view.php?id=<?php echo $charity['id']; ?>"><?php echo $charity['name']; ?></a></td> <td><?php echo $charity['streetname']; ?></td>
      	<td><?php echo($serviceNames); ?></td>
      	<td></td></tr>
      <?php endforeach ; ?>
      </table>
    </div>