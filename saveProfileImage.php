<?php

    include 'dbconnect.php';



   if($_FILES['img']){

        $src_name = $_FILES['img'];
        $user_id = trim($_POST['id']);
        $name = trim($_POST['name']);
        $bio = trim($_POST['bio']);
         
        if($src_name['size']){


           $orinal_name = $src_name['name'];
           // $fileerror=$src_name['error'];
           $filetmp = $src_name['tmp_name'];

          // print_r($filetmp);

           $destination = 'images\\'.$orinal_name;
           move_uploaded_file($filetmp,$destination);

        
            $sql = "UPDATE `tbl_user` SET `ori_name` = '$name', `bio` = '$bio' , `p_img` = '$orinal_name' where `id`=$user_id "; 

            $res = mysqli_query($con,$sql);
           
            if($res == true){
            $response['message'] = '11';
            }
            else{
                $response['message'] = '00';
            }
                
        }

       
        
    }
    
    
    echo json_encode($response);

?>