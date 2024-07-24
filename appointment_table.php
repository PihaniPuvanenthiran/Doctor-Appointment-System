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

    <title>Appointment Details</title>
</head>
<body>
    <div class="container mt-4">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Appointment Details
                            <a href="appointment_form.php" class="btn btn-primary float-end">Add Appointment</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Reason</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT appointment.appointment_id, 
                                                 patient.patient_name, 
                                                 doctor.doctor_name, 
                                                 appointment.appointment_date,
                                                 appointment.appointment_reason
                                          FROM appointment
                                          JOIN patient ON appointment.patient_id = patient.patient_id
                                          JOIN doctor ON appointment.doctor_id = doctor.doctor_id";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $appointment) {
                                        ?>
                                        <tr>
                                            <td><?= $appointment['appointment_id']; ?></td>
                                            <td><?= $appointment['patient_name']; ?></td>
                                            <td><?= $appointment['doctor_name']; ?></td>
                                            <td><?= $appointment['appointment_date']; ?></td>
                                            <td><?= $appointment['appointment_reason']; ?></td>
                                            <td>
                                                <a href="appointment_view.php?appointment_id=<?= $appointment['appointment_id']; ?>"
                                                   class="btn btn-info btn-sm">View</a>
                                                <a href="appointment_edit.php?appointment_id=<?= $appointment['appointment_id']; ?>"
                                                   class="btn btn-success btn-sm">Edit</a>
                                                <form action="appointment_data_handling.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_appointment"
                                                            value="<?=$appointment['appointment_id'];?>"
                                                            class="btn btn-danger btn-sm">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
