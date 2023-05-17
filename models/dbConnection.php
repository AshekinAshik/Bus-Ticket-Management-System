<?php
    $conn = oci_connect("btms","btms2023","localhost/XE");
    if (!$conn) {
        exit("Connection Failed:" . $conn);
    }
?>