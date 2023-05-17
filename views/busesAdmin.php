<!DOCTYPE html>
<html>
  <head>
    <title>Admin - Buses</title>
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

    <div align="center">
      <h2 align="center">Available Bus List</h2>

      <?php
        require '../models/adminData.php';
        $result = showBuses(); ?>

        <table border=1> 
        <tr> 
          <th> Bus Number </th>
          <th> Route </th>
          <th> Bus Type </th>
          <th> Driver Name </th>
        </tr>

        <form name="showAndRemoveBusForm" method="POST" action="../controllers/removeBusController.php">
          
          <?php 
          foreach ($result as $row) 
          {
            echo "<input type='hidden' name='busNum' value='".$row['BUS_NUMBER']."' /> ";

            echo "<tr><td>".$row['BUS_NUMBER']."</td>
            <td>".$row['ROUTE']."</td><td>".$row['TYPE']."</td>
            <td>".$row['DRIVER_NAME']."</td>
            <td><button class='red-button' name='removeBusSubmit' type='submit'> Remove </button></td></tr>";
          }
          ?>
        </form>
      </table>
    </div>
    
    <br><br>
    <div align="center">
      <h2> Add Bus </h2>

      <form name="addBusForm" method="POST" action="../controllers/addBusController.php">      
        <table> 
          <tr> 
              <td> Bus Number: </td>
              <td> <input type="number" name="busNum" value="" required /> </td>
          </tr>
          <tr> 
              <td> Bus Route: </td>
              <td> <input type="text" placeholder="Dhk to Ctg" name="busRoute" value="" required /> </td>
          </tr>
          <tr> 
            <td> Bus Type: </td>
            <td> 
              <select name="busType">
                <option value="non ac">NON-AC</option>
                <option value="ac">AC</option>
              </select>
            </td>
          </tr>
          <tr> 
              <td> Bus Driver Name: </td>
              <td> <input type="text" name="busDriverName" value="" required /> </td>
          </tr>
        </table>
        
        <br>
        <input type="submit" name="addBusSubmit" value="Add" required />
      </form>
    </div>

    <!-- <div align="center">
      <h2> Remove Bus </h2>

      <form name="addBusForm" method="POST" action="../controllers/addBusController.php">      
        <table> 
          <tr> 
              <td> Bus Number: </td>
              <td> <input type="number" placeholder="number of removing bus" name="busNum" value="" required /> </td>
          </tr>
        </table>
        
        <br>
        <input type="submit" name="removeBusSubmit" value="Remove" required />
        
      </form>
    </div> -->
    <br>

    <footer>
      <p>BTMS &copy; 2023</p>
    </footer>
  </body>
</html>
