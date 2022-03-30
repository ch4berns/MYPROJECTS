<?php
  $conn = new mysqli('localhost','root','','payroll1');
  if (!$conn)
  {
    die("Database Connection Failed" . mysqli_error());
  }

  $select_db = $conn -> select_db('payroll1');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysqli_error());
  }

  if(isset($_POST['submit'])!="")
  {
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];

    $sql = $conn -> query("INSERT into employee(lname, fname, gender, emp_type, division)VALUES('$lname','$fname','$gender', '$type', '$division')");

    if($sql)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
      <?php 
    }
  }
?>