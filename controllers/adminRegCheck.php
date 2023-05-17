<?php
    require '../models/adminData.php';

	if (isset($_REQUEST['regSubmit'])) {

		$name = $_POST['adminName'];
		$email = $_POST['adminEmail'];
        $contact = $_POST['adminContact'];
		$username = $_POST['adminUsername'];
		$password = $_POST['adminPassword'];

		if ($name != null && $email != null && $contact != null && $username != null &&  $password != null) 
        {
            $status = reg($name, $email, $contact, $username, $password);

            if ($status) {
                header('location: ../views/adminLogin.php');
            } else {
                header('location: ../views/adminReg.php');
            }			
		} else {
			echo "Null Submission!";
		}
	
	}

?>