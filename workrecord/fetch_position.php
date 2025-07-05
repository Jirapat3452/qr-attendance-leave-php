<?php
include('connect.php');
if (isset($_POST['selectedOption'])) {
    $selectedOption = $_POST['selectedOption'];
    $query = "SELECT * FROM position_tb WHERE posi_id = '$selectedOption'";
    $posi_data = mysqli_query($conn, $query);
    if ($posi_data) {
        $row = mysqli_fetch_assoc($posi_data);
        $data = array(
            'posi_id' => $row['posi_id'],
            'position_name' => $row['position_name'],
            'position_abb' => $row['position_abb']
        );
        // Encode data as JSON and return it

        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'No data found'));
    }
} else  {
    echo json_encode(array('error' => 'Invalid request'));
}
 
?>