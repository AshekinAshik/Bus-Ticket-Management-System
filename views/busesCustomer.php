<?php
    // get the value of the variable from the URL
    $encoded_contact = $_GET["contact"];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>CUSTOMER - BTMS</title>
    <link rel="stylesheet" type="text/css" href="css/customer.css">
  </head>
  <body>
    <header>
      <h1>BTMS</h1>
      <nav>
        <ul>
          <li><a href="busesCustomer.php?contact=<?php echo $encoded_contact; ?>">View Buses</a></li>
          <li><a href="bookTickets.php?contact=<?php echo $encoded_contact; ?>">Book Ticket</a></li>
          <li><a href="viewBookings.php?contact=<?php echo $encoded_contact; ?>">View Bookings</a></li>
          <li><a href="feedback.php?contact=<?php echo $encoded_contact; ?>">Feedback</a></li>
          <li><a href="paymentsCustomer.php?contact=<?php echo $encoded_contact; ?>">Payment</a></li>
          <li><a href="./home.html">Logout</a></li>
        </ul>
      </nav>
    </header>
    
    <main>
      <h2 align="center">Available Bus List</h2>
    </main>

    <div align="center">
      <?php
        require '../models/customerData.php';
        $result = showBuses(); ?>

        <table border=1> 
        <tr> 
          <th> Bus Number </th>
          <th> Route </th>
          <th> Bus Type </th>
          <th> Driver Name </th>
        </tr>

        <?php 
        foreach ($result as $row) 
        {
          echo "<tr><td>".$row['BUS_NUMBER']."</td><td>".$row['ROUTE']."</td><td>".$row['TYPE']."</td><td>".$row['DRIVER_NAME']."</td></tr>";
        }
        ?>
      </table>
    </div>
    
    <footer>
      <p>BTMS &copy; 2023</p>
    </footer>
  </body>
</html>
