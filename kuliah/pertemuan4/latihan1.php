<?php 
// Mengecek apakah sebuah bilangan itu Ganjil / Genap

$angka = 10;
function cek_ganjil_genap($angkaangka)
{

// jika $angka dibagi 2, sisanya 1 maka ganjil
if($angka % 2 === 1) {
    return "$angka adalah bilangan GANJIL!";
} else{ // Selain dari pada itu 
    return "$angka adalah bilangan GENAP!";
}

}

echo cek_ganjil_genap(10);