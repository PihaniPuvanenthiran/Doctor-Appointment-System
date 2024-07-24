<?php
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

    <title>Appointment View</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Appointment View Details
                        <a href="appointment_table.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['appointment_id'])) {
                        $appointment_id = mysqli_real_escape_string($con, $_GET['appointment_id']);
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

                        // $query = "SELECT * FROM appointment WHERE appointment_id='$appointment_id' ";
                        //$query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $appointment = mysqli_fetch_array($query_run);
                            ?>
                            <div class="mb-3">
                                <label>Patient Name</label>
                                <p class="form-control">
                                    <?= $appointment['patient_name']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Doctor Name</label>
                                <p class="form-control">
                                    <?= $appointment['doctor_name']; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Appointment Date</label>
                                <p class="form-control">
                                    <?= $appointment['appointment_date']; ?>
                                </p>
                            </div>
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
