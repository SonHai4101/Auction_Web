<?php
        session_start();

        if(isset($_POST['btnlogin'])){
            $username = $_POST['txtUsername'];
            $password_raw = $_POST['txtPassword'];

            $conn = mysqli_connect('localhost','root','','btl1');
            if(!$conn){
                die("Không thể kết nối");
            }

            $sql = "SELECT * FROM dbo_users WHERE username='$username'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $password_hash = $row['userpassword'];
                echo $password_hash;
                if(password_verify($password_raw,$password_hash)){
                    $_SESSION['loginOK'] = $username;
                     header('Location: user/index.php');
                }else{
                    echo 'Mật khẩu không khớp';
                }
            }else{
                header("Location: login.php");
            }
        }
    ?>
