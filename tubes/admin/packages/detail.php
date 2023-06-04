<?php

require('../../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Pengguna') {
    header('location:' . BASE_URL . '/user/dashboard.php');
}

$title = 'Detail Paket';

if(isset($_GET['id'])){
    $package = find('packages', $_GET['id']);
}

require '../../views/partials/header.php';
require '../../views/partials/navbar.php';

require '../../views/admin/packages/detail.view.php';

require '../../views/partials/footer.php';
require '../../views/partials/script.php';