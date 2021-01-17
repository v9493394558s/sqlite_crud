<?php
require_once '../db/conn.php';

$form_data = json_decode(file_get_contents("php://input"));

    $username	=	$form_data->username;
    $password	=	$form_data->password;

    $query = "SELECT COUNT(*) AS count, username, password, officer_name, officer_mobile FROM `users` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";

    $stmt = $connect->prepare($query);  
    $stmt->execute();  
    $res = $stmt->fetch();
    $count = $res['count'];
   
    if($count > 0 ) { 
     
        $data['username']       = $res['username'];
        $data['password']       = $res['password'];
        $data['officer_name']   = $res['officer_name'];
        $data['officer_mobile'] = $res['officer_mobile'];     

        echo json_encode((array('status' => 'success', 'data' => $data))); 
    }  else {
        echo json_encode((array('status' => 'error', 'msg' => 'Username or Password Invalid!')));
    } 
  
      
    ?>

