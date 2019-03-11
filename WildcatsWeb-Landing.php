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

    <title>Wildcats Web</title>

		<style type="text/css">
		.form-group {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: auto;
		}

		.carousel{
		max-width: 100%;
		padding: 200px;
		margin:auto;
		}

		.jumbotron{
		//color: #007bff;
		}

		</style>
  </head>

  <body>

	<nav id=mainNavar" class="navbar navbar-light bg-light">
		<ul class="nav nav-tabs">
		<a class="navbar-brand" href="#">Welcome</a>
	  <li class="nav-item">
		<a class="nav-link active" href="#home">Home</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="#about">About</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="#download">Download</a>
	  </li>
	</ul>
	</nav>

	<div id="jumbotron" class="jumbotron bg-info jumbotron-fluid">
	  <div class="container">
		<h1 class="display-5" style="color:white">WiSP</h1>
		<p class="lead">Welcome to the Wildcats Student Portal</p>
	  </div>
	</div>
	<div class="container">
  <div class="row">
    <div class="col-sm">
	<div class="card">


		  <div class="card-header">
			Student Information
		  </div>

		  <div class="card-body">
			<h5 class="card-title">Personal Information</h5>
			<p class="card-text">View and edit your personal and contact information here.</p>

			<button type="button" class="btn btn-primary" data-name="Personal" data-toggle="modal" data-target="#personalModal">View Info</button>
		  </div>
		</div>
    </div>
    <div class="col-sm">
    <div class="card">
		  <div class="card-header">
			Course Information
		  </div>
		  <div class="card-body">
			<h5 class="card-title">My Courses</h5>
			<p class="card-text">View your syllabus, class schedules and more...</p>
			<button type="button" class="btn btn-primary" data-name="Course" data-toggle="modal" data-target="#courseModal">Course Info</button>

		  </div>
		</div>
    </div>
    <div class="col-sm">
		  <div class="card">
		  <div class="card-header">
			Admissions Information
		  </div>
		  <div class="card-body">
			<h5 class="card-title">Status Check</h5>
			<p class="card-text">Find out about your current student status, fees and more.</p>
			<button type="button" class="btn btn-primary" data-name="Student" data-body="test" data-toggle="modal" data-target="#statusModal">Admission Info</button>
			</div>
		</div>
    </div>
  </div>

<div class="modal fade" id="personalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Personal Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Link to Database here-->
         <?php
             $user = $_SESSION['username'];
             $query = "SELECT * FROM Student WHERE id_number='$user'";
             $result = mysqli_query($db, $query) or die('Error querying database.') or die(mysqli_error($db));
             while($row = mysqli_fetch_assoc($result))
             {
                   echo "<b>ID</b>: ".$row["id_number"]."<br/>
                   <b>Name</b>: ".$row["First_name"]." "
                   .$row["Last_name"]."<br/>
                   <b>E-Mail</b>: ".$row["Email"]."<br/>
                   <b>Telephone</b>: ".$row["Telephone"]."<br/>
                   <b>Address</b>: ".$row["Address"]."<br/>
                   <b>D.O.B.</b>: ".$row["D.O.B."]. "<br/>
                   <b>Gender</b>: ".$row["Gender"]."<br/>
                   <b>Race</b>: ".$row["Race"];
             }
         ?>
      </div>
      <div class="modal-footer">
		<a class="btn btn-primary" href="WildcatsWeb-Personal-Info.php">Edit</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Course Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Link to Database here-->
        <?php
            $user = $_SESSION['username'];
            $query = "SELECT Classes.Course_Reference_Number, Classes.Class_Code, Classes.Credits, Classes.Day, Classes.Time, Classes.Location, Professor.First_name, Professor.Last_name
              FROM Student_Classes
              JOIN Classes
              JOIN Professor
              ON Student_Classes.CRN=Classes.Course_Reference_Number and Professor.id_number=Classes.Professor WHERE Student_Classes.id_number='G00321314' and Enrolled='YES'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            while($row = mysqli_fetch_assoc($result)) {
              echo "<b>CRN</b>: ".$row["Course_Reference_Number"]."<br/>
              <b>Class</b>: ".$row["Class_Code"]."<br/>
              <b>Time</b>: ".$row["Day"]." "
              .$row["Time"]."<br/>
              <b>Credits</b>: ".$row["Credits"]."<br/>
              <b>Location</b>: ".$row["Location"]."<br/>
              <b>Teacher</b>: ".$row["First_name"]." "
              .$row["Last_name"]."<br/><br/>";
            }
        ?>
      </div>
      <div class="modal-footer">
		<a class="btn btn-primary" href="WildcatsWeb-Courses.php">Edit</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="personalInfo" class="modal-body">
        <!--Link to Database here-->
        <?php
            $user = $_SESSION['username'];
            $query = "SELECT Student_Info.GPA, Student_Info.classification, Registration.Registered, Registration.Tuition_Balance, Registration.Credit_hours, Student_Info.Classification, Student_Info.Major
              FROM Student_Info
              JOIN Registration
              JOIN Student
              ON Student_Info.id_number=Registration.id_number and Student_Info.id_number=Student.id_number WHERE Student_Info.id_number='$user'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            while($row = mysqli_fetch_assoc($result)) {
              echo "<b>Major</b>: ".$row["Major"]."<br/>
              <b>GPA</b>: ".$row["GPA"]."<br/>
              <b>Credit Hours</b>: ".$row["Credit_hours"]."<br/>
              <b>Balance</b>: $".$row["Tuition_Balance"]. "<br/>
              <b>Registered</b>: ".$row["Registered"]."<br/>
              <b>Classification</b>: ".$row["Classification"];
            }
        ?>
		      </div>
      <div class="modal-footer">
		<a class="btn btn-primary" href="WildcatsWeb-Status.php">Edit</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script type="text/javascript">
	$('#personalModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget)
		  var desPage = button.data('name')
		  var info = button.data('body')

		  var modal = $(this)
		  modal.find('.modal-title').text('Your ' + desPage + ' Profile')
		  modal.find('.modal-body input').val(desPage)
	});

		$('#statusModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget)
		  var desPage = button.data('name')
		  var info = button.data('body')

		  var modal = $(this)
		  modal.find('.modal-title').text('Your ' + desPage + ' Profile')
		  modal.find('.modal-body input').val(desPage)
	});

		$('#courseModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget)
		  var desPage = button.data('name')
		  var info = button.data('body')

		  var modal = $(this)
		  modal.find('.modal-title').text('Your ' + desPage + ' Profile')
		  modal.find('.modal-body input').val(desPage)
	});

	</script>
  </body>
</html>
