<?php
	require '../models/customerData.php';

	if (isset($_REQUEST['bookSubmit'])) {
		$seatNum = $_POST['customer_book_seatNum'];
		$amount = intval($_POST['customer_book_amount']);
        $date = $_POST['customer_book_date'];
        $formattedDate = date('d-M-y', strtotime($date));
		$busNum = intval($_POST['customer_book_busNum']);

        $customerContact = $_POST['customer_contact'];

		if ($seatNum != null && $amount != null && $date != null &&  $busNum != null) {
			
				$status = bookTickets($seatNum, $amount, $formattedDate, $busNum, $customerContact);
				$encoded_date = urlencode($formattedDate);
				if ($status) {
                    header('location: ../views/bookTickets.php?contact='.$customerContact);
                } else {
                    header('location: ../views/bookTickets.php?msg=error&contact='.$customerContact);
                }
        } else {
            echo "Null Submission!";
        }
    }

?>