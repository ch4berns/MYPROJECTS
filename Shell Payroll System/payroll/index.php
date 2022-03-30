<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_employee.php");
?>

<?php

  $conn= new mysqli('localhost','root','','payroll1');
  if (!$conn)
  {
    die("Database Connection Failed" . mysqli_error($conn));
  }

  $select_db = $conn -> select_db('payroll1');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysqli_error($conn));
  }

  $query  = $conn -> query("SELECT * from deductions");
  while($row=mysqli_fetch_array($query))
  {
    $id           = $row['deduction_id'];
    $philhealth   = $row['philhealth'];
    $gsis         = $row['gsis'];
    $love         = $row['pag_ibig'];
    $loans        = $row['loans'];

    $total        = $philhealth + $gsis + $love + $loans;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <script>
        var ScrollMsg= "Shell Payroll Management System - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/search.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
<style> 
	body{
		background-color: #ffae42;
	}
	.jumbotron {
		
		background-image: url(https://res.cloudinary.com/djo6hqejl/image/upload/v1635384712/shell-station-in-dark_eeic4n.jpg?fbclid=IwAR0BZcrjAQHwIQo9Z0pwoATRE_9T1IoDmw2nqyUm7v_nUcM3WNB9j5b-nbQ);
		background-position: cover;
		background-size: cover;
		position: relative;
		min-height: 80vh;
	}
	
	.jumbotron  {
		color: #fff;
		text-align: center;
	}
</style>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
            <b><a href="index.php"><img width="80px"
            src="https://res.cloudinary.com/dlsr1loxn/image/upload/v1635594936/received_274770067746403_bzyvci.webp"/></a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><i><b><?php echo $_SESSION['username']; ?></b></i></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li><a href="home_employee.php">Employee</a></li>
            <li><a href="home_deductions.php">Deduction/s</a></li>
            <li><a href="home_salary.php">Income</a></li>
          </ul>
        </nav>
      </div><br>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1><b>SHELL</b></h1>
		<h1><b>PAYROLL SYSTEM</b></h1>

        <p><a data-toggle="modal" class="btn btn-lg btn-success" href="#instructor" role="button">ABOUT</a></p>
      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p align="center">PAYROLL MANAGEMENT SYSTEM</p>
      </footer>

      <!-- this modal is for my INSTRUCTOR -->
      <div class="modal fade" id="instructor" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>This is a group project</b></h3>
            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>