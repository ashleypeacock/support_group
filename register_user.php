<?php 

var_dump($_POST);
if(isset($_POST['register'])) {
    echo "Retrieving data";
      $registerData = array();
      $registerData['username'] = $_POST['username'];
      $registerData['email'] = $_POST['email'];
      $registerData['password'] = $_POST['password'];
      $registerData['password2'] = $_POST['password2'];
      $registerData['city'] = $_POST['city'];
      $registerData['country'] = $_POST['country'];
      echo var_dump($registerData);
  }

  ?>