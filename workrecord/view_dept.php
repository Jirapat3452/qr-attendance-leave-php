<?php include('connect.php'); ?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        /* Add your CSS styles here */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<?php include('connect.php'); ?>
<div style="text-align:center;width:100%">
    <html lang="en">
    <div style="text-align:center;width:100%">
        <table align="center" border='1' width='100%'>

            <thead>
                <tr>
                    <th>Employee NO.</th>
                    <th>Job Title</th>
                    <th>Abbreviation Job Title</th>
                    <th>Name Employee</th>
                    <th>ชื่อแผนก</th>
                    <th>รหัสแผนก</th>
                    <th>ประเภทพนักงาน</th>
                    <th>County</th>
                    <th>Id Card</th>
                    <th>Province</th>
                    <th>E-Mail</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $name = $_GET['name'];
            $sql = "SELECT DISTINCT emp_info.emp_no,position_tb.position_name,position_tb.posi_id,employee_tb.emp_name,dept_tb.dept_name,dept_tb.dept_no,employee_tb.emp_type,emp_info.county,emp_info.card_id,emp_info.province,employee_tb.email_emp
            FROM employee_tb
            JOIN emp_info using (emp_no)
            JOIN position_tb using (posi_id)
            JOIN dept_tb using (dept_no) WHERE emp_depm='$name'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['emp_no']; ?></td>
                    <td><?php echo $row['position_name']; ?></td>
                    <td><?php echo $row['posi_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['dept_name']; ?></td>
                    <td><?php echo $row['dept_no']; ?></td>
                    <td><?php echo $row['emp_type']; ?></td>
                    <td><?php echo $row['county']; ?></td>
                    <td><?php echo $row['card_id']; ?></td>
                    <td><?php echo $row['province']; ?></td>
                    <td><?php echo $row['email_emp']; ?></td>
                    <td>
                        <a href="emp_update.php?id=<?php echo $row["emp_no"]; ?>&chk=edit&name=<?php echo $name; ?>"><button>Edit</button></a>
                        <a id='chk' value='del' href="process.php?id=<?php echo $row["emp_no"]; ?>&chk=del&name=<?php echo $name; ?>"><button>Delete</button></a>
                    </td>
                </tr>
            <?php endwhile ?>
            </tbody>
        </table>
    </div>
    </html>
    <br> Increase Employee <br><br>
    <a href="in_add.php?name=<?php echo $name; ?>"><button type="button">Add</button></a>
    <br>
    <br>
    <p><strong><a href="logout.php">Log out</a></strong></p>
</div>
