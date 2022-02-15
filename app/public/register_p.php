<?php 
    session_start();
    require_once 'connect.php';
    if(isset($_POST['register'])){
        if($_POST['username'] !== "" && $_POST['password'] !== ""){
            try{
                // them filter sau.
                $username = $_POST['username'];
                $password = $_POST['password'];
                $exec= $conn->prepare("INSERT INTO users (username, password) VALUES (:user, :pass)");
                $exec->bindValue(':user',$username);
                $exec->bindValue(':pass',$password);
                $exec->execute();
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            $_SESSION['message']="User successfully created";
            //reset connect
            $conn = null;
            //chuyen huong
            header('location:login.php');
        }
        else{
            echo "<script>alert('dien het di ????');</script>";
            echo "<script>window.location = 'register.php'</script>";

        }

    }
?>