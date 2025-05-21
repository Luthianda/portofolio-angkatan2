<?php
$hostname = "localhost";
$hostusername = "root";
$hostpassword = "";
$hostdatabase = "db_porto_2";
$config = mysqli_connect($hostname, $hostusername, $hostpassword, $hostdatabase);
if(!$config){
    echo "Koneksi gagal";
}
?>
<!-- saat dimasukkan dalam mysqli_connect, susunan harus selalu berurut dari yang dibuat pertama -->