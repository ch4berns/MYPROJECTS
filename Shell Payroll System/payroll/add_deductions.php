<?php
	
		require("db.php");
		$conn = new mysqli('localhost','root','','payroll1');
		
		@$id 			= $_POST['deduction_id'];
		@$philhealth 	= $_POST['philhealth'];
		@$gsis 			= $_POST['gsis'];
		@$love 			= $_POST['pag_ibig'];
		@$loans 		= $_POST['loans'];


		$sql = $conn -> query("UPDATE deductions SET gsis='$gsis', pag_ibig='$love', loans='$loans', philhealth='$philhealth' WHERE deduction_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Deductions successfully updated...');
		            window.location.href='home_deductions.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>