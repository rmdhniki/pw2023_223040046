<?php

require('function.php');

if (!empty($_SESSION['user'])) {
    if($_SESSION['user']['level'] == 'Admin'){
        header('location:' . BASE_URL . '/admin/dashboard.php');
    } else {
        header('location:' . BASE_URL . '/user/dashboard.php');
    }
}

$title = 'Login';

if (isset($_POST['submit'])) {
    $username = stripslashes(strip_tags(htmlspecialchars($_POST['username'], ENT_QUOTES)));
    $password = stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES)));
    
    $conn = connectDB();
    $sql = "SELECT * FROM `users` WHERE `username` = '{$username}'";
    $query = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($query);
    
    if($query->num_rows > 0) {
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user'] = $user;

            if($user['level'] == 'Admin'){
                header("location:" . BASE_URL . "/admin/dashboard.php");
            } else {
                header("location:" . BASE_URL . "/user/dashboard.php");
            }
        } else {
            $alert = [
                'type'  => 'danger',
                'message' => 'username atau password salah',
            ];

            $_SESSION['alert'] = $alert;
        }
    } else {
        $alert = [
            'type'  => 'danger',
            'message' => 'username atau password salah',
        ];

        $_SESSION['alert'] = $alert;
    }
    
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?= APP_NAME ?> - <?= $title ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/login.css" />
    </head>
    <body>
        
        <div class="center">
            <?php if(isset($_SESSION['alert'])) : ?>
            <div class="alert alert-<?=$_SESSION['alert']['type']?>" role="alert">
                <?=$_SESSION['alert']['message']?>
            </div>
            <?php unset($_SESSION['alert']); endif; ?>
            <h1>Login</h1>
            
            <form method="post" action="">
                <div class="txt_field">
                    <input type="text" name="username" required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <input type="submit" name="submit" value="Login">
                <div class="signup_link">
                    Belum punya akun? <a href="./register.php">Register</a>
                </div>
            </form>
        </div>
    </body>
</html> 