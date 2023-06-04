<section>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">  
                <?php if(isset($_SESSION['alert'])) : ?>
                <div class="alert alert-<?=$_SESSION['alert']['type']?>" role="alert">
                    <?=$_SESSION['alert']['message']?>
                </div>
                <?php unset($_SESSION['alert']); endif; ?>
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
                                    <th>Kode Booking Paket</th>
                                    <th>Konsumen</th>
                                    <th>Tanggal Checkin</th>
                                    <th>Tanggal Checkout</th>
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
                                    <td><?= $booking['full_name'] ?></td>
                                    <td><?= $booking['check_in_date'] ?></td>
                                    <td><?= $booking['check_out_date'] ?></td>
                                    <td><?= $booking['quantity'] ?> orang</td>
                                    <td><?= formatRupiah($booking['total_price']) ?></td>
                                    <th><?= $booking['booking_status'] ?></th>
                                    <td class="text-center">
                                        <?php if($booking['status'] == 0): ?>
                                        <a onclick="return confirm('apakah yakin ingin membatalkan booking paket dengan kode <?= $booking['code'] ?>?');" class="btn btn-outline-danger" href="void.php?id=<?= $booking['id'] ?>">Batalkan</a>
                                        <?php endif; ?>
                                    </td>
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
