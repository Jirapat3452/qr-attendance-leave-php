<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your Title</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7; /* Set a light background color */
  }

  .container {
    width: 80%;
    margin: 20px auto;
    background-color: #fff; /* Set a white background for the container */
    padding: 20px;
    border-radius: 8px; /* Add rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a shadow effect */
  }

  h1 {
    text-align: center;
    margin-bottom: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
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
</style>
</head>
<body>

<div class="container">
  <h1>QR code check-in and sign-out system</h1>
  <table>
    <tr>
      <th>ROUND</th>
      <th>STUDENT ID</th>
      <th>TIMEIN</th>
      <th>TIMEOUT</th>
      <th>DAY</th>
      <th>RECORD</th>
    </tr>
    <?php
       //ข้อมูลที่แสกน
       if ($conn->connect_error) {
         die("Connection failed" . $conn->connect_error);
       }
       $sql = "SELECT*FROM qr_scan WHERE emp_no";
       $query = $conn->query($sql);
       while ($row = $query->fetch_assoc()) {
         ?>
         <tr>
           <td>
             <?php echo $row['qr_id']; ?>
           </td>
           <td>
             <?php echo $row['emp_qrid']; ?>
           </td>
           <td>
             <?php echo $row['in_time']; ?>
           </td>
           <td>
             <?php echo $row['time_out']; ?>
           </td>
           <td>
             <?php echo $row['day_work']; ?>
           </td>
           <td>
             <?php echo $row['record']; ?>
           </td>
       </tr>
         <?php
       }
       ?>
   </table>
</div>

</body>
</html>
