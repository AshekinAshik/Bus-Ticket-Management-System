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
      <h2>Welcome, Customer</h2>
      <p>Here, you can view available routes, book tickets, and view your bookings.</p>
    </main>
    
    <footer>
      <p>BTMS &copy; 2023</p>
    </footer>
  </body>
</html>
