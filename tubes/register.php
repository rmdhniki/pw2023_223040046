<?php
require('function.php');
// ngecek sesi yg login
if(isset($_SESSION['user']) && $_SESSION['user']['Admin']) header("Location: admin/dashboard.php");
if(isset($_SESSION['user']) && $_SESSION['user']['Pengguna']) header("Location: user/dashboard.php");

$title = 'Register';

if (isset($_POST['submit'])) {
    $fullName = stripslashes(strip_tags(htmlspecialchars($_POST['full_name'], ENT_QUOTES))); 
    $username = stripslashes(strip_tags(htmlspecialchars($_POST['username'], ENT_QUOTES)));
    $phone_number = stripslashes(strip_tags(htmlspecialchars($_POST['phone_number'], ENT_QUOTES)));
    $password = stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES)));
    $password_confirm = stripslashes(strip_tags(htmlspecialchars($_POST['password_confirm'], ENT_QUOTES)));
    
    $conn = connectDB();

    $sql = "SELECT * FROM `users` WHERE `username` = '{$username}'";
    $query = mysqli_query($conn, $sql);
    // ngecek
    if($query->num_rows == 0){
        if($password == $password_confirm) {
            
            unset($_POST['submit']);
            unset($_POST['password_confirm']);

            $_POST['level'] = 'Pengguna';
            $_POST['password'] = password_hash($password, PASSWORD_DEFAULT);
            
            $removeSpace = preg_replace('/\s*/', '', $username);
            $lowercase = strtolower($removeSpace);
            $_POST['username'] = $lowercase;

            $user = add('users', $_POST);
            echo "<script>alert('Berhasil register. Silahkan login'); window.location.href = 'login.php';</script>";

        } else {
            $alert = [
                'type'  => 'danger',
                'message' => 'Konfirmasi password salah',
            ];
    
            $_SESSION['alert'] = $alert;
        }
    } else {
        $alert = [
            'type'  => 'danger',
            'message' => 'Username sudah digunakan',
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
            <h1>Register</h1>
            <form method="post">
                <div class="txt_field">
                    <input type="text" required name="full_name">
                    <span></span>
                    <label>Nama Lengkap</label>
                </div>
                <div class="txt_field">
                    <input type="text" required name="username">
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="number" required name="phone_number">
                    <span></span>
                    <label>No Telepon</label>
                </div>
                <div class="txt_field">
                    <input type="password" required name="password" minlength="8">
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="txt_field">
                    <input type="password" required name="password_confirm">
                    <span></span>
                    <label>Konfirmasi Password</label>
                </div>
                <input type="submit" name="submit" value="Register">
                <div class="signup_link">
                    Sudah punya akun? <a href="./login.php">Login</a>
                </div>
            </form>
        </div>
    </body>
</html> 