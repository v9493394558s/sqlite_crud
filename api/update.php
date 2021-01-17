<?php
require_once '../db/conn.php';

$form_data = json_decode(file_get_contents("php://input"));

        $id         =   $form_data->id;
        $username	=	$form_data->username;
        $password	=	$form_data->password;

        $query = "UPDATE `users` SET username = '$username' , password = '$password' WHERE id = $id";
        $stmt = $connect->prepare($query);  
              
        if($stmt->execute()) { 

             $count = $stmt->rowCount();
             if($count>0) {
                echo json_encode((array('status' => 'success', 'count' => $count, 'msg' => 'Record Updated Successfully')));               
             } else {
                echo json_encode((array('status' => 'error', 'msg' => 'Something error!')));                 
           }   
            
        } 

    ?>

