<!-- Section Packages Start  -->
<section>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">  
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Tambah Paket</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="name" class="form-control" id="name" placeholder="Nama" name="name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="image" placeholder="Gambar" name="image" required accept="image/*">
                            </div>
                            
                            <div class="mb-3">
                                <label for="rating" class="form-label d-block">Rating</label>
                                <input class="form-check-input" type="radio" id="star5" name="rating" value="5" required>
                                <label class="form-check-label" for="star5" class="star">5</label>
                                
                                <input class="form-check-input" type="radio" id="star4" name="rating" value="4" required>
                                <label class="form-check-label" for="star4" class="star">4</label>

                                <input class="form-check-input" type="radio" id="star3" name="rating" value="3" required>
                                <label class="form-check-label" for="star3" class="star">3</label>

                                <input class="form-check-input" type="radio" id="star2" name="rating" value="2" required>
                                <label class="form-check-label" for="star2" class="star">2</label>
                        
                                <input class="form-check-input" type="radio" id="star1" name="rating" value="1" required>
                                <label class="form-check-label" for="star1" class="star">1</label>
                            
                            </div>
                            
                            <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="price" placeholder="Harga" name="price" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" rows="5" placeholder="Deskripsi" name="description"></textarea>
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