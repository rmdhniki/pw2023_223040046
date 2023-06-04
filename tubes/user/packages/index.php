<?php

require('../../function.php');

if (empty($_SESSION['user'])) {
    header('location:' . BASE_URL . '/login.php');
}
if ($_SESSION['user']['level'] == 'Admin') {
    header('location:' . BASE_URL . '/admin/dashboard.php');
}

$title = 'Daftar Paket';

$packages = getAll('packages');

require '../../views/partials/header.php';
require '../../views/partials/navbar.php';

require '../../views/user/packages/index.view.php';

require '../../views/partials/footer.php';
require '../../views/partials/script.php';