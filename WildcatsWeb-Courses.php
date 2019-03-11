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

    <title>WiSP - Your Courses</title>

		<style type="text/css">
		.form-group {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: auto;
		}

		#main-section{
		margin-top: 50px;
		padding: 0px;
		margin: auto;
		height:600px;

		}

		#logo{
		color:#007bff;
		padding-left: 800px;
		}

		#dbContent{
		background-color: light;
		border: 4px;
		border-color: #007bff;
		}
		</style>
  </head>

  <body>

	<nav id=mainNavbar" class="navbar navbar-light bg-light">
		<ul class="nav nav-tabs">

		<a class="nav-link" href="WildcatsWeb-Landing.php">Home</a>
	  </li>
	  	<a class="nav-link" href="WildcatsWeb-Personal-Info.php">Personal Info</a>

	  	<a class="nav-link active" href="WildcatsWeb-Courses.php">Course Info</a>


		<a class="nav-link" href="WildcatsWeb-Status.php">Admissions Info</a>


		<a class="nav-link" href="#download">Download</a>

	  <li id="logo" class="nav-item">
		<h1>WiSP</h1>
	  </li>
	</ul>
	</nav>



	<div id="main-section" class="container">
	<h1 class="display-6" style="margin-top:80px">Course Information</h1>
		<p class="lead">Find information on your registered courses below</p>

		<p>
		<div class="card text-white bg-secondary mb-3" style="height:300px">
		  <div class="card-body">
			<p class="card-text">
        <?php
            $user = $_SESSION['username'];
            $query = "SELECT Classes.Course_Reference_Number, Classes.Name, Classes.Credits, Classes.Day, Classes.Time, Classes.Location, Professor.First_name, Professor.Last_name
              FROM Student_Classes
              JOIN Classes
              JOIN Professor
              ON Student_Classes.CRN=Classes.Course_Reference_Number and Professor.id_number=Classes.Professor WHERE Student_Classes.id_number='$user' and Enrolled='YES'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            echo "<table><tr><th>CRN</th><th>Class Name</th><th>Time</th><th>Credits</th><th>Location</th><th>Professor</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr><td width='10%'>".$row["Course_Reference_Number"]."</td>
              <td width='10%'>".$row["Name"]."</td>
              <td width='10%'>".$row["Day"]." ".$row["Time"]."</td>
              <td width='10%'>".$row["Credits"]."</td>
              <td width='10%'>".$row["Location"]."</td>
              <td width='10%'>".$row["First_name"]." ".$row["Last_name"]."</td></tr>";
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
