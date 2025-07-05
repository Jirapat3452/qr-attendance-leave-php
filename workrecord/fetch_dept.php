<?php
include('connect.php');
if (isset($_POST['selectedOption'])) {
    $selectedOption = $_POST['selectedOption'];
    $query = "SELECT * FROM dept_tb WHERE dept_no = '$selectedOption'";
    $dept_data = mysqli_query($conn, $query);
    if ($dept_data) {
        $row = mysqli_fetch_assoc($dept_data);
        $data = array(
            'dept_no' => $row['dept_no'],
            'dept_name' => $row['dept_name'],
            'emp_depm' => $row['emp_depm']
        );
        // Encode data as JSON and return it

        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'No data found'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
}
?>