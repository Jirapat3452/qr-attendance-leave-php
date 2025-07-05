<?php include('connect.php');

if (isset($_POST['chk']) == "add") {
    $emp_no = $_POST["emp_no"];
    $emp_name = $_POST["emp_name"];
    $emp_type = $_POST["emp_type"];
    $email_emp = $_POST["email_emp"];
    $posi_id = $_POST["posi_id"];

    $e_password = $_POST["PASSWORD"];
    $hashed_password = password_hash(trim($e_password), PASSWORD_DEFAULT);


    $dept_no = $_POST["dept_no"];


    $card_id = $_POST["card_id"];
    $county = $_POST["county"];
    $province = $_POST["province"];


    
    $name = $_GET["name"];


    $sql = "INSERT INTO employee_tb(emp_no, emp_name, emp_type, email_emp, e_password, dept_no, posi_id)";
    $sql .= "VALUES('$emp_no','$emp_name','$emp_type','$email_emp',' $hashed_password','$dept_no','$posi_id')";
    $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_connect_error());


    $sql3 = "INSERT INTO emp_info(emp_no, card_id, county,province)";
    $sql3 .= "VALUES('$emp_no','$card_id','$county','$province')";
    $result3 = mysqli_query($conn, $sql3) or die("Error in query: $sql3 " . mysqli_connect_error());

    if (mysqli_affected_rows($conn)) {
        echo "<meta http-equiv='refresh' content='0; url=view_dept.php?name='$name'>";


    } else {
        echo "Error Insert : ";
    }
    $conn->close();

} else if ($_POST['chk1'] == "edit") {

    $emp_no = $_POST["emp_no"];
    $emp_name = $_POST["emp_name"];
    $emp_type = $_POST["emp_type"];
    $email_emp = $_POST["email_emp"];


    $e_password = $_POST["PASSWORD"];
    $hashed_password = password_hash(trim($e_password), PASSWORD_DEFAULT);


    $dept_no = $_POST["dept_no"];


    $card_id = $_POST["card_id"];
    $county = $_POST["county"];
    $province = $_POST["province"];


    $posi_id = $_POST["posi_id"];

    $name = $_GET["name"];



    $name = $_GET["name"];

    $sql = "UPDATE employee_tb SET emp_name='$emp_name',emp_type='$emp_type',email_emp='$email_emp',e_password='$hashed_password',dept_no='$dept_no',emp_no='$emp_no' WHERE emp_no='$emp_no'";
    $sql = "UPDATE emp_info SET  card_id='$card_id', county='$county',province='$province' WHERE emp_no='$emp_no'";
    $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_connect_error());

    if (mysqli_affected_rows($conn)) {
        echo "<script>";
        echo "alert(\"SAVE COMPLETE \")";
        echo "</script>";
        echo "<meta http-equiv='refresh' content='0; url=view_dept.php?name='$name'>";

    } else {
        echo "Error updating record: ";
    }
    $conn->close();

} elseif ($_GET['chk'] == "del") {
    $emp_no = $_GET["id"];
    $name = $_GET["name"];
    // $card_id = $_GET["id"];
    // $posi_no = $_GET["id"];


    $sql = "DELETE FROM employee_tb WHERE emp_no='$emp_no'";
    $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_connect_error());
    $sql3 = "DELETE FROM emp_info WHERE emp_no='$emp_no'";
    $result3 = mysqli_query($conn, $sql3) or die("Error in query: $sql3 " . mysqli_connect_error());
    if (mysqli_affected_rows($conn)) {
        echo "<script>";
        echo "alert(\"DELETE COMPLETE \")";
        echo "</script>";
        echo "<meta http-equiv='refresh' content='0; url=view_dept.php?name='$name'>";
    } else {
        echo "Error delete record: ";
    }
    $conn->close();


}


?>