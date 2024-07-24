<?php
session_start();
require 'database_connection.php';

if(isset($_POST['delete_doctor']))
{
    $doctor_id = mysqli_real_escape_string($con, $_POST['delete_doctor']);

    $query = "DELETE FROM doctor WHERE doctor_id='$doctor_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Doctor Deleted Successfully";
        header("Location: doctor_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Doctor Not Deleted";
        header("Location: doctor_table.php");
        exit(0);
    }
}



if(isset($_POST['update_doctor']))
{
    $doctor_id = mysqli_real_escape_string($con, $_POST['doctor_id']);

    $doctor_name = mysqli_real_escape_string($con, $_POST['doctor_name']);
    $specialization = mysqli_real_escape_string($con, $_POST['specialization']);
    
    $query = "UPDATE doctor SET doctor_name='$doctor_name', specialization='$specialization' WHERE  doctor_id='$doctor_id' ";
    $query_run = mysqli_query($con, $query);


    if($query_run)
    {
        $_SESSION['message'] = "Doctor Updated Successfully";
        header("Location: doctor_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Doctor Not Updated";
        header("Location: doctor_table.php");
        exit(0);
    }

}



if(isset($_POST['save_doctor']))
{
    $doctor_name = mysqli_real_escape_string($con, $_POST['doctor_name']);
    $specialization = mysqli_real_escape_string($con, $_POST['specialization']);
    
    $query = "INSERT INTO doctor (doctor_name,specialization) VALUES ('$doctor_name','$specialization')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Doctor Created Successfully";
        header("Location: doctor_form.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Created";
        header("Location: doctor_form.php");
        exit(0);
    }
}





?>