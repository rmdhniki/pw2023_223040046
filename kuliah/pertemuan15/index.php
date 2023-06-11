<?php
require('functions.php');
$name = 'Home';




// siapkan data $students

$students = query("SELECT * FROM mahasiswa");

// live search
if (isset($_GET['search'])){
$keyword = $_GET['keyword'];
$query = "SELECT * FROM
            mahasiswa
            
            WHERE
            nama LIKE '%$keyword%' or
            nim LIKE '%$keyword%' or
            email LIKE '%$keyword%' or
            jurusan LIKE '%$keyword%'
            ";

$students = query($query);

}
require('views/index.view.php');
