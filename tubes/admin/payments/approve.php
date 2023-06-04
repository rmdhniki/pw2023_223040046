<?php

require('../../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Pengguna') {
    header('location:' . BASE_URL . '/user/dashboard.php');
}

if(isset($_GET['id'])){

    $payment = find('payments', $_GET['id']);
    $booking = find('bookings', $payment['booking_id']);
    
    unset($_POST['submit']);

    $payment = update('payments', $payment['id'], ['status' => 1]);
    $booking = update('bookings', $booking['id'], ['status' => 2]);

    if($payment){
        $alert = [
            'type'  => 'success',
            'message' => 'Pembayaran berhasil diterima',
        ];

        $_SESSION['alert'] = $alert;

        header("location: detail.php?id=".$_GET['id']);
    } else {
        $alert = [
            'type'  => 'danger',
            'message' => 'Pembayaran gagal diterima',
        ];

        $_SESSION['alert'] = $alert;
        header("location: detail.php?id=".$_GET['id']);
    }
}