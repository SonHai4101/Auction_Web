<?php
        session_start();

        if(isset($_POST['btnlogin'])){
            $username = $_POST['txtUsername'];
            $password = $_POST['txtPassword'];

            $conn = mysqli_connect('localhost','root','','auction');
            if(!$conn){
                die("Không thể kết nối");
            }

            $sql = "SELECT * FROM dbo_users WHERE username='$username' AND userpassword ='$password'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
                $_SESSION['loginOK'] = $username;
                header("Location: user/index.php");
            }else{
                header("Location: login.php");
            }
        }
    ?>
