<?php include('connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเว็บของคุณ</title>
    <style>
        /* CSS สำหรับปรับแต่งหน้าเว็บ */
        body {
            font-family: Arial, sans-serif;
            display: flex;
        }
        #sidebar {
            width: 250px;
            background-color: #f0f0f0;
            padding: 20px;
        }
        #content {
            flex: 1;
            padding: 20px;
        }
        img {
            max-width: 50%;
            height: auto;
        }
        /* เพิ่ม CSS เพื่อปรับขนาดของรูปให้เหมาะสม */
        img.feature-image {
            width: 100%;
            height: auto;
            display: block;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- ส่วนของไซด์บาร์ -->
    <div id="sidebar">
        <h2>ชื่อพนักงาน</h2>
        <p>ตำแหน่งงาน</p>
        <p>ที่อยู่</p>
        <p>อีเมล</p>
        <p>โทรศัพท์</p>
    </div>

    <!-- เนื้อหาหลักของเว็บไซต์ -->
    <div id="content">
        <a href="view_leave.php">
            <img src="image/leave.jpg" class="feature-image" alt="Leave Information">
        </a>
        <a href="empscan.php">
            <img src="image/inout.png" class="feature-image" alt="QR code check-in and sign-out system">
        </a>
    </div>
</body>
</html>
