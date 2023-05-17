<!DOCTYPE html>
<html>
  <head>
    <title>Admin - Customers</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
  </head>
  <body>
    <header>
      <h1>BTMS</h1>
      <nav>
        <ul>
          <li><a href="./ticketsAdmin.php">Bookings</a></li>
          <li><a href="./busesAdmin.php">Buses</a></li>
          <li><a href="./customersAdmin.php">Customers</a></li>
          <li><a href="./paymentsAdmin.php">Payments</a></li>
          <li><a href="./home.html">Logout</a></li>
        </ul>
      </nav>
    </header>
    
    <main>
      <h2 align="center">Available Customers List</h2>
    </main>

    <div align="center">
      <?php
        require '../models/adminData.php';
        $result = showCustomers(); ?>

        <table border=1> 
        <tr> 
          <th> ID </th>
          <th> Name </th>
          <th> E-Mail </th>
          <th> Contact </th>
          <th> Age </th>
          <th> Gender </th>
          <th> Profession </th>
        </tr>

        <?php 
        foreach ($result as $row) 
        {
          echo "<tr><td>".$row['ID']."</td><td>".$row['NAME']."</td><td>".$row['EMAIL']."</td><td>".$row['CONTACT']."</td><td>".$row['AGE']."</td><td>".$row['GENDER']."</td><td>".$row['PROFESSION']."</td></tr>";
        }
        ?>
      </table>
    </div>

    <main>
      <h2 align="center">Remove Customer</h2>
    </main>

    <div align="center">
        <form name="removeCustomerForm" method="POST" action="../controllers/removeCustomerController.php">      
            <table>
                <tr> 
                    <td> Customer ID </td>
                    <td> <input type="number" placeholder="id of removing customer" name="remove_CustomerID" value="" required /> </td>
                </tr>
            </table>

            <br>
            <input type="submit" name="removeCustomerSubmit" value="Remove" required />
        </form>
    </div>

    <footer>
        <p>BTMS &copy; 2023</p>
    </footer>
  </body>
</html>
