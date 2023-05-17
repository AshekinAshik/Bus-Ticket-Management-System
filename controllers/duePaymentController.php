<?php
	require '../models/customerData.php';

	if (isset($_REQUEST['paymentSubmit'])) {
        $ticketNO = $_POST['customer_ticketNo'];
		$amount = $_POST['customer_ticketAmount'];
        
        $customerContact = $_POST['customer_contact'];

		if ($amount != null && $ticketNO != null) {
				$status = duePayment($ticketNO, $amount);
				if ($status) {
                    header('location: ../views/paymentsCustomer.php?contact='.$customerContact);
                } else {
                    header('location: ../views/paymentsCustomer.php?msg=error&contact='.$customerContact);
                }
        } else {
            echo "Null Submission!";
        }
        }
    

?>