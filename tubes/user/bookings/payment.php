<?php

require('../../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Admin') {
    header('location:' . BASE_URL . '/admin/dashboard.php');
}

$title = 'Pembayaran Booking Paket';
$datatable = true;

if(isset($_GET['id'])){
    $booking = getBookingDetail($_GET['id'])[0];
}

if(isset($_POST['submit'])){

    $bookingId = $_GET['id'];

    $file 		    = $_FILES['proof_payment']['name'];

    if(!empty($file)) {
        $extFile = pathinfo($file, PATHINFO_EXTENSION);
        $fileRename = date('mdY_his') .'.'. $extFile;

        $dirImage = '../../images/payments/';
        $pathimage = $dirImage . $fileRename;
        $file = $fileRename; 

        move_uploaded_file($_FILES['proof_payment']['tmp_name'], $pathimage);
    } else {
        $file = '-';
    }

    unset($_POST['submit']);
    
    $_POST['booking_id']    = $bookingId;
    $_POST['proof_payment'] = $file;
    $_POST['status']        = 0;
    $_POST['code']          = 'P' . date('mdYhis');

    $booking = update('bookings', $bookingId, ['status' => 1]);

    $payment = add('payments', $_POST);

    if($payment){
        $alert = [
            'type'  => 'success',
            'message' => 'Pembayaran berhasil ditambahkan',
        ];

        $_SESSION['alert'] = $alert;

        header("location: ../dashboard.php");
    } else {
        $alert = [
            'type'  => 'danger',
            'message' => 'Pembayaran berhasil ditambahkan',
        ];

        $_SESSION['alert'] = $alert;
        header("location: payments.php?id=".$bookingId);
    }
}

require '../../views/partials/header.php';
require '../../views/partials/navbar.php';

require '../../views/user/bookings/payment.view.php';

require '../../views/partials/footer.php';
require '../../views/partials/script.php';