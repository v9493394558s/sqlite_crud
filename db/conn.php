<?php
    require_once 'headers.php';

    // $connect = new PDO("mysql:host=localhost;dbname=vcrud", "root", "");
   // you can change remote server address above

   
 $connect = new PDO('sqlite:../db/vcrud.sqlite');
 $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>
