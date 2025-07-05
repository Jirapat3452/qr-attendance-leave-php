<?php include('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Custom CSS styles */
        .department-container {
            text-align: center;
            margin-top: 20px;
        }
        .department-container h1 {
            font-size: 36px;
            color: #000000; /* Bootstrap primary color */
            margin-bottom: 30px;
        }
        .department-item {
            margin-bottom: 30px;
        }
        .department-item img {
            width: 200px;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .department-item button {
            background-color: #000000; /* Bootstrap primary color */
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .department-item button:hover {
            background-color: #0056b3; /* Darker shade of primary color */
        }
    </style>
</head>
<body>
    <div class="department-container">
        <h1>DEPARTMENT</h1>
        <div class="department-item">
            <img src="imageall/Automation.jpg" alt="Automation">
            <br>
            <a href="view_dept.php?name=MT">
            <button name="mation">Automation</button></a>
        </div>
        <div class="department-item">
            <img src="imageall/Machine.jpg" alt="Machine">
            <br>
            <a href="view_dept.php?name=MC">
            <button name="Machine">Machine</button></a>
        </div>
        <div class="department-item">
            <img src="imageall/software.png" alt="Software">
            <br>
            <a href="view_dept.php?name=SW">
            <button name="software">Software</button></a>
        </div>
        <div class="department-item">
            <img src="imageall/operator.png" alt="Operator">
            <br>
            <a href="view_dept.php?name=OP">
            <button name="operator">Operator</button></a>
        </div>
    </div>
</body>
</html>
