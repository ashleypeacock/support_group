<?php
    session_start();
    $isLoggedIn = false;
    if(isset($_SESSION['userid'])) {
      $userId = $_SESSION['userid'];
      $username= $_SESSION['username'];
      $isLoggedIn = true;
    }

    if(isset($_SESSION['admin'])) {
      if($_SESSION['admin'] == 1) {
        $isAdmin = true;
      }
    } else {
      $isAdmin = false;
    }
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Supportgroup network</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Support group directory</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="#">News</a></li>
          </ul>
          <?php if(!$isLoggedIn) : ?>
           <form class="navbar-form navbar-right" method="POST" action="login.php">
            <div class="form-group">
              <input type="text" placeholder="Email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <a href="register.php" class="btn btn-success">Register</a>
          </form>
        <?php else : ?>
          <form class="navbar-form navbar-right" method="POST" action="logout.php">
            <button type="submit" class="btn btn-danger">Logout</button>
          </form>
 <div class="navbar-text navbar-right">
<?php echo("Welcome ".$username); ?>
</div> 

       <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <?php if($isAdmin) : ?>
            <li><a href="applications.php">Admin</a></li>
          <?php endif; ?>
            <li><a href="register_charity.php">Register charity</a></li>
            <li><a href="pending_applications.php">Pending applications</a></li>
          </ul>
        </li>
      </ul>
        <?php endif; ?> 

        </div><!--/.nav-collapse -->
      </div>
    </nav>