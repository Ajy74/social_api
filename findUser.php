<?php 

include 'dbconnect.php';

$email = trim($_POST['email']);

$sql1 = "Select * from `tbl_user` where email='$email'";

$res = mysqli_query($con,$sql1);  // //stores true or false
$row = mysqli_fetch_assoc($res);

// $resonse = (int) $row['id'];
$resonse =  $row;

echo json_encode($resonse);


?>