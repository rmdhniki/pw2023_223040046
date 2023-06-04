<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container">
    <a class="navbar-brand" href="#" id="logo"><span>V</span>isit.Cianjur</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span><i class="fa-solid fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto ps-3">
            
            <?php if($_SESSION['user']['level'] == 'Admin'): ?>
            <li class="nav-item">
                <a class="nav-link active" href="<?= BASE_URL ?>/admin/dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?= BASE_URL ?>/admin/packages">Paket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?= BASE_URL ?>/admin/bookings">Booking</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?= BASE_URL ?>/admin/payments">Pembayaran</a>
            </li>
            <?php endif ?>

            <?php if($_SESSION['user']['level'] == 'Pengguna'): ?>
            <li class="nav-item">
                <a class="nav-link active" href="<?= BASE_URL ?>/user/dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?= BASE_URL ?>/user/packages">Paket</a>
            </li>
            <?php endif ?>
        </ul>

        <a href="<?= BASE_URL ?>/logout.php" class="btn btn-danger" type="button"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
    </div>
</nav>
<!-- Navbar End -->