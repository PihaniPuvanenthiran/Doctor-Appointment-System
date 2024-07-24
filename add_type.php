<?php
require 'database_connection.php';

if (isset($_POST['save'])) {
    // Check if $_POST values are set
    if (isset($_POST['type_name'])) {
        // Save
        $type_name = mysqli_real_escape_string($con, $_POST['type_name']);

        $query = "INSERT INTO doctor_type (`name`) VALUES ('$type_name')";

        $query_result = mysqli_query($con, $query);
        if ($query_result) {
            echo "Form submitted Successfully";
        } else {
            echo "Submission failed";
        }
    } else {
        echo "Type name is missing.";
    }
} else {
    echo "Invalid";
}
?>

                    