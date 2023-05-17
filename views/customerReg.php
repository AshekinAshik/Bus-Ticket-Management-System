<!DOCTYPE html>
<html>
  <head>
    <title>CUSTOMER REGISTER - BTMS</title>
    <link rel="stylesheet" type="text/css" href="css/customerReg.css" />
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
        <form name="customerRegForm" method="POST" action="../controllers/customerRegCheck.php">
          <h1> Customer Register </h1>          
          <label for="customer_Name"> Name: </label>
          <input id="customer_Name" type="text" name="Name" placeholder="your name" value="" required />
          
          <label for="customer_Email"> E-Mail: </label>
          <input id="customer_Email" type="text" name="Email" placeholder="your e-mail" value="" required />
          
          <label for="customer_Contact"> Contact: </label>
          <input id="customer_Contact" type="number" name="Contact" placeholder="your contact number" value="" required />

          <label for="customer_Age"> Age: </label>
          <input id="customer_Age" type="number" name="Age" placeholder="how old are you?" value="" required />
          
          <label for="customer_Gender"> Gender: </label>
          <input id="customer_Gender" type="radio" name="Gender" value="Male" />Male
          <input id="customer_Gender" type="radio" name="Gender" value="Female" />Female
          <input id="customer_Gender" type="radio" name="Gender" value="Other" />Other <br/>

          <label for="customer_Profession"> Profession: </label>
          <input id="customer_Profession" type="text" name="Profession" placeholder="your job" value="" required />
          
          <label for="customer_Password"> Password: </label>
          <input id="customer_Password" type="password" name="Password" placeholder="your password" value="" required />
          
          <input type="submit" name="regSubmit" value="Register" />
          
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="customerLogin.php" style="color: yellow;"> Already have an account? </a>
        </form>
    </div>
    </div>

    <footer>
      <p>BTMS &copy; 2023</p>
    </footer>

  </body>
</html>
