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

    <title>doctor Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Doctor Edit 
                            <a href="doctor_table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['doctor_id']))
                        {
                            $doctor_id = mysqli_real_escape_string($con, $_GET['doctor_id']);
                            $query = "SELECT * FROM doctor WHERE doctor_id='$doctor_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $doctor = mysqli_fetch_array($query_run);
                                ?>
                                <form action="doctor_data_handling.php" method="POST">
                                    <input type="hidden" name="doctor_id" value="<?= $doctor['doctor_id']; ?>">

                                    <div class="mb-3">
                                        <label>Doctor Name</label>
                                        <input type="text" name="doctor_name" value="<?=$doctor['doctor_name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Specialization</label>
                                        <input type="text" name="specialization" value="<?=$doctor['specialization'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button type="submit" name="update_doctor" class="btn btn-primary">
                                            Update Doctor
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
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
