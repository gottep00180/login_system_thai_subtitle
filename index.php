<?php
    
    //คำสั่งสำคัญ!! //ต้องมีในด้านบนสุดของทุกๆหน้า เพื่อเช็คว่ามีการ login จริงๆหรือไม่
    session_start(); //ต้องประกาศ start session ทุกครั้ง ในทุกๆหน้า
    if(!isset($_SESSION['username'])){ //หากไม่มี session username กลับไปหน้า login ทันที
        header("location:login.php");
    }
    //จบเรื่องคำสั่งสำคัญ
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX PAGE</title>
</head>
<body>
    <h1>
        ยินดีต้อนรับคุณ <?php echo $_SESSION['username'] ?>
    </h1>
    <!-- ปุ่มล็อกเอ้าท์ ปรับยังไงก็ได้ ก้แค่ให้ user ไปหน้า logout .php -->
    <a href="logout.php"><button>ออกจากระบบ</button></a>
</body>
</html>