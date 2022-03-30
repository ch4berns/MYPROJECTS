<?php
	
		require("db.php");
		$db = new mysqli('localhost','root','','payroll1');
		
		@$id 			= $_POST['ot_id'];
		@$overtime		= $_POST['rate'];


		$sql = $db -> query("UPDATE overtime SET rate='$overtime' WHERE ot_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Overtime rate per hour successfully changed...');
		            window.location.href='home_salary.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>