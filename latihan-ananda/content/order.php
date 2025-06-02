<?php
include "config/koneksi.php";

$query = mysqli_query($config, "INSERT INTO orders (user_id, product_name)
    VALUES ('1','Cushion'), ('2','Bedak'), ('3','Blush')");
?>