
<section>
    <div class="container mt-4">
        <?php if(isset($_SESSION['alert'])) : ?>
        <div class="alert alert-<?=$_SESSION['alert']['type']?>" role="alert">
            <?=$_SESSION['alert']['message']?>
        </div>
        <?php unset($_SESSION['alert']); endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">  
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Daftar Booking</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table display myDataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5" class="text-right">No</th>
                                    <th>Nama Paket</th>
                                    <th>Kode Booking</th>
                                    <th>Kuantitas</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($bookings as $key => $booking): ?>
                                <tr>
                                    <td class="text-center"><?= $key+1 ?></td>
                                    <td><?= $booking['package_name'] ?></td>
                                    <td><?= $booking['code'] ?></td>
                                    <td><?= $booking['quantity'] ?></td>
                                    <td><?= formatRupiah($booking['total_price']) ?></td>
                                    <th>
                                    <?= $booking['booking_status'] ?>
                                    </th>
                                    <td class="text-center">
                                        <?php if($booking['status'] == 0): ?>
                                            <a class="btn btn-outline-info" href="bookings/payment.php?id=<?= $booking['id'] ?>">Bayar</a>
                                            <a class="btn btn-outline-danger" href="bookings/void.php?id=<?= $booking['id'] ?>">Batalkan</a>
                                        <?php endif; ?>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Detail Profil</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="dashboard.php?id=<?= $_SESSION['user']['id']?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="fullname" placeholder="Nama Lengkap" name="full_name" required value="<?= $_SESSION['user']['full_name'] ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="name" class="form-control" id="username" placeholder="Username" name="username" required value="<?= $_SESSION['user']['username'] ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="phonenumber" class="form-label">No Telepon</label>
                                <input type="tel" class="form-control" id="phonenumber" placeholder="No Telepon" name="phone_number" value="<?= $_SESSION['user']['phone_number'] ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="5" placeholder="Alamat"><?= $_SESSION['user']['address'] ?></textarea>
                                
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

        <div class="row justify-content-start">
            <div class="col-md-8 mb-4">  
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Daftar Pembayaran</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table display myDataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5" class="text-right">No</th>
                                    <th>Nama Paket</th>
                                    <th>Kode Pembayaran</th>
                                    <th>Kode Booking</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($payments as $key => $payment): ?>
                                <tr>
                                    <td class="text-center"><?= $key+1 ?></td>
                                    <td><?= $payment['package_name'] ?></td>
                                    <td><?= $payment['code'] ?></td>
                                    <td><?= $payment['booking_code'] ?></td>
                                    <td><?= $payment['payment_date'] ?></td>
                                    <td><?= formatRupiah($payment['total_price']) ?></td>
                                    <th><?= $payment['payment_status'] ?></th>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section bookings End -->
