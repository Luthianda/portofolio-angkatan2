<!-- if: fungsi percabangan dan logika untuk menjalankan kode berdasarkan kondisi yang dicari -->

<?php

// = memberikan nilai
// == membandingkan
// === membandingkan tapi dengan tipe datanya
// else artinya selain itu, jadi untuk memasukkan selain nilai yang utama
// ! = Tidak (bermakna sebaliknya, jika dipakaikan ! otomatis menjadi tidak). contoh: empty=kosong !empty=tidak kosong
// isset = tidak kosong (ini bisa juga digunakan untuk pengganti !empty)
// > lebih besar, < lebih kecil, >= lebih besar sama dengan, <= lebih kecil sama dengan
$nama = "Nanda";
if($nama !== "bambang"){
    echo "Iya";
}else{
    echo "Bukan";
}

if(!empty($nama)) {
    echo "Yes";
}else{
    echo "No";
}

$suhu = 35;
if($suhu > 37){
    echo "Demam";
}elseif ($suhu >= 35){
    echo "Normal";
}elseif ($suhu > 33){
    echo "Kedinginan";
}
?>