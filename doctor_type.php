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
                        <h4>ADD NEW DOCTOR TYPE</h4>
                    </div>
                    <div class="card-body">
                        <form action="add_type.php" method="POST">
                            <div class="mb-3">
                                <label>Type Name</label>
                                <input type="text" name="type_name" class="form-control" required>
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


                            
