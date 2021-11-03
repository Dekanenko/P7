<?php
    session_start();
    $isRestricted = false;
    if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
        $isRestricted = true;
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <?php if(!$isRestricted):?>
            <h1>Login</h1>
            <form action="auth.php" method="post">
                <div class="row">
                    <div class="field">
                        <label>Email: <input type="email" name="email"><br></label>
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label>Password: <input type="password" name="pwd"><br></label>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn" value="Login">
            </form>
        <?php else:?>
            <span>
                You are loged in <a href="logout.php"><input type="button" class="btn" value="Logout"></a>
            </span>
        <?php endif?>
    </div>
    
</body>
</html>