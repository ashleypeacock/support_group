<?php include('config/config.php'); ?>
<?php	include('includes/header.php'); ?>
<?php include('libs/Database.php'); ?>

<?php  
  $db = new Database;
  $charities = $db->getAllCharities();
?>

  <div class="container" id="main">
  <div class="block clearfix">
  <form class="form-inline">
    <h2 class="pull-left">Search</h2>
    <div class="form-group pull-right">
        <input type="search" class="form-control" placeholder="Search...">
        <input type="text" class="form-control" placeholder="City or Postcode">
        <input type="text" class="form-control" placeholder="Distance">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
    </form>
  </div>

</br>
    <div class="block">
      <h2> Support group listings </h2>
      <div class="pull-right"> <p>Sort</p></div>
      <table class="table">
      <tr> <th> Charity name</th> <th>Location </th><th>Services</th></tr>
      <?php while($row = $charities->fetch_assoc()) : ?>
      <tr> <td> <a href="charity_view.php?id=<?php echo $row['id']?>"><?php echo $row['name']?></a></td> <td><?php echo $row['streetname']?></td><td><?php echo $row['services']?></td></tr>
      <?php endwhile; ?>
      </table>
    </div>
    </div><!-- /.container -->

<?php 
	include('includes/footer.php');
?>