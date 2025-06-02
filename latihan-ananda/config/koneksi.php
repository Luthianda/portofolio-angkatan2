<?php
$hostname = "localhost";
$hostusername = "root";
$hostpassword = "";
$hostdatabase = "latihan_ananda";
$config = mysqli_connect($hostname, $hostusername, $hostpassword, $hostdatabase);
    if(!$config){
        echo "Koneksi gagal";
    }
?>
