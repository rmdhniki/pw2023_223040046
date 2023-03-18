<?php 
$binatang = ['🐱','🐶','🐻','🐰'];

$warna =['kuning','putih','coklat','hitam putih'];


// mengurutkan Array
// sort() untuk awal akhir, rsort() akhir awal



// mencetak array untuk user
// for, foreach


?>
<html>
<head>

    <title>Peternakan ku</title>
</head>
<body>
    <h2> Daftar Binatang </h2>
    <ul> <?php for ($i = 0; $i <count($binatang); $i++) { ?>
        <li> <?= $binatang[$i]; ?></li>
        <?php } ?>
    </ul>    

    <h2> Daftar warna </h2>
    <ul> <?php for ($i = 0; $i <count($warna); $i++) { ?>
        <li> <?= $warna[$i]; ?></li>
        <?php } ?>
    </ul>    
<hr>

<h2>Daftar Binatang</h2>
<ol>
    <?php foreach($binatang as $b) { ?>
    <li><?= $b ?></li>
    <?php } ?>
</ol>

<h2>Daftar warna</h2>
<ol>
    <?php foreach($warna as $w) { ?>
    <li><?= $w ?></li>
    <?php } ?>
</ol>


</body>

</html>