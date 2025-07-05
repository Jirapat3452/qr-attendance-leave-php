<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<?php include('connect.php'); ?>

<head>
  <script type="text/javascript" src="js/adapter.min.js"></script>
  <script type="text/javascript" src="js/vue.min.js"></script>
  <script type="text/javascript" src="js/instascan.min.js"></script>
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

  <style>
    .login-button {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .login-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <a href="login_home.php" class="login-button">Login</a>
  
  <video id="preview"></video>
  <?php
  //โชว์success-error
  if (isset($_SESSION['error'])) {
    echo " 
    <div class='alert alert-danger'> 
    <h4>Error!</h4>" . $_SESSION['error'] . "
    </div>";
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])) {
    echo "
  <div class = 'alert alert-primary'>
  <h4>success!</h4>
  " . $_SESSION['success'] . " 
  </div>";
  unset($_SESSION['success']);
  }
  ?>
  <form action="qrinsert.php" method="post" class="form-horizontal">
    <label> SCAN QR CODE </label>
    <input type="text" name="emp_no" id="emp_no" placeholder="scan qrcode" value='' readonly></input>
    <input type="submit" value="Send" id='send'></input>
  </form>
  <html lang="en">
  <table class="table table-bordered">
    </tr>
    <th>ROUND</th>
    <th>EMPLOYEE ID</th>
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
    $sql = "SELECT*FROM qr_scan ";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
      ?>
      <tr>
        <td>
          <?php echo $row['qr_round']; ?>
        </td>
        <td>
          <?php echo $row['emp_no']; ?>
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
  </html>
  <script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
      console.log(content);
    });
    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
        scanner.stop()
      } else {
        console.error('No cameras found.');
      }
    }).catch(function (e) {
      console.error(e);
    });
    scanner.addListener('scan', function (c) {
      document.getElementById("emp_no").value = c;
      //document.forms[0].submit();
    });
  </script>
</body>

</html>  
