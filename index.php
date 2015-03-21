<?php include('config/config.php'); ?>
<?php	include('includes/header.php'); ?>
<?php include('includes/Database.php'); ?>
<?php include 'helpers/text_formatter.php'; ?>


<?php  
  $db = new Database;
  /*$charities = $db->getAllCharities();*/
  if(isset($_GET['msg'])) {
    $msg_display = '<div class="alert alert alert-success">'.$_GET['msg'].'</div>';
    echo($msg_display);
  }

  $db->query("SELECT * FROM charity");
  $charities = $db->resultset();

?>

  <div class="container" id="main">
  <div class="block clearfix">
  <form class="form-inline">
    <h2 class="pull-left">Search</h2>
    <div class="form-group pull-right">
        <input type="search" class="form-control" placeholder="Search...">
        .<input type="text" class="form-control" placeholder="City or Postcode">

        <button type="submit" class="btn btn-primary">Search</button>
    </div>
    </form>
  </div>

</br>
    <?php include('includes/charity_list.php');?>
    </div><!-- /.container -->

<?php 
	include('includes/footer.php');
?>