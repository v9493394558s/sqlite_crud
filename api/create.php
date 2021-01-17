<?php
require_once '../db/conn.php';

$form_data = json_decode(file_get_contents("php://input"));

    $username	=	$form_data->username;
    $password	=	$form_data->password;

    $checkuser = "SELECT * FROM `users` WHERE username = $username";
    $checkstmt = $connect->prepare($checkuser);
    $checkstmt->execute();
    $res = $checkstmt->fetch();

    if($res > 0){
            echo json_encode((array('status' => 'error', 'msg' => 'Username Already Exist')));       
    } else {
        $query = "INSERT INTO `users` (username , password) VALUES (:username, :password)";
        $stmt = $connect->prepare($query); 
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        
       
        if($stmt->execute()) { 
             echo json_encode((array('status' => 'success', 'msg' => 'Record Saved Successfully')));       
        } else {
             echo json_encode((array('status' => 'error', 'msg' => 'Something error!')));   
        }   
    
    }


    ?>

