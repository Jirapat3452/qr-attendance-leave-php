<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Custom CSS styles */
        .container {
            margin-top: 50px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-back {
            margin-right: 10px;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="form-container">
            <form id="update" method="post" action="process.php">
                <?php
                
                $empno_update = $_GET['id'];
                $sql = "SELECT DISTINCT emp_info.emp_no, position_tb.position_name, position_tb.posi_id, employee_tb.emp_name, dept_tb.dept_name, dept_tb.dept_no, employee_tb.emp_type, emp_info.county, emp_info.card_id, emp_info.province, employee_tb.email_emp, position_tb.position_abb, employee_tb.e_password, dept_tb.emp_depm
                            FROM employee_tb
                            JOIN emp_info using (emp_no)
                            JOIN position_tb using (posi_id)
                            JOIN dept_tb using (dept_no) WHERE emp_no = '$empno_update'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="form-group">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="emp_no" class="form-label">Employee Number:</label>
                                <input id="emp_no" type="text" name="emp_no" class="form-control"
                                    value="<?php echo $row['emp_no']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="position_name" class="form-label">Position Name:</label>
                                <input id="position_name" type="text" name="position_name" class="form-control"
                                    value="<?php echo $row['position_name']; ?>">
                            </div>
                            <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="emp_depm" class="form-label">ตัวย่อแผนก:</label>
                                <input id="emp_depm" type="text" name="emp_depm" class="form-control"
                                    value="<?php echo $row['emp_depm']; ?>">
                                    </div>
                            <div class="col-md-6">
                                <label for="posi_id" class="form-label">Position Id:</label>
                                <input id="posi_id" type="text" name="posi_id" class="form-control"
                                    value="<?php echo $row['posi_id']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="position_abb" class="form-label">Position Abbreviation:</label>
                                <input id="position_abb" type="text" name="position_abb" class="form-control"
                                    value="<?php echo $row['position_abb']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="emp_name" class="form-label">Employee Name:</label>
                                <input id="emp_name" type="text" name="emp_name" class="form-control"
                                    value="<?php echo $row['emp_name']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="dept_name" class="form-label">Department Name:</label>
                                <input id="dept_name" type="text" name="dept_name" class="form-control"
                                    value="<?php echo $row['dept_name']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="dept_no" class="form-label">Department Number:</label>
                                <input id="dept_no" type="text" name="dept_no" class="form-control"
                                    value="<?php echo $row['dept_no']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="emp_type" class="form-label">Employee Type:</label>
                                <input id="emp_type" type="text" name="emp_type" class="form-control"
                                    value="<?php echo $row['emp_type']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="county" class="form-label">County:</label>
                                <input id="county" type="text" name="county" class="form-control"
                                    value="<?php echo $row['county']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="card_id" class="form-label">Card ID:</label>
                                <input id="card_id" type="text" name="card_id" class="form-control"
                                    value="<?php echo $row['card_id']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="province" class="form-label">Province:</label>
                                <input id="province" type="text" name="province" class="form-control"
                                    value="<?php echo $row['province']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email_emp" class="form-label">Email:</label>
                                <input id="email_emp" type="text" name="email_emp" class="form-control"
                                    value="<?php echo $row['email_emp']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="PASSWORD" class="form-label">password:</label>
                                <input id="PASSWORD" type="text" name="PASSWORD" class="form-control"
                                    value="<?php echo $row['e_password']; ?>">
                        </div>
                        </div>
                    <?php } ?>
                    
                    <input type="hidden" name="chk1" id="chk1" value="edit">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-secondary btn-back" href="view_emp.php">Back</a>
            </form>
        </div>
    </div>
</body>

</html>