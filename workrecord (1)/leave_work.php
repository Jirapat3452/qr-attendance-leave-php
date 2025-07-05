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
            text-align: center; /* กำหนดให้เนื้อหาตรงกลาง */
        }
        #infoemp {
            width: 100%;
        }
        #fromsm {
            width: 50%;
            margin: auto; /* กำหนดให้ฟอร์มอยู่กึ่งกลาง */
        }
        input[type="date"],
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px; /* กำหนดขนาดและการเรียงวางของอิลิเมนต์ในฟอร์ม */
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px; /* กำหนดขนาดและการเรียงวางของปุ่มส่ง */
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse; /* กำหนดให้เส้นขอบของตารางสวยงาม */
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div id='infoemp'>
        <?php
        echo $_SESSION['Userid'];
        ?>
        <br>
        <?php
        echo $_SESSION['emp_name'];
        ?>
        <br>
        <?php 
        echo $_SESSION['email1']; 
        ?>
    </div>

    <h2 class="a">Registration of leave</h2>

    <script>
        $(document).ready(function () {
            $("#leave_type").keyup(function () {
                var length = $(this).val().length;
                if (length >= 3) {
                    $("#fileup").show().prop('disabled', false);;
                }
                else if (length <= 2) {
                    $("#fileup").hide().prop('disabled', true);
                }
            });
        });
    </script>

    <h2 class="a"><a href="user_data.php"><input type="submit" value="View Laeve"></a></h2>

    <div>
        <table border='1'>
            <tr>
                <th>EMPLOYEE OF LEAVE</th>
            </tr>
        </table>
        <form id='fromsm' name="addleave" method='POST' action="insert_leave.php" enctype="multipart/form-data" target="iframe_target">
            <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            <br>
            วันที่เขียน
            <br>
            <input type="date" name="leave_day" value=''>
            <br>
            ประเภทที่ลา
            <br>
            <input type="text" name="leave_type" id='leave_type' autocomplete=off maxlength="45">
            <br>
            <input type="file" name="file_up" require accept="fileupload/" autocomplete=off id="fileup" style='display:none'>
            <br>
            สาเหตุ
            <br>
            <textarea name="cause" maxlength="100"></textarea>
            <br>
            เริ่มวันที่
            <br>
            <input type="date" name="first_leave" value=''>
            <br>
            ถึงวันที่
            <br>
            <input type="date" name="end_leave" value=''>
            <br>
            ชั่วโมง
            <br>
            <select name="sum_h">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
            <br>
            ผู้แทนงาน
            <br>
            <input type="text" name="replacement_s" maxlength="7">
            <br>
            อีเมลผู้แทนงาน
            <br>
            <input type="text" name="replacement_email" id="replacement_email" maxlength="7">
            <input id="employee_id" type="hidden" name="employee_id" value="<?php echo $_SESSION['Userid']; ?>">
            <input id="email_emp" type="hidden" name="email_emp" value="<?php echo $_SESSION['email1']; ?>">
            <input type="hidden" name="status_ss" value='กำลังดำเนินการ' id='status_ss'>
            <br>
            <input type="submit" value="Send" id='send'>
        </form>
    </div>

    <p><a href="logout.php"><input type="submit" value="Logout"></a></p>
</body>
</html>
