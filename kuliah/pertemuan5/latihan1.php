<?php 
// ARRAY
// array adalah variable yang bisa menampung banyak nilai

// membuat array
$hari = array ('senin','selasa','rabu','kamis','jumat','sabtu','minggu');
$bulan = array ('januari','februari','maret');
$myArray = ['Rifki', 10, false];
$binatang = ['🐱','🐶'];

// mencetak array
var_dump($hari);
print_r($bulan);
echo $binatang[1];

echo "<hr>";

// manipulasi elemen

// menambah elemen di akhir array
$bulan[] = 'april';
$bulan[] = 'mei';
print_r($bulan);
echo '<hr>';
array_push($bulan, 'juni');
print_r($bulan);
echo "<hr>";
// menambah elemen di awal array
array_unshift($binatang, '🐰');
print_r($binatang);
echo "<hr>";
// menghapus elemen di akhir array
array_pop($hari);
print_r($hari);

?>