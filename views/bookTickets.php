<?php
    // get the value of the variable from the URL
    $encoded_contact = $_GET["contact"];
    $contact = urldecode($encoded_contact);
?>

<?php
    $error = "";

    if(isset($_REQUEST['msg'])){
        if($_REQUEST['msg'] == 'error'){
            $error = "Booking Unsuccessful!";
        }
    }
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
      <h2 align="center">Book Your Journey</h2>
    </main>

    <div align="center">
        <form name="bookTicketForm" method="POST" action="../controllers/bookTicketsController.php">      
          <table> 
            <tr> 
                <td> Seat Number: </td>
                <td> <input type="number" placeholder="seat available 1-20" name="customer_book_seatNum" value="" required /> </td>
            </tr>
            <tr> 
                <td> Amount: </td>
                <td> 
                    <select name="customer_book_amount">
                        <option value="1200">1200</option>
                        <option value="2000">2000</option>
                        <option value="3600">3600</option>
                        <option value="4000">4000</option>
                        <option value="8500">8500</option>
                    </select>
                </td>
            </tr>
            <tr> 
                <td> Date of Booking: </td>
                <td> <input type="date" name="customer_book_date" value="" required /> </td>
            </tr>
            <tr> 
                <td> Bus Number: </td>
                <td> 
                    <select name="customer_book_busNum">
                            <option value="5">5</option>
                            <option value="11">11</option>
                            <option value="23">23</option>
                            <option value="31">31</option>
                            <option value="54">54</option>
                    </select> 
                </td>
            </tr>
          </table>
          
          <input type="hidden" name="customer_contact" value="<?php echo $contact?>" />
          <br><br>
          <input type="submit" name="bookSubmit" value="Book" required />
        </form>

        <div style="color: red;" align="center"> 
          <?=$error?>
        </div>
    </div>
    
    <footer>
      <p>BTMS &copy; 2023</p>
    </footer>
  </body>
</html>
