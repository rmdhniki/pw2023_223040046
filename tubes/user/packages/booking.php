<?php

require('../../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Admin') {
    header('location:' . BASE_URL . '/admin/dashboard.php');
}

$title = 'Booking Paket';
$createBooking = true;

if(isset($_GET['id'])){
    $package = find('packages', $_GET['id']);
}

if(isset($_POST['submit'])){
    $userId = $_SESSION['user']['id'];
    $packageId = $_GET['id'];

    unset($_POST['submit']);
    
    $_POST['package_id'] = $packageId;
    $_POST['user_id']    = $userId;
    $_POST['status']     = 0;
    $_POST['code']       = 'B' . date('mdYhis');

    $booking = add('bookings', $_POST);

    if($booking){

        $alert = [
            'type'  => 'success',
            'message' => 'Booking paket berhasil ditambahkan',
        ];

        $_SESSION['alert'] = $alert;

        header("location: ../dashboard.php");
    } else {

        $alert = [
            'type'  => 'danger',
            'message' => 'Booking paket gagal ditambahkan',
        ];

        $_SESSION['alert'] = $alert;

        header("location: booking.php?id=".$packageId);
    }
}

require '../../views/partials/header.php';
require '../../views/partials/navbar.php';

require '../../views/user/packages/booking.view.php';

require '../../views/partials/footer.php';
require '../../views/partials/script.php';