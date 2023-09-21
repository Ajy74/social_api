<?php

    include 'dbconnect.php';


    $sql = "SELECT * FROM `tbl_user`";  
    
    $res = mysqli_query($con, $sql);
    if($res == true){
        while ($row1 = mysqli_fetch_array($res)){
            $data[] = $row1;
        }
    }
    
    
    echo json_encode($data);

?>