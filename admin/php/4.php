<?php

function callName()
{
    echo "Nama saya Ananda <br>";
}

function callNameLagi()
{
    return "Nama saya Pina";
}
callName();
echo callNameLagi();
// jika pakai function berkali-kali, function seterusnya tidak perlu pakai echo lagi

function perkalian(){
    // $angka1 = 50;
    // $angka2 = 20;
    // $total = $angka1 * $angka2;
    // return $total;
}
callName();
echo "<br>";
echo callNameLagi();
echo "<br>";
echo perkalian(30, 20);
echo perkalian(70, 20);