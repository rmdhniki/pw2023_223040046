<section>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">  
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Detail Paket</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 m-auto text-center">
                            <!--?xml version="1.0" encoding="UTF-8"?-->
                            <img src="<?= BASE_URL . '/images/packages/' .$package['image']?>" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr><th>Nama</th><td><?= $package['name']?></td></tr>
                                        <tr><th>Rating</th><td><?php
                                        for ($x = $package['rating']; $x >= 1; $x--) {
                                        echo "<i class='fa-solid fa-star checked'></i>";
                                        }
                                        ?></td></tr>
                                        <tr><th>Harga</th><td><?= formatRupiah($package['price'])?></td></tr> 
                                        <tr><th>Deskripsi</th><td><?= $package['description']?></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <a href="<?= BASE_URL ?>/admin/packages" class="btn btn-secondary">Kembali</a>
                        <a href="<?= BASE_URL ?>/admin/packages/edit.php?id=<?= $package['id']?>" class="btn btn-warning">Ubah</a>
                        <a href="destroy.php?id=<?= $package['id'] ?>" class="btn btn-danger" onclick="return confirm('apakah yakin ingin menghapus <?= $package['name'] ?>?');">Hapus</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section Packages End -->