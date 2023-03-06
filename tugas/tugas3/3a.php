<?php
echo "<h4>Menghitung Luas Lingkaran</h4>";
function hitungluaslingkaran($r)
{
    // Menghitung luas lingkaran rumusnya phi x r x r
    $luas = 3.14 * $r *$r;
    return $luas . " cm<sup>2</sup>";
    // <sup> untuk supaya angkanya jadi naik keatas kecil
}
echo "jari-jari = 10cm. <br>";
echo "Luas Lingkaran = " . hitungluaslingkaran(10) . "<br>";

echo "<hr>";

echo "<h4>Menghitung Keliling Lingkaran</h4>";
function hitungkelilinglingkaran($r)
{
    // Menghitung keliling lingkaran rumusnya ialah 2 x phi x r
    $keliling = 2 * 3.14 * $r;
    return $keliling . " cm";
    // Menambahkan string cm di return agar mempunyai output dengan cm diakhirnya
}
echo "jari-jari = 20cm. <br>";
echo "Luas Lingkaran = " . hitungluaslingkaran(20) . "<br>";

echo "<hr>";
