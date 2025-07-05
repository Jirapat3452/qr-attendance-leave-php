<?php include('connect.php'); ?>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<?php
// session_start();
// if (!$_SESSION['Userid']) {
// 	Header("Location: RegistrationOfLeave.php");
// }

// $sql = "SELECT * FROM employee_dt WHERE emp_no = '" . $_SESSION['Userid'] . "' ";
// $result = $conn->query($sql); ?>

<?php include('connect.php');
$employee_id = $_POST["employee_id"];
$leave_day = $_POST["leave_day"];
$leave_type = $_POST["leave_type"];
$cause = $_POST["cause"];
$first_leave = $_POST["first_leave"];
$end_leave = $_POST["end_leave"];
$sumymd = $_POST["sumymd"];
$replacement_s = $_POST["replacement_s"];
$section_s = $_POST["section_s"];
$manager_s = $_POST["manager_s"];
$file_up = $_POST['file_up'];
$sum_h = $_POST['sum_h'];
$status_ss = $_POST['status_ss'];

$calculate = strtotime($_POST['end_leave']) - strtotime($_POST['first_leave']);
$sumymd = floor($calculate / 86400); //รวมเวลา

$file_up = $_REQUEST['file_up'];
$date = date("Ymd");
$numrand = (mt_rand());
$file_up = (isset($_POST['file_up']) ? $_FILES['file_up'] : '');
$upload = $_FILES['file_up'];
if ($upload != "") {
	//โฟลเดอร์ที่เก็บไฟล์
	$path = "fileupload/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['file_up']['name'], ".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname = $numrand . $date . $type;
	$path_copy = $path . $newname;
	$path_link = "fileupload/" . $newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['file_up']['tmp_name'], $path_copy);
}


$sql = "INSERT INTO registration_tb(employee_id, leave_day, leave_type, cause, first_leave, end_leave, sumymd, replacement_s, section_s, manager_s, file_up, sum_h, status_ss)";
$sql .= "VALUES('$employee_id','$leave_day','$leave_type','$cause','$first_leave','$end_leave','$sumymd','$replacement_s','$section_s','$manager_s','$newname','$sum_h','$status_ss')";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_connect_error());

if (mysqli_affected_rows($conn)) {
	echo "<script>";
	echo "alert(\"SAVE COMPLETE \")";
	echo "</script>";
	echo "<meta http-equiv='refresh' content='1;>";

} else {
	echo "<script type='text'>";
	echo "alert('Error!!')";
	echo "</script>";
}


// $sql2 = "SELECT * FROM employee_dt WHERE replacement_s ";
// $result2 = mysqli_query($conn, $sql2);
// while ($row2 = mysqli_fetch_assoc($result2)) {
//     $mailsend = $row2['email_emp'];
// }

?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);
//Server settings
try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
	$mail->isSMTP(); //Send using SMTP
	$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
	$mail->SMTPAuth = true; //Enable SMTP authentication
	$mail->Username = 'youemail@gmail.com'; //SMTP username
	$mail->Password = 'twkummtrmdstelap'; //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
	$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	$mail->SMTPOptions = array(
		'tls' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);

	$mail->CharSet = 'UTF-8';
	$mail->setFrom($_SESSION['email1'], $_SESSION['Userid']); // ส่งโดย
	$mail->addAddress('youemail@gmail.com', $_POST['replacement_s']); // ผู้รับ

	//Content
	$mail->isHTML(true);
	$mail->Subject = 'หัวข้อ';
	$mail->Body = 'EMPLOYEE NO :'.$_SESSION['Userid'];
	$mail->Body .= '<table>
	<tr>
	  <th>วันที่เขียน </th>
	  <th>ประเภทที่ลา </th>
	  <th>สาเหตุที่ลา </th>
	  <th>เริ่มวันที่ </th>
	  <th>ถึงวันที่ </th>
	  <th>รวม </th>
	  <th>หลักฐานการลา </th>
	  <th>ผู้แทนงาน </th>
	</tr>';
	$sql = "SELECT * FROM registration_tb order by leave_count  desc limit 0, 1";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$mail->Body .= '<tr>';
		$mail->Body .= '<td>'.$row['leave_day'].'</td>';
		$mail->Body .='<td>'.$row['leave_type'].'</td>';
		$mail->Body .='<td>'.$row['cause'].'</td>';
		$mail->Body .='<td>'.$row['first_leave'].'</td>';
		$mail->Body .='<td>'.$row['end_leave'].'</td>';
		$mail->Body .='<td>'.$row['sumymd'].'</td>';
		$mail->Body .='<td>'.$row['sum_h'].'</td>';
		$mail->Body .='<td>'.$row['replacement_s'].'</td>';
		$mail->Body .='<td>'.'<a href="http://localhost/SMTnPCA/fileupload/'.$row['file_up'].'">'.$row['file_up'].'</td>';
		$mail->Body .='</tr>';
		$idc = $row['leave_count'];
}
		$mail->Body .='</table>';
	
	$mail->Body .='<a type="button" id="chk" value="sdel" href="http://localhost/SMTnPCA/status_pc.php?id='. $idc.'&chk=sdel"><button>Decline</button></a>';
	$mail->Body .='<a type="button" id="chk" value="update" href="http://localhost/SMTnPCA/status_pc.php?id='. $idc.'&chk=update"><button>Accept </button></a>'.$mailsend;

		$mail->send();
} catch (Exception $e) {
	echo "อีเมลส่งไม่ได้เนื่องจาก: {$mail->ErrorInfo}";
}
?>