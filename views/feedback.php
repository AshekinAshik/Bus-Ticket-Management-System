<?php
    // get the value of the variable from the URL
    $encoded_contact = $_GET["contact"];
    $contact = urldecode($encoded_contact);
?>

<?php
    $error = "";

    if(isset($_REQUEST['msg'])){
        if($_REQUEST['msg'] == 'error'){
            $error = "Something Went Wrong!";
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
      <h2 align="center">Leave You Feedback</h2>
    </main>

    <div align="center">
        <form name="feedbackForm" method="POST" action="../controllers/feedbackController.php">      
          <table>
          <tr> 
                <td> Ticket NO : </td>
                <td> <input type="text" placeholder="your ticket number?" name="customer_ticketNo" value="" required /> </td>
            </tr> 
            <tr> 
                <td> How was your ride? </td>
                <td> <input type="text" placeholder="did you enjoy?" name="customer_feedback" value="" required /> </td>
            </tr>
          </table>

          <input type="hidden" name="customer_contact" value="<?php echo $contact?>" />
          <br><br>
          <input type="submit" name="feedbackSubmit" value="Publish" required />
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
