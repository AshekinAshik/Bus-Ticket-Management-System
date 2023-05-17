<?php
    // get the value of the variable from the URL
    $encoded_contact = $_GET["contact"];
    $contact = urldecode($encoded_contact);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PAYMENTS - BTMS</title>
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
      <h2 align="center">Your Payments</h2>
    </main>

    <div align="center">
        <?php
            require '../models/customerData.php';
            $result = showCustomerPayments($contact); ?>

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

    <main>
      <h2 align="center">Due Payments</h2>
    </main>

    <div align="center">
        <form name="duePaymentForm" method="POST" action="../controllers/duePaymentController.php">      
            <table>
                <tr> 
                    <td> Ticket NO : </td>
                    <td> <input type="number" placeholder="your ticket number?" name="customer_ticketNo" value="" required /> </td>
                </tr> 
                <tr> 
                    <td> Amount Due : </td>
                    <td> <input type="number" placeholder="tk" name="customer_ticketAmount" value="" required /> </td>
                </tr>
            </table>

            <input type="hidden" name="customer_contact" value="<?php echo $contact?>" />
            <br><br>
            <input type="submit" name="paymentSubmit" value="Pay" required />
        </form>
    </div>
    
    <footer>
      <p>BTMS &copy; 2023</p>
    </footer>
  </body>
</html>
