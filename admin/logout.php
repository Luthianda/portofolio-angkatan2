<?php
session_start();
session_destroy();
header("location:index.php");

// header itu untuk redirect ke halaman yang dituju