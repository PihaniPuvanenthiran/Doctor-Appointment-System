<?php
session_start();
require 'database_connection.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Appointment Edit</title>
</head>
<body>

<div class="container mt-5">
    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Appointment Edit
                        <a href="appointment_table.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['appointment_id'])) {
                        $appointment_id = mysqli_real_escape_string($con, $_GET['appointment_id']);
                        //$query = "SELECT * FROM appointment WHERE  appointment_id='$appointment_id' ";
                        
                        $query = "SELECT appointment.appointment_id, 
                                                 patient.patient_name, 
                                                 doctor.doctor_name, 
                                                 appointment.appointment_date,
                                                 appointment.appointment_reason
                                                 FROM appointment
                                                 JOIN patient ON appointment.patient_id = patient.patient_id
                                                 JOIN doctor ON appointment.doctor_id = doctor.doctor_id
                                                 WHERE appointment_id='$appointment_id'";
                        $query_run = mysqli_query($con, $query);


                        if (mysqli_num_rows($query_run) > 0) {
                            $appointment = mysqli_fetch_array($query_run);
                            ?>
                            <form action="appointment_data_handling.php" method="POST">
                                <input type="hidden" name="appointment_id"
                                       value="<?= $appointment['appointment_id']; ?>">

                                <div class="mb-3">
                                    <label>Patient Name</label>
                                    <input type="text" name="patient_name" value="<?= $appointment['patient_name']; ?>"
                                           class="form-control" disabled>
                                </div>

                                <div class="mb-3">
                                    <label>Doctor Name</label>
                                    <input type="text" name="doctor_name"
                                           value="<?= $appointment['doctor_name']; ?>"
                                           class="form-control" disabled>
                                </div>
                                <div class="mb-3">
                                    <label>Appointment Date</label>
                                    <input type="date" name="appointment_date"
                                           value="<?= $appointment['appointment_date']; ?>"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Appointment Reason</label>
                                    <input type="text" name="appointment_reason"
                                           value="<?= $appointment['appointment_reason']; ?>"
                                           class="form-control">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" name="update_appointment" class="btn btn-primary">
                                        Update Appointment
                                    </button>
                                </div>
                            </form>
                            <?php
                        } else {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
