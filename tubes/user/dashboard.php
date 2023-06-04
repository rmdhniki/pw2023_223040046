<?php

require('../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Admin') {
    header('location:' . BASE_URL . '/admin/dashboard.php');
}

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

$title = 'Dasboard';
$datatable = true;

$bookings = getBookingUser($_SESSION['user']['id']);

$payments = getPaymentUser($_SESSION['user']['id']);

require '../views/partials/header.php';
require '../views/partials/navbar.php';

require '../views/user/dashboard.view.php';

require '../views/partials/footer.php';
require '../views/partials/script.php';