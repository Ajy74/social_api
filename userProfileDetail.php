<?php

    include 'dbconnect.php';


    $user_id = trim($_POST['id']);
   
    
    $sql = "SELECT * FROM `tbl_user` where `id`=$user_id ";  
    
    $res = mysqli_query($con, $sql);
    if($res == true){
        while ($row1 = mysqli_fetch_array($res)){
            $data[] = $row1;
        }
    }
    
    
    echo json_encode($data);

?>