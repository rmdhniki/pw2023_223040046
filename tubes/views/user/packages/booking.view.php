<section>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">  
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Detail Paket</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 m-auto text-center">
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
                                        <tr><th>Harga</th><td><?= formatRupiah($package['price'])?>/orang</td></tr> 
                                        <tr><th>Deskripsi</th><td><?= $package['description']?></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <a href="<?= BASE_URL ?>/user/packages" class="btn btn-secondary">Kembali</a>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Booking Paket</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="checkindate" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="checkindate" name="check_in_date" required onchange="validateCheckInDate()">
                            </div>

                            <div class="mb-3">
                                <label for="checkoutdate" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="checkoutdate" name="check_out_date" required disabled onchange="validateCheckOutDate()">
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Jumlah orang</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Kuantitas" name="quantity" disabled required oninput="handleTotalPrice()">
                            </div>
                            
                            <div class="mb-3">
                                <label for="totalprice" class="form-label">Total Harga</label>
                                <input type="text" class="form-control" id="totalprice" placeholder="Nama" name="total_price" readonly>
                            </div>
                            
                            <div class="mb-3">
                                <label for=""></label>
                                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Section Packages End -->