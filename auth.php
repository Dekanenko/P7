<?php
    session_start();
    const ADMIN_EMAIL = 'admin@admin.com';
    const ADMIN_PASSWORD = '111111';

    require 'db.php';

    $email = $_POST["email"];
    //$sql = "SELECT email FROM users";
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    $found = false;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['email']===$_POST["email"]){
                $found = true;
            }
        }
    }


    if(($result->num_rows > 0)||($_POST["email"]==ADMIN_EMAIL&&$_POST["pwd"]==ADMIN_PASSWORD)){
        $_SESSION["auth"] = true;
        header('Location: login.php');
    }
    else{
        header('Location: adduser.php');
    }
    

?>

