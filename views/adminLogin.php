<?php 
	$error = "";

	if(isset($_REQUEST['msg'])){
		if($_REQUEST['msg'] == 'error'){
			$error = "Invaild Username/Password!";
		}
	}
?>

<html>
  <head>
    <title>ADMIN LOGIN - BTMS</title>
    <link rel="stylesheet" type="text/css" href="css/adminLogin.css" />
  </head>

  <body class="bg-image">

    <header>
        <h1>BTMS</h1>
    </header>

    <nav align="right">
        <ul>
            <li><a href="./home.html">Home</a></li>
            <li><a href="./adminReg.php">Admin</a></li>
            <li><a href="./customerReg.php">Customer</a></li>
    </nav>

    <div class="container">
        <div class="login-box">
        <form name="adminLoginForm" method="POST" action="../controllers/adminLoginCheck.php">
            <h1>Admin Login</h1>
            <label for="admin_username"> Username: </label>
            <input id="admin_username" type="text" name="adminUsername" placeholder="your username" value="" required />
            <label for="admin_password"> Password: </label>
            <input id="admin_password" type="password" name="adminPassword" placeholder="your password" value="" required />
           
            <input type="submit" name="loginSubmit" value="Login" />

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="adminReg.php" style="color: yellow;"> Don't have an account? </a>

            <br><br>
            <div style="color: red;" align="center"> 
              <?=$error?>
            </div>
						
        </form>
    </div>
    </div>

    <footer>
        <p>BTMS &copy; 2023</p>
    </footer>

  </body>
</html>
