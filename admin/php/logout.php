<?php
session_start();
session_destroy();
header("location:8.php");
// header("location:../index.php");

// header itu untuk redirect ke halaman yang dituju
// titik dua garing untuk menunjukkan menuju ke halaman yang berada diluar folder saat ini