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

    <title>Patient Details</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Details
                            <a href="patient_form.php" class="btn btn-primary float-end">Add Patients</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Patient Name</th>
                                    <th>Mobile Number</th>
                                    <th>NIC</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM patient";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $patient)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $patient['patient_id']; ?></td>
                                                <td><?= $patient['patient_name']; ?></td>
                                                <td><?= $patient['mobile_number']; ?></td>
                                                <td><?= $patient['nic']; ?></td>
                                                <td>
                                                    <a href="patient_edit.php?patient_id=<?= $patient['patient_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="patient_data_handling.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_patient" value="<?=$patient['patient_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
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