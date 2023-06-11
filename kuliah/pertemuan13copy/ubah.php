<?php 
require 'functions.php';
 $name = 'ubah data mahasiswa';
 $id = htmlspecialchars($_GET['id']);
 $student = query("SELECT * FROM mahasiswa WHERE id= $id") [0];
// dd($query);
// ketika tombol submit di klik
if (isset($_POST['ubah'])) {
// ambil data dari form lalu tambah ke table mahasiswa
// cek apakah tambah data berhasil
if (ubah($_POST) > 0); {
echo "<script>
    alert('ubah data berhasil!');
    document.location.href = 'index.php';
    </script>";
}
}

require 'views/ubah.view.php';


?>