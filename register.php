<?php
    session_start(); //ต้องประกาศ start session ทุกครั้ง ในทุกๆหน้าที่มีการเช็ค login 
    if(isset($_SESSION['username'])){ //หากมีการ logiin กลับไปหน้า index ทันที
        header("location:index.php");
    }
    //จบเรื่องคำสั่งสำคัญ
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>
<body>
    <!-- ปล. css เขียนเอาเองนะจ๊ะ5555 -->
    <!-- ตรง form มีส่วนสำคัญคือ action และ method -->
    <!-- เราจะใช้ method post ในการส่งข้อมูลไปยังหน้า loginpro.php -->
    <!-- action คือหน้าที่ข้อมูลจะไปถึง -->
    <center>
        <h1>สมัครสมาชิก</h1>
        <form action="registerpro.php" method="POST">
            <!-- หากต้องการเพิ่มข้อมูลแนะนำไปอ่านโค้ดให้เข้าใจแล้วสามารถเพิ่มเองได้เลย!! -->
            <!-- เพิ่มข้อมูลหมายถึงเพิ่มช่องกรอก เช่น ชื่อ นามสกุล เบอร์โทร ราคากะหรี่แถวนั้น -->
            <input type="text" name="username" placeholder="username"> <br>
            <input type="password" name="password"  placeholder="PASSWORD"> <br>
            <input type="submit" value="สมัครสมาชิก!!" name="register">
        </form>
        <?php 
            //ก่อนจะอ่านตรงนี้แนะนำให้ไปอ่านหน้า login.php ก่อนครับ
            if(isset($_SESSION['error'])){
        ?>
            <h2 style="color:#F15151"> <?php echo $_SESSION['error'];?></h2>
        <?php 
                
                unset($_SESSION['error']); //ทำลาย session error
            } 
        ?>
        <span>หากท่านมีบัญชีแล้ว</span>
        <a href="register.php">คลิกที่นี่</a>
    </center>
</body>
</html>