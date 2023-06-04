<?php

require('../../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Pengguna') {
    header('location:' . BASE_URL . '/user/dashboard.php');
}

$title = 'Tambah Paket';
if(isset($_POST['submit'])) {
    
    $file 		    = $_FILES['image']['name'];

    if(!empty($file)) {
        $extFile = pathinfo($file, PATHINFO_EXTENSION);
        $fileRename = date('mdY_his') .'.'. $extFile;

        $dirimage = '../../images/packages/';
        $pathimage = $dirimage . $fileRename;
        $file = $fileRename; 

        move_uploaded_file($_FILES['image']['tmp_name'], $pathimage);
    } else {
        $file = '-';
    }

    $_POST['image'] = $file;
    unset($_POST['submit']);
    $package = add('packages', $_POST);

    if($package){

        $alert = [
            'type'  => 'success',
            'message' => 'Paket berhasil ditambahkan',
        ];

        $_SESSION['alert'] = $alert;

        header("location: index.php");
    } else {

        $alert = [
            'type'  => 'danger',
            'message' => 'Paket gagal ditambahkan',
        ];

        $_SESSION['alert'] = $alert;

        header("location: create.php");
    }
}


require '../../views/partials/header.php';
require '../../views/partials/navbar.php';

require '../../views/admin/packages/create.view.php';

require '../../views/partials/footer.php';
require '../../views/partials/script.php';