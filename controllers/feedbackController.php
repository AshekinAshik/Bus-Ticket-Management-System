<?php
	require '../models/customerData.php';

	if (isset($_REQUEST['feedbackSubmit'])) {
        $ticketNO = $_POST['customer_ticketNo'];
		$feedback = $_POST['customer_feedback'];
        
        $customerContact = $_POST['customer_contact'];

		if ($feedback != null) {
			
				$status = feedbackPublish($ticketNO, $feedback, $customerContact);
				$encoded_date = urlencode($formattedDate);
				if ($status) {
                    header('location: ../views/feedback.php?contact='.$customerContact);
                } else {
                    header('location: ../views/feedback.php?msg=error&contact='.$customerContact);
                }
        } else {
            echo "Null Submission!";
        }
    }

?>