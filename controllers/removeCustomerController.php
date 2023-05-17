<?php
	require '../models/adminData.php';

	if (isset($_REQUEST['removeCustomerSubmit'])) {
        $customerID = $_POST['remove_CustomerID'];
        
        $customerContact = $_POST['customer_contact'];

		if ($customerID != null) {
				$status = removeCustomer($customerID);
				if ($status) {
                    header('location: ../views/customersAdmin.php');
                } else {
                    header('location: ../views/customersAdmin.php?');
                }
        } else {
            echo "Null Submission!";
        }
    }
?>