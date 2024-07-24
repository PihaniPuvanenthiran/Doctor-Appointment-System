<?php
session_start();
require 'database_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Create Appointment</title>
</head>
<body>
    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ADD NEW APPOINTMENT
                            <a href="appointment_table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="appointment_data_handling.php" method="POST">
                            <div class="mb-3">
                            <label>Patient Name</label>
                                <select name="patient_name" class="form-control" required>
                                    <?php
                                    // Fetch the list of patients from your database
                                    $query = "SELECT patient_name FROM patient";
                                    $result = mysqli_query($con, $query);

                                    // Loop through the patient names and create options
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['patient_name'] . '">' . $row['patient_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Doctor Name</label>
                                <input type="text" name="doctor_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Appointment Date</label>
                                <input type="date" name="appointment_date" class="form-control" Required>
                            </div>
                            <div class="mb-3">
                                <label>Appointment Reason</label>
                                <input type="text" name="appointment_reason" class="form-control" Required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
