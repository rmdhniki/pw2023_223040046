<?php
$mahasiswa = [
  [
    "nama" => "Muhammad Rifki Ramadhani",
    "nrp" => "223040046",
    "email" => "rifki.223040046@mail.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "rifki.jpeg",
  ],
  [
    "nama" => "Muhammad Daffa Musyaffa ",
    "nrp" => "223040048",
    "email" => "DAFFA.223040048@mail.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "daffa.jpg",
  ],
  [
    "nama" => "Ahmad Suherman",
    "nrp" => "223040066",
    "email" => "AHMAD.223040066@mail.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "ahmad.jpg",
  ],
  [
    "nama" => "Moch Zuhdi Maulana Nabilah",
    "nrp" => "223040101",
    "email" => "ZUHDI.223040101@mail.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "zuhdi.jpeg",
  ],
  [
    "nama" => "Aldi Pradana Hakim",
    "nrp" => "223040035",
    "email" => "ALDI.223040035@mail.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "aldi.jpg",
  ],
  [
    "nama" => "Lisvindanu",
    "nrp" => "223040038",
    "email" => "lisvin.22304038@mail.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "lisvin.jpg",
  ],
  [
    "nama" => "ivan bayu pratama",
    "nrp" => "223040057",
    "email" => "IVAN.223040057@mail.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "ivan.jpg",
  ],
  [
    "nama" => "Fakih Helmi Maulana",
    "nrp" => "223040056",
    "email" => "FAKIH.223040056@mail.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "fakih.jpg",
  ],
  [
    "nama" => "ji'ta Bilhaq",
    "nrp" => "223040055",
    "email" => "JI'TA.223040055@mail.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "jita.png",
  ],
  [
    "nama" => "Hedi Sukur",
    "nrp" => "223040071",
    "email" => "HEDI.223040071@mail.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "hedi.jpeg",
  ],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 5a</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

  <?php foreach ($mahasiswa as $mhs) : ?>
    <ul>
      <li>
        <img src="img/<?= $mhs["gambar"]; ?>" width="120" height="135">
      </li>
      <li>Nama : <?= $mhs["nama"]; ?></li>
      <li>NRP : <?= $mhs["nrp"]; ?></li>
      <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
      <li>Email : <?= $mhs["email"]; ?></li>
    </ul>
  <?php endforeach; ?>
</body>

</html>