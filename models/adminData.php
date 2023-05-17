<?php
    function showBuses() 
    {
        require 'dbConnection.php';

		$sql = "SELECT * FROM BUSES";
        $rs = oci_parse($conn, $sql);
        oci_execute($rs);

        if (!$rs) 
        {
            exit("Error in SQL");
        }
        $data = array();
        while ($row = oci_fetch_array($rs, OCI_ASSOC+OCI_RETURN_NULLS)) 
        {
            $data[] = $row;
        }

        return $data;

        // echo "<table border=1><tr>";
        // echo "<th>Bus Number</th>";
        // echo "<th>Route</th>";
        // echo "<th>Bus Type</th>";
        // echo "<th>Driver Name</th></tr>";

        // while (oci_fetch($rs)) 
        // {
        // $b_number = oci_result($rs,"BUS_NUMBER");
        // $b_route = oci_result($rs,"ROUTE");
        // $b_type = oci_result($rs,"TYPE");
        // $b_driver = oci_result($rs,"DRIVER_NAME");

        // echo "<tr><td>$b_number</td>";
        // echo "<td>$b_route</td>";
        // echo "<td>$b_type</td>";
        // echo "<td>$b_driver</td></tr>";
        // }

        oci_close($conn);
        //echo "</table>";
	}

    function showCustomers() 
    {
        require 'dbConnection.php';

		$sql = "SELECT * FROM CUSTOMERS";
        $rs = oci_parse($conn, $sql);
        oci_execute($rs);

        if (!$rs) 
        {
            exit("Error in SQL");
        }
        $data = array();
        while ($row = oci_fetch_array($rs, OCI_ASSOC+OCI_RETURN_NULLS)) 
        {
            $data[] = $row;
        }

        return $data;
        oci_close($conn);
    }

    function showAdminPayments() 
    {
        require 'dbConnection.php';

		$sql = "SELECT * FROM PAYMENTS";
        $rs = oci_parse($conn, $sql);
        oci_execute($rs);

        if (!$rs) 
        {
            exit("Error in SQL");
        }
        $data = array();
        while ($row = oci_fetch_array($rs, OCI_ASSOC+OCI_RETURN_NULLS)) 
        {
            $data[] = $row;
        }

        return $data;
        oci_close($conn);
    }

    function showTickets() 
    {
        require 'dbConnection.php';

		$sql = "SELECT * FROM TICKETS";
        $rs = oci_parse($conn, $sql);
        oci_execute($rs);

        if (!$rs) 
        {
            exit("Error in SQL");
        }
        $data = array();
        while ($row = oci_fetch_array($rs, OCI_ASSOC+OCI_RETURN_NULLS)) 
        {
            $data[] = $row;
        }

        return $data;
        oci_close($conn);
    }

    function login($username, $password) {
		require 'dbConnection.php';

		$sql = "SELECT COUNT(*) AS RESNUM from ADMIN WHERE USERNAME = '{$username}' AND PASSWORD = '{$password}'";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);

        //resnum variable stores the number of rows in result.
        while (oci_fetch($rs))
        {
            $resnum = oci_result($rs, "RESNUM");
        }

		if ($resnum > 0) {
			return true;
		} else {
			return false;
		}
	}

    function reg ($name, $email, $contact, $username, $password) 
    {
        require 'dbConnection.php';
        
		$sql = "INSERT INTO ADMIN VALUES ('{$name}', '{$email}', '{$username}', {$contact}, '{$password}')";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);

        return true;
	}

    function removeCustomer($customerID)
    {
        require 'dbConnection.php';

		$sql = "DELETE FROM CUSTOMERS WHERE ID = {$customerID}";
		$rs = oci_parse($conn, $sql);
        if (oci_execute($rs)) {
            return true;
        } else {
            return false;
        }
        
        oci_close($conn);
    }

    function addBus ($busNum, $busRoute, $busType, $busDriverName) 
    {
        require 'dbConnection.php';
        
		$sql = "INSERT INTO BUSES VALUES ({$busNum}, '{$busRoute}', '{$busType}', '{$busDriverName}')";
		$rs = oci_parse($conn, $sql);
        if (oci_execute($rs)) {
            return true;
        }
        return false;
	}

    function removeBus($busNum)
    {
        require 'dbConnection.php';

		$sql = "DELETE FROM BUSES WHERE BUS_NUMBER = {$busNum}";
		$rs = oci_parse($conn, $sql);
        if (oci_execute($rs)) {
            return true;
        } else {
            return false;
        }
        
        oci_close($conn);
    }
?>