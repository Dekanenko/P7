<?php

    require 'db.php';
    $sql = "SELECT * FROM users";
   // $result = mysqli_query($conn, $sql);
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $users[] = [
                'name' => $row['name'],
                'email' => $row['email'],
                'gender' => $row['gender'],
                'userImg' => $row['path_to_img'],
            ];
        }
    }

?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style>
       .container {
           width: 400px;
       }
   </style>
</head>
<body style="padding-top: 3rem;">
<div class="container">       
    <table>
        <?php foreach($users as $oneuser ):?>
            <?php
                if($oneuser["userImg"]!='') 
                    $imWay =  $oneuser["userImg"];
                else
                    $imWay = 'public\images\default.png';
                ?>
            <tr>
                <td><?php echo $oneuser["name"] ?></td>
                <td><?php echo $oneuser["email"] ?></td>
                <td><?php echo $oneuser["gender"] ?></td>
                <td><?php echo "<img src=$imWay alt='userPhoto' width = 50px>" ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <a class="btn" href="adduser.php">return back</a>
    <a class="btn" href="login.php">Login</a>
</div>
</body>
</html>