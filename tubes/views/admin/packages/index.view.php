<!-- Section Packages Start  -->
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
                            <div class="col-6 m-auto">Daftar Paket</div>
                            <div class="col-6">
                                <a href="<?= BASE_URL ?>/admin/packages/create.php" class="btn btn-primary float-end">Tambah</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table display myDataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5" class="text-right">No</th>
                                    <th>Nama</th>
                                    <th>Rating</th>
                                    <th>Harga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($packages as $key => $package): ?>
                                <tr>
                                    <td class="text-center"><?= $key+1 ?></td>
                                    <td><?= $package['name'] ?></td>
                                    <td>
                                        <?php
                                        for ($x = $package['rating']; $x >= 1; $x--) {
                                        echo "<i class='fa-solid fa-star checked'></i>";
                                        }
                                        ?>
                                    </td>
                                    <td><?= formatRupiah($package['price']) ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-info" href="detail.php?id=<?= $package['id'] ?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-outline-warning" href="edit.php?id=<?= $package['id'] ?>"><i class="fa fa-edit"></i></a>
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
<!-- Section Packages End -->