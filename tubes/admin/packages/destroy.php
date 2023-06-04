<?php

require('../../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Pengguna') {
    header('location:' . BASE_URL . '/user/dashboard.php');
}

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $package = find('packages', $id);

    unlink('../../images/packages/'. $package['image']);

    $package = destroy('packages', $id);

    if($package){
        $alert = [
            'type'  => 'success',
            'message' => 'Paket berhasil dihapus',
        ];

        $_SESSION['alert'] = $alert;

        header("location: index.php");
    } else {
        $alert = [
            'type'  => 'danger',
            'message' => 'Paket gagal dihapus',
        ];

        $_SESSION['alert'] = $alert;
        header("location: detail.php?id=". $id);
    }
}
?>