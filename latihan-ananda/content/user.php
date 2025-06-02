<?php
include "config/koneksi.php";

$query = mysqli_query($config, "INSERT INTO users (name)
    VALUES ('Nanda'), ('Pina'), ('Dinda')");
?>

