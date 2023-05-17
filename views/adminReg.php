<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN REGISTER - BTMS</title>
    <link rel="stylesheet" type="text/css" href="css/adminReg.css" />
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
        <div class="reg-box">
        <form name="adminRegForm" method="POST" action="../controllers/adminRegCheck.php">
            <h1>Admin Register</h1>
            <label for="admin_Name"> Name: </label>
            <input id="admin_Name" type="text" name="adminName" placeholder="your name" required />
            
            <label for="admin_Email"> E-Mail: </label>
            <input id="admin_Email" type="text" name="adminEmail" placeholder="your e-mail" required />
            
            <label for="admin_Contact"> Contact: </label>
            <input id="admin_Contact" type="number" name="adminContact" placeholder="your contact number" required />
            
            <label for="admin_Username"> Username: </label>
            <input id="admin_Username" type="text" name="adminUsername" placeholder="your username" required />
            
            <label for="admin_Password"> Password: </label>
            <input id="admin_Password" type="password" name="adminPassword" placeholder="your password" required />
           
            <input type="submit" name="regSubmit" value="Register" />

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="adminLogin.php" style="color: yellow;"> Already have an account? </a>
        </form>
    </div>
    </div>

    <footer>
        <p>BTMS &copy; 2023</p>
    </footer>

  </body>
</html>
