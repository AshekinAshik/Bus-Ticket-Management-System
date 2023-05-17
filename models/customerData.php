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

        oci_close($conn);
	}

    function showBookedTickets($contact) 
    {
        require 'dbConnection.php';

        $sql = "SELECT ID FROM CUSTOMERS WHERE CONTACT={$contact}";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);
        while (oci_fetch($rs))
        {
            $customerID = oci_result($rs, "ID");
        }

		$sql = "SELECT * FROM TICKETS WHERE CUSTOMER_ID = {$customerID}";
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

    function showCustomerPayments($contact) 
    {
        require 'dbConnection.php';

        $sql = "SELECT ID FROM CUSTOMERS WHERE CONTACT={$contact}";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);
        while (oci_fetch($rs))
        {
            $customerID = oci_result($rs, "ID");
        }

		$sql = "SELECT * FROM PAYMENTS WHERE CUSTOMER_ID = {$customerID}";
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

    function login($contact, $password) {
		require 'dbConnection.php';

		$sql = "SELECT COUNT(*) AS RESNUM from CUSTOMERS WHERE CONTACT = '{$contact}' AND PASSWORD = '{$password}'";
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

        oci_close($conn);
	}

    function reg ($name, $email, $contact, $age, $gender, $profession, $password) 
    {
        require 'dbConnection.php';

        $sql = "SELECT COUNT(*) AS RESNUM from CUSTOMERS";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);
        while (oci_fetch($rs))
        {
            $totalCustomer = oci_result($rs, "RESNUM");
        }
        
		$sql = "INSERT INTO CUSTOMERS VALUES ({$totalCustomer}+1 ,'{$name}', '{$email}', {$contact}, {$age}, '{$gender}', '{$profession}', '{$password}')";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);

        return true;
        oci_close($conn);
	}

    function bookTickets ($seatNum, $amount, $formattedDate, $busNum, $customerContact) 
    {
        require 'dbConnection.php';

        $sql = "SELECT * FROM (SELECT * FROM TICKETS ORDER BY TICKET_NO DESC) WHERE ROWNUM = 1";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);
        while (oci_fetch($rs))
        {
            $lastTicketNo = oci_result($rs, "TICKET_NO");
        }

        $sql = "SELECT ID FROM CUSTOMERS WHERE CONTACT={$customerContact}";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);
        while (oci_fetch($rs))
        {
            $customerID = oci_result($rs, "ID");
        }
        
		$sql = "INSERT INTO TICKETS VALUES ({$lastTicketNo}+1 , {$seatNum}, NULL, {$amount}, '{$formattedDate}', {$customerID}, {$busNum})";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);

        $sql = "SELECT * FROM (SELECT * FROM PAYMENTS ORDER BY PAYMENT_NO DESC) WHERE ROWNUM = 1";
        $rs = oci_parse($conn, $sql);
        oci_execute($rs);
        while (oci_fetch($rs))
        {
            $lastPaymentNo = oci_result($rs, "PAYMENT_NO");
        }

        if ($amount != null) {
            $status = 'paid';
            $sql = "INSERT INTO PAYMENTS VALUES ({$lastPaymentNo}+1 , '{$formattedDate}', {$amount}, '{$status}', {$lastTicketNo}+1, {$customerID})";
            $rs = oci_parse($conn, $sql);
            oci_execute($rs);
        } else {
            $status = 'unpaid';
            $sql = "INSERT INTO PAYMENTS VALUES ({$lastPaymentNo}+1 , '{$formattedDate}', null, '{$status}', {$lastTicketNo}+1, {$customerID})";
            $rs = oci_parse($conn, $sql);
            oci_execute($rs);
        }
        
        return true;
        oci_close($conn);
	}

    function feedbackPublish($ticketNO, $feedback, $customerContact)
    {
        require 'dbConnection.php';

        $sql = "SELECT ID FROM CUSTOMERS WHERE CONTACT={$customerContact}";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);
        while (oci_fetch($rs))
        {
            $customerID = oci_result($rs, "ID");
        }
        
		$sql = "UPDATE TICKETS SET FEEDBACK = '{$feedback}' WHERE CUSTOMER_ID = {$customerID} AND TICKET_NO = {$ticketNO}";
		$rs = oci_parse($conn, $sql);
        
        if(oci_execute($rs)) {
            return true;
        } else {
            return false;
        }
        
        oci_close($conn);
    }

    function duePayment($ticketNO, $amount)
    {
        require 'dbConnection.php';

        $sql = "SELECT ID FROM CUSTOMERS WHERE CONTACT={$customerContact}";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);
        while (oci_fetch($rs))
        {
            $customerID = oci_result($rs, "ID");
        }
        
		$sql = "UPDATE PAYMENTS SET STATUS = 'paid' WHERE TICKET_NO = {$ticketNO}";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);
        $sql = "UPDATE PAYMENTS SET AMOUNT = {$amount} WHERE TICKET_NO = {$ticketNO}";
		$rs = oci_parse($conn, $sql);
        oci_execute($rs);
        
        oci_close($conn);
    }
?>