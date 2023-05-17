<?php
    session_start();
    require '../models/adminData.php';

	if (isset($_REQUEST['loginSubmit'])) 
    {
		$username = $_POST['adminUsername'];
		$password = $_POST['adminPassword'];

		if ($username != null && $password != null) 
        {
			$status = login($username, $password);

			if ($status) {
				setcookie('status', 'true', time()+3600, '/');
				header('location: ../views/admin.html');
			} else {
				header('location: ../views/adminLogin.php?msg=error');
			}
			
		} else {
			echo "Null Submission!";
		}
	}
?>