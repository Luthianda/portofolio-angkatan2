<?php
// tas (php ini baru contoh aja)

// $nama = array();
// $nama = []

// array index (datanya bisa lebih dari 1)
$nama = array('Nanda','Dinda','Nopal','Pina');
                //0     1       2       3 ---> Ini namanya key dan dimulai dari 0
print_r($nama);
echo "<br>";
echo "<br>";

echo $nama[0];
echo "<br>";
echo $nama[1];
echo "<br>";
echo $nama[2];
echo "<br>";
echo $nama[3];
echo "<br>";

$buah = ["Apel","Mangga","Stroberi","Alpukat"];
print_r($buah);
echo "<br>";
foreach($buah as $b){
    echo " Nama-nama buah " . $b . "<br>";
}

// array asosiatif (key nya menggunakan string)
$kelas_web = [
    "nama" => "Nanda",
    "umur" => 24,
    "jurusan" => "Junior web prog"
];

echo " Nama siswa " . $kelas_web["nama"]. " Umur " . $kelas_web["umur"]. " Jurusan " . $kelas_web["jurusan"];
echo "<br>";
echo "<br>";

$siswa = [
    [
        "nama" => "Nanda",
        "umur" => 24,
        "jurusan" => "DKV",
    ],
    [
        "nama" => "Pina",
        "umur" => 24,
        "jurusan" => "Bhs Indo",
    ],
];
print_r($siswa);
echo $siswa [0]['nama'];
echo $siswa [1]['jurusan'];
echo "<br>";

foreach ($siswa as $key => $sw){
// atau bisa langsung begini foreach ($siswa as $sw) tanpa $key
    echo "Key:" . $key . "<br>";
    echo "Nama : " . $sw['nama']. "<br>";
    echo "Nama : " . $sw['umur']. "<br>";
    echo "Nama : " . $sw['jurusan']. "<br>";
}
// [0 => "nama", 1 => "nama"]

// $siswa = array(
//     array(), array(),
// )