<?php
session_start();
require 'database_connection.php';

if(isset($_POST['delete_patient']))
{
    $patient_id = mysqli_real_escape_string($con, $_POST['delete_patient']);

    $query = "DELETE FROM patient WHERE patient_id='$patient_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Patient Deleted Successfully";
        header("Location: patient_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Deleted";
        header("Location: patient_table.php");
        exit(0);
    }
}



if(isset($_POST['update_patient']))
{
    $patient_id = mysqli_real_escape_string($con, $_POST['patient_id']);

    $patient_name = mysqli_real_escape_string($con, $_POST['patient_name']);
    $mobile_number = mysqli_real_escape_string($con, $_POST['mobile_number']);
    $nic = mysqli_real_escape_string($con, $_POST['nic']);
    
    $query = "UPDATE patient SET patient_name='$patient_name', mobile_number='$mobile_number', nic='$nic' WHERE  patient_id='$patient_id' ";
    $query_run = mysqli_query($con, $query);


    if($query_run)
    {
        $_SESSION['message'] = "Patient Updated Successfully";
        header("Location: patient_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Patient Not Updated";
        header("Location: patient_table.php");
        exit(0);
    }

}


if(isset($_POST['save_patient']))
{
    $patient_name = mysqli_real_escape_string($con, $_POST['patient_name']);
    $mobile_number = mysqli_real_escape_string($con, $_POST['mobile_number']);
    $nic = mysqli_real_escape_string($con, $_POST['nic']);
    
    $query = "INSERT INTO patient(patient_name,mobile_number,nic) VALUES ('$patient_name','$mobile_number','$nic')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Patient Created Successfully";
        header("Location: patient_form.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Created";
        header("Location: patient_form.php");
        exit(0);
    }
}






?>