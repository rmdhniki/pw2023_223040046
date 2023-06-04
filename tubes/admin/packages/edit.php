<?php

require('../../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Pengguna') {
    header('location:' . BASE_URL . '/user/dashboard.php');
}

$title = 'Ubah Paket';

if(isset($_GET['id'])){
    $package = find('packages', $_GET['id']);
}

if(isset($_POST['submit'])){
    
    $file 	= $_FILES['image']['name'];

    if(!empty($file)) {
        $extFile = pathinfo($file, PATHINFO_EXTENSION);
        $fileRename = date('mdY_his') .'.'. $extFile;

        $dirimage = '../../images/packages/';
        $pathimage = $dirimage . $fileRename;
        $file = $fileRename; 
        unlink('../../images/packages/'. $package['image']);
        move_uploaded_file($_FILES['image']['tmp_name'], $pathimage);
    } else {
        $file = $package['image'];
    }

    $_POST['image'] = $file;
    unset($_POST['submit']);
    $package = update('packages', $package['id'], $_POST);

    if($package){
        $alert = [
            'type'  => 'success',
            'message' => 'Paket berhasil diperbarui',
        ];

        $_SESSION['alert'] = $alert;

        header("location: index.php");
    } else {
        $alert = [
            'type'  => 'danger',
            'message' => 'Paket gagal diperbarui',
        ];

        $_SESSION['alert'] = $alert;
        header("location: edit.php?id=". $package['id']);
    }
}

// dd($package);
require '../../views/partials/header.php';
require '../../views/partials/navbar.php';

require '../../views/admin/packages/edit.view.php';

require '../../views/partials/footer.php';
require '../../views/partials/script.php';