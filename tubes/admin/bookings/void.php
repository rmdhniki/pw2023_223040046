<?php

require('../../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Pengguna') {
    header('location:' . BASE_URL . '/user/dashboard.php');
}


if(isset($_GET['id'])){

    $booking = find('bookings', $_GET['id']);

    unset($_POST['submit']);

    $_POST['status'] = 3;

    $booking = update('bookings', $booking['id'], $_POST);

    if($booking){
        $alert = [
            'type'  => 'success',
            'message' => 'Boking paket berhasil dibatalkan',
        ];

        $_SESSION['alert'] = $alert;

        header("location: ../bookings");
    } else {
        $alert = [
            'type'  => 'danger',
            'message' => 'Boking paket gagal dibatalkan',
        ];

        $_SESSION['alert'] = $alert;
        header("location: ../bookings");
    }
}