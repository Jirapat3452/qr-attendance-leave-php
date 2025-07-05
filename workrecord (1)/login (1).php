<?php
include("connect.php");
session_start();

// if (isset($_POST['emp_no'])) {

//     // Sanitize input to prevent SQL injection
//     $emp_no = mysqli_real_escape_string($conn, $_POST['emp_no']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);

//     // Use prepared statements to prevent SQL injection
//     $sql = "SELECT * FROM employee_tb WHERE emp_no=? AND e_password=?";
//     $stmt = mysqli_prepare($conn, $sql);
//     mysqli_stmt_bind_param($stmt, "ss", $emp_no, $password);
//     mysqli_stmt_execute($stmt);
//     $result = mysqli_stmt_get_result($stmt);

//     if (mysqli_num_rows($result) == 1) {
//         $row = mysqli_fetch_array($result);

//         $_SESSION["emp_no"] = $row["emp_no"];
//         $_SESSION["emp_name"] = $row["emp_name"];
//         $_SESSION["emp_type"] = $row["emp_type"];
//         $_SESSION["email_emp"] = $row["email_emp"];

//         // Redirect based on user type
//         if ($_SESSION["emp_type"] == "A") {
//             header("Location: addmin_home.php");
//             exit();
//         } else if ($_SESSION["emp_type"] == "U") {
//             header("Location: user_home.php");
//             exit();
//         } else {
//             echo "<script>alert('Invalid user type');</script>";
//         }
//     } else {
//         echo "<script>alert('Username or Password is incorrect');</script>";
//     }

//     // Close prepared statement
//     mysqli_stmt_close($stmt);
// } else {
// 	echo "<script>alert('Username or Password is incorrect');</script>";
//     header("Location: login_home.php");
//     exit();
// }


$username = $_POST['username'];
$password = $_POST['password'];

// Fetch user from database
$sql = "SELECT * FROM employee_tb WHERE emp_no='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashed_password = password_hash(trim($row['e_password']), PASSWORD_DEFAULT);
    if (password_verify(trim($password), $hashed_password)) {
    // if ($password == $row['e_password']) {
        // Password is correct, set session variables
        $_SESSION['username'] = $username;
        $_SESSION['emp_type'] = $row['emp_type'];
        // Redirect based on user type
        if ($row['emp_type'] == 'A') {
            header("Location: addmin_home.php");
        } else {
            header("Location: user_home.php");
        }
    } else {
        // Invalid password
        echo "<script>alert('Username or Password is incorrect');</script>";
        // header("Location: login_home.php");
    }
} else {
    // User not found
    echo "<script>alert('User not found');</script>";
    header("Location: login_home.php");
}
$conn->close();

?>