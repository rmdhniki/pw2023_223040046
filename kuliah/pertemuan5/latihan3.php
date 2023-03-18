<?php 
// array Multidimensi
$binatang = [['🐱','Hitam'], ['🐰','putih'],['🐻','Coklat']];
?>

<html>
    <head>
        <title>Peternakan 2</title>
    </head>

    <body>
        <h2>Daftar Binatang</h2>
        <ul> <?php for($i = 0; $i <count($binatang); $i++) { ?>

            <li> 
                <?= $binatang[$i][0]; ?> -  <?= $binatang[$i][1]; ?> 
            </li>
            <?php } ?>
        </ul>

    </body>
</html>