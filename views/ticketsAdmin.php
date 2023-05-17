<!DOCTYPE html>
<html>
  <head>
    <title>Admin - Tickets</title>
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
      <h2 align="center">All Booked Tickets</h2>
    </main>

    <div align="center">
      <?php
        require '../models/adminData.php';
        $result = showTickets(); ?>

        <table border=1> 
        <tr> 
          <th> Ticket No </th>
          <th> Seat Number </th>
          <th> Feedback </th>
          <th> Amount </th>
          <th> Date of Booking </th>
          <th> Customer ID </th>
          <th> Bus Number </th>
        </tr>

        <?php 
        foreach ($result as $row) 
        {
          echo "<tr><td>".$row['TICKET_NO']."</td><td>".$row['SEAT_NUMBER']."</td><td>".$row['FEEDBACK']."</td><td>".$row['AMOUNT']."</td><td>".$row['DATE_OF_BOOKING']."</td><td>".$row['CUSTOMER_ID']."</td><td>".$row['BUS_NUMBER']."</td></tr>";
        }
        ?>
      </table>
    </div>

    <footer>
        <p>BTMS &copy; 2023</p>
    </footer>
  </body>
</html>
