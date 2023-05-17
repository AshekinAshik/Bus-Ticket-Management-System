<!DOCTYPE html>
<html>
  <head>
    <title>Admin - Payments</title>
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
      <h2 align="center">All Payments List</h2>
    </main>

    <div align="center">
      <?php
        require '../models/adminData.php';
        $result = showAdminPayments(); ?>

        <table border=1> 
        <tr> 
          <th> Pay No </th>
          <th> Date of Payment </th>
          <th> Amount </th>
          <th> Pay Status </th>
          <th> Ticket No </th>
          <th> Customer ID </th>
        </tr>

        <?php 
        foreach ($result as $row) 
        {
          echo "<tr><td>".$row['PAYMENT_NO']."</td><td>".$row['DATE_OF_PAYMENT']."</td><td>".$row['AMOUNT']."</td><td>".$row['STATUS']."</td><td>".$row['TICKET_NO']."</td><td>".$row['CUSTOMER_ID']."</td></tr>";
        }
        ?>
      </table>
    </div>

    <footer>
        <p>BTMS &copy; 2023</p>
    </footer>
  </body>
</html>
