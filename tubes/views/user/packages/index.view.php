<!-- Section Packages Start  -->
<section>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <?php foreach($packages as $package): ?>
                <div class="col-md-4 py-3 py-md-0 mb-4">
                    <div class="card h-100">
                    <img class="img-fluid" src="<?= BASE_URL ?>/images/packages/<?= $package['image'] ?>" alt="Gambar <?= $package['name'] ?>" />
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
                        <a href="booking.php?id=<?= $package['id'] ?>" class="btn btn-info">Booking Sekarang</a>
                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Section Packages End -->