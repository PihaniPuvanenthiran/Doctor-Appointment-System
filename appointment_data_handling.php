<?php
session_start();
require 'database_connection.php';

if (isset($_POST['save'])) {
    // Save Appointment
    $patient_name = mysqli_real_escape_string($con, $_POST['patient_name']);
    $doctor_name = mysqli_real_escape_string($con, $_POST['doctor_name']);
    $appointment_date = mysqli_real_escape_string($con, $_POST['appointment_date']);
    $appointment_reason = mysqli_real_escape_string($con, $_POST['appointment_reason']);

    // Check if the provided patient_name exists in the patient table
    $patient_query = "SELECT patient_id FROM patient WHERE patient_name = '$patient_name'";
    $patient_result = mysqli_query($con, $check_patient_query);

    // Check if the provided doctor_name exists in the doctor table
    $doctor_query = "SELECT doctor_id FROM doctor WHERE doctor_name = '$doctor_name'";
    $doctor_result = mysqli_query($con, $doctor_query);

    if (mysqli_num_rows($patient_result) > 0 && mysqli_num_rows($doctor_result) > 0) {
        $patient_row = mysqli_fetch_assoc($patient_result);
        $doctor_row = mysqli_fetch_assoc($doctor_result);

        $patient_id = $patient_row['patient_id'];
        $doctor_id = $doctor_row['doctor_id'];

        // Proceed with the appointment insertion
        $query = "INSERT INTO appointment (patient_id, doctor_id, appointment_date, appointment_reason) VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$appointment_reason')";

        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['message'] = "Appointment Created Successfully";
            header("Location: appointment_table.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Appointment Not Created";
            header("Location: appointment_form.php");
            exit(0);
        }
    } else {
        // The provided patient_name or doctor_name does not exist in the respective tables
        $_SESSION['message'] = "Invalid Patient or Doctor Name";
        header("Location: appointment_form.php");
        exit(0);
    }
} elseif (isset($_POST['update_appointment'])) {
    // Edit Appointment
    $appointment_id = mysqli_real_escape_string($con, $_POST['appointment_id']);
    $appointment_date = mysqli_real_escape_string($con, $_POST['appointment_date']);
    $appointment_reason = mysqli_real_escape_string($con, $_POST['appointment_reason']);

    $query = "UPDATE appointment SET appointment_date = '$appointment_date', appointment_reason = '$appointment_reason' WHERE appointment_id = '$appointment_id'";
    

    
    $result = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['message'] = "Appointment Updated Successfully,";
        header("Location: appointment_table.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Updated";
        header("Location: appointment_edit.php?appointment_id=$appointment_id");
        exit(0);
    }
} elseif (isset($_POST['delete_appointment'])) {
    // Delete Appointment
    $appointment_id = mysqli_real_escape_string($con, $_POST['delete_appointment']);
    
    
    $delete_query = "DELETE FROM appointment WHERE appointment_id ='$appointment_id'";

    $delete_query_run = mysqli_query($con, $delete_query);
    if ($con->query($delete_query)===true) {

        $_SESSION['message'] = "Appointment Deleted Successfully";
        header("Location: appointment_table.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Deleted";
        header("Location: appointment_table.php");
        exit(0);
    }
}
?>
