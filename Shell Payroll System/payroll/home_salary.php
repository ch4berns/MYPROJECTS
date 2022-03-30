<?php
	include("auth.php"); //include auth.php file on all secure pages
	include("db.php");
  
	$conn = new mysqli('localhost','root','','payroll1');
	$query  = $conn -> query("SELECT * from overtime");
	while($row=mysqli_fetch_array($query))
	{
		@$rate     = $row['rate'];
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
            <li>
              <a href="home_employee.php">Employee</a>
            </li>
            <li>
              <a href="home_deductions.php">Deduction/s</a>
            </li>
            <li class="active">
              <a href="">Income</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#overtime" class="btn btn-success">Modify Overtime Rate</button>
                <p class="pull-right">Overtime rate per hour: <big><b><?php echo $rate; ?>.00</b></big></p><br>
                <p align="center"><big><b>Account</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
						  <th><p align="center">ID No.</p></th>
                          <th><p align="center">Name</p></th>
                          <th><p align="center">Deduction</p></th>
                          <th><p align="center">Overtime</p></th>
						  <th><p align="center">WorkDays</p></th>
                          <th><p align="center">Net Pay</p></th>
						  <th><p align="center">Total Net Pay</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
						  $db = new mysqli('localhost','root','','payroll1');
						  
                          $query = $db -> query("SELECT * from overtime");
                          while($row=mysqli_fetch_array($query))
                          {
                            $rate   = $row['rate'];
                          }

                          $query = $db -> query("SELECT * from employee");
                          while($row=mysqli_fetch_array($query))
                          {
							$emp_id			 = $row['emp_id'];
                            $lname           = $row['lname'];
                            $fname           = $row['fname'];
                            $deduction       = $row['deduction'];
                            $overtime        = $row['overtime'];
							$date_work		 = $row['datework'];
                            $bonus           = $row['bonus'];

                            $over     = $row['overtime'] * $rate;
                            $bonus     = $row['bonus'];
                            $deduction  = $row['deduction'];
                            $income   = $over + $bonus;
                            $netpay   = $income - $deduction;
                        ?>
                        <tr>
						  <td align="center"><?php echo $emp_id?></td>

                          <td align="center"><b><?php echo $lname?>, <?php echo $fname?></b></td>
                          <td align="center"><big><b><?php echo $deduction?></b></big>.00</td>
                          <td align="center"><big><b><?php echo $overtime?></b></big> hrs</td>
						  <td align="center"><big><b><?php echo $date_work?></b></big></td>
                          <td align="center"><big><b><?php echo $bonus?></b></big>.00</td>
                          <td align="center"><big><b><?php echo $netpay?></b></big>.00</td>
                        </tr>
                        <?php } ?>
                      </tbody>

                        <tr class="info">
						  <th><p align="center">ID</p></th>
                          <th><p align="center">Name</p></th>
                          <th><p align="center">Deduction</p></th>
                          <th><p align="center">Overtime</p></th>
						  <th><p align="center">WorkDays</p></th>
                          <th><p align="center">Bonus</p></th>
                          <th><p align="center">Net Pay</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for OVERTIME -->
      <div class="modal fade" id="overtime" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Overtime</b></big> rate per hour.</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_overtime.php" name="form" method="post">
                <div class="form-group">
                    <input type="text" name="rate" class="form-control" value="<?php echo $rate; ?>" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>
              </form>

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