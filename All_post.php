<?php 

include 'dbconnect.php';

$userid = $_POST['id'];

// $sql = "SELECT * FROM `tbl_post` ORDER BY `tbl_post`.`id` DESC";
$sql = "SELECT * FROM `tbl_post` INNER JOIN tbl_user ON tbl_post.user_id = tbl_user.id  ORDER BY `tbl_post`.`pid` DESC";
$res = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($res)) {
    // // $f_id = $row['id'];

    // $sql1 = "SELECT * FROM `tbl_following` WHERE  `friend_id`='$userid' ";
    // $res1 = mysqli_query($con,$sql1);

    // if($res1){
    //     while($row1 = mysqli_fetch_array($res1)) {
    //         $f_id = $row1['user_id'];
    //     }
    // }


    $response[]=$row;
}

echo json_encode($response);


?>