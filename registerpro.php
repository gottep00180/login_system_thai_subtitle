<?php 
    session_start(); //เริ่มการใช้ session 
    //session คือตัวแปรที่สามารถใช้ได้ในหลายหน้า เช่น สร้างที่หน้า index.php ไปที่หน้า login.php ก็ใช้ได้
    //ตัวแปรธรรมดา สามารถใช้ได้แค่หน้านึง เช่น สร้างที่หน้า index.php ไปทัี่นห้า login.php ก็จะไม่มีตัวแปรตัวนี้อยู่
    //หากยังไม่เข้าใจสามารถศึกษาเพิ่มเติมได้ที่  https://youtu.be/VFfqIGnhc7Y?t=8174
    
    include('lib/config.php'); //นำเข้าไฟล์ เชื่อมต่อฐานข้อมูล

    if(isset($_POST['register'])){ //ตรวจสอบว่าได้มีการกดปุ่มสมัครหรือไม่ ถ้าไม่มีจะให้กลับไปหน้า สมัคร
        // คำสั่ง mysqli_real_escape_string สำคัญมาก ในการป้องกัน sql injection
        // เวลาใช้ mysqli_real_escape_string() ในวงเล็บต้องเชื่อมฐานข้อมูลด้วย 
       
        $username = mysqli_real_escape_string($conn, $_POST['username']); //รับค่า username ที่กรอกมาในหน้า register.php 
        $password = mysqli_real_escape_string($conn, $_POST['password']); //รับค่า password ที่กรอกมาในหน้า register.php 
        
        if(empty($username)){  //เช็คค่าของ username ว่าเป็นค่าว่างหรือไม่
        
            $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบ"; //กำหนด session error เพื่อกลับไปแจ้งหน้า login.php
            header("location:register.php"); //กลับหน้า login.php
        
        }
        
        if(empty($password)){  //เช็คค่าของ password ว่าเป็นค่าว่างหรือไม่
        
            $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบ"; //กำหนด session error เพื่อกลับไปแจ้งหน้า login.php
            header("location:register.php"); //กลับหน้า login.php
        
        }
        
        //หลังจากไม่พบค่าว่างจะเริ่มตรวจสอบความถูกต้อง

        if(!isset($_SESSION['error'])){ // เช็คว่าไม่ได้มี error 
            
            //เริ่มทำการหา username ว่าซ้ำกันหรือไม่
            $find = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
            //ถ้า sql หาข้อมูลเจอ ก็จะแสดงผลออกมาเป็น 1 ตาราง
            //หากหาไม่เจอ sql จะไม่แสดงตาราง
            $result = mysqli_num_rows($find); //คำสั่ง mysqli_num_rows จะนับตารางที่ sql ตอบกลับมา

            if($result == 1){ //ถ้าหากมีตาราง หรือ พบ username ซ้ำกัน
                $_SESSION['error'] = "ชื่อนี้ มีผู้ใช้แล้ว"; //กำหนด error เพื่อบอกว่ามีคนใช้ชื่อนี้แล้ว
                header("location:register.php"); //กลับไปหน้า register
            }else{ //หากไม่เจอข้อมูล
                $add_data = "INSERT INTO users (username,password) VALUES ('$username','$password')"; //คำสั่ง sql เพิม่ข้อมูล
                $insert = mysqli_query($conn, $add_data); //เพิ่มข้อมูลเข้า database
                $_SESSION['username'] = $username; //กำหนด session สำหรับการเช็ค login
                header("location:index.php"); //ไปหน้า index!!
            }

        }
    }else{
        header("location:register.php");//ถ้าไม่มีการกดปุ่ม สมัคร จะให้ user กลับไปที่หน้า register.php
    }

?>