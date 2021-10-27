<?php 
    // ไฟล์นี้เพื่อการเชื่อมต่อเข้ากับ database

    $host = "localhost"; //host กรณี xampp คือ localhost
    $user = "root"; //username ที่ใช้ login เข้า database
    $pass = ""; //password ที่ใช้ login เข้า database
    $dbname = "loginDB"; //ชื่อ database

    $conn = mysqli_connect($host, $user, $pass, $dbname); //ทำการเชื่อมต่อฐานข้อมูล
    
    //จบไฟล์นี้ หากจะใช้ ก็ require หรือ include ใช้งานได้เลย

?>