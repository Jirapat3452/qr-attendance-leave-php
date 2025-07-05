<?php session_start(); ?>
<?php include('connect.php');

if($conn->connect_error){
	die("Connection failed" .$conn->connect_error);
}

if(isset($_POST['emp_no'])){
	date_default_timezone_set('asia/bangkok');
	$emp_no =$_POST['emp_no'];
	$date = date('Y-m-d');
	$time = date('H:i:s');

	$sql = "SELECT * FROM employee_tb WHERE emp_no = '$emp_no'";
	$query = $conn->query($sql);

	if($query->num_rows < 1){
		$_SESSION['error'] = 'Cannot find QRCode number '.$emp_no;
	}else{
			$row = $query->fetch_assoc();
			$emp_no = $row['emp_no'];
			$sql ="SELECT * FROM qr_scan WHERE emp_no='$emp_no' AND day_work='$date' AND record='0'";
			$query=$conn->query($sql);
			if($query->num_rows>0){
			$sql = "UPDATE qr_scan SET time_out='$time', record='1' WHERE emp_no='$emp_no' AND day_work='$date'";
			$query=$conn->query($sql);
			$_SESSION['success'] = 'Successfuly Time Out';
		}else{
				$sql = "INSERT INTO qr_scan(emp_no,in_time,day_work,record) VALUES('$emp_no','$time','$date','0')";
				if($conn->query($sql) ===TRUE){
				 $_SESSION['success'] = 'Successfuly Time In';
		 }else{
		  $_SESSION['error'] = $conn->error;
	   }	
	}
}

}else{
	$_SESSION['error'] = 'Please scan your QR Code number';
}
header("location: qr_work.php");
   
$conn->close();
 ?>

