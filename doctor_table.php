
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

    <title>Doctor Details</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Doctor Details
                            <a href="doctor_form.php" class="btn btn-primary float-end">Add Doctor</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Doctor ID</th>
                                    <th>Doctor Name</th>
                                    <th>Specialization</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM doctor";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $doctor)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $doctor['doctor_id']; ?></td>
                                                <td><?= $doctor['doctor_name']; ?></td>
                                                <td><?= $doctor['specialization']; ?></td>
                                                <td>
                                                    <a href="doctor_edit.php?doctor_id=<?= $doctor['doctor_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="doctor_data_handling.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_doctor" value="<?=$doctor['doctor_id'];?>" class="btn btn-danger btn-sm">Delete</button>
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