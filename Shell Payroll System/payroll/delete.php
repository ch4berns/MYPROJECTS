<?php 
	require('db.php');
	$db = new mysqli('localhost','root','','payroll1');
	
	$id=$_GET['emp_id'];
	$query = "DELETE FROM employee WHERE emp_id=$id"; 
	$result = $db -> query($query) or die (mysqli_error($db));
	header("Location: home_employee.php"); 
 ?>