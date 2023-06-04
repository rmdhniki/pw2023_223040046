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
                            <div class="col-md-12">
                                <table class="table myBookingTable" style="width:100%">
                                    <thead>
                                        <th>Nama Paket</th>
                                        <th>Kode Paket</th>
                                        <th>Tgl Checkin</th>
                                        <th>Tgl Checkout</th>
                                        <th>Harga</th>
                                        <th>Kuantitas</th>
                                        <th>Total Harga</th>
                                    </thead>
                                    <tbody>
                                        <td><?= $booking['package_name']?></td>
                                        <td><?= $booking['code']?></td>
                                        <td><?= $booking['check_in_date']?></td>
                                        <td><?= $booking['check_out_date']?></td>
                                        <td><?= formatRupiah($booking['price'])?>/orang</td>
                                        <td><?= $booking['quantity']?> orang</td>
                                        <td><?= formatRupiah($booking['total_price'])?></td>
                                        
                                    </tbody>
                                </table>

                                <div class="col-6 mb-4">
                                    <p class="lead">Cara Pembayaran:</p>
                                    <img src="<?= BASE_URL ?>/images/method-payments/bca.png" width="120" alt="Visa">
                                    <h6>
                                        <br>
                                        <?= ACCOUNT_NUMBER ?> <br>
                                        <?= ACCOUNT_NAME ?>
                                    </h6>
                                </div>

                                <blockquote style="border-left: 0.7rem solid #007bff; padding-left: 0.7rem;">
                                <p style="margin-top:10px">
                                <h6>Catatan:</h6>
                                Setelah melakukan pembayaran. Silahkan upload bukti pembayaran.</p>
                                <!-- <small>Someone famous in <cite title="Source Title">Source Title</cite></small> -->
                                </blockquote>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <a href="<?= BASE_URL ?>/user/dashboard.php" class="btn btn-secondary">Kembali</a>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Bayar Booking Paket</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="paymentdate" class="form-label">Tanggal Pembayaran</label>
                                <input type="date" class="form-control" id="paymentdate" name="payment_date" required >
                            </div>

                            <div class="mb-3">
                                <label for="proofpayment" class="form-label">Bukti Pembayaran</label>
                                <input type="file" class="form-control" id="proofpayment" name="proof_payment" required>
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