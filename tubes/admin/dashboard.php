<?php

require('../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Pengguna') {
    header('location:' . BASE_URL . '/user/dashboard.php');
}

$title = 'Dashboard';
$datatable = true;

$payments = getPaymentAdmin();

if(isset($_POST['submit'])){
    
    $getUserId = $_GET['id'];

    unset($_POST['submit']);
    $user = update('users', $getUserId, $_POST);
    
    if($user){
        
        
        $user = find('users', $getUserId);
        $_SESSION['user'] = $user;

        echo "<script>alert('Profil berhasil diperbarui.'); window.location.href = 'dashboard.php';</script>";
    } else {
        $alert = [
            'type'  => 'danger',
            'message' => 'Profil gagal diperbarui',
        ];

        $_SESSION['alert'] = $alert;
        header("location: dashboard.php");
    }
}

require '../views/partials/header.php';
require '../views/partials/navbar.php';

require '../views/admin/dashboard.view.php';

require '../views/partials/footer.php';
require '../views/partials/script.php';