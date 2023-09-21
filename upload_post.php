<?php

    include 'dbconnect.php';



   if($_FILES['img']){

        $src_name = $_FILES['img'];
        $user_id = trim($_POST['id']);
        $post_desc = trim($_POST['desc']);
         
        if($src_name['size']){


           $orinal_name = $src_name['name'];
           // $fileerror=$src_name['error'];
           $filetmp = $src_name['tmp_name'];

          // print_r($filetmp);

           $destination = 'images\\'.$orinal_name;
           move_uploaded_file($filetmp,$destination);

        
           $sql = "INSERT INTO `tbl_post` (`user_id`, `image`, `post_desc`, `dt`) VALUES ('$user_id', '$orinal_name', '$post_desc', current_timestamp());"; 

            $res = mysqli_query($con,$sql);

            
           
            if($res == true){

                $sql1 = "Select post_count from `tbl_user`  where `id`='$user_id'  "; 
                $res1 = mysqli_query($con, $sql1);
                if($res1 == true){

                    $row = mysqli_fetch_assoc($res1);
                    $count = $row['post_count'];
                    $count = $count + 1;
                    $sql2 =  "UPDATE  `tbl_user` SET  `post_count` = $count where `id`='$user_id' " ;
                    $res2 = mysqli_query($con, $sql2);
        
                    // $response = 1 ;
                }


                $response['message'] = '11';
            }
            else{
                $response['message'] = '00';
            }
                
        }

       
        
    }
    
    
    echo json_encode($response);

?>