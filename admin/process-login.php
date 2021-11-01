<?php
        session_start();

        if(isset($_POST['btnlogin'])){
            $username = $_POST['txtUsername'];
            $password = $_POST['txtPassword'];

            $conn = mysqli_connect('localhost','root','','btl1');
            if(!$conn){
                die("Không thể kết nối");
            }

            $sql = "SELECT * FROM dbo_admin WHERE username='$username' AND password ='$password'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
                $_SESSION['loginOK'] = $username;
                header("Location: index.php");
            }else{
                header("Location: login.php");
            }
        }
    ?>
