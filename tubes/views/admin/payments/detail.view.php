<section>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <?php if(isset($_SESSION['alert'])) : ?>
            <div class="alert alert-<?=$_SESSION['alert']['type']?>" role="alert">
                <?=$_SESSION['alert']['message']?>
            </div>
            <?php unset($_SESSION['alert']); endif; ?>
            </div>
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
                                <span>Bukti Pembayaran</span>
                                <img src="<?= BASE_URL . '/images/payments/' .$payment['proof_payment']?>" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr><th>Kode Pembayaran</th><td><?= $payment['code']?></td></tr>
                                        <tr><th>Tgl Pembayaran</th><td><?= $payment['payment_date']?></td></tr>
                                        <tr><th>Jumlah Pembayaran</th><td><?= formatRupiah($payment['total_price'])?></td></tr>
                                        <tr><th>Status</th><td><?= $payment['payment_status']?></td></tr>
                                        <tr><th></th><td></td></tr>
                                        
                                        <tr><th>Kode Booking</th><td><?= $payment['booking_code']?></td></tr>
                                        <tr><th>Nama Paket</th><td><?= $payment['package_name']?></td></tr>
                                    
                                        <tr><th>Tgl Checkin</th><td><?= $payment['check_in_date']?></td></tr>
                                        <tr><th>Tgl Checkout</th><td><?= $payment['check_out_date']?></td></tr>
                                        <tr><th>Kuantitas</th><td><?= $payment['quantity']?></td></tr>
                                        <tr><th>Total Harga</th><td><?= formatRupiah($payment['total_price'])?></td></tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">

                        <a href="<?= BASE_URL ?>/admin/payments" class="btn btn-secondary">Kembali</a>
                        <?php if($payment['status'] == 0): ?>
                            
                            <a href="approve.php?id=<?= $payment['id'] ?>" class="btn btn-outline-primary" onclick="return confirm('apakah yakin ingin menerima pembayaran dengan kode <?= $payment['code'] ?>?');">Terima</a>
                            <a href="rejected.php?id=<?= $payment['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('apakah yakin ingin menolak pembayaran dengan kode <?= $payment['code'] ?>?');">Tolak</a>
                            
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-4">  
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Detail Konsumen</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr><th>Nama Lengkap</th><td><?= $payment['full_name']?></td></tr>
                                        <tr><th>Nomor Telepon</th><td><?= $payment['phone_number']?></td></tr>
                                        <tr><th>Alamat</th><td><?= $payment['address']?></td></tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section Packages End -->