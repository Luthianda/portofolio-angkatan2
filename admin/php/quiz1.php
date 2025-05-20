<?php
$nama = "Ananda Nabiilah";
echo "Nama Peserta :" . $nama;
echo "<br>";

$nilai = 98;
echo "Nilai : " . $nilai;
echo "<br>";

if($nilai > 89){
    echo "Grade : A";
}elseif($nilai > 79){
    echo "Grade : B";
}elseif($nilai > 69){
    echo "Grade : C";
}elseif($nilai > 59){
    echo "Grade : D";
}elseif($nilai < 60){
    echo "Grade: E";
}
echo "<br>";

if($nilai > 70){
    echo "Status : Lulus";
}else{
    echo "Status : Tidak Lulus";
}
echo "<br>";
echo "<br>";

// operator logika
// AND, &&, OR, ||, ! => and dan && digunakan saat kondisinya dua2nya betul, or dan || digunakan saat salah satunya betul

$username = "admin";
$password = "admin123";

if($username = "admin" or $password == "admin"){
    echo "Login berhasil";
}else{
    echo "Login gagal";
}