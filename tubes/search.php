<?php
require('function.php');

if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];

    $packages = getFilterPackages($keyword);
}
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Website - Cari Package</title>

    <link rel="stylesheet" href="./css/style.css">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet" />
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html" id="logo"><span>V</span>isit.Cianjur</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span><i class="fa-solid fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto ps-3">
            <li class="nav-item">
              <a class="nav-link active" href="<?= BASE_URL ?>#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>#packages">Packages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>#gallary">Gallary</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL ?>#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./login.php">Login</a>
            </li>
          </ul>
          <form action="search.php" method="GET" class="d-flex">
            <input name="keyword" class="form-control me-2" type="text" placeholder="Cari Package" />
            <button type="submit" class="btn btn-primary">Cari</button>
          </form>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Section Packages Start  -->
    <section class="packages" id="packages">
      <div class="container">
        <div class="row mt-4">
          <div class="col-md-12">
          <h3>Pencarian: <?= $keyword ?></h3>
          </div>
        </div>

        <?php if(count($packages) > 0 ): ?>
        <div class="main-txt">
          <h1><span>P</span>ackages</h1>
        </div>

        <div class="row" style="margin-top: 30px">
          <?php foreach($packages as $package): ?>
          <div class="col-md-4 py-3 py-md-0 mb-4">
            <div class="card h-100">
              <img class="img-fluid" src="./images/packages/<?= $package['image'] ?>" alt="Gambar <?= $package['name'] ?>" />
              <div class="card-body">
                <h3><?= $package['name'] ?></h3>
                <p><?= $package['description'] ?>
                </p>
                <div class="star">
                  <?php
                    for ($x = $package['rating']; $x >= 1; $x--) {
                    echo "<i class='fa-solid fa-star checked'></i>";
                    }
                  ?>
                  <i class="fa-solid fa-car"></i>
                  <i class="fa-solid fa-user"></i>

                </div>
                <h6><strong><?= formatRupiah($package['price']); ?> / orang</strong></h6>
              </div>
              <div class="card-footer">
                <a href="user/packages/booking.php?id=<?= $package['id'] ?>" class="btn btn-info">Booking Sekarang</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="main-txt">
          <h1>Packages Tidak Ditemukan</h1>
        </div>
        <?php endif; ?>
        
        </div>

      </div>
    </section>
    <!-- Section Packages End -->

    <!-- Footer Start -->
    <footer id="footer">
      <h1><span>V</span>isit.Cianjur</h1>
      <p>Mari Berlibur di Cianjur Kota Kecil penuh kebahagiaan !.</p>
      <div class="social-links">
        <a href= "https://twitter.com/visitcianjur"><i class="fa-brands fa-twitter" ></i></a>
        <a href="https://www.facebook.com/visitcianjur.id/" > <i class="fa-brands fa-facebook"></i></a>
       <a href="https://www.instagram.com/visitcianjur/" ><i class="fa-brands fa-instagram"  ></i></a>
        <a href="https://www.youtube.com/@visitcianjurtv"> <i class="fa-brands fa-youtube"></i></a>
       
      </div>
      <div class="credit">
        <p>Designed By <a href="https://www.instagram.com/rmdhnikii/">RMDHNIKI</a></p>
      </div>
      <div class="copyright">
        <p>&copy;Copyright rmdhniki All Rights Reserved</p>
      </div>
    </footer>
    <!-- Footer End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
