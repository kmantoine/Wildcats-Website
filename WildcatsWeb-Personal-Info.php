<?php
  session_start();
  $db = mysqli_connect('localhost','kmantoine','P@ssw0rd','WildCats') or die(mysqli_error($db));
?>

<!doctype html>

<html lang="en">
  <head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>WiSP - Personal Information</title>

		<style type="text/css">
		.form-group {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: auto;
		}

		#main-section{
		padding: 0px;
		margin: auto;

		}

		#logo{
		color:#007bff;
		padding-left: 800px;
		}
		</style>
  </head>

  <body>

	<nav id=mainNavbar" class="navbar navbar-light bg-light">
		<ul class="nav nav-tabs">

      <a class="nav-link" href="WildcatsWeb-Landing.php">Home</a>

  	  	<a class="nav-link" href="WildcatsWeb-Personal-Info.php">Personal Info</a>

  	  	<a class="nav-link" href="WildcatsWeb-Courses.php">Course Info</a>

  		<a class="nav-link active" href="WildcatsWeb-Status.php">Admissions Info</a>

		<a class="nav-link" href="#download">Download</a>

	  <li id="logo" class="nav-item">
		<h1>WiSP</h1>
	  </li>
	</ul>
	</nav>



		<div id="main-section" class="container">
		<h1 class="display-6" style="margin-top:80px">Personal Information</h1>
		<p class="lead">Review your student information below.</p>

		<p>
		<div class="card text-white bg-info mb-3" style="height:300px">
		  <div class="card-body">
			<p class="card-text">
          <?php
              $user = $_SESSION['username'];
              $query = "SELECT * FROM Student WHERE id_number='$user'";
              $result = mysqli_query($db, $query) or die('Error querying database.');
              echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Telephone</th><th>Address</th><th>D.O.B.</th><th>Gender</th><th>Race</th></tr>";
              while($row = mysqli_fetch_assoc($result))
              {
                    echo "<tr><td width='10%'>".$row["id_number"]."</td>
                    <td width='10%'>".$row["First_name"]." ".$row["Last_name"]."</td>
                    <td width='10%'>".$row["Email"]."</td>
                    <td width='10%'>".$row["Telephone"]."</td>
                    <td width='10%'>".$row["Address"]."</td>
                    <td width='10%'>".$row["D.O.B."]."</td>
                    <td width='10%'>".$row["Gender"]."</td>
                    <td width='10%'>".$row["Race"]."</td></tr>";
              }
          ?>
        </p>
		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  </body>
</html>
