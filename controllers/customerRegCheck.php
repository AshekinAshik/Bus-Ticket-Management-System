<?php
	require '../models/customerData.php';

	if (isset($_REQUEST['regSubmit'])) {
		$name = $_POST['Name'];
		$email = $_POST['Email'];
        $age = $_POST['Age'];
		$contact = $_POST['Contact'];
		$password = $_POST['Password'];
		$profession = $_POST['Profession'];
		if (isset($_POST['Gender'])) {
			$gender = $_POST['Gender'];
		}

		if ($name != null && $email != null && $age != null &&  $password != null && $gender != null && $profession != null && $contact != null ) {
			
				$status = reg($name, $email, $contact, $age, $gender, $profession, $password);
				
				if ($status) {
                    header('location: ../views/customerLogin.php');
                } else {
                    header('location: ../views/customerReg.php');
                }
        } else {
            echo "Null Submission!";
        }
    }

?>