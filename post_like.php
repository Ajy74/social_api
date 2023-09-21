<?php 

include 'dbconnect.php';

$pid = $_POST['pid'];
$uid = $_POST['uid'];
$heart = $_POST['h'];



if($heart == 0)
{
    $sql = "SELECT * from `tbl_like` where `pid`='$pid' and `uid`='$uid' ";

    $res = mysqli_query($con,$sql);

    if($res)
        {
            $num = mysqli_num_rows($res);
            if($num >= 1 ){
                $response=1;
            }
            else{
                $sql1 = "INSERT INTO `tbl_like` (`pid`, `uid`, `dt`) VALUES ('$pid', '$uid',   current_timestamp())";
                
                $res1 = mysqli_query($con,$sql1);

                if($res1)
                    $response =1;
                else
                    $response =0;

            }
        }
    else
        $response =-1;

}
elseif($heart == 1){

    $sql = "SELECT * from `tbl_like` where `pid`='$pid' and `uid`='$uid' ";

    $res = mysqli_query($con,$sql);

    if($res)
    {
        $num = mysqli_num_rows($res);
        if($num >= 1 ){
            $sql1 = "DELETE FROM `tbl_like` WHERE `pid`='$pid' and `uid`='$uid' ";
            $res1 = mysqli_query($con,$sql1);
            
            if($res1)
                $response = 11;
            else
                $response = 00;
        }
        else
            $response = 00;
    }
    
    

    
}
else
    $response =-1;



echo json_encode($response);


?>