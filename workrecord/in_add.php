<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มพนักงาน</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            margin: 20px auto;
            width: 80%;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input[type="text"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #000000;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: calc(100% - 20px);
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#dropdown1').change(function () {
                var selectedOption = $(this).val();
                $.ajax({
                    url: 'fetch_position.php',
                    type: 'POST',
                    data: { selectedOption: selectedOption },
                    success: function (response) {
                        var data = (typeof response === 'object') ? response : JSON.parse(response);
                        $('#posi_id').val(data.posi_id);
                        $('#position_name').val(data.position_name);
                        $('#position_abb').val(data.position_abb);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#dropdown2').change(function () {
                var isSelected = $(this).val();
                $.ajax({
                    url: 'fetch_dept.php',
                    type: 'POST',
                    data: { selectedOption: isSelected },
                    success: function (response) {
                        var data = (typeof response === 'object') ? response : JSON.parse(response);
                        $('#dept_no').val(data.dept_no);
                        $('#dept_name').val(data.dept_name);
                        $('#emp_depm').val(data.emp_depm);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</head>

<body>
    
<form id="register" method="post" action="process.php">
    <div class="container">
        <div class="form-container">
            <h2>เพิ่มพนักงาน</h2>
            <div class="form-group">
                <label for="dropdown2">เลือกแผนกงาน</label>
                <select name="dropdown2" id="dropdown2">
                    <option value="none" selected disabled hidden>เลือกแผนกงาน</option>
                    <?php
                    include('connect.php');
                    $query = "SELECT * FROM dept_tb";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['dept_no']}'>{$row['dept_name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dept_no">รหัสแผนก</label>
                <input type="text" id="dept_no" name="dept_no" readonly>
            </div>
            <div class="form-group">
                <label for="dept_name">ชื่อแผนก</label>
                <input type="text" id="dept_name" name="dept_name" readonly>
            </div>
            <div class="form-group">
                <label for="emp_depm">ชื่อย่อแผนก</label>
                <input type="text" id="emp_depm" name="emp_depm" readonly>
            </div>
            <div class="form-group">
                <label for="dropdown1">เลือกตำแหน่งงาน</label>
                <select name="dropdown1" id="dropdown1">
                    <option value="none" selected disabled hidden>เลือกตำแหน่งงาน</option>
                    <?php
                    include('connect.php');
                    $query = "SELECT * FROM position_tb";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['posi_id']}'>{$row['position_name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="posi_id">รหัสตำแหน่ง</label>
                <input type="text" id="posi_id" name="posi_id">
            </div>
            <div class="form-group">
                <label for="position_name">ชื่อตำแหน่ง</label>
                <input type="text" id="position_name" name="position_name" readonly>
            </div>
            <div class="form-group">
                <label for="position_abb">ชื่อย่อตำแหน่ง</label>
                <input type="text" id="position_abb" name="position_abb" readonly>
            </div>
            <div class="form-group">
                <label for="emp_no">รหัสพนักงาน</label>
                <input type="text" id="emp_no" name="emp_no" value=''>
            </div>
            <div class="form-group">
                <label for="emp_name">ชื่อพนักงาน</label>
                <input type="text" id="emp_name" name="emp_name" value=''>
            </div>
            <div class="form-group">
                <label for="emp_type">ประเภทพนักงาน</label>
                <select name="emp_type" id="emp_type">
                    <option value="none" selected disabled hidden>เลือกประเภทพนักงาน</option>
                    <option value="A">Admin</option>
                    <option value="U">User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="card_id">เลขบัตรประชาชน</label>
                <input type="text" id="card_id" name="card_id" value=''>
            </div>
            <div class="form-group">
                <label for="province">จังหวัด</label>
                <input type="text" id="province" name="province" value=''>
            </div>
            <div class="form-group">
                <label for="county">ที่อยู่</label>
                <input type="text" id="county" name="county" value=''>
            </div>
            <div class="form-group">
                <label for="email_emp">อีเมล</label>
                <input type="text" id="email_emp" name="email_emp">
            </div>
            <div class="form-group">
                <label for="PASSWORD">รหัสผ่าน</label>
                <input type="text" id="PASSWORD" name="PASSWORD">
            </div>
            <div class="form-group">
                <input type="hidden" name="chk" id="chk" value="add">
                <input type="submit" value="ลงทะเบียน" />
            </div>
        </div>
    </div>
                </form>
</body>

</html>
