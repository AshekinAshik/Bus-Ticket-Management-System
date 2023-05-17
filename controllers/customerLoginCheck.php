<?php
    session_start();
    require '../models/customerData.php';

	if (isset($_REQUEST['loginSubmit'])) 
    {
		$contact = $_POST['Contact'];
		$password = $_POST['Password'];

		if ($contact != null && $password != null) 
        {
			$status = login($contact, $password);
			$encoded_contact = urlencode($contact);

			if ($status) {
				setcookie('status', 'true', time()+3600, '/');
				header('location: ../views/customer.php?contact='.$encoded_contact);
			} else {
				header('location: ../views/customerLogin.php?msg=error');
			}
		} else {
			echo "Null Submission!";
		}
	}
?>