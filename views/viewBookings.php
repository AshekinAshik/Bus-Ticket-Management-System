<?php
    // get the value of the variable from the URL
    $encoded_contact = $_GET["contact"];
    $contact = urldecode($encoded_contact);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>BOOKING - BTMS</title>
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
      <h2 align="center">Your Booked Ticket List</h2>
    </main>

    <div align="center">
        <?php
            require '../models/customerData.php';
            $result = showBookedTickets($contact); ?>

            <table border=1> 
            <tr> 
            <th> Ticket NO </th>
            <th> Seat Number  </th>
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
