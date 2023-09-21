<?php 

include 'dbconnect.php';

$pid = $_POST['pid'];
$uid = $_POST['uid'];


$sql = "SELECT * from `tbl_like` where `pid`='$pid' and `uid`='$uid' ";

$res = mysqli_query($con,$sql);

if($res)
    {
        $count = mysqli_num_rows($res);;
        if($count ==1 )
            $response=1;
        else
            $response=0;
    }
else
    $response = -1;


echo json_encode($response);


?>