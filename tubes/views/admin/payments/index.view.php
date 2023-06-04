<section>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">  
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
                                    <th>Kode Booking Paket</th>
                                    <th>Nama Konsumen</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($payments as $key => $payment): ?>
                                <tr>
                                    <td class="text-center"><?= $key+1 ?></td>
                                    <td><?= $payment['package_name'] ?></td>
                                    <td><?= $payment['code'] ?></td>
                                    <td><?= $payment['booking_code'] ?></td>
                                    <td><?= $payment['customer_name'] ?></td>
                                    <td><?= $payment['payment_date'] ?></td>
                                    <td><?= formatRupiah($payment['total_price']) ?></td>
                                    <th><?= $payment['payment_status'] ?></th>
                                    <td class="text-center">
                                        <a class="btn btn-outline-info" href="detail.php?id=<?= $payment['id'] ?>"><i class="fa fa-eye"></i></a>
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
