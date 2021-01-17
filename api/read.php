<?php
require_once '../db/conn.php';

// read by id
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = array();
    $query = "SELECT * FROM `users` WHERE id = $id";
    $statement = $connect->prepare($query);
    $statement->execute();
    if($statement->execute())
    {
        while($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
                $data[] = $row;                              
        }                        
    } 
    
} 
// read all records
else {
    $data = array();
    $query = "SELECT * FROM `users`";
    $statement = $connect->prepare($query);
    if($statement->execute())
    {
        while($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
                $data[] = $row;                    
        }         
    }    
}

echo json_encode((array('status' => 'success', 'data' => $data)));  

    
?>