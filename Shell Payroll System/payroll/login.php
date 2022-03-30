<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" type="text/css" href="./assets/css/login.css">
  
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


</head>
<style>
	body {
      min-height: 100vh;
      width: 100%;
      background-image: url(https://res.cloudinary.com/djo6hqejl/image/upload/v1635384712/shell-station-in-dark_eeic4n.jpg?fbclid=IwAR0BZcrjAQHwIQo9Z0pwoATRE_9T1IoDmw2nqyUm7v_nUcM3WNB9j5b-nbQ);
      background-position: cover;
      background-size: cover;
      position: relative;
	  
	}
	.container {
		margin: 25px auto; 
		position: relative;
		width: 900px;
	}
	
	#content {
		background: #ffb347;
		margin: 0 auto;
		padding: 25px 0 0;
		position: relative;
		text-align: center;	
    width: 600px
	}
	
	#content h1 {
	color: black;
	font: bold 30px Helvetica, Arial, sans-serif;
	letter-spacing: -0.05em;
	line-height: 90px;
	margin: 10px 0 30px;
	}
	#content h1:before,
	#content h1:after {
		content: "";
		height: 1px;
		position: absolute;
		top: 40px;
		width: 27%;
	}

	.button {
		border-radius: 0 0 5px 5px;
		border-top: 1px solid #CFD5D9;
		padding: 15px 0;
  }
	
</style>


<body class="hold-transition login-page">
<?php
  require('db.php');
  $db = new mysqli('localhost','root','','payroll1');
  session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = stripslashes($username);
        $username = $db -> real_escape_string($username);

        $password = stripslashes($password);
        $password = $db -> real_escape_string($password);

        //Checking is user existing in the database or not
		$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        $result = $db -> query($query) or die(mysqli_error($db));
        $rows = mysqli_num_rows($result);

        if($rows==1)
        {
          $_SESSION['username'] = $username;
          header("Location: index.php");
        }
        else
        {
          ?>
          <script>
            alert('Invalid username or password, please try again.');
            window.location.href='login.php';
          </script>
          <?php
        }
    }
    else
    {
?>


<br><br><br><br><br><br><br><br>
<div class="container">
  <section id="content">
    <form action="" method="post">
      <h1>Login Form</h1>
      <div>
        <input name=username type="text" placeholder="Enter Username" required>
      </div>
      <div>
        <input name=password type="password" placeholder="Enter Password" required>
      </div>
      <div>
        <input type="submit" value="Log in" />

      </div>
    </form><!-- form -->
  </section><!-- content -->
</div><!-- container -->


<?php } ?>


  </body>
</html>