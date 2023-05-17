<?php
	require '../models/adminData.php';

	if (isset($_REQUEST['addBusSubmit'])) {
		$busNum = $_POST['busNum'];
		$busRoute = $_POST['busRoute'];
        $busType = $_POST['busType'];
		$busDriverName = $_POST['busDriverName'];

		if ($busNum != null && $busRoute != null && $busType != null &&  $busDriverName != null) {
			
				$status = addBus($busNum, $busRoute, $busType, $busDriverName);
				if ($status) {
                    header('location: ../views/busesAdmin.php');
                } else {
                    header('location: ../views/busesAdmin.php');
                }
        } else {
            echo "Null Submission!";
        }
    }
?>