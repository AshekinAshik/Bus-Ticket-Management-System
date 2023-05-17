<?php 
	$error = "";

	if(isset($_REQUEST['msg'])){
		if($_REQUEST['msg'] == 'error'){
			$error = "Invaild Contact/Password!";
		}
	}
?>

<html>
  <head>
    <title>CUSTOMER LOGIN - BTMS</title>
    <link rel="stylesheet" type="text/css" href="css/customerLogin.css" />
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
        <form name="customerLoginForm" method="POST" action="../controllers/customerLoginCheck.php">
            <h1>Customer Login</h1>
            <label for="customer_contact"> Contact: </label>
            <input id="customer_contact" type="number" name="Contact" placeholder="your contact number" required />
            <label for="customer_password"> Password: </label>
            <input id="customer_password" type="password" name="Password" placeholder="your password" required />
           
            <input type="submit" name="loginSubmit" value="Login" />

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="customerReg.php" style="color: yellow;"> Don't have an account? </a>
        </form>

        <div style="color: red;" align="center"> 
          <?=$error?>
        </div>
    </div>
    </div>

    <footer>
        <p>BTMS &copy; 2023</p>
    </footer>

  </body>
</html>
