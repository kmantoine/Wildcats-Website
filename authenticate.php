<?php
  session_start();
  $db = mysqli_connect('localhost','kmantoine','P@ssw0rd','WildCats') or die(mysqli_error($db));

  $_SESSION['username'] = $_POST['loginID'];
  $username = $_SESSION['username'];
  $password = $_POST['pword'];

  $query = "SELECT * FROM Login_Info WHERE Username='$username' and Password='$password'";
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  if($row = mysqli_fetch_array($result)) {
      $query1 = "UPDATE Login_Info SET Active='YES' WHERE Username='$username'";
      mysqli_query($db, $query1) or die(mysqli_error($db));
      require ('WildcatsWeb-Landing.php');
  }
  else {
    require 'WildcatsWeb.html';
    echo "Wrong Password!";
  }
  //mysqli_close($db);
  //unset($db);
?>
