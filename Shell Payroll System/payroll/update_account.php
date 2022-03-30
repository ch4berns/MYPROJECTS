<?php 

  include("db.php");
  include("auth.php");
  $db = new mysqli('localhost','root','','payroll1');


  $id           = $_POST['id'];
  $deduction    = $_POST['deduction'];
  $overtime     = $_POST['overtime'];
  $datework		= $_POST['datework'];
  $bonus        = $_POST['bonus'];

  $sql = $db -> query("UPDATE employee SET deduction='$deduction', overtime='$overtime', datework='$datework', bonus='$bonus' WHERE emp_id='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Account Payroll successfully updated.');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
  else
  {
    echo "Invalid";
  }
?>