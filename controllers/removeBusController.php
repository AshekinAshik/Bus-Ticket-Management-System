<?php
	require '../models/adminData.php';

	if (isset($_REQUEST['removeBusSubmit'])) {
        $busNum = $_POST['busNum'];

		if ($busNum != null) {
				$status = removeBus($busNum);
				if ($status) {
                    header('location: ../views/busesAdmin.php');
                } else {
                    header('location: ../views/busesAdmin.php?');
                }
        } else {
            echo "Null Submission!";
        }
    }
?>