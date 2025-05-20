<?php
session_start();
session_destroy();
header("location:8.php");

// header itu untuk redirect ke halaman yang dituju