<?php
function urutanAngka($angka)
{
    $awal = 1; // variabel buat hitung angkanya kebawah
    for ($i =1; $i <= $angka; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $awal . " ";
            $awal++; // menambahkan variabel $awal setiap kali angka ditampilkan 
        }
        echo "<br>";
    }
  }
  urutanAngka(5);//   function kita panggil pake parameter 5 biar ngurutnya 5 baris, jadi urutan angka adalah untuk menentukan baris yang akan di output
  