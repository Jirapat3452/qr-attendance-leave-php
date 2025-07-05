<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Leave Information</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
  }

  .container {
    width: 80%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    margin-bottom: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .btn {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
  }

  .btn:hover {
    background-color: #0056b3;
  }

  .btn-danger {
    background-color: #dc3545;
  }

  .btn-danger:hover {
    background-color: #c82333;
  }
</style>
</head>
<body>

<div class="container">
  <h1>Leave Information</h1>
  <table>
    <thead>
      <tr>
        <th>วันที่เขียน</th>
        <th>ประเภทที่ลา</th>
        <th>สาเหตุที่ลา</th>
        <th>เริ่มวันที่</th>
        <th>ถึงวันที่</th>
        <th>รวม</th>
        <th>หลักฐานการลา</th>
        <th>ผู้แทนงาน</th>
        <th>สถานะการทำรายการ</th>
      </tr>
    </thead>
    <tbody>
      <?php include('connect.php');
       $sql = "SELECT * FROM  registration_tb WHERE emp_no";//show all
       $result = $conn->query($sql);while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['leave_day']; ?></td>
        <td><?php echo $row['leave_type']; ?></td>
        <td><?php echo $row['cause']; ?></td>
        <td><?php echo $row['first_leave']; ?></td>
        <td><?php echo $row['end_leave']; ?></td>
        <td><?php echo $row['sumymd']; ?> วัน <?php echo $row['sum_h']; ?> ชั่วโมง</td>
        <td class='fileup'><a href="fileupload/<?php echo $row['file_up']; ?>"><?php echo $row['file_up']; ?></a></td>
        <td><?php echo $row['replacement_s']; ?></td>
        <td class='status_ss'><?php echo $row['status_ss']; ?></td>
      </tr>
      <?php endwhile ?>
    </tbody>
  </table>
  <div>
    <a href="leave_work.php" class="btn btn-primary">Increase Leave</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
</div>

</body>
</html>
