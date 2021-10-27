<?php

    $str = null;
    if (file_exists('database/users.csv')) {
        $fp = fopen('database/users.csv', 'r');
        $str = explode("\n",file_get_contents('database/users.csv'));
        fclose($fp);
        foreach($str as $s){
            if($s!=null){
                $user = explode(",",$s);

                $users[] = [
                    'name' => $user[0],
                    'email' => $user[1],
                    'gender' => $user[2],
                    'userImg' => $user[3],
                ];
            }
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
        <?php if($str!=null):?>
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
        <?php endif ?>
    </table>
   <a class="btn" href="adduser.php">return back</a>
</div>
</body>
</html>