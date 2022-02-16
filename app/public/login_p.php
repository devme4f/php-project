<?php 
    session_start();

    require_once 'connect.php';

    if (isset($_POST['login'])){
        if($_POST['username'] !== "" || $_POST['password'] !== ""){
            #them filter sau
            $username= $_POST['username'];
            $password= $_POST['password'];
            $_SESSION['username']=$username;
            $exec = $conn->prepare("SELECT * FROM users WHERE username=:user AND password=:pass ");
            $exec->bindValue(':user',$username);
            $exec->bindValue(':pass',$password);
            $exec->execute();  
            $fetch = $exec -> fetch();  
            if(($exec ->rowCount()) > 0){
                $_SESSION['username']=$fetch['username'];
                header('location: index.php');
            } else {
                echo "
                <script>alert('SAI ROI !!')</script>
                <script>window.location = 'login.php'</script>
                ";
            }
        }

    }
?>