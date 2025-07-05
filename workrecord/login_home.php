<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* ตั้งพื้นหลังสีขาว */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .Regislogin {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .Regislogin h8 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #000000; /* ตั้งสีข้อความเป็นสีดำ */
        }
        .Regislogin input[type="text"],
        .Regislogin input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #000000; /* ตั้งเส้นขอบเป็นสีดำ */
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .Regislogin input[type="submit"] {
            width: 100%;
            background-color: #000000; /* ตั้งสีพื้นหลังของปุ่มเป็นสีดำ */
            color: #ffffff; /* ตั้งสีข้อความเป็นสีขาว */
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .Regislogin input[type="submit"]:hover {
            background-color: #333333; /* เปลี่ยนสีพื้นหลังของปุ่มเมื่อชี้ */
        }
    </style>
</head>
<body>
    <div class="Regislogin">
        <?php include('connect.php');?>
        <form name="Regislogin" method="post" action="login.php">
            <h8>EMPLOYEE NO.</h8>
            <input type="text" required name="username" placeholder="Username" >
            <input type="password" required name="password" placeholder="Password" >
            <input type="submit" value="LOGIN" class='submit'>
        </form>
    </div>
</body>
</html>
